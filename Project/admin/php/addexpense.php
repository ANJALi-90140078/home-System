
<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['add'])) {

    $subject = $_POST['subject'];
    $amount = $_POST['amount'];
    $towhome = $_POST['towhome'];

    $sql = "INSERT INTO expense(E_DATE,	E_SUBJECT, E_AMOUNT, E_TOWHOME, SOCIETY_S_ID ) 
            VALUES (now(),'$subject','$amount','$towhome','1')";

    $chek_insert = mysqli_query($con, $sql);

    if ($chek_insert) {

        echo "<script type='text/javascript'>alert('Expense has been added');</script>";
        echo "<script type='text/javascript'> document.location = '../viewexpense.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../expense.php'; </script>";
    }

    mysqli_close($con);
}
?>