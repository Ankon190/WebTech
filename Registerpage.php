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
        <form action="" method="post" onsubmit="validation(event)"> 
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="First Name" id="fname">
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last Name" id="lname" >
            </div>
            <div class="input-box">
                <input type="text" placeholder="Email" id="email" >
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
            <button type="submit" class="btn">Register</button>
        </form>
    </div>

    <script>
        function validation(event) {
            event.preventDefault();
                let fname = document.getElementById('fname').value;
                let lname = document.getElementById('lname').value;
                let email = document.getElementById('email').value;
                let dob = document.getElementById('dob').value;
                let bloodgroup = document.getElementById('bloodgroup').value;
                let weight = document.getElementById('weight').value;
                let address = document.getElementById('address').value;
                let password = document.getElementById('password').value;
                let male = document.getElementById('male').checked;
                let female = document.getElementById('female').checked;
                let photo = document.getElementById('photo').value;
                let terms = document.getElementById('terms').checked;

            if(fname=="" || lname=="" || email=="" || dob=="" ||bloodgroup=="" || weight=="" || address=="" || password=="" || (!male && !female) || !photo || !terms) {
                alert("Please fill all the fields and accept the terms.");
                return false;
            }
            if(password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }
            if(!email.includes("@")|| !email.includes(".")) {
                alert("Please enter a valid email address.");
                return false;
        }
        alert("Registration successful!"); 
    }
    </script>
</body>
</html>
