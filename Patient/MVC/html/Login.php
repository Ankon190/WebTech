<?php
//database connection
require '../db/db_connect.php';
require '../php/login_db_Info_check.php';
?>


<!DOCTYPE html>
<html>
<head>
    
    <title>Login</title>
    <link rel="stylesheet" href="../css/LoginStyle.css">
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <?php if(isset($error)) { echo "<p class='error-msg'>" . $error . "</p>"; } ?>
            </div>
            <div class="remember-forget">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="Registerpage.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
