<?php
//session created
session_start();
if(!isset($_SESSION['username'])){
    header("Location: Login.php");
    exit();
}

else{
    $username = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT user_name FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user_result = $stmt -> get_result();

    if($user_result ->num_rows ===1){
        $user = $user_result -> fetch_assoc();
    }
    $stmt->close();
//declaring variables
    $patient_name = $user['user_name'];
    $appointed_doctor = "Dr. Smith";
    $specialization = "Cardiologist";
    $appointment_date = "2025-12-31";
}
?>