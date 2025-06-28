
<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {
    $id = $_POST['editid'];
    $hno = $_POST['hno'];
    $htype = $_POST['htype'];
    $mcharge = $_POST['mcharge'];


    $sql = "UPDATE house SET H_NO='$hno', 
            H_TYPE='$htype', H_CHARGE='$mcharge' WHERE H_ID='$id'";

    $chek_insert = mysqli_query($con, $sql);
    if ($chek_insert) {

        echo "<script type='text/javascript'>alert('House Details Updated');</script>";
        echo "<script type='text/javascript'> document.location = '../totalhouse.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../edithouse.php'; </script>";

    }

    mysqli_close($con);
}
?>
