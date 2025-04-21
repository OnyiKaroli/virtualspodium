<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Virtual Assistant Account</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .match-status {
            font-size: 0.9rem;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow w-100" style="max-width: 500px;">
            <div class="card-body">
                <h4 class="text-center mb-4">Create Virtual Assistant Account</h4>
                <form action="create_va_process.php" method="POST" enctype="multipart/form-data">

                    <!-- Full Name -->
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" name="phone" id="phone" class="form-control" required>
                    </div>

                    <!-- Skills/Experience -->
                    <div class="mb-3">
                        <label for="skills" class="form-label">Skills/Experience</label>
                        <textarea name="skills" id="skills" class="form-control" rows="4" required></textarea>
                    </div>

                    <!-- Profile Picture -->
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Profile Picture</label>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control" accept="image/*">
                    </div>

                    <!-- New Password -->
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                            <span class="input-group-text" onclick="togglePassword('new_password', 'iconNew')">
                                <i id="iconNew" class="bi bi-eye-slash"></i>
                            </span>
                        </div>

                        <!-- Strength meter -->
                        <div class="progress mt-2" style="height: 5px;">
                            <div id="passwordStrengthBar" class="progress-bar bg-danger" style="width: 0%;"></div>
                        </div>
                        <div id="passwordStrengthText" class="form-text text-danger mt-1">Too weak</div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                            <span class="input-group-text" onclick="togglePassword('confirm_password', 'iconConfirm')">
                                <i id="iconConfirm" class="bi bi-eye-slash"></i>
                            </span>
                        </div>
                        <div id="matchFeedback" class="text-danger match-status mt-1"></div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-success w-100">Create Account</button>
                </form>

                <div class="mt-3 text-center">
                    <a href="login.php">Back to Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            }
        }

        // Password strength meter logic
        const password = document.getElementById('new_password');
        const strengthBar = document.getElementById('passwordStrengthBar');
        const strengthText = document.getElementById('passwordStrengthText');

        password.addEventListener('input', () => {
            const val = password.value;
            let strength = 0;

            if (val.length >= 8) strength += 1;
            if (/[A-Z]/.test(val)) strength += 1;
            if (/[0-9]/.test(val)) strength += 1;
            if (/[\W_]/.test(val)) strength += 1;

            // Set bar width & color
            let width = strength * 25;
            strengthBar.style.width = `${width}%`;

            if (strength <= 1) {
                strengthBar.className = 'progress-bar bg-danger';
                strengthText.textContent = 'Too weak';
                strengthText.className = 'form-text text-danger';
            } else if (strength === 2 || strength === 3) {
                strengthBar.className = 'progress-bar bg-warning';
                strengthText.textContent = 'Moderate';
                strengthText.className = 'form-text text-warning';
            } else {
                strengthBar.className = 'progress-bar bg-success';
                strengthText.textContent = 'Strong password';
                strengthText.className = 'form-text text-success';
            }
        });

        // Confirm password match validation
        const confirm = document.getElementById('confirm_password');
        const feedback = document.getElementById('matchFeedback');

        confirm.addEventListener('input', () => {
            if (confirm.value === password.value) {
                feedback.textContent = 'Passwords match';
                feedback.classList.replace('text-danger', 'text-success');
            } else {
                feedback.textContent = 'Passwords do not match';
                feedback.classList.replace('text-success', 'text-danger');
            }
        });
    </script>
</body>

</html>