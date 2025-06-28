
<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['dltbtn'])) {

    $id = $_POST['dltid'];

    $sql = "DELETE FROM member where M_ID='$id'";
    $rq = mysqli_query($con, $sql);

    if ($rq) {
       
        echo "<script type='text/javascript'>alert('Data Deleted Successfully');</script>";
        echo "<script type='text/javascript'> document.location = '../allocatehouse.php'; </script>";

    } else {
        
        echo "<script type='text/javascript'>alert('Not Deleted');</script>";
        echo "<script type='text/javascript'> document.location = '../allocatehouse.php'; </script>";

    }
}

?>