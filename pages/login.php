<?php
// Database configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ecosolutions');

// PHPMailer configuration
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';
 // Path to PHPMailer autoload

// Create database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        // Registration form submitted
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
        
        // Check if email already exists
        $check = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if ($check->num_rows > 0) {
            $error = "Email already registered!";
        } else {
            // Insert new user
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            if ($conn->query($sql)) {
                $success = "Registration successful! Please login.";
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    } 
    elseif (isset($_POST['login'])) {
        // Login form submitted
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        
        $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Login successful
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid email or password!";
            }
        } else {
            $error = "Invalid email or password!";
        }
    }
    elseif (isset($_POST['reset'])) {
        // Forgot password form submitted
        $email = $conn->real_escape_string($_POST['email']);
        
        $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // Generate reset token
            $token = bin2hex(random_bytes(32));
            $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));
            
            // Store token in database
            $conn->query("UPDATE users SET reset_token = '$token', token_expiry = '$expiry' WHERE email = '$email'");
            
            // Send reset email
            $resetLink = "http://" . $_SERVER['HTTP_HOST'] . "/reset_password.php?token=$token";
            
            // Create PHPMailer instance
            $mail = new PHPMailer(true);
            
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';  // Your SMTP server
                $mail->SMTPAuth   = true;
                $mail->Username   = 'manzoorz680@gmail.com'; // SMTP username
                $mail->Password   = 'nycq jgvb mywl lxvu';         // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
                
                // Recipients
                $mail->setFrom('shaniktk858@gmail.com', 'EcoSolutions');
                $mail->addAddress($email);
                
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request';
                $mail->Body    = "Hello,<br><br>You requested a password reset. Please click the link below to reset your password:<br><br><a href='$resetLink'>$resetLink</a><br><br>This link will expire in 1 hour.<br><br>If you didn't request this, please ignore this email.";
                $mail->AltBody = "Hello,\n\nYou requested a password reset. Please visit the following link to reset your password:\n\n$resetLink\n\nThis link will expire in 1 hour.\n\nIf you didn't request this, please ignore this email.";
                
                $mail->send();
                $success = "Password reset instructions have been sent to your email!";
            } catch (Exception $e) {
                $error = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $error = "Email not found!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoSolutions | Account Access</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary-green: #0b8c7b;
            --secondary-green: #16a085;
            --light-green: #1abc9c;
            --dark-blue: #0a192f;
            --medium-blue: #1a4b8c;
            --light-blue: #64ffda;
            --accent: #64ffda;
            --text-light: #ccd6f6;
            --text-dark: #0a192f;
            --gradient-start: #0a192f;
            --gradient-mid: #0b8c7b;
            --gradient-end: #1abc9c;
        }

        body {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            width: 100%;
            max-width: 1200px;
            height: 1200px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .auth-container {
            display: flex;
            width: 100%;
            max-width: 900px;
            min-height: 1000px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            position: relative;
            border: 1px solid rgba(100, 255, 218, 0.2);
        }

        /* Left decorative panel */
        .decorative-panel {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-green), var(--dark-blue));
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .decorative-panel::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(100, 255, 218, 0.1) 0%, transparent 70%);
            animation: rotate 15s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .panel-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .panel-content h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            background: linear-gradient(to right, var(--light-blue), var(--light-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .panel-content p {
            margin-bottom: 30px;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .features-list {
            text-align: left;
            margin-top: 30px;
        }

        .features-list li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .features-list li:hover {
            background: rgba(100, 255, 218, 0.15);
            transform: translateX(5px);
        }

        .features-list i {
            color: var(--light-green);
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* Forms container */
        .forms-container {
            flex: 1;
            padding: 40px;
            height: 900px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-size: 2rem;
            margin-bottom: 10px;
            background: linear-gradient(to right, var(--light-blue), var(--light-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-header p {
            color: var(--light-blue);
            opacity: 0.8;
        }

        /* Forms */
        .form-wrapper {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
        }

        .form {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 800px;
            padding: 20px;
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            opacity: 0;
            transform: translateX(100%);
            visibility: hidden;
        }

        .form.active {
            opacity: 1;
            transform: translateX(0);
            visibility: visible;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--light-blue);
        }

        .input-group input {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            font-size: 1rem;
            border: 1px solid rgba(100, 255, 218, 0.1);
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            outline: none;
            border-color: var(--light-green);
            box-shadow: 0 0 0 2px rgba(26, 188, 156, 0.3);
        }

        .input-group i {
            position: absolute;
            right: 15px;
            top: 42px;
            color: var(--light-green);
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-group input {
            margin-right: 10px;
        }

        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(45deg, var(--light-green), var(--light-blue));
            color: var(--text-dark);
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(26, 188, 156, 0.4);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(100, 255, 218, 0.6);
        }

        .btn.secondary {
            background: transparent;
            border: 2px solid var(--light-green);
            color: var(--text-light);
            margin-top: 10px;
        }

        .btn.secondary:hover {
            background: rgba(26, 188, 156, 0.2);
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .form-footer a {
            color: var(--light-green);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .form-footer a:hover {
            color: var(--light-blue);
            text-decoration: underline;
        }

        .form-links {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .form-links a {
            color: var(--light-blue);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .form-links a:hover {
            color: var(--light-green);
        }

        /* Animations */
        .floating {
            animation: floating 8s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        /* Particles */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(100, 255, 218, 0.5);
            animation: floating 10s ease-in-out infinite;
        }

        /* Error messages */
        .error-message {
            color: #ff6b6b;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }

        .input-group.error input {
            border-color: #ff6b6b;
        }

        .input-group.error .error-message {
            display: block;
        }

        /* Success message */
        .success-message {
            background: rgba(26, 188, 156, 0.2);
            border: 1px solid var(--light-green);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            display: none;
        }

        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
        }
        
        .message.success {
            background: rgba(26, 188, 156, 0.2);
            border: 1px solid var(--light-green);
            color: var(--light-green);
        }
        
        .message.error {
            background: rgba(255, 107, 107, 0.2);
            border: 1px solid #ff6b6b;
            color: #ff6b6b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
            }
            
            .decorative-panel {
                padding: 30px 20px;
            }
            
            .panel-content h2 {
                font-size: 2rem;
            }
            
            .forms-container {
                padding: 30px 20px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }
            
            .auth-container {
                min-height: auto;
            }
            
            .form-header h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-container">
            <!-- Left decorative panel -->
            <div class="decorative-panel">
                <div class="panel-content">
                    <div class="floating">
                        <i class="fas fa-leaf" style="font-size: 5rem; color: var(--light-blue); margin-bottom: 20px;"></i>
                    </div>
                    <h2>Welcome to EcoSolutions</h2>
                    <p>Join our community of eco-conscious individuals and businesses</p>
                    
                    <ul class="features-list">
                        <li><i class="fas fa-check-circle"></i> Sustainable solutions for businesses</li>
                        <li><i class="fas fa-check-circle"></i> Reduce your carbon footprint</li>
                        <li><i class="fas fa-check-circle"></i> Expert environmental consulting</li>
                        <li><i class="fas fa-check-circle"></i> Track your environmental impact</li>
                    </ul>
                </div>
            </div>
            
            <!-- Forms container -->
            <div class="forms-container">
                <div class="form-header">
                    <h2 id="form-title">Sign In to Your Account</h2>
                    <p id="form-subtitle">Enter your credentials to continue</p>
                </div>
                
                <!-- Display messages -->
                <?php if(isset($success)): ?>
                    <div class="message success">
                        <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                    </div>
                <?php endif; ?>
                
                <?php if(isset($error)): ?>
                    <div class="message error">
                        <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <div class="form-wrapper">
                    <!-- Login Form -->
                    <form class="form active" id="login-form" method="POST">
                        <div class="success-message" id="login-success">
                            <i class="fas fa-check-circle"></i> Password reset successful! Please login with your new password.
                        </div>
                        
                        <div class="input-group">
                            <label for="login-email">Email Address</label>
                            <input type="email" id="login-email" name="email" placeholder="you@example.com" required>
                            <i class="fas fa-envelope"></i>
                            <div class="error-message" id="email-error">Please enter a valid email address</div>
                        </div>
                        
                        <div class="input-group">
                            <label for="login-password">Password</label>
                            <input type="password" id="login-password" name="password" placeholder="••••••••" required>
                            <i class="fas fa-lock"></i>
                            <div class="error-message" id="password-error">Password must be at least 8 characters</div>
                        </div>
                        
                        <div class="form-links">
                            <div class="checkbox-group">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Remember me</label>
                            </div>
                            <a href="#" id="forgot-password-link">Forgot password?</a>
                        </div>
                        
                        <button type="submit" class="btn" id="login-btn" name="login">Sign In</button>
                        
                        <div class="form-footer">
                            Don't have an account? <a href="#" id="show-register">Register now</a>
                        </div>
                    </form>
                    
                    <!-- Registration Form -->
                    <form class="form" id="register-form" method="POST">
                        <div class="input-group">
                            <label for="register-name">Full Name</label>
                            <input type="text" id="register-name" name="name" placeholder="John Smith" required>
                            <i class="fas fa-user"></i>
                            <div class="error-message" id="name-error">Please enter your full name</div>
                        </div>
                        
                        <div class="input-group">
                            <label for="register-email">Email Address</label>
                            <input type="email" id="register-email" name="email" placeholder="you@example.com" required>
                            <i class="fas fa-envelope"></i>
                            <div class="error-message" id="reg-email-error">Please enter a valid email address</div>
                        </div>
                        
                        <div class="input-group">
                            <label for="register-password">Password</label>
                            <input type="password" id="register-password" name="password" placeholder="••••••••" required>
                            <i class="fas fa-lock"></i>
                            <div class="error-message" id="reg-password-error">Password must be at least 8 characters</div>
                        </div>
                        
                        <div class="input-group">
                            <label for="register-confirm">Confirm Password</label>
                            <input type="password" id="register-confirm" placeholder="••••••••" required>
                            <i class="fas fa-lock"></i>
                            <div class="error-message" id="confirm-error">Passwords do not match</div>
                        </div>
                        
                        <div class="checkbox-group">
                            <input type="checkbox" id="terms" required>
                            <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                        </div>
                        
                        <button type="submit" class="btn" id="register-btn" name="register">Create Account</button>
                        
                        <div class="form-footer">
                            Already have an account? <a href="#" id="show-login">Sign in</a>
                        </div>
                    </form>
                    
                    <!-- Forgot Password Form -->
                    <form class="form" id="forgot-form" method="POST">
                        <div class="input-group">
                            <label for="forgot-email">Email Address</label>
                            <input type="email" id="forgot-email" name="email" placeholder="you@example.com" required>
                            <i class="fas fa-envelope"></i>
                            <div class="error-message" id="forgot-email-error">Please enter a valid email address</div>
                        </div>
                        
                        <p style="margin-bottom: 20px; font-size: 0.9rem;">
                            Enter your email and we'll send you instructions to reset your password
                        </p>
                        
                        <button type="submit" class="btn" id="reset-btn" name="reset">Reset Password</button>
                        <button type="button" class="btn secondary" id="back-to-login">Back to Login</button>
                    </form>
                </div>
            </div>
            
            <!-- Particles for decoration -->
            <div class="particles" id="particles"></div>
        </div>
    </div>

    <script>
        // Create decorative particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random size
                const size = Math.random() * 10 + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                const left = Math.random() * 100;
                const top = Math.random() * 100;
                particle.style.left = `${left}%`;
                particle.style.top = `${top}%`;
                
                // Random animation delay
                const delay = Math.random() * 10;
                particle.style.animationDelay = `${delay}s`;
                
                // Random opacity
                particle.style.opacity = Math.random() * 0.5 + 0.2;
                
                particlesContainer.appendChild(particle);
            }
        }
        
        // Form switching functionality
        function showForm(formId) {
            // Hide all forms
            document.querySelectorAll('.form').forEach(form => {
                form.classList.remove('active');
            });
            
            // Show selected form
            document.getElementById(formId).classList.add('active');
            
            // Update form title and subtitle
            const title = document.getElementById('form-title');
            const subtitle = document.getElementById('form-subtitle');
            
            switch(formId) {
                case 'login-form':
                    title.textContent = 'Sign In to Your Account';
                    subtitle.textContent = 'Enter your credentials to continue';
                    break;
                case 'register-form':
                    title.textContent = 'Create an Account';
                    subtitle.textContent = 'Join our eco-friendly community';
                    break;
                case 'forgot-form':
                    title.textContent = 'Reset Your Password';
                    subtitle.textContent = 'We\'ll help you get back into your account';
                    break;
            }
        }
        
        // Form validation functions
        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
        
        function validateLoginForm() {
            let isValid = true;
            const email = document.getElementById('login-email');
            const password = document.getElementById('login-password');
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');
            
            // Reset errors
            email.parentElement.classList.remove('error');
            password.parentElement.classList.remove('error');
            
            // Validate email
            if (!email.value || !validateEmail(email.value)) {
                email.parentElement.classList.add('error');
                emailError.textContent = 'Please enter a valid email address';
                isValid = false;
            }
            
            // Validate password
            if (!password.value || password.value.length < 8) {
                password.parentElement.classList.add('error');
                passwordError.textContent = 'Password must be at least 8 characters';
                isValid = false;
            }
            
            return isValid;
        }
        
        function validateRegisterForm() {
            let isValid = true;
            const name = document.getElementById('register-name');
            const email = document.getElementById('register-email');
            const password = document.getElementById('register-password');
            const confirm = document.getElementById('register-confirm');
            const terms = document.getElementById('terms');
            
            // Reset errors
            name.parentElement.classList.remove('error');
            email.parentElement.classList.remove('error');
            password.parentElement.classList.remove('error');
            confirm.parentElement.classList.remove('error');
            
            // Validate name
            if (!name.value) {
                name.parentElement.classList.add('error');
                document.getElementById('name-error').textContent = 'Please enter your full name';
                isValid = false;
            }
            
            // Validate email
            if (!email.value || !validateEmail(email.value)) {
                email.parentElement.classList.add('error');
                document.getElementById('reg-email-error').textContent = 'Please enter a valid email address';
                isValid = false;
            }
            
            // Validate password
            if (!password.value || password.value.length < 8) {
                password.parentElement.classList.add('error');
                document.getElementById('reg-password-error').textContent = 'Password must be at least 8 characters';
                isValid = false;
            }
            
            // Validate password match
            if (password.value !== confirm.value) {
                confirm.parentElement.classList.add('error');
                document.getElementById('confirm-error').textContent = 'Passwords do not match';
                isValid = false;
            }
            
            // Validate terms
            if (!terms.checked) {
                alert('Please agree to the Terms of Service and Privacy Policy');
                isValid = false;
            }
            
            return isValid;
        }
        
        function validateForgotForm() {
            let isValid = true;
            const email = document.getElementById('forgot-email');
            
            // Reset error
            email.parentElement.classList.remove('error');
            
            // Validate email
            if (!email.value || !validateEmail(email.value)) {
                email.parentElement.classList.add('error');
                document.getElementById('forgot-email-error').textContent = 'Please enter a valid email address';
                isValid = false;
            }
            
            return isValid;
        }
        
        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            
            // Form switching
            document.getElementById('show-register').addEventListener('click', function(e) {
                e.preventDefault();
                showForm('register-form');
            });
            
            document.getElementById('show-login').addEventListener('click', function(e) {
                e.preventDefault();
                showForm('login-form');
            });
            
            document.getElementById('forgot-password-link').addEventListener('click', function(e) {
                e.preventDefault();
                showForm('forgot-form');
            });
            
            document.getElementById('back-to-login').addEventListener('click', function() {
                showForm('login-form');
            });
            
            // Form submissions
            document.getElementById('login-form').addEventListener('submit', function(e) {
                if (!validateLoginForm()) {
                    e.preventDefault();
                }
            });
            
            document.getElementById('register-form').addEventListener('submit', function(e) {
                if (!validateRegisterForm()) {
                    e.preventDefault();
                }
            });
            
            document.getElementById('forgot-form').addEventListener('submit', function(e) {
                if (!validateForgotForm()) {
                    e.preventDefault();
                }
            });
            
            // Real-time validation for email fields
            document.getElementById('login-email').addEventListener('blur', function() {
                if (!validateEmail(this.value)) {
                    this.parentElement.classList.add('error');
                } else {
                    this.parentElement.classList.remove('error');
                }
            });
            
            document.getElementById('register-email').addEventListener('blur', function() {
                if (!validateEmail(this.value)) {
                    this.parentElement.classList.add('error');
                } else {
                    this.parentElement.classList.remove('error');
                }
            });
            
            // Real-time password match validation
            document.getElementById('register-confirm').addEventListener('input', function() {
                const password = document.getElementById('register-password').value;
                const confirm = this.value;
                
                if (password !== confirm && confirm.length > 0) {
                    this.parentElement.classList.add('error');
                    document.getElementById('confirm-error').textContent = 'Passwords do not match';
                } else {
                    this.parentElement.classList.remove('error');
                }
            });
        });
    </script>
</body>
</html>