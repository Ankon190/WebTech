<?php
    $email = "";
    $errormsg = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = trim($_POST["email"]);

        if(empty($email)){
            $errormsg = "Email cannot be empty";
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errormsg = "Enter valid email address (e.g., anything@example.com)";
        }
        else{
            $errormsg = "✓ Valid Email";
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
                <input type="text" placeholder="First Name" id="fname">
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last Name" id="lname" >
            </div>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" id="email" >
            </div>
             <div class="input-box">
                <input type="date" id="dob" >
            </div>
            <div class="input-box">
                <input type="text" name="" id="bloodgroup" placeholder="Blood Group">
            </div>
            <div class="input-box">
                <input type="number" name="" id="weight" placeholder="Weight (in kg)">
            </div>
            <div class="input-box">
                <input type="text" name="" id="address" placeholder="Address">
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="password" >
            </div>
            <div class="gender">
                <p style="font-size: 18px;margin: -10px 0 10px 0;"> Select Gender: </p>
                <input type="radio" name="gender1" id="male"><label>Male</label>
                <input type="radio" name="gender1" id="female"><label>Female</label>
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