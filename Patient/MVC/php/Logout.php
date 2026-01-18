<?php
//session created
session_start();
//Destroying session
session_unset();
session_destroy();
//delete cookie data
if(isset($_COOKIE['remember_me'])) {
    setcookie('remember_me', '', time() - 3600, '/');
}

header("Location: ../html/Login.php");
exit();
?>