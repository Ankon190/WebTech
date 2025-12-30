<?php
//database connection
require 'db_connect.php';

//session created
session_start();
if(isset($_SESSION['username'])) {
    header("Location: HomePage.php");
    exit();
}

else{
    
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT user_name, password FROM users WHERE user_name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $user_result = $stmt -> get_result();

        if($user_result -> num_rows ===1){
            $user = $user_result -> fetch_assoc();
            if(password_verify($password, $user['password'])) {
                // Password is correct, start a session
                $_SESSION['username'] = $user['user_name'];
                header("Location: HomePage.php");
                exit();
            } 
            else {
                // Invalid password
                $error = "Invalid username or password.";
            }
        }
        $stmt->close();
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
