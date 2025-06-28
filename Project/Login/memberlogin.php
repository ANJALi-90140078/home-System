<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hno = $_POST['hno'];

  $query = "SELECT * FROM house WHERE H_NO='$hno'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hid = $row['H_ID'];
  }

  $query = "SELECT * FROM member WHERE M_USERNAME='$username' and M_PASSWORD='$password' and HOUSE_H_ID='$hid'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($row["ROLE_ROLE_ID"] == 2) {
      $_SESSION["musername"] = $username;

      $id = $_SESSION["musername"];
      $sql = "SELECT * FROM member where M_USERNAME='$id'";
      $rq = mysqli_query($con, $sql);

      if (mysqli_num_rows($rq) > 0) {
        while ($row = mysqli_fetch_assoc($rq)) {
          $_SESSION["mid"] = $row['M_ID'];
          $_SESSION["mfname"] = $row['M_F_NAME'];
          $_SESSION["memail"] = $row['M_EMAIL'];
          $_SESSION["mphone"] = $row['M_PHONE'];
          $_SESSION["hhid"] = $row['HOUSE_H_ID'];
        }
      }

      $id = $_SESSION["hhid"];
      $sql = "SELECT * FROM house where H_ID='$id'";
      $rq = mysqli_query($con, $sql);

      if (mysqli_num_rows($rq) > 0) {
        while ($row = mysqli_fetch_assoc($rq)) {
          $_SESSION["hid"] = $row['H_ID'];
          $_SESSION["hno"] = $row['H_NO'];
          $_SESSION["htype"] = $row['H_TYPE'];
          $_SESSION["hcharge"] = $row['H_CHARGE'];
        }
      }

      header("Location: ../member/index.php");

    }
  }else {
    echo "<script type='text/javascript'>alert('Invalid Credentials! Please Try again.');</script>";
    echo "<script type='text/javascript'> document.location = '../login/memberlogin.php'; </script>";
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
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="../images/FAVICON.ico">
</head>

<body>
  <div class="container">
    <div class="title">Login For Member</div>
    <div class="content">
      <form action="#" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" required autocomplete="off">
          </div>
          <div class="input-box">
            <span class="details">House Number</span>
            <input type="number" name="hno" placeholder="Enter your House Number" required autocomplete="off">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" class="signupPassword" required autocomplete="off">
          </div>
        </div>
        <div class="flex">
          <input type="checkbox" name="" id="remember-me" style="accent-color: #199280;">
          <label for="remember-me">Remember me</label>
          <a href="/project/ForgotPassword/forgotpassword.php" class="fpass">Forgot password?</a>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Login">
          <center>
            <div style="
          position: relative;
          top: 18px;
      ">
              <p class="account">Don't have an account? <a href="/project/Registration/index.php" id="signin1"
                  style="color: #199280; font-weight: bolder;">Create now!</a> </p>
            </div>
          </center>



        </div>
      </form>
    </div>
  </div>
  <script src="script.js"></script>
  <script src="https://kit.fontawesome.com/fa82ee3476.js" crossorigin="anonymous"></script>
</body>

</html>