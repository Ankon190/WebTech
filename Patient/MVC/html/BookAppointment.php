<?php
//database connection
require '../db/db_connect.php';
//session created
session_start();

if(!isset($_SESSION['username'])){
    header("Location: Login.php");
    exit();
}
//declaring variables
    $patient_name = "John Doe";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="../css/BookAppointmentStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        
    </style>
</head>
<body>
    <nav id="navbar">
        <ul>
        <li><a  href="HomePage.php">Home</a></li>
        <li><a class="active" href="BookAppointment.php">Book Appointment</a></li>
        <li><a href="MedicalHistory.php">Medical History</a></li>
        <li><a href="Profile.php"><?php echo htmlspecialchars($patient_name); ?></a></li>
        <li><a href="../php/Logout.php">Logout</a></li>
    </ul>

    <div class="hamburger-menu" id="hamburgerMenu" onclick="toggleDropdown()">
        <i class="fas fa-bars"></i>
    </div>

    <div class="dropdown-Content"  id="dropdownMenu">
        
            <a href="HomePage.php">Home</a>
            <a href="Profile.php">Profile</a>
            <a class="active" href="BookAppointment.php">Book Appointment</a>
            <a href="MedicalHistory.php">Medical History</a>
            <a href="../php/Logout.php">Logout</a>
        
    </div>
    </nav>
    <div>
        <h2 class="main-heading">
            Find Doctors And Book Appointment
        </h2>
    </div>
    <!--search section-->
    <div class="search-section">
        <div class="search-input">
            <i class="fas fa-search"></i>
            <input class="search-box" type="text" placeholder="Search by doctor name">
        </div>
        <div class="search-input">
            <i class="fas fa-user-md"></i>
            <select class="specialist-dropdown">
                <option value="" selected>Select Specialist</option>
                <option value="cardiologist">Cardiologist</option>
                <option value="dermatologist">Dermatologist</option>
                <option value="neurologist">Neurologist</option>
                <option value="pediatrician">Pediatrician</option>
                <option value="psychiatrist">Psychiatrist</option>
            </select>
        </div>
        <button type="submit" class="search-btn">Search</button>
    </div>
<!--doctor list section-->
    <div class="doctor-lists">
        <!--doctor CARD 1-->
        <div class="doctor-card">
            <div class="doctor-img">
                <img src="../images/portrait-professional-medical-worker-posing-picture-with-arms-folded.jpg" alt="Dr. A">
            </div>
            <div class="doctor-info">
                <h3 class="doctor-name">Dr. A</h3>
                <p class="doctor-specialty">Cardiologist</p>
                <p class="doctor-availability">Available: Mon, Wed, Fri - 10:00 AM to 2:00 PM</p>
                <button class="book-appointment-btn">Book Appointment</button>
            </div>
        </div>
        <!--doctor CARD 2-->
        <div class="doctor-card">
            <div class="doctor-img">
                <img src="../images/portrait-professional-medical-worker-posing-picture-with-arms-folded.jpg" alt="Dr. A">
            </div>
            <div class="doctor-info">
                <h3 class="doctor-name">Dr. B</h3>
                <p class="doctor-specialty">Neurologist</p>
                <p class="doctor-availability">Available: Mon, Wed, Fri - 10:00 AM to 2:00 PM</p>
                <button class="book-appointment-btn">Book Appointment</button>
            </div>
        </div>

        <!--doctor CARD 3-->
        <div class="doctor-card">
            <div class="doctor-img">
                <img src="../images/portrait-professional-medical-worker-posing-picture-with-arms-folded.jpg" alt="Dr. A">
            </div>
            <div class="doctor-info">
                <h3 class="doctor-name">Dr. C</h3>
                <p class="doctor-specialty">Neurologist</p>
                <p class="doctor-availability">Available: Mon, Wed, Fri - 10:00 AM to 2:00 PM</p>
                <button class="book-appointment-btn">Book Appointment</button>
            </div>
        </div>

        <!--doctor CARD 4-->
        <div class="doctor-card">
            <div class="doctor-img">
                <img src="../images/portrait-professional-medical-worker-posing-picture-with-arms-folded.jpg" alt="Dr. A">
            </div>
            <div class="doctor-info">
                <h3 class="doctor-name">Dr. D</h3>
                <p class="doctor-specialty">Neurologist</p>
                <p class="doctor-availability">Available: Mon, Wed, Fri - 10:00 AM to 2:00 PM</p>
                <button class="book-appointment-btn">Book Appointment</button>
            </div>
        </div>

        <!--doctor CARD 5-->
        <div class="doctor-card">
            <div class="doctor-img">
                <img src="../images/portrait-professional-medical-worker-posing-picture-with-arms-folded.jpg" alt="Dr. A">
            </div>
            <div class="doctor-info">
                <h3 class="doctor-name">Dr. E</h3>
                <p class="doctor-specialty">Cardiologist</p>
                <p class="doctor-availability">Available: Mon, Wed, Fri - 10:00 AM to 2:00 PM</p>
                <button class="book-appointment-btn">Book Appointment</button>
            </div>
        </div>
        <!--doctor CARD 6-->
        <div class="doctor-card">
            <div class="doctor-img">
                <img src="../images/portrait-professional-medical-worker-posing-picture-with-arms-folded.jpg" alt="Dr. A">
            </div>
            <div class="doctor-info">
                <h3 class="doctor-name">Dr. F</h3>
                <p class="doctor-specialty">Neurologist</p>
                <p class="doctor-availability">Available: Mon, Wed, Fri - 10:00 AM to 2:00 PM</p>
                <button class="book-appointment-btn">Book Appointment</button>
            </div>
        </div>

        <!--doctor CARD 7-->
        <div class="doctor-card">
            <div class="doctor-img">
                <img src="../images/portrait-professional-medical-worker-posing-picture-with-arms-folded.jpg" alt="Dr. A">
            </div>
            <div class="doctor-info">
                <h3 class="doctor-name">Dr. G</h3>
                <p class="doctor-specialty">Neurologist</p>
                <p class="doctor-availability">Available: Mon, Wed, Fri - 10:00 AM to 2:00 PM</p>
                <button class="book-appointment-btn">Book Appointment</button>
            </div>
        </div>

        <!--doctor CARD 8-->
        <div class="doctor-card">
            <div class="doctor-img">
                <img src="../images/portrait-professional-medical-worker-posing-picture-with-arms-folded.jpg" alt="Dr. A">
            </div>
            <div class="doctor-info">
                <h3 class="doctor-name">Dr. H</h3>
                <p class="doctor-specialty">Neurologist</p>
                <p class="doctor-availability">Available: Mon, Wed, Fri - 10:00 AM to 2:00 PM</p>
                <button class="book-appointment-btn">Book Appointment</button>
            </div>
        </div>

    </div>

<!-- hamburger menu js code -->
    <script src="../js/hamburgerMenu.js"> </script>


</body>
</html>