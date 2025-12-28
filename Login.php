<?php
//database connection
require 'MySQL.php';

//session created
session_start();
if(isset($_SESSION['username'])) {
    header("Location: HomePage.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Dummy authentication for demonstration
    if($username === "user" && $password === "pass") {
        $_SESSION['username'] = $username;
        header("Location: HomePage.php");
        exit();
    } 
    
    else{
        $error = "Invalid username or password.";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    
    <title>Login</title>
    <link rel="stylesheet" href="LoginStyle.css">
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
