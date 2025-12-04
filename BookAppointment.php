<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="BookAppointmentStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        
    </style>
</head>
<body>
    <nav id="navbar">
        <ul>
        <li><a  href="House.php">Home</a></li>
        <li><a class="active" href="BookAppointment.php">Book Appointment</a></li>
        <li><a href="#">Medical History</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="SelectLoginType.php">Login</a></li>
    </ul>

    <div class="hamburger-menu" id="hamburgerMenu" onclick="toggleDropdown()">
        <i class="fas fa-bars"></i>
    </div>

    <div class="dropdown-Content"  id="dropdownMenu">
        
            <a href="House.php">Home</a>
            <a href="#">Profile</a>
            <a class="active" href="BookAppointment.php">Book Appointment</a>
            <a href="#">Medical History</a>
            <a href="#">Logout</a>
        
    </div>
    </nav>
    <div>
        <h1 class="main-heading">
            Find Doctors And Book Appointment
        </h1>
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