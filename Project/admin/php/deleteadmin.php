<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['deletebtn'])) {
    $id = $_POST['deleteid'];

    $sql = "DELETE FROM member where M_ID='$id'";
    $rq = mysqli_query($con, $sql);

    if ($rq) {
        
        echo "<script type='text/javascript'>alert('Profile Deleted Successfully');</script>";
        echo "<script type='text/javascript'> document.location = '../register.php'; </script>";

    } else {
       
        echo "<script type='text/javascript'>alert('Profile is not Deleted');</script>";
       echo "<script type='text/javascript'> document.location = '../register.php'; </script>";

    }
}

?>