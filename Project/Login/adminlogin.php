<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM member WHERE M_USERNAME='$username' and M_PASSWORD='$password'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);


    if ($row["ROLE_ROLE_ID"] == 1) {
      $_SESSION['ausername'] = $username;

      $id = $_SESSION["ausername"];
      $sql = "SELECT * FROM member where M_USERNAME='$id'";
      $rq = mysqli_query($con, $sql);

      if (mysqli_num_rows($rq) > 0) {
        while ($row = mysqli_fetch_assoc($rq)) {
          $_SESSION["amid"] = $row['M_ID'];
          $_SESSION["amfname"] = $row['M_F_NAME'];
          $_SESSION["amemail"] = $row['M_EMAIL'];
          $_SESSION["amphone"] = $row['M_PHONE'];
          $_SESSION["ahhid"] = $row['HOUSE_H_ID'];
        }
      }

      header("Location: ../admin/index.php");
    }
  } else {
    //$_SESSION['ainvalid'] = "Invalid Credentials! Please Try again.";
    echo "<script type='text/javascript'>alert('Invalid Credentials! Please Try again.');</script>";
    echo "<script type='text/javascript'> document.location = '../login/adminlogin.php'; </script>";
  }

  mysqli_close($con);
}

?>


<script type="text/javascript">
  function preventBack() {
    window.history.forward();
  }
  setTimeout("preventBack()", 0);
  window.onunload = function() {
    null
  };
</script>


<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="../images/FAVICON.ico">

</head>

<body>
  <div class="container">
    <div class="title">Login For Admin</div>
    <div class="content">
      <form action="#" method="post">





        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" class="signupPassword" required>
            <!-- <i class="fa-sharp fa-solid fa-eye-slash showHidepw1" style="position: absolute; font-size: 1rem; cursor: pointer; right: 397px; top: 340px;"></i> -->
          </div>
        </div>
        <div class="flex">
          <input type="checkbox" name="" id="remember-me" style="accent-color: #199280;">
          <label for="remember-me">Remember me</label>
          <a href="../ForgotPassword/forgotpassword.php" class="fpass">Forgot password?</a>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Login">
        



        </div>
      </form>
    </div>
  </div>
  <script src="script.js"></script>
  <script src="https://kit.fontawesome.com/fa82ee3476.js" crossorigin="anonymous"></script>
</body>

</html>