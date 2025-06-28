<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {
    
    $hno = $_POST['hno'];
    $htype = $_POST['htype'];
    $mcharge = $_POST['mcharge'];

    $sql = "INSERT INTO house(H_NO,H_TYPE,H_CHARGE,SOCIETY_S_ID) VALUES ('$hno','$htype','$mcharge','1')";

    $chek_insert = mysqli_query($con, $sql);

    if ($chek_insert) {

        echo "<script type='text/javascript'>alert('House has been added');</script>";
        echo "<script type='text/javascript'> document.location = '../totalhouse.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../addhouse.php'; </script>";
    }

    mysqli_close($con);
}
?>