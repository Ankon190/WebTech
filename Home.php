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
        <li><a class="active" href="Home.php">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="Login.php">Login</a></li>
    </ul>

    <div class="hamburger-menu" onclick="toggleDropdown()">
        <i class="fas fa-bars"></i>
    </div>

    <div class="dropdown-Content"  id="dropdownMenu">
        
            <a class="active" href="Home.php">Home</a>
            <a href="#">Profile</a>
            <a href="#">Reports</a>
            <a href="#">About Us</a>
            <a href="Login.php">Login</a>
            <a href="#">Logout</a>
        
    </div>
    </nav>


</body>
</html>