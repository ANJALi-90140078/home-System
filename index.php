<?php
define('MYSITE', true);
include 'db/dbconnect.php';

$title = 'Main';
$css_directory = 'css/main.min.css';
$css_directory2 = 'css/main.min.css.map';
include 'includes/header.php';
include 'includes/navbar.php';

?>

<style>
    .card:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transform: translateY(-5px);
        background-color: #0A2647;
        color: white;
    }
</style>

<body style="">





    <!-- ===landing page image Start=== -->
    <img src="img/purpule.png" class="img-fluid mb-5" alt="Landing Page image">
    <!-- ===landing page image End=== -->



    <!-- ===main area page Start=== -->

    <div class="container">
        <div class="row row-cols-3">


            <?php // category view code. Data get from category table
            $sql = "SELECT * FROM `category`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    $category_id = $row['category_id'];
                    $category_name = $row['category_name'];
                    echo '
                    <a href="serviceshow.php?category_id='. $category_id .'" class="text-reset">
                        <div class="col mb-4">
                            <div class="col">
                                 <div class="card card-deck">
                                 <img src="img/'.$category_id.'.jpg" class="card-img-top" style="width:349px; height:200px; object-fit:cover;" alt="..."> 
                                 <div class="card-body text-center">
                                        <h5 class="card-title">' . $category_name . '</h5>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </a>
                                    ';
                                }
            } else {
                echo 'note inserted';
            }
            
            ?>
    
    <!-- <img src="https://source.unsplash.com/349x149/?'. $category_name .',urbanclap,homeserviceprovider" class="card-img-top" alt="...">  -->

        </div>
    </div>
    <!-- ===main area page End=== -->




    <?php
    include 'includes/footer.php';
    include 'includes/navfooter.php';
    ?>



    <!-- <div class="col mb-4">
        <div class="col">
            <div class="card card-deck">
                <div class="card-body text-center">
                    <h5 class="card-title ">Card title</h5>
                </div>
            </div>
        </div>
    </div> -->