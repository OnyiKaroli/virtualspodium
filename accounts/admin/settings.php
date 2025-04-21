<!-- Replaced content with Tabbed Settings UI -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .sidebar {
            min-width: 240px;
            max-width: 240px;
            background-color: #343a40;
            color: #fff;
            flex-shrink: 0;
        }

        .sidebar a {
            color: #ddd;
            text-decoration: none;
            padding: 15px;
            display: block;
        }

        .sidebar a:hover,
        .sidebar .active {
            background-color: #495057;
            color: #fff;
        }

        .main-content {
            flex-grow: 1;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
        }

        .form-section {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php include 'sidebar.php' ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand navbar-light px-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h5">Settings</span>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notifications <span class="badge bg-danger">2</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Settings Tabs -->
        <div class="container mt-4">
            <ul class="nav nav-tabs" id="settingsTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">General</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab">User Settings</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="system-tab" data-bs-toggle="tab" data-bs-target="#system" type="button" role="tab">System Settings</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab">Security</button>
                </li>
            </ul>
            <div class="tab-content p-4 bg-white shadow-sm rounded-bottom" id="settingsTabContent">
                <!-- General Settings -->
                <div class="tab-pane fade show active" id="general" role="tabpanel">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Site Name</label>
                            <input type="text" class="form-control" value="Token Chat App">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Admin Contact Email</label>
                            <input type="email" class="form-control" value="admin@example.com">
                        </div>
                        <button type="submit" class="btn btn-primary">Save General Settings</button>
                    </form>
                </div>

                <!-- User Settings -->
                <div class="tab-pane fade" id="user" role="tabpanel">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Default Role on Signup</label>
                            <select class="form-select">
                                <option selected>Client</option>
                                <option>Virtual Assistant</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Account Verification Required</label>
                            <select class="form-select">
                                <option selected>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save User Settings</button>
                    </form>
                </div>

                <!-- System Settings -->
                <div class="tab-pane fade" id="system" role="tabpanel">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Token to Message Ratio</label>
                            <input type="number" class="form-control" value="50">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Token Price ($)</label>
                            <input type="number" class="form-control" step="0.01" value="3">
                        </div>
                        <button type="submit" class="btn btn-primary">Save System Settings</button>
                    </form>
                </div>

                <!-- Security Settings -->
                <div class="tab-pane fade" id="security" role="tabpanel">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Password Reset Link Expiry (Minutes)</label>
                            <input type="number" class="form-control" value="30">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Login Attempts Before Lockout</label>
                            <input type="number" class="form-control" value="5">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Security Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>