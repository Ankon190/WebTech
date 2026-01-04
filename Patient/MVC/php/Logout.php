<?php
//session created
session_start();
//Destroying session
session_unset();
session_destroy();
header("Location: ../html/Login.php");
exit();
?>