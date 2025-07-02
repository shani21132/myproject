<?php
// Include database configuration
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['token'])) {
    $token = $conn->real_escape_string($_GET['token']);
    
    // Check if token is valid and not expired
    $result = $conn->query("SELECT * FROM users WHERE reset_token = '$token' AND token_expiry > NOW()");
    
    if ($result->num_rows > 0) {
        // Token is valid
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
        
        // Display password reset form
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Reset Password | EcoSolutions</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <style>
                /* Add styles from the main file */
            </style>
        </head>
        <body>
            <div class="container">
                <div class="auth-container" style="max-width: 500px;">
                    <div class="forms-container" style="flex: 1;">
                        <div class="form-header">
                            <h2>Reset Your Password</h2>
                            <p>Create a new password for your account</p>
                        </div>
                        
                        <form method="POST">
                            <input type="hidden" name="token" value="<?php echo $token; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            
                            <div class="input-group">
                                <label for="new-password">New Password</label>
                                <input type="password" id="new-password" name="password" placeholder="••••••••" required>
                                <i class="fas fa-lock"></i>
                            </div>
                            
                            <div class="input-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" id="confirm-password" name="confirm_password" placeholder="••••••••" required>
                                <i class="fas fa-lock"></i>
                            </div>
                            
                            <button type="submit" class="btn" name="reset_password">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Invalid or expired token. Please request a new password reset.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_password'])) {
    $token = $conn->real_escape_string($_POST['token']);
    $user_id = $conn->real_escape_string($_POST['user_id']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    
    // Validate password match
    if ($_POST['password'] !== $_POST['confirm_password']) {
        die("Passwords do not match!");
    }
    
    // Update password and clear reset token
    $sql = "UPDATE users SET password = '$password', reset_token = NULL, token_expiry = NULL WHERE id = '$user_id' AND reset_token = '$token'";
    
    if ($conn->query($sql)) {
        // Password reset successful
        header("Location: index.php?reset=success");
        exit();
    } else {
        die("Error resetting password: " . $conn->error);
    }
} else {
    header("Location: index.php");
    exit();
}
?>