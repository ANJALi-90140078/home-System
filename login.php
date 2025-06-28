<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="serviceprovider/assets/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="serviceprovider/assets/css/quicksand.css">
    <link rel="stylesheet" href="serviceprovider/assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="serviceprovider/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="serviceprovider/assets/css/fontawesome.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Login</title>
</head>

<body class="login-body">

    <!--Login Wrapper-->


    <div class="container-fluid login-wrapper">
        <div class="login-box">
            <?php
            $showAlert = false;
            $showError = false;
            include 'db/dbconnect.php';
            session_start();
            $login = false;
            $showError = false;
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                // $sql = "SELECT sp.* , city.*
                // FROM sp INNER JOIN city 
                // ON sp.city_id=city.city_id";



                $sql = "SELECT `login`.* , `role`.* 
                    FROM `login` INNER JOIN `role`
                    ON `login`.role_id = `role`.role_id
                    WHERE `login`.username='$username'";



                // $sql = "SELECT * FROM `login` WHERE `username` = '$username'";
                $result  = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num == 1) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $hashed_password = $row['password'];
                        $role_name = $row['role_name'];
                        $login_id = $row['login_id'];
                        // echo $role_name;
                        // echo '<br/>';

                        if (password_verify($password, $hashed_password)) {
                            // echo $hashed_password;
                            // echo $password;

                            if ($role_name == 'serviceprovider') {
                                $fetchsp = "SELECT * FROM `sp` WHERE login_id = $login_id";
                                $fetchspresult = mysqli_query($conn, $fetchsp);
                                while ($rowsp = mysqli_fetch_assoc($fetchspresult)) {
                                    $status = $rowsp['status'];
                                    $sp_id= $rowsp['sp_id'];
                                    // echo $status;
                                }

                                if ($status == 'deactive') {
                                    $showError = "Please Wait, You can Login when Admin Approved.";
                                    $login = false;
                                }
                                if ($status == 'active') {
                                    $login = true;
                                    $_SESSION['sp_loggedin'] = true;
                                    $_SESSION['sp_username'] = $username;
                                    $_SESSION['sp_login_id'] = $login_id;
                                    $_SESSION['role_name'] = $role_name;
                                    $_SESSION['sp_id'] = $sp_id;

                                    header("Location: serviceprovider/sp_index.php");
                                }
                            }
                            if ($role_name == 'admin') {
                                $login = true;
                                $_SESSION['admin_loggedin'] = true;
                                $_SESSION['admin_username'] = $username;
                                $_SESSION['admin_login_id'] = $login_id;
                                $_SESSION['role_name'] = $role_name;
                                header("Location: admin/index.php");
                            }
                            if ($role_name == 'customer') {

                                $fetchcustomer = "SELECT * FROM `customer` WHERE login_id = $login_id";
                                $fetchcustomerresult = mysqli_query($conn, $fetchcustomer);
                                if (mysqli_num_rows($fetchcustomerresult) > 0) {
                                    while ($rowcustomer = mysqli_fetch_assoc($fetchcustomerresult)) {
                                        $customer_id = $rowcustomer['customer_id'];
                                        // echo $status;
                                    }
                                } else {
                                    $showError = "Customer ID not found. Please contact support.";
                                    $login = false;
                                }

                                $login = true;
                                $_SESSION['loggedin'] = true;
                                $_SESSION['username'] = $username;
                                $_SESSION['login_id'] = $login_id;
                                $_SESSION['role_name'] = $role_name;
                                $_SESSION['customer_id'] = $customer_id;
                                header("Location: customer/customer_index.php");
                            }
                        } else {
                            $showError = "Invalid Credentials or Password do not matched";
                        }
                    }
                } else {
                    $showError = "Invalid Username or Password";
                }
            }
            ?>

            <?php
            //Alert OR Error Message:
            if (isset($_SESSION['status'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success! </strong> ' . $_SESSION['status'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['status']);
            } elseif (isset($_SESSION['statusfail'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops! </strong> ' . $_SESSION['statusfail'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['statusfail']);
            }
            ?>
            <?php
            //show error and alerting when user login 
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
            <div class="row h-100 justify-content-center align-items-center ">


                <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
                    <h3 class="mb-2">Login</h3>
                    <small class="text-muted bc-description">Sign in with your credentials</small>
                    <form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="mt-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control mt-0" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control mt-0" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-theme btn-block p-2 mb-1">Login</button>
                            <a href="index.php"><button type="button" class="btn btn-light btn-block">Cancel</button></a>
                            <a href="signup.php">
                                <!-- <small class="text-theme"><strong>Forgot password?</strong></small> -->
                                <small class="text-theme"><strong>Don't have an account? - Signup</strong></small>
                            </a>
                            <br>
                            <a href="ForgotPassword/forgotpassword.php">
                                <!-- <small class="text-theme"><strong>Forgot password?</strong></small> -->
                                <small class="text-theme"><strong>Forgot password?</strong></small>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Login Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="serviceprovider/assets/js/jquery.min.js"></script>
    <script src="serviceprovider/assets/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="serviceprovider/assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="serviceprovider/assets/js/bootstrap.min.js"></script>

    <!--Custom Js Script-->
    <script src="serviceprovider/assets/js/custom.js"></script>
    <!--Custom Js Script-->
</body>

</html>