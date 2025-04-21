<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: #f4f7fa;
        }

        .signup-box {
            max-width: 500px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 500;
        }

        .form-select,
        .form-control {
            border-radius: 8px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #0d6efd;
            margin-bottom: 20px;
        }
    </style>
</head>

<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        }
    }

    function checkStrength(password) {
        let strength = 0;
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');

        // Rules
        if (password.length >= 8) strength += 1;
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 1;
        if (password.match(/\d/)) strength += 1;
        if (password.match(/[!@#$%^&*(),.?":{}|<>]/)) strength += 1;

        // Update meter
        switch (strength) {
            case 0:
                strengthBar.style.width = '0%';
                strengthBar.className = 'progress-bar';
                strengthText.innerText = 'Enter a password';
                break;
            case 1:
                strengthBar.style.width = '25%';
                strengthBar.className = 'progress-bar bg-danger';
                strengthText.innerText = 'Weak';
                break;
            case 2:
                strengthBar.style.width = '50%';
                strengthBar.className = 'progress-bar bg-warning';
                strengthText.innerText = 'Moderate';
                break;
            case 3:
                strengthBar.style.width = '75%';
                strengthBar.className = 'progress-bar bg-info';
                strengthText.innerText = 'Good';
                break;
            case 4:
                strengthBar.style.width = '100%';
                strengthBar.className = 'progress-bar bg-success';
                strengthText.innerText = 'Strong';
                break;
        }
    }

    function checkPasswordMatch() {
        const password = document.getElementById("password").value;
        const confirm = document.getElementById("confirmPassword").value;
        const message = document.getElementById("matchMessage");

        if (confirm === "") {
            message.textContent = "";
        } else if (password === confirm) {
            message.textContent = "✅ Passwords match";
            message.style.color = "green";
        } else {
            message.textContent = "❌ Passwords do not match";
            message.style.color = "red";
        }
    }
</script>

<body>

    <div class="signup-box">
        <div class="text-center logo">🧠 ChatConnect</div>
        <h5 class="text-center mb-4">Create an Account</h5>

        <form action="#" method="POST">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control" placeholder="John Doe" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required oninput="checkStrength(this.value)">
                    <span class="input-group-text" onclick="togglePassword('password', 'toggleIcon')" style="cursor: pointer;">
                        <i id="toggleIcon" class="bi bi-eye-slash"></i>
                    </span>
                </div>
                <div class="mt-2">
                    <div class="progress">
                        <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
                    </div>
                    <small id="strengthText" class="form-text text-muted">Enter a password</small>
                </div>
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" name="confirm_password" id="confirmPassword" class="form-control" placeholder="••••••••" required oninput="checkPasswordMatch()">
                    <span class="input-group-text" onclick="togglePassword('confirmPassword', 'toggleIconConfirm')" style="cursor: pointer;">
                        <i id="toggleIconConfirm" class="bi bi-eye-slash"></i>
                    </span>
                </div>
                <small id="matchMessage" class="form-text"></small>
            </div>

            <div class="mb-3">
                <label class="form-label">I am signing up as</label>
                <select class="form-select" name="role" required>
                    <option value="" disabled selected>Select role</option>
                    <option value="client">Client</option>
                    <option value="va">Virtual Assistant</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>

        <div class="mt-3 text-center">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>

</body>

</html>