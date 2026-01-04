<?php
//database connection
require '../db/db_connect.php';
require '../php/medicalHistoryGetData.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="../css/MedicalHistoryStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        
    </style>
</head>
<body>
    <nav id="navbar">
        <ul>
        <li><a href="HomePage.php">Home</a></li>
        <li><a href="BookAppointment.php">Book Appointment</a></li>
        <li><a class="active" href="MedicalHistory.php">Medical History</a></li>
        <li><a href="Profile.php"><?php echo htmlspecialchars($patient_name); ?></a></li>
        <li><a href="../php/Logout.php">Logout</a></li>
    </ul>

    <div class="hamburger-menu" id="hamburgerMenu" onclick="toggleDropdown()">
        <i class="fas fa-bars"></i>
    </div>

    <div class="dropdown-Content"  id="dropdownMenu">
        
            <a href="HomePage.php">Home</a>
            <a href="Profile.php">Profile</a>
            <a href="BookAppointment.php">Book Appointment</a>
            <a class="active" href="MedicalHistory.php">Medical History</a>
            <a href="#">Logout</a>
        
    </div>
    </nav>
    <!--main heading-->
    <div>
        <h2 class="main-heading">
            Medical History
        </h2>
    </div>
    <!--medical history details-->
    <div class="history-details">
        <table>
            <tr>
                <th>Date</th>
                <th>Doctor</th>
                <th>Diagnosis</th>
                <th>Prescriptions</th>
            </tr>
            <tr>
                <td>2024-05-10</td>
                <td>Dr. John Smith</td>
                <td>Hypertension</td>
                <td>Amlodipine 5mg daily</td>
            </tr>
            <tr>
                <td>2024-04-22</td>
                <td>Dr. Emily Davis</td>
                <td>Eczema</td>
                <td>Hydrocortisone cream</td>
            </tr>
            <tr>
                <td>2024-03-15</td>
                <td>Dr. Michael Brown</td>
                <td>Migraine</td>
                <td>Sumatriptan as needed</td>
            </tr>
        </table>
    </div>

<!-- hamburger menu js code -->
    <script src="../js/hamburgerMenu.js"> </script>

</body>
</html>