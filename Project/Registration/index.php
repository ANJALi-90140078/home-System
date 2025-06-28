<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./RegStyle.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="../images/FAVICON.ico">
</head>

<body>
  <div class="container">
    <div class="title">Registration</div>

    

    <div class="content">
      <form action="connect.php" id="form" method="post" name="RegForm">
        <div class="user-details">
          <div class="input-box">
            <span class="details" id="fnamelbl">Full Name</span>
            <input type="text" class="textbox" id="fname" name="fname" placeholder="Ex. Jonny Cox"pattern="^[a-zA-Z\s]+$ required>
          </div>
          <div class="input-box">
            <span class="details" id="unamelbl">Username</span>
            <input type="text" class="textbox" id="uname" name="username" placeholder="Ex. jonny123" pattern="^[a-zA-Z0-9_]{4,}$"required>
          </div>
          <div class="input-box">
            <span class="details" id="emaillbl">Email</span>
            <input type="email" class="textbox" id="email" name="email" placeholder="Ex. jonny1@gmail.com" required>
          </div>
          <div class="input-box">
            <span class="details" id="phonelbl">Phone Number</span>
            <input type="text" class="textbox" id="contact" name="contact" placeholder="Ex. 9191919191"pattern="^\d{10}$" required>
          </div>
          <div class="input-box">
            <span class="details" id="pswdlbl">Password</span>
            <input type="password" class="signupPassword textbox" id="pswd" name="password" value="" placeholder="Enter your password" required>
            <!-- <i class="fa-sharp fa-solid fa-eye-slash showHidepw1" style="
            position: absolute;
            font-size: 1rem;
            cursor: pointer;
            right: 713px;
            top: 343px;
        "></i> -->
          </div>
          <div class="input-box">
            <span class="details" id="cnfpswdlbl">Confirm Password</span>
            <input type="text" class="signupPassword textbox" id="cnf-pswd" name="cnf_password" value="" onkeyup="validatePasswords()" placeholder="Confirm your password" required>
            <!-- <i class="fa-sharp fa-solid fa-eye-slash showHidepw1" style="
            position: absolute;
            font-size: 1rem;
            cursor: pointer;
            right: 373px;
            top: 343px;
        "></i> -->
          </div>

        </div>
        <div class="gender-details">
          <input type="radio" id="dot-1" name="gender" value="male" checked>
          <input type="radio" id="dot-2" name="gender" value="female">
          <input type="radio" id="dot-3" name="gender" value="none">
          <span class="gender-title" id="genderlbl">Gender</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <!-- <input type="submit" name="submit" value="Register" onclick="validationForm()"> -->
          <input type="submit" id="submit" name="submit" value="Register" >
        </div>
        <center>
          <p class="account">Already have an account? <a href="../Login/memberlogin.php" id="signin1" style="color: #199280; font-weight: bolder;">Login now</a> </p>
        </center>
      </form>
    </div>
  </div>

  <!-- <script src="./RegScript.js?v=<?php //echo time(); ?>"></script> -->
  <script src="./RegScript.js"></script>
  <script src="https://kit.fontawesome.com/fa82ee3476.js" crossorigin="anonymous"></script>
</body>

</html>
<!-- CodingLab - youtube.com/codinglabyt -->