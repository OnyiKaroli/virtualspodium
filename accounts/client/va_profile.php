<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Virtual Assistant Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            margin-left: 270px;
            padding: 30px;
        }

        .profile-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 30px;
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #0d6efd;
        }

        .tag {
            background: #e7f1ff;
            color: #0d6efd;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            margin-right: 8px;
        }
    </style>
</head>

<body>

    <div class="content">
        <h3 class="mb-4">👤 Virtual Assistant Profile</h3>

        <div class="profile-card row">
            <div class="col-md-3 text-center">
                <img src="https://via.placeholder.com/120" class="profile-pic mb-3" alt="VA Picture">
                <h5 class="mb-0">Emily Wanjiru</h5>
                <small class="text-muted">Senior Virtual Assistant</small>
                <p class="mt-3"><span class="badge bg-success">Online</span></p>
            </div>

            <div class="col-md-9">
                <h5>🎯 Specialties</h5>
                <p>
                    <span class="tag">Business</span>
                    <span class="tag">Marketing</span>
                    <span class="tag">Content Writing</span>
                </p>

                <h5 class="mt-4">📝 About</h5>
                <p>
                    Hi! I'm Emily, a dedicated virtual assistant with 5+ years of experience in business communications,
                    social media management, and content writing. I’m passionate about helping clients achieve success
                    through organized, creative, and personalized support.
                </p>

                <h5 class="mt-4">⭐ Rating</h5>
                <p>★★★★☆ (4.5 / 5.0 from 36 clients)</p>

                <button class="btn btn-primary mt-3">💬 Start Chat</button>
            </div>
        </div>
    </div>

</body>

</html>