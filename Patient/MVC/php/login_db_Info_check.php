<?php
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