<?php
define('MYSITE', true);
include 'db/dbconnect.php';

$title = 'Register Service Provider';
$css_directory = 'css/main.min.css';
$css_directory2 = 'css/main.min.css.map';
include 'includes/header.php';
include 'includes/navbar.php';
?>


<?php
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sp_name = $_POST["sp_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $city_name = $_POST["sp_city"];
    $pincode = $_POST["pincode"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];


    $existsql = "SELECT * FROM `login` where username ='$username' ";
    $existresult = mysqli_query($conn, $existsql);
    $numexist = mysqli_num_rows($existresult);
    if ($numexist > 0) {
        $showError = "Username is already existing.";
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sp_name = $_POST["sp_name"];
            $phone = $_POST["phone"];
        
            // Validation
            if (!preg_match("/^[a-zA-Z\s]{3,}$/", $sp_name)) {
                $showError = "Name should only contain letters and spaces, and must be at least 3 characters long.";
            } if (!preg_match("/^\d{10}$/", $phone)) {
                $showError = "Phone number must be a 10-digit number.";
            } 
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            // insert into LOGIN TABLE only USERNAME & PASSWORD.
            $sql = "INSERT INTO `login` (`login_id` , `role_id`, `username`,`password`) VALUES ('', '2', '$username', '$hash')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                //fetch login id from login table.
                $fetch_loginid = "SELECT `login_id` FROM `login` where username ='$username'";
                $fetch_result = mysqli_query($conn, $fetch_loginid);
                $login_row = mysqli_fetch_assoc($fetch_result);
                $login_id = $login_row['login_id'];

                //fetch city is from city table.
                $fetch_cityid = "SELECT `city_id` FROM `city` where city_name ='$city_name'";
                $fetch_city_result = mysqli_query($conn, $fetch_cityid);
                $city_row = mysqli_fetch_assoc($fetch_city_result);
                $city_id = $city_row['city_id'];
                // $sql2 = "INSERT INTO `sp` (`sp_id`, `login_id`, `sp_name`, `email`, `phone`, `city_id`, `pincode`) VALUES (NULL, '16', 'deepkorat', 'deepkorat213@gmail.com', '9687480417', '5', '341262')";
                $sql2 = "INSERT INTO `sp` (`sp_id`, `login_id`, `sp_name`, `email`, `phone`, `city_id`, `pincode`, `status`) VALUES ('', '$login_id', '$sp_name', '$email','$phone','$city_id', '$pincode', 'deactive')";
                $result2 = mysqli_query($conn, $sql2);
                if ($result2) {
                    $showAlert = "Your account is now created.";
                }}
            } else {
                $showError = "Something went wrong!";
            }
        } else {
            $showError = "Password do no match!";
        }
    }
    
    }
    ?>
}

?>




<body style="background-image: linear-gradient(-145deg,#f5faff,#87b0de);">

    <?php

    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> ' . $showAlert . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    }
    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry! </strong> ' . $showError . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    }

    ?>





    <!-- container -->
    <div class="container">
        <div class="mx-auto" style="width: 75%; border: 2px solid black; padding: 3em;">
            <h2 class="pb-2 text-c1-1">Register as a Service provider</h2>
            <div class="bg-c1-1" style="width:430px; height: 3px; margin-top:-10px;"></div>
            <hr class="pt-3">


            <form class="needs-validation" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" novalidate>

                <!-- name & email line -->
                <div class="form-row">
                    <div class="form-group col-md-12 input-group-sm">
                        <label for="spname">Name</label>
                        <input type="text"  class="form-control required asterisk_input" id="sp_name" name="sp_name" pattern="^[a-zA-Z\s]{3,}$"required>
                        <div class="invalid-feedback">
                        Name should only contain letters and spaces,Please enter minimum 3 characters.
                        </div>

                    </div>
                    <div class="form-group col-md-6 input-group-sm">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailFeedback" required>
                        <div id="emailFeedback" class="invalid-feedback">
                            Please provide a valid email.
                        </div>
                    </div>
                    <div class="form-group col-md-6 input-group-sm">
                        <label for="phone">Phone No.</label>
                        <input type="tel" class="form-control" required pattern="^\d{10}$" name="phone" aria-describedby="phoneFeedback" data-for="phoneNumber">
                        <!-- <input type="tel" class="form-control" pattern="\d{10}" data-for="phoneNumber" name="phone" aria-describedby="phoneFeedback" required> -->
                        <div id="phoneFeedback" class="invalid-feedback">
                            Please provide a valid Phone number.
                        </div>
                    </div>
                </div>






                <!-- city line -->
                <div class="form-row">
                    <div class="form-group col-md-4 input-group-sm">
                        <label for="city">City</label>
                        <select id="sp_city" class=" custom-select" name="sp_city" required>
                            <option value="">Choose City</option>
                            <?php // category view code. Data get from category table
                            $sql = "SELECT * FROM `city`";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $city_name = $row['city_name'];
                                    echo '<option value="' . $city_name . '">' . $city_name . '</option>';
                                }
                            }
                            ?>
                            <!-- <option value="two">.this..</option>
                            <option value="three">.and..</option>
                            <option value="five">.that..</option> -->
                        </select>
                        <div class="invalid-feedback">Please choose a city.</div>
                    </div>
                    <div class="form-group col-md-2 input-group-sm">
                        <label for="Pincode">Pincode</label>
                        <input type="text" class="form-control" pattern="\d{6}" name="pincode" id="pincode" required>
                    </div>
                </div>
                <hr class="mt-4 mb-4">

                <!-- usename line -->
                <div class="form-row mt-4">
                    <div class="form-group col-md-6">
                        <label for="inlineFormInputGroupUsername2">Create Username</label>
                        <div class="input-group mb-2 mr-sm-2 input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-c1-1 text-light">@</div>
                            </div>
                            <input type="text" class="form-control" pattern="(?=.*[a-z]).{4,}" id="username" name="username" placeholder="sahil_18" aria-describedby="inputGroupPrepend" required>

                            <div class="invalid-feedback">
                                Please choose a right username.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- password line -->
                <div class="form-row">
                    <div class="form-group col-md-6 input-group-sm">
                        <label for="password">Create Password</label>
                        <!-- <input type="password" class="form-control" id="password" name="password"  required> -->
                        <input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <div id="phoneFeedback" class="invalid-feedback">
                            Must contain at least one number and one uppercase and lowercase letter, and at least 8 or
                            more characters.
                        </div>
                    </div>
                    <div class="form-group col-md-6 input-group-sm">
                        <label for="confirmpassword">Confirm Password</label>
                        <!-- <input type="password" class="form-control" id="cpassword" name="cpassword" required> -->
                        <input type="password" class="form-control" id="cpassword" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <div id="phoneFeedback" class="invalid-feedback">
                            Password does not matched.
                        </div>
                    </div>
                </div>

                <a href=""><button type="submit" class="btn btn-c1-1">Sign Up</button></a>
                <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
            </form>

        </div>
    </div>



    <!-- form validation feedback -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>



    <?php
    include 'includes/footer.php';
    ?>