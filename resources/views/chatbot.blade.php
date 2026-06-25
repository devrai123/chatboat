<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Chatbot</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<div class="chat-box">
    <div class="chat-header">Laravel Chatbot</div>
    <div class="chat-messages" id="chatMessages"></div>
    <div class="typing" id="typingIndicator" style="display:none;">Bot is typing...</div>
    <div class="chat-input">
        <input type="text" id="messageInput" placeholder="Type a message..." autocomplete="off">
        <button id="sendBtn">Send</button>
    </div>
</div>

<script>
    const messagesEl = document.getElementById('chatMessages');
    const inputEl = document.getElementById('messageInput');
    const sendBtn = document.getElementById('sendBtn');
    const typingEl = document.getElementById('typingIndicator');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    function appendMessage(text, sender) {
        const row = document.createElement('div');
        row.className = `message ${sender}`;
        const bubble = document.createElement('div');
        bubble.className = 'bubble';
        bubble.textContent = text;
        row.appendChild(bubble);
        messagesEl.appendChild(row);
        messagesEl.scrollTop = messagesEl.scrollHeight;
    }

    async function sendMessage() {
        const text = inputEl.value.trim();
        if (!text) return;

        appendMessage(text, 'user');
        inputEl.value = '';
        typingEl.style.display = 'block';
        sendBtn.disabled = true;

        try {
            const res = await fetch('/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ message: text }),
            });
            const data = await res.json();
            appendMessage(data.reply, 'bot');
        } catch (err) {
            appendMessage('Network error. Please try again.', 'bot');
        } finally {
            typingEl.style.display = 'none';
            sendBtn.disabled = false;
        }
    }

    sendBtn.addEventListener('click', sendMessage);
    inputEl.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });

    appendMessage('Hi! How can I help you today?', 'bot');
</script>

</body>
</html>