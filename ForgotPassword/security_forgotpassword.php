<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  <div class="container">
    <div class="title">Forgot Password</div>
    <div class="content">

      <form action="Email/securityemail.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" required>
          </div>

          <div class="flex">
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" name="email" placeholder="Enter your password" class="signupPassword" required>
              </div>
              <div class="button">
      <input type="submit" name="sendotp" value="SEND OTP">
      <center>
        <div style="position: relative; top: 18px;">
          <p class="account">Back To <a href="../index.html" id="signin1" style="color: #199280; font-weight: bolder;">Home</a> </p>
        </div>
      </center>
    
            </div>
      </form>
    </div>
  </div>


  
  <script src="script.js"></script>
  <!-- <script src="https://kit.fontawesome.com/fa82ee3476.js" crossorigin="anonymous"></script> -->
</body>

</html>