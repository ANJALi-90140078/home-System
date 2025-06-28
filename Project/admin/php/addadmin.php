<link rel="icon" type="image/x-icon" href="img/FAVICON.ico">

<?php
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $contact = $_POST['contact'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];

   $sql = "INSERT INTO member(M_F_NAME,M_USERNAME,M_PASSWORD,M_EMAIL,M_PHONE,ROLE_ROLE_ID) 
      VALUES ('$name','$username','$password','$email','$contact','1')";

   $chek_insert = mysqli_query($con, $sql);
   if ($chek_insert) {
      $_SESSION['success'] = "Admin Profile Added";
      echo "<script type='text/javascript'>
         alert('Registration Sucessfull!');
         document.location = '../register.php';
         </script>";
   } else {
      echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
      echo "<script type='text/javascript'> document.location = '../register.php'; </script>";
   }

   mysqli_close($con);
}
?>