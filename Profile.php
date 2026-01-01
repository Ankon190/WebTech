<?php
//database connection
require 'db_connect.php';

//session created
session_start();

if(!isset($_SESSION['username'])){
    header("Location: Login.php");
    exit();
}
else{
    $username = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT * FROM patient WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user_result = $stmt -> get_result();

    if($user_result ->num_rows ===1){
        $user = $user_result -> fetch_assoc();
        $patient_name = $user['user_name'];
        $patient_id = $user['user_id'];
        $patient_email = $user['user_email'];
        $patient_dob = $user['dob'];
        $patient_gender = $user['gender'];
        $patient_address = $user['address'];
        $patient_bloodgroup = $user['blood_group'];
        $patient_weight = $user['weight'];
    }
    $stmt->close();
}

//edit profile info update in database
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])){
    //get the edited data from the form
    $new_email = $_POST['email'];
    $new_bloodgroup = $_POST['bloodgroup'];
    $new_gender = $_POST['gender'];
    $new_dob = $_POST['dob'];
    $new_address = $_POST['address'];

    //then run query to update the data in database
    $update_stmt = $conn->prepare("UPDATE patient SET user_email = ?, blood_group = ?, gender = ?, dob = ?, address = ? WHERE user_name = ?");
    $update_stmt->bind_param("ssssss", $new_email, $new_bloodgroup, $new_gender, $new_dob, $new_address, $username);

    $update_user_stmt = $conn -> prepare("UPDATE users SET email = ? WHERE user_name = ?");
    $update_user_stmt -> bind_param("ss", $new_email, $username);

    if($update_stmt->execute() && $update_user_stmt -> execute()){
        $success_msg = "Profile updated successfully!";

        //change the variable data to updated data to show in the profile page
        $patient_email = $new_email;
        $patient_bloodgroup = $new_bloodgroup;
        $patient_gender = $new_gender;
        $patient_dob = $new_dob;
        $patient_address = $new_address;
    }
    else{
        $error_msg = "Error updating profile. Please try again.";
    }

    $update_stmt->close();
    $update_user_stmt -> close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="ProfileStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        
    </style>
</head>
<body>
    <nav id="navbar">
        <ul>
        <li><a href="HomePage.php">Home</a></li>
        <li><a href="BookAppointment.php">Book Appointment</a></li>
        <li><a href="MedicalHistory.php">Medical History</a></li>
        <li><a class="active" href="Profile.php"><?php echo htmlspecialchars($patient_name); ?></a></li>
        <li><a href="Logout.php">Logout</a></li>
    </ul>

    <div class="hamburger-menu" id="hamburgerMenu" onclick="toggleDropdown()">
        <i class="fas fa-bars"></i>
    </div>

    <div class="dropdown-Content"  id="dropdownMenu">
        
            <a href="HomePage.php">Home</a>
            <a class="active" href="Profile.php">Profile</a>
            <a href="BookAppointment.php">Book Appointment</a>
            <a href="MedicalHistory.php">Medical History</a>
            <a href="#">Logout</a>
        
    </div>
    </nav>
     <div class="profile-container">
    <!-- Profile Header -->
        <div class="profile-header">
            <i class="fas fa-user"><h2>My Profile</h2></i>
        </div>

    <!-- Profiles info with photo -->
   
        <div class="profile-photo-section">
            <div class="profile-photo">
                <img src="portrait-professional-medical-worker-posing-picture-with-arms-folded.jpg" alt="Profile Photo">
            </div>
            <p>Patient ID: <?php echo htmlspecialchars($patient_id); ?></p>
            
        </div>
        <!-- Main Profile Info -->
        <form class="profile-info" action="" method="POST">
            <div class="info-form">
                <label for="name"> Full Name</label>
                <div class="info-box">
                    <span><?php echo htmlspecialchars($patient_name); ?></span>
                </div>
            </div>

            <div class="info-form">
                <label for="email"> Email</label>
                <div class="info-box view-mode">
                    <span><?php echo htmlspecialchars($patient_email); ?></span>
                </div>
                <div class="info-box edit-mode" style="display:none;">
                    <input type="email" name="email" value="<?php echo htmlspecialchars($patient_email); ?>">
                </div>
            </div>

            <div class="info-form">
                <label for="number"> Blood Group</label>
                <div class="info-box view-mode">
                    <span><?php echo htmlspecialchars($patient_bloodgroup); ?></span>
                </div>
                <div class="info-box edit-mode" style="display:none;">
                    <input type="text" name="bloodgroup" value="<?php echo htmlspecialchars($patient_bloodgroup); ?>">
                </div>
            </div>

            <div class="info-form">
                <label for="gender"> Gender</label>
                <div class="info-box view-mode">
                    <span><?php echo htmlspecialchars($patient_gender); ?></span>
                </div>
                <div class="info-box edit-mode" style="display:none;">
                    <input type="text" name="gender" value="<?php echo htmlspecialchars($patient_gender); ?>">
                </div>
            </div>

            <div class="info-form">
                <label for="dob"> Date of Birth</label>
                <div class="info-box view-mode">
                    <span><?php echo htmlspecialchars($patient_dob); ?></span>
                </div>
                <div class="info-box edit-mode" style="display:none;">
                    <input type="date" name="dob" value="<?php echo htmlspecialchars($patient_dob); ?>">
                </div>
            </div>

            <div class="info-form">
                <label for="address"> Address</label>
                <div class="info-box view-mode">
                    <span><?php echo htmlspecialchars($patient_address); ?></span>
                </div>
                <div class="info-box edit-mode" style="display:none;">
                    <input type="text" name="address" value="<?php echo htmlspecialchars($patient_address); ?>">
                </div>
            </div> 
            <div class="btn-container">
                <div class="btn-section">
                    <button class="edit-profile" id="editBtn" type="button">Edit Profile</button>
                </div>
                <div class="btn-section" id="saveBtn" style="display:none;">
                    <button class="save-profile" type="submit" name="update_profile">Save Changes</button>
                </div>
                <div class="btn-section">
                    <button class="logout"><a href="Logout.php">Logout</a></button>
                </div>
            </div>          
        </form>
         <!-- Success/Error Messages -->
        <?php if(isset($success_msg)): ?>
            <div class="alert success">
                <?php echo htmlspecialchars($success_msg); ?>
            </div>
        <?php endif; ?>
        
        <?php if(isset($error_msg)): ?>
            <div class="alert error">
                <?php echo htmlspecialchars($error_msg); ?>
            </div>
        <?php endif; ?>
    </div>

<!-- hamburger menu js code -->
    <script src="hamburgerMenu.js"> </script>
<!-- js code for edit info -->
    <script src="EditInfo.js"> </script>


</body>
</html>