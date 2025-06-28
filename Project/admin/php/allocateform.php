<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");



if (isset($_POST['submit'])) {
    $hno = $_POST['hno'];
    $tm = $_POST['totalmember'];
    $id = $_SESSION['mid'];

    $sql = "SELECT * FROM house where H_NO=$hno";
    $chk = mysqli_query($con, $sql);

    if (mysqli_num_rows($chk) > 0) {
        while ($row = mysqli_fetch_assoc($chk)) {

            $hid = $row['H_ID'];

        }
    }

    $sql = "UPDATE member SET M_TOTAL='$tm', HOUSE_H_ID='$hid' WHERE M_ID='$id'";

    $chek_insert = mysqli_query($con, $sql);
    if ($chek_insert) {
        echo "<script type='text/javascript'>alert('House Allocated Successfully');</script>";
       echo "<script type='text/javascript'> document.location = '../allocatehouse.php'; </script>";

    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
       echo "<script type='text/javascript'> document.location = '../allocateform.php'; </script>";

    }

    




    mysqli_close($con);
}
?>
