
<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {

    $atime = $_POST['atime'];
    $gname = $_POST['gname'];
    $contact = $_POST['contact'];
    $tp = $_POST['tp'];
    $hid = $_SESSION["hhid"];

    $sql = "INSERT INTO guest(G_NO,G_NAME, G_ARRIVAL, G_CONTACT, G_STATUS, G_TYPE, HOUSE_H_ID) 
        VALUES ('$tp','$gname','$atime','$contact','Pending','Pre-Invited','$hid')";

    $chek_insert = mysqli_query($con, $sql);
    if ($chek_insert) {

        echo "<script type='text/javascript'>alert('Guest details has been added');</script>";
        echo "<script type='text/javascript'> document.location = '../preguest.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../preguest.php'; </script>";
    }

    mysqli_close($con);
}
?>