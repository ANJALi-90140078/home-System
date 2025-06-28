
<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $desc = $_POST['desc'];
    $id = $_POST['id'];

    $sql = "INSERT INTO complaint(C_SUBJECT,C_DATE, C_DETAILS,C_STATUS,MEMBER_M_ID) 
        VALUES ('$subject',now(),'$desc','Pending','$id')";

    $chek_insert = mysqli_query($con, $sql);
    if ($chek_insert) {

        echo "<script type='text/javascript'>alert('Complaint Sended');</script>";
        echo "<script type='text/javascript'> document.location = '../makecomplaint.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../viewcomplaint.php'; </script>";
    }

    mysqli_close($con);
}
?>