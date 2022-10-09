<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p1.css">
    <title>Admin Register</title>
</head>

<body>
    <div class="outbox">
        <div class="register">Admin Registration Page</div>
        
        <form action="adminconfig.php" method="POST">
            <div class="username">
                <input type="name" name="username" placeholder="Username" required>
            </div>
            <br>
            <div class="mobile">
                <input type="number" name="mobile" placeholder="Mobile Number" required>
            </div>
            <br>
            <div class="password">
                <input type="password" name="password" placeholder="Create Password" required>
            </div>
            <br>
            <div class="admincode">
                <input type="number" name="admincode" placeholder="Admin Code" required>
            </div>
            <br>
            <button type="submit" name="registerbtn" class="registerbtn">Register</button>
            <br>
            <br>
            <div class="newuser">
                Already User? <a href="adminlogin.php">Login Here</a>
            </div>
        </form>
    </div>
</body>

</html>