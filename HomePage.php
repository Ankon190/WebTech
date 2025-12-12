<?php
//declaring variables
    $patient_name = "John Doe";
    $appointment_date = "2025-12-31";
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
        <li><a href="Profile.php">Profile</a></li>
        <li><a href="SelectLoginType.php">Login</a></li>
    </ul>

    <div class="hamburger-menu" id="hamburgerMenu" onclick="toggleDropdown()">
        <i class="fas fa-bars"></i>
    </div>

    <div class="dropdown-Content"  id="dropdownMenu">
        
            <a class="active" href="HomePage.php">Home</a>
            <a href="Profile.php">Profile</a>
            <a href="BookAppointment.php">Book Appointment</a>
            <a href="MedicalHistory.php">Medical History</a>
            <a href="#">Logout</a>
        
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
            <h2>Upcoming Appointment</h2>
            <p>You have an appointment scheduled on <strong><?php echo date("F j, Y", strtotime($appointment_date)); ?></strong>.</p>
            <a href="BookAppointment.php" class="btn">View Appointments</a>
        </div>
    </div>



    <!-- javascript validation starts here -->
    <script>
        function toggleDropdown() {
            let dropdown = document.getElementById("dropdownMenu");
            dropdown.classList.toggle("show");
        }

        //close menu when click
        document.addEventListener('click', function(event) {
            let dropdown = document.getElementById("dropdownMenu");
            let hamburger = document.getElementById('hamburgerMenu');
            if (!hamburger.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
    </script>
</body>
</html>