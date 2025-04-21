<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password | Chat Token App</title>
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
                <h4 class="text-center mb-4">Reset Password</h4>
                <form action="reset_password_process.php" method="POST">

                    <!-- Hidden token (assuming you’re passing a reset token via URL) -->
                    <input type="hidden" name="reset_token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">

                    <!-- New Password -->
                    <!-- New Password -->
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
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
                    <button type="submit" class="btn btn-success w-100">Reset Password</button>
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

        const password = document.getElementById('new_password');
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
    </script>
</body>

</html>