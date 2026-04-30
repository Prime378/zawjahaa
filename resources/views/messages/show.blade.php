@extends('layouts.app')

@section('content')
<style>
.chat-container {
    height: calc(100vh - 200px);
    display: flex;
    flex-direction: column;
    background: #111827;
    border-radius: 15px;
    overflow: hidden;
}

.chat-header {
    background: #1f2937;
    padding: 1rem;
    border-bottom: 2px solid #374151;
}

.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 1.5rem;
    background: #111827;
}

.message {
    display: flex;
    margin-bottom: 1rem;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.message.sent {
    justify-content: flex-end;
}

.message.received {
    justify-content: flex-start;
}

.message-content {
    max-width: 70%;
    padding: 0.8rem 1.2rem;
    border-radius: 20px;
    position: relative;
    word-break: break-word;
}

.message.sent .message-content {
    background: linear-gradient(135deg, #10B981 0%, #059669 100%);
    color: white;
    border-bottom-right-radius: 5px;
}

.message.received .message-content {
    background: #1f2937;
    color: #f1f5f9;
    border-bottom-left-radius: 5px;
}

.message-footer {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 4px;
    margin-top: 4px;
    font-size: 0.7rem;
}

.message-time {
    opacity: 0.7;
}

.message-status {
    display: flex;
    align-items: center;
    margin-left: 4px;
}

.message-status i {
    font-size: 0.8rem;
}

.chat-input {
    background: #1f2937;
    padding: 1.5rem;
    border-top: 2px solid #374151;
}

.message-limit-badge {
    display: inline-block;
    padding: 0.3rem 1rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 600;
}

.error-message {
    background: #dc2626;
    color: white;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    display: none;
}

.loading-spinner {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 3px solid #f3f3f3;
    border-top: 3px solid #10B981;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.online-indicator {
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    margin-right: 5px;
}

.online { background-color: #10B981; }
.offline { background-color: #6c757d; }
</style>

<div class="container py-4">
    <div class="chat-container">
        <!-- Error Display -->
        <div class="error-message" id="errorDisplay"></div>

        <!-- Header -->
        <div class="chat-header d-flex align-items-center">
            <a href="{{ route('messages.index') }}" class="btn btn-outline-secondary btn-sm me-3 rounded-circle">
                <i class="fas fa-arrow-left"></i>
            </a>
            <img src="{{ $user->profile_image ? asset($user->profile_image) : asset('assets/images/dummy.jpg') }}" 
                 class="rounded-circle me-3" 
                 style="width: 45px; height: 45px; object-fit: cover; border: 2px solid {{ $isOnline ? '#10B981' : '#6c757d' }};"
                 alt="">
            <div class="flex-grow-1">
                <h5 class="mb-0 text-white">ZAW1232{{ $user->id }}ygf676tyg</h5>
                <small class="text-secondary" id="userStatus">
                    <span class="badge {{ $isOnline ? 'bg-success' : 'bg-secondary' }} rounded-pill">
                        <span class="online-indicator {{ $isOnline ? 'online' : 'offline' }}"></span>
                        {{ $isOnline ? 'Online' : ($user->last_seen ? 'Last seen ' . $user->last_seen->diffForHumans() : 'Offline') }}
                    </span>
                </small>
            </div>
            
            @if($remainingMessages > 0)
                <div class="message-limit-badge bg-warning text-dark">
                    <i class="fas fa-envelope me-1"></i>
                    {{ $remainingMessages }} left
                </div>
            @else
                <div class="message-limit-badge bg-danger text-white">
                    <i class="fas fa-exclamation-circle me-1"></i>
                    Limit reached
                </div>
            @endif
        </div>

        <!-- Messages -->
        <div class="chat-messages" id="chatMessages">
            @forelse($messages as $msg)
                <div class="message {{ $msg->sender_id == Auth::id() ? 'sent' : 'received' }}" data-message-id="{{ $msg->id }}">
                    <div class="message-content">
                        {{ $msg->message }}
                        <div class="message-footer">
                            <span class="message-time">{{ $msg->created_at->format('h:i A') }}</span>
                            @if($msg->sender_id == Auth::id())
                                <span class="message-status">
                                    {!! $msg->status_icon !!}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-secondary py-5">
                    <i class="fas fa-comments fa-3x mb-3"></i>
                    <p>No messages yet. Start the conversation!</p>
                </div>
            @endforelse
        </div>

        <!-- Input -->
        <div class="chat-input">
            @if($remainingMessages > 0)
                <form id="messageForm" onsubmit="sendMessage(event)">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                    <div class="input-group">
                        <textarea class="form-control bg-dark text-white border-secondary" 
                                  id="messageInput"
                                  name="message" 
                                  rows="1"
                                  placeholder="Type your message..."
                                  required></textarea>
                        <button class="btn btn-success" type="submit" id="sendButton">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
                <div class="mt-2 text-center">
                    <small class="text-secondary">
                        <i class="fas fa-info-circle me-1"></i>
                        {{ $remainingMessages }} message{{ $remainingMessages != 1 ? 's' : '' }} remaining
                    </small>
                </div>
            @else
                <div class="text-center py-4">
                    <div class="bg-dark p-4 rounded-3" style="border: 2px solid #374151;">
                        <i class="fas fa-lock fa-3x mb-3 text-secondary"></i>
                        <h5 class="text-white mb-2">Message Limit Reached</h5>
                        <p class="text-secondary mb-3">You've sent 2 messages to this user</p>
                        <button onclick="showPremiumAlert()" class="btn btn-warning rounded-pill px-4">
                            <i class="fas fa-crown me-2"></i>Upgrade to Send More
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let lastMessageId = {{ $messages->last()->id ?? 0 }};
let receiverId = {{ $user->id }};
let remainingMessages = {{ $remainingMessages }};
let pollingInterval = null;

$(document).ready(function() {
    scrollToBottom();
    markMessagesAsSeen();
    startPolling();

    // 👇 YEH CODE ADD KARO
    $('#messageInput').on('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault(); // new line rokne ke liye
            $('#messageForm').submit(); // form submit
        }
    });
});

function startPolling() {
    if (pollingInterval) {
        clearInterval(pollingInterval);
    }
    pollingInterval = setInterval(checkNewMessages, 3000);
}

function showError(message) {
    $('#errorDisplay').text(message).fadeIn().delay(3000).fadeOut();
}

function sendMessage(event) {
    event.preventDefault();
    
    let message = $('#messageInput').val().trim();
    if (!message) return;
    
    $('#sendButton').prop('disabled', true).html('<span class="loading-spinner"></span>');
    
    $.ajax({
        url: '{{ route("messages.send") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            receiver_id: receiverId,
            message: message
        },
        success: function(response) {
            if (response.success) {
                addMessageToChat(response.message, 'sent');
                $('#messageInput').val('');
                scrollToBottom();
                
                lastMessageId = response.message.id;
                remainingMessages = response.remaining;
                updateRemainingMessages();
                
                if (remainingMessages <= 0) {
                    disableMessageInput();
                }
            }
            $('#sendButton').prop('disabled', false).html('<i class="fas fa-paper-plane"></i>');
        },
        error: function(xhr) {
            $('#sendButton').prop('disabled', false).html('<i class="fas fa-paper-plane"></i>');
            if (xhr.status === 403) {
                showPremiumAlert();
            } else {
                showError('Failed to send message');
            }
        }
    });
}

function addMessageToChat(message, type) {
    let statusIcon = type === 'sent' ? '<i class="fas fa-check" style="color: #9ca3af;"></i>' : '';
    
    $('.text-center.py-5').remove();
    
    let html = `
        <div class="message ${type}" data-message-id="${message.id}">
            <div class="message-content">
                ${message.message}
                <div class="message-footer">
                    <span class="message-time">${new Date().toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })}</span>
                    <span class="message-status">${statusIcon}</span>
                </div>
            </div>
        </div>
    `;
    $('#chatMessages').append(html);
}

function checkNewMessages() {
    let url = `/messages/get-new/${receiverId}?last_message_id=${lastMessageId}`;
    
    $.ajax({
        url: url,
        method: 'GET',
        success: function(response) {
            if (response.success && response.messages && response.messages.length > 0) {
                response.messages.forEach(function(message) {
                    addReceivedMessage(message);
                    lastMessageId = message.id;
                });
                markMessagesAsSeen();
                scrollToBottom();
            }
        },
        error: function(xhr) {
            console.error('Polling error:', xhr.responseText);
        }
    });
}

function addReceivedMessage(message) {
    $('.text-center.py-5').remove();
    
    let html = `
        <div class="message received" data-message-id="${message.id}">
            <div class="message-content">
                ${message.message}
                <div class="message-footer">
                    <span class="message-time">${new Date(message.created_at).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })}</span>
                </div>
            </div>
        </div>
    `;
    $('#chatMessages').append(html);
}

function markMessagesAsSeen() {
    $.ajax({
        url: '{{ route("messages.mark-seen") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            sender_id: receiverId
        },
        success: function(response) {
            if (response.success && response.count > 0) {
                // Update all sent message icons to blue double tick
                $('.message.sent .message-status i')
                    .removeClass('fa-check')
                    .addClass('fa-check-double')
                    .css('color', '#3b82f6')
                    .attr('title', 'Seen');
            }
        }
    });
}

function updateRemainingMessages() {
    if (remainingMessages > 0) {
        $('.message-limit-badge').html(`<i class="fas fa-envelope me-1"></i>${remainingMessages} left`);
    }
}

function disableMessageInput() {
    $('#messageInput, #sendButton').prop('disabled', true);
    stopPolling();
}

function showPremiumAlert() {
    Swal.fire({
        title: 'Message Limit Reached!',
        text: 'Upgrade to premium to send unlimited messages!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f59e0b',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Upgrade to Premium',
        background: '#1f2937',
        color: '#fff'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/premium';
        }
    });
}

function scrollToBottom() {
    let chatMessages = document.getElementById('chatMessages');
    if (chatMessages) {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
}

function stopPolling() {
    if (pollingInterval) {
        clearInterval(pollingInterval);
        pollingInterval = null;
    }
}
</script>
@endsection