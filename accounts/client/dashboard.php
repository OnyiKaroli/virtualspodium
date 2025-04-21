<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .status-badge {
            font-size: 0.8rem;
        }

        .card-title span {
            float: right;
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
            <h2>Welcome, [Client Name]</h2>

            <div class="mb-4">
                <h5>Your Tokens: <span class="badge bg-success">5</span></h5>
                <button class="btn btn-primary btn-sm">Buy More Tokens</button>
            </div>

            <div class="mb-4">
                <h5>Available Virtual Assistants</h5>
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">VA - Jane Doe <span class="badge bg-success status-badge">Online</span></h5>
                                <p class="card-text">Specialty: Marketing Support</p>
                                <button class="btn btn-outline-primary btn-sm">Chat Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">VA - John Smith <span class="badge bg-secondary status-badge">Offline</span></h5>
                                <p class="card-text">Specialty: Technical Support</p>
                                <button class="btn btn-outline-secondary btn-sm" disabled>Offline</button>
                            </div>
                        </div>
                    </div>

                    <!-- More dummy VAs here -->
                </div>
            </div>

            <div>
                <h5>Notifications</h5>
                <ul class="list-group">
                    <li class="list-group-item">New message from VA - Jane Doe</li>
                    <li class="list-group-item">Token purchase successful</li>
                    <li class="list-group-item">VA - John Smith is now offline</li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>