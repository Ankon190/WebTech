<?php
//database connection
require 'db_connect.php';

    $name = $email = $dob = $bloodgroup = $weight = $address = $password = $gender = $user = $terms = "";
    $errormsg = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $dob = trim($_POST['dob'] ?? '');
        $bloodgroup = trim($_POST['bloodgroup'] ?? '');
        $weight = trim($_POST['weight'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $gender = $_POST['gender'] ?? '';
        $user = $_POST['reg-as'] ?? '';
        $terms = $_POST['terms'] ?? '';

        if((empty($fname)) || (empty($lname)) || (empty($email)) || (empty($dob)) || (empty($bloodgroup)) || (empty($weight)) || (empty($address)) || (empty($password)) || (empty($gender)) || (empty($user)) || (!isset($terms))){
            $errormsg = "All fields are required";
        }
        //email validation
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errormsg = "Enter valid email address (e.g., anything@example.com)";
        }
        elseif(strlen($password) < 8){
            $errormsg = "Password must be at least 8 characters long";
        }
        elseif(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/', $password)){
            $errormsg = "Password must be at least 8 characters with uppercase, lowercase, and number";
        }

        else{
            $errormsg = "✓ Registration Successful";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="RegisterPageStyle.css">
    <style>
        
    </style>
</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" name="name" placeholder="Name" id="name">
            </div>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" id="email" >
            </div>
             <div class="input-box">
                <input type="date" name="dob" id="dob" >
            </div>
            <div class="input-box">
                <input type="text" name="bloodgroup" id="bloodgroup" placeholder="Blood Group">
            </div>
            <div class="input-box">
                <input type="number" name="weight" id="weight" placeholder="Weight (in kg)">
            </div>
            <div class="input-box">
                <input type="text" name="address" id="address" placeholder="Address">
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" id="password" >
            </div>
            <div class="gender">
                <p style="font-size: 16px; "> Select Gender : </p>
                <input type="radio" name="gender" id="male"><label>Male</label>
                <input type="radio" name="gender" id="female"><label>Female</label>
            </div>
            <div class="reg-as">
                <p style="font-size: 16px;"> Register As : </p>
                <input type="radio" name="user" id="patient"><label>Patient</label>
                <input type="radio" name="user" id="doctor"><label>Doctor</label>
            </div>
            <div class="input-box-photo">
                <input type="file" name="" id="photo">
            </div><br>
            <div class="terms-conditions">
                <label><input type="checkbox" id="terms">I accept the terms and conditions</label>
            </div>
            <?php 
                if(!empty($errormsg)){
                    echo '<div class="error-msg">'.$errormsg.'</div>';
                } 
            ?><br>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>

    <script>
        
    </script>
</body>
</html>


<?php
    
?>