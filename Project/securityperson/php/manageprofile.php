<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {
    $id = $_SESSION["sid"];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    // $img = $_FILES['pic']['name'];
   
    $sql = "UPDATE security_person SET S_F_NAME='$name', S_USERNAME='$username', S_EMAIL='$email', S_CONTACT='$contact' WHERE S_ID='$id'";

    $chek_insert = mysqli_query($con, $sql);
    if ($chek_insert) 
    {

       // move_uploaded_file($_FILES["pic"]["name"], "img/" . $_FILES["pic"]["name"]);

        echo "<script type='text/javascript'>alert('Your profile is Updated');</script>";
        echo "<script type='text/javascript'> document.location = '../manageprofile.php'; </script>";

    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../manageprofile.php'; </script>";

    }

    mysqli_close($con);
}
?>