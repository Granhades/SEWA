<?php

session_start();
include "db_conn.php";

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
        header("Location: pay_experience.php?error=Mail is required");
        exit();
    } else if(empty($upass)) {
        header("Location: pay_experience.php?error=Password is required");
        exit();
    } else {
        $sql= "SELECT * FROM users WHERE email='$umail' AND password='$upass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $umail && $row['password'] === $upass) {

                $todaysDate = date('d/m/Y');
                $fullInfo= $row['id']."','".$_POST['expId']."','".$todaysDate."','".$_POST['fullInfo'];
                $sql="INSERT INTO bookings (user_id,experience_id,date,recipe)	
                values 	
                ('$fullInfo');";

                $result = mysqli_query($conn, $sql);
                header("Location: index.php");
                exit();
                
            } else {
                header("Location: pay_experience.php?error=Incorrect Mail and/or Password");
                exit();
            }

        } else {
            header("Location: pay_experience.php?error=Incorrect Mail and/or Password");
            exit();
        }
    }
} else {
    header("Location: pay_experience.php");
    exit();
}
