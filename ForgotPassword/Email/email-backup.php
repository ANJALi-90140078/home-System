<?php
include '../../db/dbconnect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


session_start();
// $con = mysqli_connect("localhost", "root", "", "hs") or die("Connection Failed...");

if (isset($_POST['sendotp'])) {
    $name = htmlentities($_POST['username']);
    $email = htmlentities($_POST['email']);
    $subject = "Reset Password";



    // $query = "SELECT * FROM customer WHERE M_USERNAME='$name' and M_EMAIL='$email'";
    // $result = mysqli_query($con, $query);

    //fetch login id from login table, because we want to check username and email both are same or not. username from login table & email from customer table
    $fetch_loginid = "SELECT * FROM `login` where username ='$name'";
    $fetch_result = mysqli_query($conn, $fetch_loginid);
    $numfetch = mysqli_num_rows($fetch_result);
    if ($numfetch > 0) {
        $login_row = mysqli_fetch_assoc($fetch_result);
        $login_id = $login_row['login_id'];
        $fusername = $login_row['username'];
        // echo $fusername;

        //now we will find email from customer table with the help of login_id
        $query = "SELECT `email` FROM customer WHERE login_id = '$login_id'";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);

        //if email found then we put this email in one variable
        if ($num > 0) {

            $fetch = mysqli_fetch_assoc($result);
            // $fusername = $fetch['M_USERNAME'];
            $femail = $fetch['email'];


            if ($name == $fusername && $email == $femail) {

                $otp = rand(1111, 9999);

                $message = "Hey $name! Here is your One Time Password : <b>$otp</b> valid for 5 minutes. ";

                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'deepkorat13@gmail.com';
                $mail->Password = 'bmuywrgxxzdaxurv';
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl';
                $mail->isHTML(true);
                $mail->setFrom($email, $name);
                $mail->addAddress($email);
                $mail->Subject = ($subject);
                $mail->Body = $message;
                $mail->send();

                setcookie("otp", $otp, time() + 300);
                setcookie("mname", $name, time() + 300);

                echo "<script type='text/javascript'>alert('We have sent you OTP at $email');</script>";
                echo "<script type='text/javascript'> document.location = '../otp.php'; </script>";
            } else {
                $_SESSION['statusfail'] = "Invalid Credentials! Please Try again.";
                header("location: ../forgotpassword.php");
            }
        } else {
            $_SESSION['statusfail'] = "Email doesn't exist Please Try again.";
            header("location: ../forgotpassword.php");
        }
    } else {
        $_SESSION['statusfail'] = "Username doesn't exist! Please Try again.";
        header("location: ../forgotpassword.php");
    }
}

if (isset($_POST['verifyotp'])) {

    if (isset($_COOKIE["otp"])) {
        $otp = $_COOKIE["otp"];
    } else {
        echo "<script type='text/javascript'>alert('Please Generate OTP!');</script>";
        echo "<script type='text/javascript'> document.location = '../otp.php'; </script>";
        die();
    }

    $totp = htmlentities($_POST['otp']);

    if ($otp <> $totp) {
        $_SESSION['statusfail'] = "Invalid OTP! Please try again.";
        header("location: ../otp.php");
    } else {
        // header("location: ../resetpassword.php");
        $_SESSION['resetpassword'] = true;
        echo "<script type='text/javascript'> document.location = '../resetpassword.php'; </script>";
    }
}


if (isset($_POST['newpass'])) {
    $pass = htmlentities($_POST['pass']);
    $cpass = htmlentities($_POST['cpass']);
    $mname = $_COOKIE["mname"];

    if ($pass <> $cpass) {
        $_SESSION['statusfail'] = "Both Password Not Matched! Please Try again.";
        header("location: ../resetpassword.php");
    } else {
        // $query = "UPDATE member SET M_PASSWORD='$pass' WHERE M_USERNAME='$mname'";
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $query = "UPDATE `login` SET `password`='$hash' WHERE username='$mname'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            //unset resetpasswrod because now user can't open direct resetpassword page.
            unset($_SESSION['resetpassword']);
            $_SESSION['status'] = "Your Password Is Updated! Now, you can login with your account";
            echo "<script type='text/javascript'> document.location = '../../login.php'; </script>";
        } else {
            echo "<script type='text/javascript'>alert('Failed To Update Password!');</script>";
            echo "<script type='text/javascript'> document.location = '../resetpassword.php'; </script>";
        }
    }
}
