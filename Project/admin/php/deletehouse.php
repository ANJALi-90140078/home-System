<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['dltbtn'])) {

    $id = $_POST['dltid'];

    $sql = "DELETE FROM house where H_ID='$id'";
    $rq = mysqli_query($con, $sql);

    if ($rq) {
       
        echo "<script type='text/javascript'>alert('House Deleted Successfully');</script>";
        echo "<script type='text/javascript'> document.location = '../totalhouse.php'; </script>";

    } else {
        
        echo "<script type='text/javascript'>alert('House is not Deleted');</script>";
        echo "<script type='text/javascript'> document.location = '../totalhouse.php'; </script>";

    }
}

?>