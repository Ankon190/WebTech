<?php
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