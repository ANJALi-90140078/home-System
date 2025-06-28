<?php
include('includes/authadmin.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Manage Profile</h6>
        </div>

        <div class="card-body">


            <?php
            $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

            $id = $_SESSION["sid"];
            $sql = "SELECT * FROM security_person where S_ID='$id'";
            $rq = mysqli_query($con, $sql);

            if (mysqli_num_rows($rq) > 0) {
                while ($row = mysqli_fetch_assoc($rq)) {
            ?>
                    <form action="php/manageprofile.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" class="form-control" value="<?php echo $_SESSION["sid"]; ?>">

                        <div class="form-group pl-4 pr-4">
                            <label id="namelbl"> <b>Name </b></label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['S_F_NAME']; ?>">
                        </div>
                        <div class="form-group pl-4 pr-4">
                            <label id="unamelbl"><b> Username</b> </label>
                            <input type="text" name="username" id="uname" class="form-control" value="<?php echo $row['S_USERNAME']; ?>">
                        </div>
                        <div class="form-group pl-4 pr-4">
                            <label id="emaillbl"> <b>Email</b> </label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['S_EMAIL']; ?>">
                        </div>
                        <div class="form-group pl-4 pr-4">
                            <label id="phonelbl"> <b>Contact</b> </label>
                            <input type="tel" name="contact" id="contact" class="form-control" value="<?php echo $row['S_CONTACT']; ?>">
                        </div>

                        <!-- <div class="form-group pl-4 pr-4">
                    <label> <b>Profile Picture</b> </label>
                    <input type="file" name="pic" accept=".jpg,.png,.jpeg" class="form-control">
                </div> -->
                <?php
                }
            }
                ?>



                <center>
                    <div class="btn-group btn-group-lg">
                        <button type="submit" name="submit" id="submit" class="btn btn-success">Update</button>
                    </div>
                </center>

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

                            //labels
                            const namelbl = document.querySelector('#namelbl');
                            const unamelbl = document.querySelector('#unamelbl');
                            const emaillbl = document.querySelector('#emaillbl');
                            const phonelbl = document.querySelector('#phonelbl');

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
                    </script>



        </div>
    </div>

</div>

<?php
include('includes/scripts.php');
?>