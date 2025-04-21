<?php
// Assuming user session is already started and user details are available from the session or database
// Example: $user = getUserDetailsFromSessionOrDatabase();
$user = [
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email' => 'john.doe@example.com',
    'role' => 'Virtual Assistant',
    'profile_picture' => 'default-avatar.png', // Default profile picture
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile | Chat Token App</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }

        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white text-center">Dashboard</h4>
        <a href="dashboard.php">Home</a>
        <a href="profile.php" class="active">Profile</a>
        <a href="chat.php">Chats</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content" style="margin-left: 250px; padding-top: 20px;">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Chat Token App</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><?php echo htmlspecialchars($user['first_name']); ?></a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Profile Details Section -->
        <div class="container d-flex align-items-center justify-content-center">
            <div class="card shadow w-100" style="max-width: 500px;">
                <div class="card-body">
                    <h4 class="text-center mb-4">Profile Details</h4>

                    <!-- Profile Picture -->
                    <div class="text-center mb-4">
                        <img src="uploads/<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" class="profile-img mb-3">
                        <form action="upload_profile_picture.php" method="POST" enctype="multipart/form-data">
                            <label for="profile_picture" class="btn btn-secondary btn-sm">Change Picture</label>
                            <input type="file" name="profile_picture" id="profile_picture" class="d-none" accept="image/*">
                            <button type="submit" class="btn btn-success btn-sm mt-2">Upload</button>
                        </form>
                    </div>

                    <!-- User Info -->
                    <form action="update_profile.php" method="POST">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>

                        <!-- Role (Non-editable for Clients, Editable for Admins) -->
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" name="role" id="role" class="form-control" value="<?php echo htmlspecialchars($user['role']); ?>" disabled>
                        </div>

                        <!-- Change Password Section (Optional) -->
                        <h5 class="mt-4">Change Password</h5>

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                            <div id="passwordFeedback" class="form-text text-danger mt-1">Passwords must match</div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="dashboard.php">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Password Match Validation
        const newPassword = document.getElementById('new_password');
        const confirmPassword = document.getElementById('confirm_password');
        const passwordFeedback = document.getElementById('passwordFeedback');

        confirmPassword.addEventListener('input', () => {
            if (confirmPassword.value === newPassword.value) {
                passwordFeedback.textContent = 'Passwords match';
                passwordFeedback.classList.replace('text-danger', 'text-success');
            } else {
                passwordFeedback.textContent = 'Passwords must match';
                passwordFeedback.classList.replace('text-success', 'text-danger');
            }
        });
    </script>

</body>

</html>