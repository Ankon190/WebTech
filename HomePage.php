<?php
//database connection
require_once 'db_connect.php';
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



<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="HomeStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        
    </style>
</head>
<body>
    <nav id="navbar">
        <ul>
        <li><a class="active" href="HomePage.php">Home</a></li>
        <li><a href="BookAppointment.php">Book Appointment</a></li>
        <li><a href="MedicalHistory.php">Medical History</a></li>
        <li><a href="Profile.php"><?php echo htmlspecialchars($patient_name); ?></a></li>
     <!--   <li><a href="SelectLoginType.php">Login</a></li> -->
        <li><a href="Logout.php">Logout</a></li>
    </ul>

    <div class="hamburger-menu" id="hamburgerMenu" onclick="toggleDropdown()">
        <i class="fas fa-bars"></i>
    </div>

    <div class="dropdown-Content"  id="dropdownMenu">
        
            <a class="active" href="HomePage.php">Home</a>
            <a href="Profile.php">Profile</a>
            <a href="BookAppointment.php">Book Appointment</a>
            <a href="MedicalHistory.php">Medical History</a>
            <a href="Logout.php">Logout</a>
        
    </div>
    </nav>

    <div class="main-container">
        <!-- Welcome message -->
        <div class="welcome-msg">
            <h1>Welcome, <?php echo $patient_name; ?>!</h1>
            <p>Here is your health overview for today</p>
        </div>

        <!-- Appointment Alert -->
        <div class="appointment-alert">
            <?php if($appointed_doctor && $appointment_date): ?>
                <div class="appointment-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="appointment-details">
                    <h2>Upcoming Appointment</h2>
                    <p><?php echo $appointed_doctor; ?> - <?php echo $specialization; ?></p>
                    <p class="appointment-date"> Date: <?php echo $appointment_date; ?> </p>
                </div>
                <a href="BookAppointment.php" class="btn">View Details</a>
            <?php else: ?>
                <div class="no-appointment">
                    <h2>No Upcoming Appointments</h2>
                    <p>You have no appointments scheduled. Book one now!</p>
                    <a href="BookAppointment.php" class="btn">Book Appointment</a>
                </div>
            <?php endif; ?>
        </div>
    </div>



    <!-- javascript validation starts here -->
    <script src="hamburgerMenu.js"> </script>
</body>
</html>