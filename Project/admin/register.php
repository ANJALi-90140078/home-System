<?php
include('includes/authadmin.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="php/addadmin.php" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label id="namelbl">Name </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Ex. Ramesh Patel" required>
          </div>
          <div class="form-group">
            <label id="unamelbl">Username</label>
            <input type="text" name="username" id="uname" class="form-control" placeholder="Ex. ramesh123" required>
          </div>
          <div class="form-group">
            <label id="emaillbl">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Ex. rameshpatel@gmail.com" required>
          </div>
          <div class="form-group">
            <label id="phonelbl">Phone Number</label>
            <input type="text" name="contact" id="contact" class="form-control" placeholder="Ex. 9191919191" required>
          </div>
          <div class="form-group">
            <label id="pswdlbl">Password</label>
            <input type="password" name="password" id="pswd" class="form-control" placeholder="Enter Password" required>
          </div>
          <div class="form-group">
            <label id="cnfpswdlbl">Confirm Password</label>
            <input type="password" name="cpassword" id="cnf-pswd" class="form-control" placeholder="Confirm Password" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" id="submit" class="btn btn-success">Save</button>
        </div>
      </form>

      

      <!-- validation -->
      <script>
        document.getElementById("submit").addEventListener("click", function(event) {
          // event.preventDefault();
          // alert("Check!!");

          //textboxes
          let name = document.getElementById("name");
          let uname = document.getElementById("uname");
          let email = document.getElementById("email");
          let contact = document.getElementById("contact");
          let pswd = document.getElementById("pswd");
          let cnf_pswd = document.getElementById("cnf-pswd");

          //labels
          const namelbl = document.querySelector('#namelbl');
          const unamelbl = document.querySelector('#unamelbl');
          const emaillbl = document.querySelector('#emaillbl');
          const phonelbl = document.querySelector('#phonelbl');
          const pswdlbl = document.querySelector('#pswdlbl');
          const cnfpswdlbl = document.querySelector('#cnfpswdlbl');
          
          <?php
          if(isset($_SESSION['username_exists'])):
          ?>
            unamelbl.innerHTML = <?php echo $_SESSION['username_exists']; unset($_SESSION['username_exists'])?>
            unamelbl.style.color = 'red';
            uname.focus();
            <?php endif ?>

          function validationForm() {
            var nameRegex = /^[A-Za-z]+\s[A-Za-z]+$/;
            // var nameRegex = /^[A-Za-z]+$/;
            if (name.value.length < 5 || name.value.length > 20 || !(nameRegex.test(name.value))) {
              namelbl.innerHTML = 'Name - INVALID';
              namelbl.style.color = 'red';
              name.focus();
              name.style.borderColor = "red";
              event.preventDefault();
              return false;
            } else {
              namelbl.innerHTML = 'Name';
              namelbl.style.color = 'black';
              name.style.borderColor = "#199280";
            }

            var unameRegex = /^[A-Za-z]{3}\w+$/;
            if (!(unameRegex.test(uname.value))) {
              unamelbl.innerHTML = 'Username - INVALID';
              unamelbl.style.color = 'red';
              uname.focus();
              uname.style.borderColor = "red";
              event.preventDefault();
              return false;
            } else {
              unamelbl.innerHTML = 'Username';
              unamelbl.style.color = 'black';
              uname.style.borderColor = "#199280";
            }

            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!(emailRegex.test(email.value))) {
              emaillbl.innerHTML = 'Email - INVALID';
              emaillbl.style.color = 'red';
              email.focus();
              email.style.borderColor = "red";
              event.preventDefault();
              return false;
            } else {
              emaillbl.innerHTML = 'Email';
              emaillbl.style.color = 'black';
              email.style.borderColor = "#199280";
            }

            var conRegex = /^(0)?[6789]\d{9}$/; // /^(\+91|\+91\-|0)?[6789]\d{9}$/;
            if (!(conRegex.test(contact.value))) {
              phonelbl.innerHTML = 'Phone Number - INVALID';
              phonelbl.style.color = 'red';
              contact.focus();
              contact.style.borderColor = "red";
              event.preventDefault();
              return false;
            } else {
              phonelbl.innerHTML = 'Phone Number';
              phonelbl.style.color = 'black';
              contact.style.borderColor = "#199280";
            }

            var passRegs = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$/;
            // password must contain 1 number(0 - 9)
            // password must contain 1 uppercase letters
            // password must contain 1 lowercase letters
            // password must contain 1 non - alpha numeric number
            // password is 8 - 16 characters with no space
            if (!(passRegs.test(pswd.value))) {
              pswdlbl.innerHTML = 'Password - INVALID';
              pswdlbl.style.color = 'red';
              pswd.focus();
              pswd.style.borderColor = "red";
              event.preventDefault();
              return false;
            } else {
              pswdlbl.innerHTML = 'Password';
              pswdlbl.style.color = 'black';
              pswd.style.borderColor = "#199280";
            }

            //check with every key press
            matchPasswords();
            full_validation();
          }

          function full_validation() {
            if (namelbl.style.color == 'red' || unamelbl.style.color == 'red' || emaillbl.style.color == 'red' ||
              phonelbl.style.color == 'red' || pswdlbl.style.color == "red" || cnfpswdlbl.style.color == "red") {
              return false;
              event.preventDefault();
            } else
              return true;
          }

          validationForm();
          full_validation();
        });

        document.getElementById("cnf-pswd").addEventListener("keyup", matchPasswords);

        function matchPasswords() {
          let pswd = document.getElementById("pswd");
          let cnf_pswd = document.getElementById("cnf-pswd");
          const cnfpswdlbl = document.querySelector('#cnfpswdlbl');

          if (pswd.value !== cnf_pswd.value) {
            cnfpswdlbl.innerHTML = 'Confirm Password - NOT MATCH';
            cnfpswdlbl.style.color = 'red';
            cnf_pswd.focus();
            cnf_pswd.style.borderColor = "red";
            event.preventDefault();
            // return false;
          } else {
            cnfpswdlbl.innerHTML = 'Confirm Password';
            cnfpswdlbl.style.color = 'black';
            cnf_pswd.style.borderColor = "#199280";
          }
        }
      </script>
    </div>
  </div>
