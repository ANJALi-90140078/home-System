<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT S_USERNAME,S_PASSWORD FROM security_person WHERE S_USERNAME='$username' and S_PASSWORD='$password'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    $fetch = mysqli_fetch_assoc($result);
    $fusername = $fetch['S_USERNAME'];
    $fpassword = $fetch['S_PASSWORD'];


    if ($username == $fusername && $password == $fpassword) {
      $_SESSION["susername"] = $username;

      $id = $_SESSION["susername"];
      $sql = "SELECT * FROM security_person where S_USERNAME='$id'";
      $rq = mysqli_query($con, $sql);

      if (mysqli_num_rows($rq) > 0) {
        while ($row = mysqli_fetch_assoc($rq)) {
          $_SESSION["sid"] = $row['S_ID'];
          $_SESSION["sfname"] = $row['S_F_NAME'];
          $_SESSION["semail"] = $row['S_EMAIL'];
          $_SESSION["sphone"] = $row['S_CONTACT'];

        }
      }
      header("Location: ../securityperson/index.php");

    } else {
      //$_SESSION['invalid'] = "Invalid Credentials! Please Try again.";
     echo "<script type='text/javascript'>alert('Invalid Credentials! Please Try again.');</script>";
     echo "<script type='text/javascript'> document.location = '../login/securitylogin.php'; </script>";

    }

  } else {
    //$_SESSION['invalid'] = "Invalid Credentials! Please Try again.";
    echo "<script type='text/javascript'>alert('Invalid Credentials! Please Try again.');</script>";
    echo "<script type='text/javascript'> document.location = '../login/securitylogin.php'; </script>";
  }

  mysqli_close($con);
}
?>




<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>


<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Login For Security Staff</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="../images/FAVICON.ico">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="title">Login For Security Staff</div>
    <div class="content">

<!-- <?php  
if(isset($_SESSION['invalid']))
{?>
    <div class="alert alert-danger mt-3">
  <strong><?php echo $_SESSION['invalid']; ?></strong>
</div>
<?php } ?> -->

      <form action="#" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" class="signupPassword" required>
            <!-- <i class="fa-sharp fa-solid fa-eye-slash showHidepw1"
              style="position: absolute; font-size: 1rem; cursor: pointer; right: 397px; top: 340px;"></i> -->
          </div>
        </div>
        <div class="flex">
          <input type="checkbox" name="" id="remember-me" style="accent-color: #199280;">
          <label for="remember-me">Remember me</label>
          <a href="../ForgotPassword/security_forgotpassword.php" class="fpass">Forgot password?</a>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Login">
          <!-- <center>
          <div style="
          position: relative;
          top: 18px;
      "><p class="account">Don't have an account? <a href="/project/Registration/index.php" id="signin1" style="color: #199280; font-weight: bolder;">Create now!</a> </p></div>
        </center>

        <center>
          <div style="
          position: relative;
          top: 18px;
      "><p class="account">Security Staff? <a href="/project/Registration/index.php" id="signin1" style="color: #199280; font-weight: bolder;">Login Here</a> </p></div>
        </center> -->



        </div>
      </form>
    </div>
  </div>
  <script src="script.js"></script>
  <script src="https://kit.fontawesome.com/fa82ee3476.js" crossorigin="anonymous"></script>
</body>

</html>