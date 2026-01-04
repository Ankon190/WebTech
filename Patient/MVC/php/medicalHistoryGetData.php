<?php
//session created
session_start();

if(!isset($_SESSION['username'])){
    header("Location: Login.php");
    exit();
}
//declaring variables
    $patient_name = "John Doe";
?>