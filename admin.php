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
    header("location:adminlogin.php");
}

// add dynamic column
if(isset($_POST['enter'])){
    $datt=$_POST['date'];

    // $sql=mysqli_query($connect,"SELECT `$datt` FROM `user` WHERE EXISTS (SELECT `$datt` FROM `user`)");
    // $sql=mysqli_query($connect,"SELECT `$datt` FROM `user`");
    // if(mysqli_num_fields($sql)
    // $sqll=mysqli_query($connect,"EXISTS($sql)");

    $sql=mysqli_query($connect,"SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'user' AND column_name = '$datt'");
    
    if(mysqli_num_rows($sql)>0){
        echo '<script>
            alert("Column already exists");
        </script>';
    }
    
    else{
        $check = mysqli_query($connect,"ALTER TABLE `user` ADD `$datt` INT(1)");
        echo '<script>
            alert("New column is added successfully");
        </script>';
    }
    // $check = mysqli_query($connect,"ALTER TABLE `user` ADD `$datt` INT(1)");
}



// correction section for admin
if(isset($_POST['correctbtn'])){
    $name=$_POST['cuser'];
    $val=$_POST['cval'];
    $dattt=$_POST['cdate'];

    // checks if the user exists in db or not then update records
    $check = mysqli_query($connect,"SELECT username FROM user WHERE username='$name'");

    if(mysqli_num_rows($check)>0){ 
        
        $sqll=mysqli_query($connect,"SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'user' AND column_name = '$dattt'");
        
        if(mysqli_num_rows($sqll)>0){
            $insert = mysqli_query($connect,"UPDATE `user` SET `$dattt`=$val WHERE username='$name'");
        }
        
        else{
            echo '<script>
                alert("The date you have entered does not match with database");
            </script>';
        }
        // $insert = mysqli_query($connect,"UPDATE `user` SET `$dattt`=$val WHERE username='$name'");
    }
    
    else{
        echo '<script>
            alert("The user does not exists");
            // redirect again to admin page

            window.location="admin.php";
        </script>';
    }
    // $insert = mysqli_query($connect,"UPDATE `user` SET `$dattt`=$val WHERE username='$name'");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p1.css">
    <title>Admin</title>
</head>
<body>
    <div class="homeoutbox">
        <div class="navpanel">
            <div class="welcome">Hello, <?php echo $_SESSION['username']?> !</div>
            <div class="logout">
                <form action="adminconfig.php" method="POST">
                    <button type="submit" name="logoutbtn" class="logoutbtn">Logout</button>
                </form>
            </div>
        </div>
        <div class="ahomepage">Admin Homepage</div>
        <div class="add">
            <form action="admin.php" method="POST">
                <div class="view">Add New Date</div>
                <input type="date" name="date" id="onlytoday" required>
                <br>
                <br>
                <div>
                    <button type="submit" name="enter" class="addbtn">Add</button>
                </div>
            </form>
        </div>
        <br>
        <div class="correct">
            <form action="admin.php" method="POST">
                <div class="corr">Correction Section</div>
                <input type="name" name="cuser" placeholder="name" required>
                <br>
                <div class="corr">Select Date</div>
                <input type="date" name="cdate" required>
                <!-- options are integer type -->
                <br>
                <br>
                <div>
                    <select name="cval">
                        <option>0</option>
                        <option>1</option>
                    </select>
                </div>
                <br>
                <div>   
                    <button type="submit" name="correctbtn" class="correctbtn">Correct</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="p1.js"></script>
</body>
</html>