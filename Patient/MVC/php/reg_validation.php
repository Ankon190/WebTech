<?php
    $name = $email = $dob = $bloodgroup = $weight = $address = $password = $gender = $user = $terms = "";
    $success = $errormsg = "";
    $has_error = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $bloodgroup = $_POST['bloodgroup'];
        $weight = $_POST['weight'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $user = $_POST['user'];
        $terms = isset($_POST['terms']);

        //checks for empty fields
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
            //check if the user already exists in the database
                $check_user_exist = "SELECT * FROM users WHERE user_name='$name'";
                $result = $conn->query($check_user_exist);
                if($result->num_rows > 0){
                    $errormsg = "Username or Email already exists";
                    $has_error = true;
                }
            
            else{
                //encript password
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                //check if the user is patient or doctor
                if($user === "patient"){
                //data insertion query in tables
                    $reg_insert_query = "INSERT INTO patient (user_name,user_email, dob, gender, blood_group, weight, address) VALUES ('$name', '$email', '$dob', '$gender', '$bloodgroup', '$weight', '$address')";
                    $reg_insert_user_query = "INSERT INTO users (user_name, email, password, user_type) VALUES ('$name', '$email', '$hashPassword', '$user')";

                    if($conn->query($reg_insert_query) && $conn->query($reg_insert_user_query)) {               
                        $success="Registration Complete you can do login";
                    } else {
                        $errormsg = "Error: " . mysqli_error($conn);
                    }
                }
                elseif($user === "doctor"){
                    //data insertion query in tables
                    $reg_insert_query = "INSERT INTO doctor (user_name, dob, gender, blood_group, weight, address) VALUES ('$name', '$dob', '$gender', '$bloodgroup', '$weight', '$address')";
                    $reg_insert_user_query = "INSERT INTO users (user_name, email, password, user_type) VALUES ('$name', '$email', '$hashPassword', '$user')";

                    if($conn->query($reg_insert_query) && $conn->query($reg_insert_user_query)) {               
                        $success="Registration Complete you can do login";
                    } 
                    else {
                        $errormsg = "Error: " . mysqli_error($conn);
                    }
                }
            }
    }
}
?>