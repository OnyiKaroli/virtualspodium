<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>VA Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            background-color: #f1f3f5;
        }

        .chat-wrapper {
            height: 80vh;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .chat-sidebar {
            width: 25%;
            background: #fff;
            border-right: 1px solid #dee2e6;
            padding: 1rem;
            overflow-y: auto;
        }

        .chat-sidebar .chat-preview {
            padding: 10px;
            cursor: pointer;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .chat-sidebar .chat-preview:hover {
            background-color: #f8f9fa;
        }

        .chat-preview img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .chat-main {
            flex-grow: 1;
            background-color: #e9ecef;
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            padding: 1rem;
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
        }

        .chat-messages {
            flex-grow: 1;
            padding: 1rem;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .chat-bubble {
            max-width: 65%;
            padding: 10px 15px;
            border-radius: 20px;
            position: relative;
            font-size: 0.95rem;
            line-height: 1.4;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .chat-bubble.sent {
            align-self: flex-end;
            background-color: #d1e7dd;
        }

        .chat-bubble.received {
            align-self: flex-start;
            background-color: #f8f9fa;
        }

        .chat-timestamp {
            font-size: 0.75rem;
            color: #6c757d;
            margin-top: 2px;
        }

        .chat-footer {
            background-color: #fff;
            padding: 10px 1rem;
            border-top: 1px solid #dee2e6;
        }

        .day-divider {
            text-align: center;
            font-size: 0.8rem;
            color: #adb5bd;
            margin: 15px 0;
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar include -->
        <div id="sidebar-container"></div>

        <!-- Main Chat Area -->
        <div class="flex-grow-1">
            <!-- Navbar include -->
            <div id="navbar-container"></div>

            <div class="container py-3">
                <div class="chat-wrapper">

                    <!-- Previous Chats Panel -->
                    <div class="chat-sidebar">
                        <h6 class="mb-3 text-secondary">Previous Chats</h6>
                        <div class="chat-preview d-flex align-items-center border-bottom pb-2 mb-2">
                            <img src="https://i.pravatar.cc/150?img=32" alt="Sarah">
                            <div>
                                <strong>Sarah K.</strong>
                                <div class="text-muted small">Typing...</div>
                            </div>
                        </div>
                        <div class="chat-preview d-flex align-items-center border-bottom pb-2 mb-2">
                            <img src="https://i.pravatar.cc/150?img=47" alt="Leo">
                            <div>
                                <strong>Leo D.</strong>
                                <div class="text-muted small">“Can you check the…”</div>
                            </div>
                        </div>
                        <div class="chat-preview d-flex align-items-center">
                            <img src="https://i.pravatar.cc/150?img=12" alt="Maria">
                            <div>
                                <strong>Maria T.</strong>
                                <div class="text-muted small">“Invoice sent.”</div>
                            </div>
                        </div>
                    </div>

                    <!-- Chat Content -->
                    <div class="chat-main">
                        <div class="chat-header d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-0">Chat with Sarah K.</h6>
                                <small class="text-success">Online</small>
                            </div>
                            <div>
                                <i class="bi bi-three-dots-vertical"></i>
                            </div>
                        </div>

                        <!-- Chat Messages -->
                        <div class="chat-messages" id="chatThread">
                            <div class="day-divider">Today</div>
                            <div class="chat-bubble received">
                                Hi! I need help updating the report.
                                <div class="chat-timestamp">10:03 AM</div>
                            </div>
                            <div class="chat-bubble sent">
                                Sure! I'm on it now.
                                <div class="chat-timestamp">10:05 AM</div>
                            </div>
                            <div class="chat-bubble received">
                                Thanks. Deadline is today.
                                <div class="chat-timestamp">10:07 AM</div>
                            </div>
                            <div class="chat-bubble sent">
                                I’ll finish it in the next hour.
                                <div class="chat-timestamp">10:08 AM</div>
                            </div>
                        </div>

                        <!-- Message Input -->
                        <div class="chat-footer d-flex">
                            <input type="text" id="messageInput" class="form-control me-2" placeholder="Type your message...">
                            <button class="btn btn-primary" onclick="sendMessage()">
                                <i class="bi bi-send-fill"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar + Navbar -->
    <script>
        fetch('sidebar.php').then(res => res.text()).then(data => {
            document.getElementById('sidebar-container').innerHTML = data;
        });

        fetch('navbar.php').then(res => res.text()).then(data => {
            document.getElementById('navbar-container').innerHTML = data;
        });
    </script>

    <!-- Send message demo -->
    <script>
        function sendMessage() {
            const input = document.getElementById('messageInput');
            const chatBox = document.getElementById('chatThread');
            const message = input.value.trim();
            if (message !== "") {
                const now = new Date();
                const time = now.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                });

                const msgDiv = document.createElement('div');
                msgDiv.className = 'chat-bubble sent';
                msgDiv.innerHTML = `${message}<div class="chat-timestamp">${time}</div>`;
                chatBox.appendChild(msgDiv);
                input.value = '';
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        }
    </script>
</body>

</html>