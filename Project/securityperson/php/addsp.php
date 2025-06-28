

<?php
$con=mysqli_connect("localhost","root","","sms") or die("Connection Failed...");

if (isset($_POST['submit'])) 
{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

        $sql = "INSERT INTO security_person(S_F_NAME,S_USERNAME,S_PASSWORD,S_EMAIL,S_CONTACT,ROLE_ROLE_ID) 
        VALUES ('$name','$username','$password','$email','$contact','3')";

        $chek_insert = mysqli_query($con, $sql);
        if ($chek_insert) 
        {
        //    $_SESSION['success'] = "Admin Profile Added";
           echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
           echo "<script type='text/javascript'> document.location = '../register.php'; </script>";
        } else 
        {
           echo "<script type='text/javascript'>alert('Something went wrong!!');</script>";
          echo "<script type='text/javascript'> document.location = '../register.php'; </script>";
            
        }
    
       mysqli_close($con);
}
?>
