<?php
    $name = $email = $dob = $bloodgroup = $weight = $address = $password = $gender = $user = $terms = "";
    $success = $errormsg = "";
    $has_error = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $dob = trim($_POST['dob'] ?? '');
        $bloodgroup = trim($_POST['bloodgroup'] ?? '');
        $weight = trim($_POST['weight'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $gender = $_POST['gender'] ?? '';
        $user = $_POST['user'] ?? '';
        $terms = $_POST['terms'] ?? '';

        if((empty($name)) || (empty($email)) || (empty($dob)) || (empty($bloodgroup)) || (empty($weight)) || (empty($address)) || (empty($password)) || (empty($gender)) || (empty($user)) || (!isset($terms))){
            $errormsg = "All fields are required";
            $has_error = true;
        }
        //email validation
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errormsg = "Enter valid email address (e.g., anything@example.com)";
            $has_error = true;
        }
        elseif(strlen($password) < 8){
            $errormsg = "Password must be at least 8 characters long";
            $has_error = true;
        }
        elseif(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/', $password)){
            $errormsg = "Password must be at least 8 characters with uppercase, lowercase, and number";
            $has_error = true;
        }

        else{
            $has_error = false;
        }
        //check if there is no error
        if($has_error==false){
            //clear error message for stop displaying error msg
            $errormsg = "";
            //encript password
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            //check if the user is patient or doctor
            //data insertion query in tables
            $reg_insert_query = "INSERT INTO patient (user_name, dob, gender, blood_group, weight, address) VALUES ('$name', '$dob', '$gender', '$bloodgroup', '$weight', '$address')";
            $reg_insert_user_query = "INSERT INTO users (user_name, email, password, user_type) VALUES ('$name', '$email', '$hashPassword', '$user')";

            if($conn->query($reg_insert_query) && $conn->query($reg_insert_user_query)) {               
                $success="Registration Complete you can do login";
            } else {
                $errormsg = "Error: " . mysqli_error($conn);
            }
        }

    }
?>