</div>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Admin Profiles
        <button type="button" class="btn btn-info ml-3" id="add_admin" data-toggle="modal" data-target="#addadminprofile">
          Add Admins
        </button>
      </h6>

      <?php
      if (isset($_SESSION['success'])) {
      ?>
        <div class="alert alert-primary mt-4" role="alert">
        <?php

        echo $_SESSION['success'];
        unset($_SESSION['success']);
      }
        ?>
        </div>


        <div class="card-body">

          <div class="table-responsive">
            <?php
            $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
            $sql = "SELECT * FROM member WHERE ROLE_ROLE_ID=1";
            $chk = mysqli_query($con, $sql);
            ?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email </th>
                  <th>Contact</th>
                  <th>EDIT </th>
                  <th>DELETE </th>
                </tr>
              </thead>

              <tbody>
                <?php
                if (mysqli_num_rows($chk) > 0) {
                  while ($row = mysqli_fetch_assoc($chk)) {
                ?>

                    <tr>
                      <td><?php echo $row['M_F_NAME']; ?> </td>
                      <td><?php echo $row['M_USERNAME']; ?> </td>
                      <td><?php echo $row['M_EMAIL']; ?> </td>
                      <td><?php echo $row['M_PHONE']; ?> </td>

                      <td>
                        <form action="editadmin.php" method="post">

                          <input type="hidden" name="editid" value="<?php echo $row['M_ID']; ?>" required>
                          <button type="submit" name="editbtn" class="btn btn-success"> EDIT</button>
                        </form>
                      </td>
                      <td>
                        <form action="php/deleteadmin.php" method="post">
                          <input type="hidden" name="deleteid" value="<?php echo $row['M_ID']; ?>" required>
                          <button type="submit" name="deletebtn" class="btn btn-danger"> DELETE</button>
                        </form>
                      </td>
                    </tr>
                <?php
                  }
                } else {
                  echo "No Record Found";
                }
                ?>

              </tbody>
            </table>

          </div>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->



  <?php
  include('includes/scripts.php');
  ?>