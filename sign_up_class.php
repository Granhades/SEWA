<?php

session_start();
include "db_conn.php";

if (isset($_POST['user_name']) && isset($_POST['user_last_name']) && isset($_POST['user_mail']) && isset($_POST['user_password'])) {
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname=validate($_POST['user_name']);
    $ulast_name=validate($_POST['user_last_name']);
    $umail= validate($_POST['user_mail']);
    $upass= validate($_POST['user_password']);

    if (empty($uname)) {
        header("Location: sign_up.php?error=Name is required");
        exit();
    } else if(empty($ulast_name)) {
        header("Location: sign_up.php?error=Last name is required");
        exit();
    } else if(empty($umail)) {
        header("Location: sign_up.php?error=Mail is required");
        exit();
    } else if(empty($upass)) {
        header("Location: sign_up.php?error=Password is required");
        exit();
    } else if(!(strlen($uname) <= 15)) {
        header("Location: sign_up.php?error=Invalid Name length ");
        exit();
    } else if(!(strlen($ulast_name) <= 20)) {
        header("Location: sign_up.php?error=Invalid Last Name length");
        exit();
    } else if(!(strlen($umail) <= 25)) {
        header("Location: sign_up.php?error=Invalid Mail length");
        exit();
    } else if(!(strlen($upass) <= 10)) {
        header("Location: sign_up.php?error=Invalid Password length");
        exit();
    } else {

        $todaysDate = date('d/m/Y');
        $fullInfo= $uname."','".$ulast_name."','".$umail."','".$upass."','".$todaysDate;
        $sql="INSERT INTO users (first_name,last_name,email,password,created_at)	
        values 	
        ('$fullInfo');";

        $result = mysqli_query($conn, $sql);

        $sqlTwo= "SELECT * FROM users WHERE email='$umail' AND password='$upass'";

        $resultTwo = mysqli_query($conn, $sqlTwo);

        if (mysqli_num_rows($resultTwo) === 1) {
            $row = mysqli_fetch_assoc($resultTwo);

            if ($row['email'] === $umail && $row['password'] === $upass) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['first_name'] =   $row['first_name'];
                $_SESSION['last_name'] =   $row['last_name'];
                $_SESSION['user_email'] = $row['email'];
                header("Location: profile.php");
                exit();
            } else {
                header("Location: sign_up.php?error=Incorrect Fields");
                exit();
            }

        } else {
            header("Location: sign_up.php?error=Incorrect Fields");
            exit();
        }
    }
} else {
    header("Location: sign_up.php?error=ERRROR");
    exit();
}