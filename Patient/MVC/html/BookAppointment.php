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
    $patient_name = $_SESSION['username'];
    //fetching doctor data from database
    $sql = "SELECT * from doctor ORDER BY user_name ASC";
    $result = $conn->query($sql);
    $doctors = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $doctors[] = $row;
        }
    }

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
        <?php if(empty($doctors)): ?>
            <div class="no-doctors">
                <p>No doctors available at the moment.</p>
                <p>Please check back later.</p>
            </div>
        <?php else: ?>
        <!--Available doctor CARDs -->
        <?php foreach ($doctors as $doctor): ?>
        <div class="doctor-card">
            <div class="doctor-img">
                <?php if (!empty($doctor['photo'])): ?>
                    <img src="../<?php echo htmlspecialchars($doctor['photo']); ?>" alt="<?php echo htmlspecialchars($doctor['user_name']); ?>">
                <?php endif; ?>
            </div>
            <div class="doctor-info">
                <h3 class="doctor-name">Dr. <?php echo htmlspecialchars($doctor['user_name']); ?></h3>
                <p class="doctor-specialty">Specialization: <?php echo htmlspecialchars($doctor['specilization']); ?></p>
                <p class="doctor-availability">Available: <?php echo htmlspecialchars($doctor['availability_day']); ?></p>
                <p><?php echo htmlspecialchars($doctor['availability_time_start']); ?> to <?php echo htmlspecialchars($doctor['availability_time_end']); ?></p>
                <button class="book-appointment-btn">Book Appointment</button>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

<!-- hamburger menu js code -->
    <script src="../js/hamburgerMenu.js"> </script>


</body>
</html>