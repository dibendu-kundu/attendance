<?php

session_start();
// Prevent User Going Back to Login Page If Already Logged In in php
if(isset($_SESSION['username'])){
    header("location:homepage.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p1.css">
    <title>Login</title>
</head>

<body>
    <div class="outbox">
        <div class="login">Login Page</div>
        
        <form action="config.php" method="POST">
            <div class="mobile">
                <input type="number" name="mobile" placeholder="Mobile Number" required>
            </div>
            <br>
            <div class="password">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <br>
            <button type="submit" name="loginbtn" class="loginbtn">Login</button>
            <br>
            <br>
            <div class="newuser">
                New User? <a href="register.php">Register Here</a>
            </div>
        </form>
    </div>
</body>

</html>