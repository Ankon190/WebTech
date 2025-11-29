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
        <form action="" method="post" onsubmit="validation()"> 
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="First Name" id="fname">
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last Name" id="lname" >
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" id="email" >
            </div>
             <div class="input-box">
                <input type="date" id="dob" >
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="password" >
            </div>
            <div class="gender">
                <p style="font-size: 18px;margin: -10px 0 10px 0;"> Select Gender: </p>
                <input type="radio" name="gender1" id="male"><label>Male</label>
                <input type="radio" name="gender1" id="female"><label>Female</label>
            </div><br>
            <div class="terms-conditions">
                <label><input type="checkbox" id="terms">I accept the terms and conditions</label>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>

    <script>
        function validation() {
            const fname = document.getElementById('fname').value;
            const lname = document.getElementById('lname').value;
            const email = document.getElementById('email').value;
            const dob = document.getElementById('dob').value;
            const password = document.getElementById('password').value;
            const male = document.getElementById('male').checked;
            const female = document.getElementById('female').checked;
            const terms = document.getElementById('terms').checked;

            console.log(fname, lname, email, dob, password, terms);

            if(fname=="" || lname=="" || email=="" || dob=="" || password=="" || (!male && !female) || !terms) {
                alert("Please fill all the fields and accept the terms.");
                return false;
            }
        }
    </script>
</body>
</html>
