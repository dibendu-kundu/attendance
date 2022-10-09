<?php
session_start();

    if(isset($_POST['adminbtn'])){
        if(isset($_SESSION['username'])){
            // header("location:login.php");
            session_destroy();
            echo '<script>
            window.location="adminlogin.php";
        </script>';
        }
        else{
            echo '<script>
            window.location="adminlogin.php";
        </script>';
        }
    }

    // if this executes the user will be logged in after trying to go back to the previous page

    // if(isset($_POST['userbtn'])){
    //     echo '<script>
    //         window.location="../1/login.php";
    //     </script>';
    // }

    // but in this case will be logged out if logged in 

    if(isset($_POST['userbtn'])){
        if(isset($_SESSION['username'])){
            // header("location:../1/login.php");
            session_destroy();
            echo '<script>
            window.location="login.php";
        </script>';
        }
        else{
            echo '<script>
            window.location="login.php";
        </script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p1.css">
    <title>Attendance System</title>
</head>
<body>
    <div class="indexoutbox">
        <div class="attendance">Location Based Attendance System</div>
        <br>
        <form action="index.php" method="post">
            <div class="notice"><a>If you are an admin</a></div>
            <button name="adminbtn" class="commonbtn">Admin Section</button>
        </form>
        <br>
        <form action="index.php" method="post">
        <div class="notice"><a>If you are a normal user</a></div>
            <button name="userbtn" class="commonbtn">User Section</button>
        </form>
    </div>
</body>
</html>