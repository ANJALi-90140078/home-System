<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['deny'])) {
    $spid = $_SESSION['sid'];
    $gid = $_POST['gid'];
   

    $sql = "UPDATE guest SET G_STATUS='Denied', SP_ID='$spid' WHERE G_ID='$gid'";

    $chek_insert = mysqli_query($con, $sql);
    if ($chek_insert) {
        //$_SESSION['success'] = "Admin Profile Added";
        echo "<script type='text/javascript'>alert('Guest is Denied!');</script>";
        echo "<script type='text/javascript'> document.location = '../viewpreinvited.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../viewpreinvited.php'; </script>";

    }

    mysqli_close($con);
}
?>