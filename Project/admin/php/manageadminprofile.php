<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {
    $id = $_SESSION['amid'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    //$img = $_FILES['pic']['name'];
    //M_IMG='$img' 
   
    $sql = "UPDATE member SET M_F_NAME='$name', M_USERNAME='$username', M_EMAIL='$email', M_PHONE='$contact', 
    M_GENDER='$gender' WHERE M_ID='$id'";

    $chek_insert = mysqli_query($con, $sql);
    if ($chek_insert) 
    {

        //move_uploaded_file($_FILES["pic"]["name"], "img/" . $_FILES["pic"]["name"]);

        echo "<script type='text/javascript'>alert('Your profile is Updated');</script>";
        echo "<script type='text/javascript'> document.location = '../manageadminprofile.php'; </script>";

    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../manageadminprofile.php'; </script>";

    }

    mysqli_close($con);
}
?>