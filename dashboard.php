<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BigMoon Dashboard - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg,rgb(33, 207, 213),rgba(45, 90, 203, 0.88));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 1;
        }
        .login-container h1 {
            font-weight: bold;
            color: #333;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .btn-primary {
            background-color:rgb(44, 186, 211);
            border: none;
        }
        .btn-primary:hover {
            background-color:rgba(45, 90, 203, 0.88);
        }
        .password-wrapper {
            position: relative;
        }
        .password-wrapper .toggle-password {
            position: absolute;
            top: 70%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }
        .password-wrapper .toggle-password:hover {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>BigMoon Dashboard</h1>
        <!-- Alert Message -->
        <div id="alertMessage" class="alert d-none" role="alert"></div>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3 password-wrapper">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                <i class="toggle-password bi bi-eye-slash" id="togglePassword"></i>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const alertMessage = document.getElementById('alertMessage');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            togglePassword.classList.toggle('bi-eye');
            togglePassword.classList.toggle('bi-eye-slash');
        });

        // Display a custom Bootstrap alert
        function showAlert(message, type) {
            alertMessage.classList.remove('d-none');
            alertMessage.classList.add(`alert-${type}`);
            alertMessage.textContent = message;
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Define user credentials and their corresponding pages
    $credentials = [
        'gayatri@bigmoon' => ['password' => 'rknd2025', 'redirect' => 'bigmoondashboard.php'],
        'admin@bigmoon' => ['password' => 'dark2023', 'redirect' => 'bigmoonadmin.php'],
        'backup' => ['password' => '12345', 'redirect' => 'bigmoonbackup.php'],
        'backupadmin' => ['password' => '098765', 'redirect' => 'adminbackup.php']
    ];

    // Check if the username exists and the password matches
    if (isset($credentials[$username]) && $credentials[$username]['password'] === $password) {
        $_SESSION['username'] = $username; // Start session and set username
        $_SESSION['is_logged_in'] = true; // Additional session key for login state
        $redirectPage = $credentials[$username]['redirect'];

        echo "<script>
                showAlert('Login Successful. Redirecting to your dashboard...', 'success');
                setTimeout(() => {
                    window.location.href = '$redirectPage';
                }, 2000);
              </script>";
    } else {
        // Invalid credentials
        echo "<script>
                showAlert('Invalid username or password! Please try again.', 'danger');
              </script>";
    }
}
?>

</body>
</html>
