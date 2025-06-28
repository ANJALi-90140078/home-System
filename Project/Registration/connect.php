<?php
session_start();
$con=mysqli_connect("localhost","root","","sms") or die("Connection Failed...");

$errors=array();
// if(isset($_GET['username'])){
//     $username = $_GET['username'];
//     //connect to the database
//     //query the database to check the existence of the username
//     //return the result
    
// }
if (isset($_POST['submit'])) {
    $name = $_POST['fname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $cpassword = $_POST['cnf_password'];

    $username_check = "SELECT * FROM member WHERE M_USERNAME = '$username'";
    $res = mysqli_query($con, $username_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['username'] = "Username already exist!";
        // echo "usernameExist";
        // echo "Username already exist!";
        // $_SESSION['username_exists'] = true;
        echo "<script type='text/javascript'> 
        alert('User Name Already Exist!'); 
        window.location.href = './index.php';
        uname.focus();
        </script>";
        // $response = array("exists"=>true);
        // echo json_encode($response);
        // header('Location:index.php');
        
    }
    else
    {
        if ($password != $cpassword) {
            $errors['password'] = "Password and Confirm Password does not match";
            echo "<script type='text/javascript'> 
            alert('Password and Confirm Password does not match'); 
            window.location.href = './index.php';
            </script>";
        }
        
        function validate_mobile($contact){
            return preg_match('/^(0)?\d{10}$/', $contact);
        }
        
        if (!validate_mobile($contact)) {
            $errors['mobile'] = "Enter A Mobil Number  10 digit!";
            echo "<script type='text/javascript'> 
            alert('Mobile Number INVALID.');
            window.location.href = './index.php';
            </script>";
        }

        if (count($errors) == 0) {
            $sql = "INSERT INTO member(M_F_NAME,M_USERNAME,M_PASSWORD,M_EMAIL,M_PHONE,M_GENDER,ROLE_ROLE_ID) 
            VALUES ('$name','$username','$password','$email','$contact','$gender','2')";

            $chek_insert = mysqli_query($con, $sql);
            if ($chek_insert) {
                echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
                echo "<script type='text/javascript'> document.location = '/project/Login/memberlogin.php'; </script>";
            } else {
                $errors['db-error'] = "Server problem ! Please try again after some time.";
            }
        }

        
        // $uppercase = preg_match('@[A-Z]@', $password);
        // $lowercase = preg_match('@[a-z]@', $password);
        // $number = preg_match('@[0-9]@', $password);
        // $specialChars = preg_match('@[^\w]@', $password);
        
        // if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        //     $errors['strongpass'] = "Password More than 8 characters.Must Include Uppercase letter, one number and One special character.";
        // }
            
                
    }
        
    mysqli_close($con);
}
?>