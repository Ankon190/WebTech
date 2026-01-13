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
    $doctors = [];
    $search_name = '';
    $search_specialty = '';

    $sql = "SELECT user_id FROM patient WHERE user_name = '$patient_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $patient_id = $row['user_id'];
    }

    //check if bookappointment button is clicked
     if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_booking'])) {
        $doctor_name = $_POST['doctor_name'];
        $doctor_id = $_POST['doctor_id'];
        $doctor_specialty = $_POST['doctor_specialty'];
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];
        $symptoms = $_POST['symptoms'];
        $booking_success = '';
        $booking_error = '';


        //check if input is properly set
        if(!empty($doctor_name) && !empty($appointment_date) && !empty($appointment_time) && !empty($symptoms)) {
        // Insert into appointments table
        $sql = "INSERT INTO appointments (patient_name, patient_id, doctor_name, doctor_id, doctor_specialty, appointment_date, appointment_time, symptoms) VALUES ('$patient_name', '$patient_id', '$doctor_name', '$doctor_id', '$doctor_specialty', '$appointment_date', '$appointment_time', '$symptoms')";
        $booking_result = $conn->query($sql);
        if ($booking_result === TRUE) {
           $booking_success = "Appointment booked successfully!";
           echo "<script>alert('$booking_success');</script>";
        } 
        else {
            $booking_error = "Error booking appointment: " . $conn->error;
            echo "<script>alert('$booking_error');</script>";
        }
    }
}
    // Check if search form was submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
        $search_name = $_POST['search_name'];
        $search_specialty = $_POST['search_specialty'];
        
        // Build SQL query based on search criteria
        $sql = "SELECT * FROM doctor WHERE 1=1";
        
        if(!empty($search_name)) {
            $sql .= " AND user_name LIKE '%$search_name%'";
        }
        
        if(!empty($search_specialty)) {
            $sql .= " AND specilization = '$search_specialty'";
        }
        //sql command is ready, Now execute it
        $sql .= " ORDER BY user_name ASC";
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $doctors[] = $row;
            }
        }
    } 
    else {
        // If not searching, get all doctors
        $sql = "SELECT * FROM doctor ORDER BY user_name ASC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $doctors[] = $row;
            }
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
    <form method="post" action="">
        <div class="search-section">
            <div class="search-input">
                <i class="fas fa-search"></i>
                <input class="search-box" name="search_name" type="text" placeholder="Search by doctor name" >
            </div>
            <div class="search-input">
                <i class="fas fa-user-md"></i>
                <select name="search_specialty" class="specialist-dropdown">
                    <option value="" selected>Select Specialist</option>
                    <option value="Cardiologist">Cardiologist</option>
                    <option value="Dermatologist">Dermatologist</option>
                    <option value="Neurologist">Neurologist</option>
                    <option value="Pediatrician">Pediatrician</option>
                    <option value="Psychiatrist">Psychiatrist</option>
                    <option value="Surgeon">Surgeon</option>
                    <option value="Medicine">Medicine</option>
                </select>
            </div>
            <button type="submit" name="search" class="search-btn">Search</button>
        </div>
    </form>
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
                <button class="book-appointment-btn" onclick="OpenModal('<?php echo $doctor['user_name']; ?>', 
                                                     '<?php echo $doctor['specilization']; ?>',
                                                     '<?php echo $doctor['user_id'] ?? ''; ?>')">Book Appointment
                </button>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!--booking modal-->
    <dialog id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeBookingModal()">&times;</span>
            <h2>Book Appointment</h2>
            <form method="post" action="">
                <input type="text" name="doctor_name" id="modalDoctorName" readonly>
                <input type="text" name="doctor_id" id="modalDoctorId" readonly>
                <input type="text" name="doctor_specialty" id="modalDoctorSpecialty" readonly>
                
                <div class="form-group">
                    <label for="patientName">Patient Name</label>
                    <input type="text" id="patientName" value="<?php echo htmlspecialchars($patient_name); ?>" readonly>
                </div>
                
                <div class="form-group">
                    <label for="doctorInfo">Doctor</label>
                    <input type="text" id="doctorInfo" readonly>
                </div>
                
                <div class="form-group">
                    <label for="appointment_date">Appointment Date </label>
                    <input type="date" id="appointment_date" name="appointment_date" required 
                           min="<?php echo date('Y-m-d'); ?>">
                </div>
                
                <div class="form-group">
                    <label for="appointment_time">Appointment Time *</label>
                    <select id="appointment_time" name="appointment_time" required>
                        <option value="">Select Time Slot</option>
                        <option value="09:00 AM">09:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="02:00 PM">02:00 PM</option>
                        <option value="03:00 PM">03:00 PM</option>
                        <option value="04:00 PM">04:00 PM</option>
                        <option value="05:00 PM">05:00 PM</option>
                        <option value="06:00 PM">06:00 PM</option>
                        <option value="07:00 PM">07:00 PM</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="symptoms">Symptoms (Optional)</label>
                    <textarea id="symptoms" name="symptoms" placeholder="Describe your symptoms"></textarea>
                </div>
                
                <button type="submit" name="confirm_booking" class="submit-btn">Confirm Appointment</button>
            </form>
        </div>
    </dialog>

<!-- hamburger menu js code -->
    <script src="../js/hamburgerMenu.js"> </script>
    <script>
         // Get modal element
        var modal = document.getElementById('bookingModal');
        
        // Function to open booking modal
        function OpenModal(doctorName, doctorSpecialty, doctorId) {
            // Set doctor information in hidden fields
            document.getElementById('modalDoctorName').value = doctorName;
            document.getElementById('modalDoctorSpecialty').value = doctorSpecialty;
            document.getElementById('modalDoctorId').value = doctorId;
            
            // Display doctor info in readonly field
            document.getElementById('doctorInfo').value = doctorName + ' - ' + doctorSpecialty;
            
            // Set minimum date to today
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('appointment_date').min = today;
            
            // Show modal
            modal.style.display = 'block';
        }
        
        // Function to close booking modal
        function closeBookingModal() {
            modal.style.display = 'none';
            // Reset form
            document.querySelector('#bookingModal form').reset();
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target == modal) {
                closeBookingModal();
            }
        };
        
        // Set default date to tomorrow
        window.onload = function() {
            var tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            var tomorrowStr = tomorrow.toISOString().split('T')[0];
            document.getElementById('appointment_date').value = tomorrowStr;
        };
    </script>


</body>
</html>