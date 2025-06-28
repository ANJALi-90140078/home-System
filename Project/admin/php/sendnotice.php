
<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['send'])) {
    $subject = $_POST['subject'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO notice(NOTICE_SUBJECT,NOTICE_DATE, NOTICE_DESCRIPTION) 
        VALUES ('$subject',now(),'$desc')";

    $chek_insert = mysqli_query($con, $sql);
    if ($chek_insert) {

        echo "<script type='text/javascript'>alert('Notice has been added');</script>";
        echo "<script type='text/javascript'> document.location = '../notice.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../notice.php'; </script>";
    }

    mysqli_close($con);
}
?>