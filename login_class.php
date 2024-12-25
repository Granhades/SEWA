<?php

session_start();
include "db_conn.php";

if (isset($_POST['new_sign_up_btn'])) {
    header("Location: sign_up.php");
    exit();
} 

if (isset($_POST['user_mail']) && isset($_POST['user_password'])) {
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $umail= validate($_POST['user_mail']);
    $upass= validate($_POST['user_password']);

    if (empty($umail)) {
        header("Location: log_in.php?error=Mail is required");
        exit();
    } else if(empty($upass)) {
        header("Location: log_in.php?error=Password is required");
        exit();
    } else {
        $sql= "SELECT * FROM users WHERE email='$umail' AND password='$upass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $umail && $row['password'] === $upass) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['first_name'] =   $row['first_name'];
                $_SESSION['last_name'] =   $row['last_name'];
                $_SESSION['user_email'] = $row['email'];
                header("Location: profile.php");
                exit();
            } else {
                header("Location: log_in.php?error=Incorrect Mail and/or Password");
                exit();
            }

        } else {
            header("Location: log_in.php?error=Incorrect Mail and/or Password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}

/* include all this as another page then direct to whatever page you want to be directed in the last else */