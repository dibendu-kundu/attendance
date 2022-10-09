<?php

session_start();

$connect=mysqli_connect('sql105.epizy.com','epiz_32732001','PalfRQZ1PmRh','epiz_32732001_userbase') or die('Connection Error!');

// userbase->database name
// user->table name
// username, mobile, password->column name
// hostname->localhost   username of database->root    password of user of database->''(blank)
// name of the database-> userbase


// register section

if(isset($_POST['registerbtn'])){
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // mobile number is taken as primary key which should be unique
    // $check = mysqli_query($connect,"SELECT `username` FROM `user` WHERE mobile='$mobile' AND username='$username'");

    $check = mysqli_query($connect,"SELECT `mobile` FROM `user` WHERE mobile='$mobile'");
    // checking if user is already exixting or not
    // if already found then that user can not be registerd again
    
    if(mysqli_num_rows($check)>0){ 
        echo '<script>
            alert("This mobile number is already registered");
            // redirect again to register page

            window.location="register.php";
        </script>';
    }

    // if not present then register as a new user
    else{
        $insert = mysqli_query($connect,"INSERT INTO `user` VALUES('$username','$mobile','$password')");
    }

    // if new user is registered then redirect that person to personal homepage
    if($insert){
        // global variable
        $_SESSION['username']=$username;
        echo '<script>
            alert("Registration Successful");
            window.location="homepage.php";
        </script>';
    }
}

// log in section

if(isset($_POST['loginbtn'])){
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $check = mysqli_query($connect,"SELECT username FROM user WHERE mobile='$mobile' AND password='$password'");
    
    if(mysqli_num_rows($check)>0){
        $fetch=mysqli_fetch_array($check);
        $username=$fetch['username'];

        $_SESSION['username']=$username;
        echo '<script>
            alert("Login Successful");
            window.location="homepage.php";
        </script>';
    }
    else{
        echo '<script>
            alert("Login failed");
            window.location="login.php";
        </script>';
    }
}

// logout section

if(isset($_POST['logoutbtn'])){
    session_destroy();
    echo '<script>
        alert("Logged Out Succesfully");
        window.location="login.php";
    </script>';
}
?>