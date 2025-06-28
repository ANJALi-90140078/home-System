

<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['deletebtn'])) {
    $idh = $_POST['deleteidh'];
    $idm = $_POST['deleteidm'];

    $sql = "UPDATE member SET HOUSE_H_ID=NULL where M_ID='$idm'";
    $rq = mysqli_query($con, $sql);

    if ($rq) {
        
        echo "<script type='text/javascript'>alert('Deallocated Successfully');</script>";
        echo "<script type='text/javascript'> document.location = '../totalallochouse.php'; </script>";

    } else {
       
        echo "<script type='text/javascript'>alert('Something went wrong!');</script>";
        echo "<script type='text/javascript'> document.location = '../totalallochouse.php'; </script>";

    }
}

?>