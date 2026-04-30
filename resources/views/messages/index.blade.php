@extends('layouts.app')

@section('content')
<style>
:root {
    --primary-green: #10B981;
    --primary-dark: #059669;
    --bg-dark: #0f1219;
    --bg-card: #1a1f2e;
    --bg-hover: #232a3c;
    --border-color: #2d3448;
    --text-primary: #ffffff;
    --text-secondary: #9ca8b9;
    --text-muted: #6b7a8f;
    --danger: #ef4444;
    --success: #10B981;
}

.messages-container {
    max-width: 1400px;
    margin: 2rem auto;
    display: flex;
    gap: 20px;
    height: calc(100vh - 200px);
    min-height: 600px;
}

/* Conversations Sidebar */
.conversations-sidebar {
    width: 380px;
    background: var(--bg-card);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 20px 35px -8px rgba(0, 0, 0, 0.5);
    display: flex;
    flex-direction: column;
}

.sidebar-header {
    background: linear-gradient(135deg, #1a1f2e 0%, #0f1219 100%);
    padding: 1.5rem;
    border-bottom: 2px solid var(--primary-green);
}

.sidebar-header h3 {
    font-size: 1.4rem;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.sidebar-header h3 i {
    color: var(--primary-green);
    background: rgba(16, 185, 129, 0.1);
    padding: 10px;
    border-radius: 12px;
}

.conversation-list {
    flex: 1;
    overflow-y: auto;
    padding: 1rem;
}

.conversation-item {
    display: block;
    width: 100%;
    padding: 1rem;
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    margin-bottom: 0.8rem;
    transition: all 0.25s ease;
    text-decoration: none;
    position: relative;
    cursor: pointer;
}

.conversation-item:hover {
    background: var(--bg-hover);
    transform: translateX(4px);
    border-color: var(--primary-green);
}

.conversation-item.active {
    background: var(--bg-hover);
    border-color: var(--primary-green);
    box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
}

.conversation-item.active::before {
    content: '';
    position: absolute;
    left: -2px;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 70%;
    background: var(--primary-green);
    border-radius: 0 4px 4px 0;
}

/* Avatar Styles */
.avatar-wrapper {
    position: relative;
    margin-right: 1rem;
}

.avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.avatar.online {
    border-color: var(--primary-green);
}

.avatar.offline {
    border-color: var(--text-muted);
}

.online-indicator {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid var(--bg-card);
}

.online-indicator.online {
    background: var(--primary-green);
    box-shadow: 0 0 10px rgba(16, 185, 129, 0.6);
}

.online-indicator.offline {
    background: var(--text-muted);
}

.unread-badge {
    position: absolute;
    top: -4px;
    right: -4px;
    min-width: 20px;
    height: 20px;
    background: var(--danger);
    color: white;
    border-radius: 20px;
    font-size: 0.65rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 5px;
    border: 2px solid var(--bg-card);
}

/* User Info */
.user-info {
    flex: 1;
    min-width: 0;
}

.user-name {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0 0 4px 0;
    display: flex;
    align-items: center;
    gap: 6px;
}

.user-id {
    font-size: 0.7rem;
    color: var(--text-secondary);
    background: rgba(255, 255, 255, 0.05);
    padding: 2px 8px;
    border-radius: 30px;
}

.time-badge {
    font-size: 0.65rem;
    color: var(--text-secondary);
    background: rgba(0, 0, 0, 0.3);
    padding: 2px 8px;
    border-radius: 30px;
    white-space: nowrap;
}

.message-preview {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.85rem;
    color: var(--text-secondary);
    margin-top: 4px;
}

.message-text {
    color: #fff;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
    max-width: 180px;
}

.message-text.unread {
    color: var(--text-primary);
    font-weight: 500;
}

/* Chat Area */
.chat-area {
    flex: 1;
    background: var(--bg-card);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 20px 35px -8px rgba(0, 0, 0, 0.5);
    display: flex;
    flex-direction: column;
}

.chat-placeholder {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    color: var(--text-secondary);
    background: var(--bg-dark);
}

.chat-placeholder i {
    font-size: 4rem;
    color: var(--border-color);
    margin-bottom: 1rem;
}

.chat-placeholder h4 {
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

/* Chat Container */
.chat-container {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.chat-header {
    background: #1a1f2e;
    padding: 1rem;
    border-bottom: 2px solid var(--primary-green);
    display: flex;
    align-items: center;
}

.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 1.5rem;
    color: 000;
    background: #0f1219;
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
    background: #1a1f2e;
    color: var(--text-primary);
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

.chat-input {
    background: #1a1f2e;
    padding: 1rem;
    border-top: 1px solid var(--border-color);
}

.chat-input textarea {
    background: #232a3c;
    border: 1px solid var(--border-color);
    color: white;
    resize: none;
}

.chat-input textarea:focus {
    border-color: var(--primary-green);
    box-shadow: none;
}

.btn-send {
    background: var(--primary-green);
    border: none;
    padding: 0.5rem 1.5rem;
}

.btn-send:hover {
    background: var(--primary-dark);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
}

.empty-icon {
    width: 100px;
    height: 100px;
    background: rgba(16, 185, 129, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    border: 2px dashed rgba(16, 185, 129, 0.3);
}

.empty-icon i {
    font-size: 3rem;
    color: var(--primary-green);
}

.btn-find {
    background: linear-gradient(135deg, var(--primary-green), var(--primary-dark));
    color: white;
    padding: 10px 28px;
    border-radius: 50px;
    font-weight: 500;
    border: none;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-find:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(16, 185, 129, 0.3);
    color: white;
}

/* Loading Spinner */
.loading-spinner {
    display: inline-block;
    width: 30px;
    height: 30px;
    border: 3px solid rgba(16, 185, 129, 0.3);
    border-top: 3px solid var(--primary-green);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive */
@media (max-width: 768px) {
    .messages-container {
        flex-direction: column;
        height: auto;
    }
    
    .conversations-sidebar {
        width: 100%;
        height: 400px;
    }
    
    .chat-area {
        height: 500px;
    }
}
</style>

<div class="container-fluid py-4">
    <div class="messages-container">
        <!-- Conversations Sidebar - LEFT SIDE (Current User's Conversations) -->
        <div class="conversations-sidebar">
            <div class="sidebar-header">
                <h3>
                    <i class="fas fa-comments"></i>
                    Messages
                    @if(!$users->isEmpty())
                        <span class="badge bg-success ms-2">{{ $users->count() }}</span>
                    @endif
                </h3>
            </div>

            <div class="conversation-list" id="conversationList">
                @if($users->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <h5>No conversations yet</h5>
                        <p class="small">Start connecting with people!</p>
                        <a href="{{ route('search') }}" class="btn-find mt-3">
                            <i class="fas fa-search"></i> Find Matches
                        </a>
                    </div>
                @else
                    @foreach($users as $chatUser)
                        @php
                            $lastMessage = \App\Models\Message::where(function($q) use ($chatUser) {
                                $q->where('sender_id', Auth::id())
                                  ->where('receiver_id', $chatUser->id);
                            })->orWhere(function($q) use ($chatUser) {
                                $q->where('sender_id', $chatUser->id)
                                  ->where('receiver_id', Auth::id());
                            })->orderBy('created_at', 'desc')->first();
                            
                            $unreadCount = \App\Models\Message::where('sender_id', $chatUser->id)
                                ->where('receiver_id', Auth::id())
                                ->where('status', '!=', 'seen')
                                ->count();
                                
                            $isOnline = $chatUser->last_seen && $chatUser->last_seen->gt(now()->subMinutes(5));
                            
                            // ZAW pattern ID
                            $zawId = 'ZAW1232' . $chatUser->id . 'ygf676tyg';
                        @endphp
                        
                        <div class="conversation-item" data-user-id="{{ $chatUser->id }}" data-zaw-id="{{ $zawId }}" onclick="loadChat('{{ $chatUser->id }}', '{{ $zawId }}')">
                            <div class="d-flex align-items-center">
                                <div class="avatar-wrapper">
                                    <img src="{{ $chatUser->profile_image ? asset($chatUser->profile_image) : asset('assets/images/dummy.jpg') }}" 
                                         class="avatar {{ $isOnline ? 'online' : 'offline' }}"
                                         alt="">
                                    <span class="online-indicator {{ $isOnline ? 'online' : 'offline' }}"></span>
                                    
                                    @if($unreadCount > 0)
                                        <span class="unread-badge">{{ $unreadCount }}</span>
                                    @endif
                                </div>
                                
                                <div class="user-info">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h6 class="user-name">
                                            {{ $zawId }}
                                            <span class="user-id">{{ $chatUser->city ?? 'City' }}</span>
                                        </h6>
                                        @if($lastMessage)
                                            <span class="time-badge">
                                                {{ $lastMessage->created_at->diffForHumans(null, true) }}
                                            </span>
                                        @endif
                                    </div>
                                    
                                    @if($lastMessage)
                                        <div class="message-preview">
                                            @if($lastMessage->sender_id == Auth::id())
                                                <span class="status-icon">{!! $lastMessage->status_icon !!}</span>
                                            @endif
                                            <span class="message-text {{ $unreadCount > 0 && $lastMessage->sender_id != Auth::id() ? 'unread' : '' }}">
                                                @if($lastMessage->sender_id == Auth::id())
                                                    You:
                                                @endif
                                                {{ $lastMessage->message }}
                                            </span>
                                        </div>
                                    @else
                                        <div class="message-preview">
                                            <span class="message-text">No messages yet</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Chat Area - RIGHT SIDE (Selected User's Chat) -->
        <div class="chat-area" id="chatArea">
            <div class="chat-placeholder">
                <i class="fas fa-comment-dots"></i>
                <h4>Select a conversation</h4>
                <p class="text-secondary">Choose someone to start chatting</p>
            </div>
        </div>
    </div>
</div>

<!-- Chat Template (Hidden) -->
<template id="chatTemplate">
    <div class="chat-container">
        <!-- Chat Header -->
        <div class="chat-header">
            <img src="" class="rounded-circle me-3" style="width: 45px; height: 45px; object-fit: cover; border: 2px solid var(--primary-green);" id="chatAvatar">
            <div class="flex-grow-1">
                <h5 class="mb-0 text-white" id="chatName"></h5>
                <small class="text-secondary" id="chatStatus"></small>
            </div>
            <div class="remaining-badge" id="remainingMessages"></div>
        </div>

        <!-- Messages -->
        <div class="chat-messages" id="chatMessages"></div>

        <!-- Input -->
        <div class="chat-input" id="chatInput">
            <form id="messageForm" onsubmit="sendMessage(event)">
                @csrf
                <input type="hidden" name="receiver_id" id="receiverId">
                <div class="input-group">
                    <textarea class="form-control" 
                              id="messageInput"
                              rows="1"
                              placeholder="Type your message..."
                              required></textarea>
                    <button class="btn btn-send" type="submit">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<!-- Message Template -->
<template id="messageTemplate">
    <div class="message">
        <div class="message-content">
            <div class="message-text"></div>
            <div class="message-footer">
                <span class="message-time"></span>
                <span class="message-status"></span>
            </div>
        </div>
    </div>
</template>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let currentChatId = null;
let lastMessageId = 0;
let pollingInterval = null;
let remainingMessages = 0;

// Load chat when page loads with hash
$(document).ready(function() {
    let hash = window.location.hash;

    if (hash.includes('chat-')) {
        let zawId = hash.replace('#chat-', '');
        let userId = extractIdFromZaw(zawId);

        if (userId) {
            loadChat(userId, zawId);
        }
    }
});

// Extract numeric ID from ZAW1232{id}ygf676tyg pattern
function extractIdFromZaw(zawId) {
    let match = zawId.match(/ZAW1232(\d+)ygf676tyg/i);
    return match ? parseInt(match[1]) : null;
}

function loadChat(userId, zawId) {
    // Update active state
    $('.conversation-item').removeClass('active');
    $(`.conversation-item[data-user-id="${userId}"]`).addClass('active');
    
    // Show loading
    $('#chatArea').html(`
        <div class="chat-placeholder">
            <div class="loading-spinner"></div>
            <p class="mt-3">Loading conversation...</p>
        </div>
    `);
    
    // Load chat via AJAX
    $.ajax({
        url: `/messages/load-chat/${userId}`,
        method: 'GET',
        success: function(response) {
            if (response.success) {
                renderChat(response, zawId);
                currentChatId = userId;
                remainingMessages = response.remaining;
                lastMessageId = response.messages.length > 0 ? response.messages[response.messages.length - 1].id : 0;
                updateUrl(zawId);
                startPolling(userId);
            }
        },
        error: function(xhr) {
    console.log(xhr.responseText); // 👈 REAL ERROR dekho

    $('#chatArea').html(`
        <div class="chat-placeholder">
            <i class="fas fa-exclamation-circle text-danger"></i>
            <p class="mt-3">Error loading conversation</p>
        </div>
    `);
}
    });
}

function renderChat(data, zawId) {
    let template = document.getElementById('chatTemplate').content.cloneNode(true);
    
    // Set user info with ZAW pattern
    template.querySelector('#chatAvatar').src = data.user.profile_image || '/assets/images/dummy.jpg';
    template.querySelector('#chatName').textContent = zawId || `ZAW1232${data.user.id}ygf676tyg`;
    template.querySelector('#chatStatus').innerHTML = `
        <span class="badge ${data.isOnline ? 'bg-success' : 'bg-secondary'} rounded-pill">
            <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: white; margin-right: 5px;"></span>
            ${data.isOnline ? 'Online' : (data.user.last_seen ? 'Last seen ' + new Date(data.user.last_seen).toLocaleString() : 'Offline')}
        </span>
    `;
    template.querySelector('#receiverId').value = data.user.id;
    
    // Set remaining messages
    let remainingBadge = template.querySelector('#remainingMessages');
    if (data.remaining > 0) {
        remainingBadge.className = 'badge bg-warning text-dark rounded-pill';
        remainingBadge.innerHTML = `<i class="fas fa-envelope me-1"></i>${data.remaining} left`;
    } else {
        remainingBadge.className = 'badge bg-danger text-white rounded-pill';
        remainingBadge.innerHTML = `<i class="fas fa-exclamation-circle me-1"></i>Limit reached`;
    }
    
    // Add messages
    let messagesContainer = template.querySelector('#chatMessages');
    data.messages.forEach(msg => {
        messagesContainer.appendChild(createMessageElement(msg));
    });
    
    // Clear and append new chat
    $('#chatArea').empty().append(template);
    scrollToBottom();
}

function createMessageElement(message) {

    let template = document.getElementById('messageTemplate').content.cloneNode(true);
    let messageDiv = template.querySelector('.message');

    let authId = {{ Auth::id() }};

    if (parseInt(message.sender_id) === parseInt(authId)) {
        messageDiv.classList.add('sent');
    } else {
        messageDiv.classList.add('received');
    }

    template.querySelector('.message-text').textContent = message.message;

    template.querySelector('.message-time').textContent =
        new Date(message.created_at).toLocaleTimeString([], {
            hour: '2-digit',
            minute: '2-digit'
        });

    if (parseInt(message.sender_id) === parseInt(authId)) {

        let statusSpan = template.querySelector('.message-status');

        if (message.status === 'seen') {

            statusSpan.innerHTML = '<i class="fas fa-check-double text-primary"></i>';

        } else if (message.status === 'delivered') {

            statusSpan.innerHTML = '<i class="fas fa-check-double text-secondary"></i>';

        } else {

            statusSpan.innerHTML = '<i class="fas fa-check text-secondary"></i>';
        }
    }

    return template;
}

function sendMessage(event) {
    event.preventDefault();
    
    let message = $('#messageInput').val().trim();
    if (!message || !currentChatId) return;
    
    $.ajax({
        url: '{{ route("messages.send") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            receiver_id: currentChatId,
            message: message
        },
        success: function(response) {
            if (response.success) {
                let messageElement = createMessageElement(response.message);
                document.getElementById('chatMessages').appendChild(messageElement);
                $('#messageInput').val('');
                scrollToBottom();
                lastMessageId = response.message.id;
                remainingMessages = response.remaining;
                
                // Update remaining badge
                updateRemainingBadge();
                
                // Update conversation list
                updateConversationList(currentChatId, response.message);
            }
        },
        error: function(xhr) {
            if (xhr.status === 403) {
                showLimitAlert();
            }
        }
    });
}

function checkNewMessages() {
    if (!currentChatId) return;
    
    $.ajax({
        url: `/messages/get-new/${currentChatId}?last_message_id=${lastMessageId}`,
        method: 'GET',
        success: function(response) {
            if (response.success && response.messages.length > 0) {
                response.messages.forEach(msg => {
                    let messageElement = createMessageElement(msg);
                    document.getElementById('chatMessages').appendChild(messageElement);
                    lastMessageId = msg.id;
                });
                scrollToBottom();
                markMessagesAsSeen();
            }
        }
    });
}

function markMessagesAsSeen() {
    if (!currentChatId) return;
    
    $.ajax({
        url: '{{ route("messages.mark-seen") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            sender_id: currentChatId
        }
    });
}

function updateConversationList(userId, lastMessage) {
    let conversationItem = $(`.conversation-item[data-user-id="${userId}"]`);
    let previewDiv = conversationItem.find('.message-preview');
    
    let statusIcon = '';
    if (lastMessage.sender_id == {{ Auth::id() }}) {
        statusIcon = '<span class="status-icon me-1"><i class="fas fa-check" style="color: #9ca3af;"></i></span>';
    }
    
    previewDiv.html(`
        ${statusIcon}
        <span class="message-text">
            ${lastMessage.sender_id == {{ Auth::id() }} ? 'You: ' : ''}
            <span class="message-text">
    ${lastMessage.sender_id == {{ Auth::id() }} ? 'You: ' : ''}${lastMessage.message}
</span>
        </span>
    `);
    
    // Update time
    conversationItem.find('.time-badge').text('just now');
}

function updateRemainingBadge() {
    let badge = document.querySelector('#remainingMessages');
    if (remainingMessages > 0) {
        badge.className = 'badge bg-warning text-dark rounded-pill';
        badge.innerHTML = `<i class="fas fa-envelope me-1"></i>${remainingMessages} left`;
    } else {
        badge.className = 'badge bg-danger text-white rounded-pill';
        badge.innerHTML = `<i class="fas fa-exclamation-circle me-1"></i>Limit reached`;
        
        // Disable input
        $('#messageInput').prop('disabled', true);
        $('.btn-send').prop('disabled', true);
    }
}

function showLimitAlert() {
    Swal.fire({
        title: 'Message Limit Reached!',
        text: 'You have reached the message limit for this user.',
        icon: 'warning',
        confirmButtonColor: '#10B981',
        background: '#1a1f2e',
        color: '#fff'
    });
}

function startPolling(userId) {
    if (pollingInterval) {
        clearInterval(pollingInterval);
    }
    pollingInterval = setInterval(checkNewMessages, 3000);
}

function scrollToBottom() {
    let messagesDiv = document.getElementById('chatMessages');
    if (messagesDiv) {
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }
}

function updateUrl(zawId) {
    // Update URL with ZAW pattern without reloading
    window.location.hash = `chat-${zawId}`;
}

// Check for hash changes (back/forward buttons)
window.addEventListener('hashchange', function() {
    let hash = window.location.hash.substring(1);
    if (hash && hash.startsWith('chat-')) {
        let zawId = hash.replace('chat-', '');
        let userId = extractIdFromZaw(zawId);
        if (userId) {
            loadChat(userId, zawId);
        }
    }
});
$(document).on('keydown', '#messageInput', function(e) {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        $('#messageForm').submit();
    }
});
</script>
@endsection