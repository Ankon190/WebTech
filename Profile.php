<?php

//session created
session_start();

if(!isset($_SESSION['username'])){
    header("Location: Login.php");
    exit();
//declaring variables
    $patient_name = "John Doe";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="ProfileStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        
    </style>
</head>
<body>
    <nav id="navbar">
        <ul>
        <li><a href="HomePage.php">Home</a></li>
        <li><a href="BookAppointment.php">Book Appointment</a></li>
        <li><a href="MedicalHistory.php">Medical History</a></li>
        <li><a class="active" href="Profile.php"><?php echo htmlspecialchars($patient_name); ?></a></li>
        <li><a href="Logout.php">Logout</a></li>
    </ul>

    <div class="hamburger-menu" id="hamburgerMenu" onclick="toggleDropdown()">
        <i class="fas fa-bars"></i>
    </div>

    <div class="dropdown-Content"  id="dropdownMenu">
        
            <a href="HomePage.php">Home</a>
            <a class="active" href="Profile.php">Profile</a>
            <a href="BookAppointment.php">Book Appointment</a>
            <a href="MedicalHistory.php">Medical History</a>
            <a href="#">Logout</a>
        
    </div>
    </nav>
     <div class="profile-container">
    <!-- Profile Header -->
        <div class="profile-header">
            <i class="fas fa-user"><h2>My Profile</h2></i>
        </div>

    <!-- Profiles info with photo -->
   
        <div class="profile-photo-section">
            <div class="profile-photo">
                <img src="portrait-professional-medical-worker-posing-picture-with-arms-folded.jpg" alt="Profile Photo">
            </div>
            <p>Patient ID: #123456</p>
            
        </div>
        <!-- Main Profile Info -->
        <div class="profile-info">
            <div class="info-form">
                <label for="name"> Full Name</label>
                <div class="info-box">
                    <span>John Deo</span>
                </div>
            </div>

            <div class="info-form">
                <label for="email"> Email</label>
                <div class="info-box">
                    <span>john.doe@example.com</span>
                </div>
            </div>

            <div class="info-form">
                <label for="number"> Phone Number</label>
                <div class="info-box">
                    <span>01712345678</span>
                </div>
            </div>

            <div class="info-form">
                <label for="gender"> Gender</label>
                <div class="info-box">
                    <span>Male</span>
                </div>
            </div>

            <div class="info-form">
                <label for="dob"> Date of Birth</label>
                <div class="info-box">
                    <span>01/01/1990</span>
                </div>
            </div>

            <div class="info-form">
                <label for="address"> Address</label>
                <div class="info-box">
                    <span>123 Main St, City, Country</span>
                </div>
            </div>
            
        </div>
        <div class="btn-container">
            <div class="btn-section">
                <button class="edit-profile">Edit Profile</button>
            </div>
            <div class="btn-section">
                <button class="logout"><a href="Logout.php">Logout</a></button>
            </div>
        </div>

    </div>

<!-- hamburger menu js code -->
    <script src="hamburgerMenu.js"> </script>


</body>
</html>