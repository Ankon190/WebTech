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
        <form action="">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="First Name" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last Name" required>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" required>
            </div>
             <div class="input-box">
                <input type="date" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required>
            </div>
            <div class="gender">
                <p style="font-size: 18px;margin: -10px 0 10px 0;"> Select Gender: </p>
                <label style="cursor: pointer; margin-right: 40px;"> <input type="radio" name="gender1" required>Male</label>
                <label style="cursor: pointer;"> <input type="radio" name="gender1" required>Female</label>
            </div><br>
            <div class="terms-conditions">
                <label><input type="checkbox">I accept the terms and conditions</label>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>
</body>
</html>
