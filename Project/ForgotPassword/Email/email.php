<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


// session_start();
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['sendotp'])) {
    $name = htmlentities($_POST['username']);
    $email = htmlentities($_POST['email']);
    $subject = "Reset Password";

   

    $query = "SELECT * FROM member WHERE M_USERNAME='$name' and M_EMAIL='$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $fetch = mysqli_fetch_assoc($result);
        $fusername = $fetch['M_USERNAME'];
        $fpassword = $fetch['M_EMAIL'];


        if ($name == $fusername && $email == $fpassword) {

            $otp = rand(1111, 9999);

            $message = "Hey $name! Here is your One Time Password : <b>$otp</b> valid for 5 minutes. ";

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'workforehousing@gmail.com';
            $mail->Password = 'cqqnwdxghjauprdz';
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

            echo "<script type='text/javascript'>alert('Invalid Credentials! Please Try again.');</script>";
            echo "<script type='text/javascript'> document.location = '../forgotpassword.php'; </script>";
        }
    } else {

        echo "<script type='text/javascript'>alert('Invalid Credentials! Please Try again.');</script>";
        echo "<script type='text/javascript'> document.location = '../forgotpassword.php'; </script>";
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
        echo "<script type='text/javascript'>alert('Invalid OTP! Please Try again.');</script>";
        echo "<script type='text/javascript'> document.location = '../otp.php'; </script>";
    } else {
        echo "<script type='text/javascript'> document.location = '../resetpassword.php'; </script>";
    }
}


if (isset($_POST['newpass'])) {
    $pass = htmlentities($_POST['pass']);
    $cpass = htmlentities($_POST['cpass']);
    $mname = $_COOKIE["mname"];

    if ($pass <> $cpass) {
        echo "<script type='text/javascript'>alert('Both Password Not Matched! Please Try again.');</script>";
        echo "<script type='text/javascript'> document.location = '../resetpassword.php'; </script>";
    } 
        else {
            $query = "UPDATE member SET M_PASSWORD='$pass' WHERE M_USERNAME='$mname'";
            $result = mysqli_query($con, $query);
                if ($result) {
                    echo "<script type='text/javascript'>alert('Your Password Is Updated!');</script>";
                    echo "<script type='text/javascript'> document.location = '../../Login/adminlogin.php'; </script>";
                    } else {
                            echo "<script type='text/javascript'>alert('Failed To Update Password!');</script>";
                           echo "<script type='text/javascript'> document.location = '../resetpassword.php'; </script>";
                    }
    }
}
?>