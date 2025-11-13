<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="RegisterPageStyle.css">
    <style>
        .wrapper .btn:hover{
            background: #12191f;
            color: white;
        }
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
                <input type="password" placeholder="Password" required>
            </div>
            <div class="terms-conditions">
                <label><input type="checkbox">I accept the terms and conditions</label>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>
</body>
</html>
