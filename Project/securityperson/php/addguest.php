
<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['add'])) {

    $tg = $_POST['tg'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $spid = $_SESSION['sid'];
    $hn = $_POST['hn'];

    $sql = "SELECT * FROM house where H_NO='$hn'";
      $rq = mysqli_query($con, $sql);

      if (mysqli_num_rows($rq) > 0) {
        while ($row = mysqli_fetch_assoc($rq)) {
         // $_SESSION["sid"] = $row['S_ID'];
         $hid = $row['H_ID'];
          

        }
      }

    $sql = "INSERT INTO guest(G_NO,	G_NAME, G_ARRIVAL, G_CONTACT, G_STATUS, G_TYPE, HOUSE_H_ID, SP_ID) 
            VALUES ('$tg','$name',now(),'$contact','Allowed', 'Normal','$hid','$spid')";

    $chek_insert = mysqli_query($con, $sql);

    if ($chek_insert) {

        echo "<script type='text/javascript'>alert('Guest has been added');</script>";
        echo "<script type='text/javascript'> document.location = '../viewguest.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
        echo "<script type='text/javascript'> document.location = '../addguest.php'; </script>";
    }

    mysqli_close($con);
}
?>
