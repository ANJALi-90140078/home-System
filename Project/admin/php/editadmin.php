<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];


    $sql = "UPDATE member SET M_F_NAME='$name', M_USERNAME='$username', M_EMAIL='$email', M_PHONE='$contact' WHERE M_ID='$id'";

    $chek_insert = mysqli_query($con, $sql);
    if ($chek_insert) {
        //$_SESSION['success'] = "Admin Profile Added";
        echo "<script type='text/javascript'>alert('Details Updated');</script>";
        echo "<script type='text/javascript'> document.location = '../register.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../register.php'; </script>";

    }

    mysqli_close($con);
}
?>
