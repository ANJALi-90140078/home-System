

<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {
    $id = $_SESSION['editidss'];
    $status = $_POST['status'];
    $RC_DESC = $_POST['remark'];


    $sql = "UPDATE complaint SET C_STATUS='$status' WHERE C_ID='$id'";
    $chek_insert = mysqli_query($con, $sql);

    $sql1 = "INSERT INTO reply_complaint(RC_DATE,RC_DESC,COMPLAINT_C_ID) VALUES (now(),'$RC_DESC','$id')";
    $chekinsert = mysqli_query($con, $sql1);

    if ($chek_insert && $chekinsert) {

        echo "<script type='text/javascript'>alert('Remarks Added');</script>";
        echo "<script type='text/javascript'> document.location = '../inprogresscomplaint.php'; </script>";

    } else {

        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../inprogresscomplaint.php'; </script>";

    }

    mysqli_close($con);
}
?>