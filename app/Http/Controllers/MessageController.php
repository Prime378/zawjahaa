<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function index()
    {
        try {
            // Get all users that have conversation with current user
            $userIds = Message::where('sender_id', Auth::id())
                ->orWhere('receiver_id', Auth::id())
                ->get()
                ->map(function($msg) {
                    return $msg->sender_id == Auth::id() ? $msg->receiver_id : $msg->sender_id;
                })
                ->unique()
                ->values();

            $users = User::whereIn('id', $userIds)->get();
            
            return view('messages.index', compact('users'));
        } catch (\Exception $e) {
            Log::error('Message index error: ' . $e->getMessage());
            return view('messages.index', ['users' => collect([])]);
        }
    }

    public function show($user)
    {
        try {
            $user = User::findOrFail($user);
            
            // Mark received messages as seen
            Message::where('sender_id', $user->id)
                ->where('receiver_id', Auth::id())
                ->where('status', '!=', 'seen')
                ->update([
                    'status' => 'seen',
                    'is_read' => true,
                    'read_at' => now(),
                    'seen_at' => now()
                ]);
            
            // Get conversation
            $messages = Message::where(function($q) use ($user) {
                $q->where('sender_id', Auth::id())
                  ->where('receiver_id', $user->id);
            })->orWhere(function($q) use ($user) {
                $q->where('sender_id', $user->id)
                  ->where('receiver_id', Auth::id());
            })->orderBy('created_at', 'asc')->get();
            
            $sentMessagesCount = Message::where('sender_id', Auth::id())
                ->where('receiver_id', $user->id)
                ->count();
            $remainingMessages = 2 - $sentMessagesCount;
            
            // Check online status
            $isOnline = $user->last_seen && $user->last_seen->gt(now()->subMinutes(5));
            
            return view('messages.show', compact('user', 'messages', 'remainingMessages', 'isOnline'));
            
        } catch (\Exception $e) {
            Log::error('Message show error: ' . $e->getMessage());
            return redirect()->route('messages.index')->with('error', 'User not found');
        }
    }

public function send(Request $request)
{
    try {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000'
        ]);

        $receiverId = $request->receiver_id;

        $sentCount = Message::where('sender_id', Auth::id())
            ->where('receiver_id', $receiverId)
            ->count();

        if ($sentCount >= 2) {
            return response()->json([
                'success' => false,
                'limit_reached' => true
            ], 403);
        }

        $receiver = User::find($receiverId);
        $isReceiverOnline = $receiver && $receiver->last_seen && $receiver->last_seen->gt(now()->subMinutes(5));

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $receiverId,
            'message' => $request->message,
            'status' => $isReceiverOnline ? 'delivered' : 'sent',
            'is_read' => false,
            'delivered_at' => $isReceiverOnline ? now() : null
        ]);

        $remaining = 2 - ($sentCount + 1);

        return response()->json([
            'success' => true,
            'message' => [
                'id' => $message->id,
                'sender_id' => $message->sender_id,
                'receiver_id' => $message->receiver_id,
                'message' => $message->message,
                'status' => $message->status,
                'created_at' => $message->created_at->toDateTimeString()
            ],
            'remaining' => $remaining
        ]);
    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'error' => $e->getMessage()
        ], 500);
    }
}

    public function getNewMessages(Request $request, $userId)
    {
        try {
            $request->validate([
                'last_message_id' => 'required|integer'
            ]);

            $user = User::find($userId);
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not found'], 404);
            }

            // Get new messages
            $messages = Message::where('sender_id', $user->id)
                ->where('receiver_id', Auth::id())
                ->where('id', '>', $request->last_message_id)
                ->orderBy('created_at', 'asc')
                ->get();

            // Mark as delivered (double gray)
            foreach ($messages as $message) {
                if ($message->status == 'sent') {
                    $message->update([
                        'status' => 'delivered',
                        'delivered_at' => now()
                    ]);
                }
            }

            // Reload messages to get updated status
            $messages = Message::where('sender_id', $user->id)
                ->where('receiver_id', Auth::id())
                ->where('id', '>', $request->last_message_id)
                ->orderBy('created_at', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'messages' => $messages,
                'count' => $messages->count()
            ]);
            
        } catch (\Exception $e) {
            Log::error('getNewMessages error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

  public function loadChat($userId)
{
    try {

        $user = User::findOrFail($userId);

        Message::where('sender_id', $user->id)
            ->where('receiver_id', Auth::id())
            ->update([
                'status' => 'seen',
                'seen_at' => now()
            ]);

        $messages = Message::where(function($q) use ($user) {
            $q->where('sender_id', Auth::id())
              ->where('receiver_id', $user->id);
        })->orWhere(function($q) use ($user) {
            $q->where('sender_id', $user->id)
              ->where('receiver_id', Auth::id());
        })
        ->orderBy('created_at','asc')
        ->get();

        $sentMessages = Message::where('sender_id', Auth::id())
            ->where('receiver_id', $user->id)
            ->count();

        $remaining = 2 - $sentMessages;

        $isOnline = $user->last_seen && $user->last_seen->gt(now()->subMinutes(5));

        return response()->json([
            'success' => true,
            'user' => $user,
            'messages' => $messages,
            'remaining' => $remaining,
            'isOnline' => $isOnline
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false
        ],500);

    }
}
    public function markAsSeen(Request $request)
    {
        try {
            $request->validate([
                'sender_id' => 'required|exists:users,id'
            ]);

            $messages = Message::where('sender_id', $request->sender_id)
                ->where('receiver_id', Auth::id())
                ->where('status', '!=', 'seen')
                ->get();

            foreach ($messages as $message) {
                $message->markAsSeen();
            }

            return response()->json([
                'success' => true,
                'count' => $messages->count()
            ]);
            
        } catch (\Exception $e) {
            Log::error('markAsSeen error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Server error'
            ], 500);
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $request->validate([
                'message_id' => 'required|exists:messages,id',
                'status' => 'required|in:delivered,seen'
            ]);

            $message = Message::find($request->message_id);
            
            if ($request->status === 'delivered') {
                $message->markAsDelivered();
            } elseif ($request->status === 'seen') {
                $message->markAsSeen();
            }

            return response()->json([
                'success' => true,
                'status' => $message->status,
                'status_icon' => $message->status_icon
            ]);
            
        } catch (\Exception $e) {
            Log::error('updateStatus error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Server error'
            ], 500);
        }
    }
}