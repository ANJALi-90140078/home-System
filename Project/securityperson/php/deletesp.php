<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['deletebtn'])) {
    $id = $_POST['deleteid'];

    $sql = "DELETE FROM security_person where S_ID='$id'";
    $rq = mysqli_query($con, $sql);

    if ($rq) {
        //$_SESSION['success'] = "Profile Deleted Successfully";
        echo "<script type='text/javascript'>alert('Profile Deleted Successfully!');</script>";
           echo "<script type='text/javascript'> document.location = '../register.php'; </script>";
       
    } else {
        //$_SESSION['success'] = "Profile is not Deleted";
        echo "<script type='text/javascript'>alert('Profile is not Deleted');</script>";
        echo "<script type='text/javascript'> document.location = '../register.php'; </script>";
        
    }
}

?>