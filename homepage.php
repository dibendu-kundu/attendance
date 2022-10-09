<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header("location:index.php");
    exit;
}
?>

<?php

session_start();

$connect=mysqli_connect('sql105.epizy.com','epiz_32732001','PalfRQZ1PmRh','epiz_32732001_userbase');
// if logged out it prevents to go back to the user's logged in page

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

// insert value in a particular column of a row
if(isset($_POST['enterbtn'])){
    $name=$_SESSION['username'];
    $val=$_POST['today'];
    $datt=$_POST['date'];
    
    $sql=mysqli_query($connect,"SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'user' AND column_name = '$datt'");
    // $sqll=mysqli_query($connect,"EXISTS($sql)");
    
    if(mysqli_num_rows($sql)>0){
        $insert = mysqli_query($connect,"UPDATE `user` SET `$datt`=$val WHERE username='$name'");
        echo '<script>
            alert("Your response has been uploaded");
        </script>';
    }
    
    else{
        echo '<script>
            alert("This date is not added yet in database");
        </script>';
    }
    // $insert = mysqli_query($connect,"UPDATE `user` SET `$datt`=$val WHERE username='$name'");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p1.css">
    <title>Homepage</title>
</head>
<body>
    <div class="homeoutbox">
        <div class="navpanel">
            <div class="welcome">Hello, <?php echo $_SESSION['username']?> !</div>
            <div class="logout">
                <form action="config.php" method="POST">
                    <button type="submit" name="logoutbtn" class="logoutbtn">Logout</button>
                </form>
            </div>
        </div>
        <div class="homepage">User Homepage</div>
        <div>
            <form action="homepage.php" method="POST">
                <div>Attend Today</div>
                <br>
                <button onclick="myfunc()" class="fetchbtn">Fetch Location</button>
                <br>
                <br>
                <div class="notice"><a>Wait to calibrate device's location</a></div>
                <div class="timer">15s</div>
                <br>
                <input type="number" name="today" class="hide" placeholder="will be filled automatically" required>
                <br>
                <br>
                <div class="corr">Select Date</div>
                <input type="date" name="date" id="onlytoday" placeholder="Select Date" required>
                <br>
                <br>
                <div class="visible">
                    <button type="submit" name="enterbtn" class="submitbtn">Present</button>
                </div>
            </form>
        </div>
        <br> 
    </div>
    
    <script src="p1.js"></script>
</body>
</html>