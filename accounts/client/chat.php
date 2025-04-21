<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Client Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@4.6.3/dist/index.min.js"></script>
  <style>
    body {
      display: flex;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .sidebar {
      width: 250px;
      background-color: #343a40;
      color: white;
      padding: 1rem;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      margin: 10px 0;
    }

    .main {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .header {
      background-color: #f8f9fa;
      padding: 1rem 2rem;
      border-bottom: 1px solid #dee2e6;
    }

    .content {
      flex-grow: 1;
      padding: 2rem;
      overflow-y: auto;
      background-color: #f1f3f5;
    }

    .chat-container {
      display: flex;
      height: 500px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 10px;
      overflow: hidden;
    }

    .chat-sidebar {
      width: 250px;
      background-color: #f8f9fa;
      border-right: 1px solid #ddd;
      padding: 1rem;
      overflow-y: auto;
    }

    .chat-main {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .chat-messages {
      flex: 1;
      padding: 1rem;
      overflow-y: auto;
      background: #ffffff;
    }

    .chat-input {
      border-top: 1px solid #ddd;
      padding: 1rem;
      display: flex;
      gap: 10px;
    }

    .chat-message {
      margin-bottom: 10px;
    }

    .chat-message.user {
      text-align: right;
    }

    .chat-message.va {
      text-align: left;
    }

    .chat-message small {
      display: block;
      font-size: 0.7rem;
      color: #888;
    }
  </style>
</head>

<body>
  <div class="sidebar">
    <h4>Client Panel</h4>
    <a href="dashboard.php">Dashboard</a>
    <a href="buy_tokens.php">My Tokens</a>
    <a href="chat.php">Chat</a>
    <a href="profile.php">Profile</a>
    <a href="#">Logout</a>
  </div>

  <div class="main">
    <div class="header">
      <h4>Client Dashboard</h4>
    </div>

    <div class="content">
      <h2>Chat with VA - Jane Doe</h2>
      <div class="chat-container mb-4">
        <div class="chat-sidebar">
          <h6>Recent Chats</h6>
          <ul class="list-group">
            <li class="list-group-item active">Jane Doe <span class="badge bg-success">Online</span></li>
            <li class="list-group-item">John Smith <span class="badge bg-secondary">Offline</span></li>
          </ul>
        </div>
        <div class="chat-main">
          <div class="chat-messages" id="chatMessages">
            <div class="chat-message va">
              <strong>VA:</strong> Hello! How can I help you today?
              <small>10:01 AM</small>
            </div>
            <div class="chat-message user">
              <strong>You:</strong> I need help with my account setup.
              <small>10:02 AM</small>
            </div>
            <div class="chat-message va">
              <strong>VA:</strong> Sure! Let me guide you through it.
              <small>10:03 AM</small>
            </div>
          </div>
          <div class="chat-input">
            <button class="btn btn-outline-secondary" id="emojiBtn">😊</button>
            <button class="btn btn-outline-secondary" id="attachBtn">📎</button>
            <input type="file" id="fileInput" style="display: none;" accept="image/*">
            <input type="text" id="messageInput" class="form-control" placeholder="Type your message...">
            <button class="btn btn-primary" id="sendBtn">Send</button>
          </div>
        </div>
      </div>

      <div id="tokenWarning"></div>
      <p><strong>Note:</strong> Each message deducts from your token balance. Remaining:
        <span id="tokenCount" class="badge bg-success">45 messages</span>
      </p>
    </div>
  </div>

  <script>
    let remainingMessages = 45;

    const sendBtn = document.getElementById('sendBtn');
    const messageInput = document.getElementById('messageInput');
    const chatMessages = document.getElementById('chatMessages');
    const tokenCount = document.getElementById('tokenCount');
    const tokenWarning = document.getElementById('tokenWarning');
    const attachBtn = document.getElementById('attachBtn');
    const fileInput = document.getElementById('fileInput');
    const emojiBtn = document.getElementById('emojiBtn');
    const picker = new EmojiButton();

    picker.on('emoji', emoji => {
      messageInput.value += emoji;
    });

    emojiBtn.addEventListener('click', () => {
      picker.togglePicker(emojiBtn);
    });

    attachBtn.addEventListener('click', () => {
      fileInput.click();
    });

    fileInput.addEventListener('change', () => {
      const file = fileInput.files[0];
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
          appendMessage(`<img src="${e.target.result}" alt="Image" style="max-width: 200px; border-radius: 6px;">`, 'user');
          remainingMessages--;
          updateTokenCount();

          // Simulate VA response
          setTimeout(() => {
            appendMessage("Thanks for the image!", 'va');
          }, 1000);
        };
        reader.readAsDataURL(file);
      }
    });

    function appendMessage(text, sender = 'user') {
      const messageDiv = document.createElement('div');
      messageDiv.classList.add('chat-message', sender);

      const timestamp = new Date().toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit'
      });

      messageDiv.innerHTML = `<strong>${sender === 'user' ? 'You' : 'VA'}:</strong> ${text}<small>${timestamp}</small>`;
      chatMessages.appendChild(messageDiv);
      chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function updateTokenCount() {
      tokenCount.textContent = `${remainingMessages} messages`;
      if (remainingMessages <= 10 && remainingMessages > 0) {
        tokenWarning.innerHTML = `<div class="alert alert-warning">You're running low on message tokens! <a href="#">Buy more</a>.</div>`;
      } else if (remainingMessages <= 0) {
        tokenWarning.innerHTML = `<div class="alert alert-danger">You've run out of messages! <a href="#">Buy more tokens</a> to continue chatting.</div>`;
        messageInput.disabled = true;
        sendBtn.disabled = true;
      } else {
        tokenWarning.innerHTML = '';
      }
    }

    function sendMessage() {
      const message = messageInput.value.trim();
      if (message && remainingMessages > 0) {
        appendMessage(message, 'user');
        messageInput.value = '';
        remainingMessages--;
        updateTokenCount();

        // Simulate VA reply after 1s
        setTimeout(() => {
          appendMessage("Thanks for your message! I'll get back to you shortly.", 'va');
        }, 1000);
      }
    }

    sendBtn.addEventListener('click', sendMessage);
    messageInput.addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        sendMessage();
      }
    });

    updateTokenCount();
  </script>
</body>

</html>