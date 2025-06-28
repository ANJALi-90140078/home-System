<?Php
session_start();

?>

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
    <link rel="stylesheet" href="../serviceprovider/assets/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="../serviceprovider/assets/css/quicksand.css">
    <link rel="stylesheet" href="../serviceprovider/assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="../serviceprovider/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../serviceprovider/assets/css/fontawesome.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Forgot Password</title>
</head>

<body class="login-body">

    <!--Login Wrapper-->


    <div class="container-fluid login-wrapper">
        <div class="login-box">

             <!-- Message section -->
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

            <div class="row h-100 justify-content-center align-items-center ">



                <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
                    <h3 class="mb-2">Forgot Password</h3>
                    <small class="text-muted bc-description">Enter your username & email and we'll send you a link to get back into your account.</small>
                    <br>
                    <br>
                    <form action="Email/email.php" method="post" class="mt-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            </div>
                            <!-- <span class="details">Username</span> -->
                            <input type="text" class="form-control mt-0" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            </div>
                            <!-- <span class="details">Email</span> -->
                            <input ype="email" name="email" placeholder="Enter your Email" class="form-control mt-0">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-theme btn-block p-2 mb-1" name="sendotp" value="SEND OTP">

                            <a href="../index.php"><button type="button" class="btn btn-light btn-block">Cancel</button></a>
                            <a href="../login.php">
                                <!-- <small class="text-theme"><strong>Forgot password?</strong></small> -->
                                <small class="text-theme"><strong>Back To LOGIN</strong></small>
                            </a>
                            <br>

                        </div>
                    </form>
                </div>





            </div>
        </div>
    </div>

    <!--Login Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="../serviceprovider/assets/js/jquery.min.js"></script>
    <script src="../serviceprovider/assets/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="../serviceprovider/assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="../serviceprovider/assets/js/bootstrap.min.js"></script>

    <!--Custom Js Script-->
    <script src="../serviceprovider/assets/js/custom.js"></script>
    <!--Custom Js Script-->
</body>

</html>