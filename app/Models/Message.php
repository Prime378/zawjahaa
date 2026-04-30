<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'status',
        'is_read',
        'read_at',
        'delivered_at',
        'seen_at'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
        'delivered_at' => 'datetime',
        'seen_at' => 'datetime'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    // Mark as delivered
    public function markAsDelivered()
    {
        if ($this->status === 'sent') {
            $this->update([
                'status' => 'delivered',
                'delivered_at' => now()
            ]);
        }
        return $this;
    }

    // Mark as seen
    public function markAsSeen()
    {
        if ($this->status !== 'seen') {
            $this->update([
                'status' => 'seen',
                'is_read' => true,
                'read_at' => now(),
                'seen_at' => now()
            ]);
        }
        return $this;
    }

    // Get status icon HTML
    public function getStatusIconAttribute()
    {
        if ($this->status == 'seen') {
            return '<i class="fas fa-check-double" style="color: #3b82f6;" title="Seen"></i>'; // Blue double tick
        } elseif ($this->status == 'delivered') {
            return '<i class="fas fa-check-double" style="color: #9ca3af;" title="Delivered"></i>'; // Gray double tick
        } else {
            return '<i class="fas fa-check" style="color: #9ca3af;" title="Sent"></i>'; // Gray single tick
        }
    }
}