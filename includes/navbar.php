<?php
session_start();
if (!defined('MYSITE')) {
    header('location: ../index.php');
    die();
}
?>
<style>
    .cart {
        position: relative;
        display: block;
        /* width: 28px; */
        /* height: 28px; */
        height: auto;
        overflow: hidden;
    }
        .fa-shopping-cart {
            position: relative;
            top: 4px;
            z-index: 1;
            font-size: 24px;
            color: white;
        }

        .count {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 2;
            font-size: 11px;
            border-radius: 50%;
            background: #d60b28;
            width: 16px;
            height: 16px;
            line-height: 16px;
            display: block;
            text-align: center;
            color: white;
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
        }
</style>

<!-- ===Navbar start=== -->
<nav class="navbar navbar-expand-lg navbar-dark bg-c1-1 sticky-top">

    <a class="navbar-brand" href="admin/index.php"> <img src="img/mainlogo.png" style="width:170px;" alt="Logo"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <!-- <a class="nav-link" href="">About</a> -->
            </li>
            <!-- category -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu ">
                    <?php // category view code. Data get from category table
                    $sql = "SELECT * FROM `category`";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno = $sno + 1;
                            $category_id = $row['category_id'];
                            $category_name = $row['category_name'];
                            echo '<a class="dropdown-item" href="serviceshow.php?category_id=' . $category_id . '">' . $category_name . '</a>';
                        }
                    } else {
                        echo 'note inserted';
                    }

                    ?>
                    <div class="dropdown-divider"></div>
                    <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                </div>
            </li>
            <!-- More -->
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    More
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Admin</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li> -->
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a href="sp_signup.php" target="_blank"><button type="button" class="btn btn-outline-light mr-2">Register As a Service Provider</button></a>

            <a href="login.php" target=""><button type="button" class="btn btn-outline-light mr-2">Login</button></a>
            <a href="signup.php" target=""><button type="button" class="btn btn-outline-light mr-2">Sign Up</button></a>
            <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-c1-2 my-2 my-sm-0 mr-3" type="submit">Search</button> -->

            <div class="cart">
                <?php
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        echo ' <span class="count"> '.$count.'</span>';
                    }
                ?>
                
                <a href="hssr\mycart.php"><img src="img/shopping-cart-icon.png" style="width:50px;" alt=""></a>
                <!-- <a href="../hs/mycart.php"><i class="fas fa-2x fa-shopping-cart mr-2" style="color:white;"></i></a> -->
            </div>

        </form>
    </div>
</nav>
<!-- ===Navbar End=== -->