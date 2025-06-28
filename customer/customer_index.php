<?php
define('MYSITE', true);
include '../db/dbconnect.php';

$title = 'Main';
$css_directory = '../css/main.min.css';
$css_directory2 = '../css/main.min.css.map';
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

<body>

    <!-- ===landing page image Start=== -->
    <img src="../img/purpule.png" class="img-fluid mb-5" alt="Landing Page image">
    <!-- ===landing page image End=== -->

    <!-- ===main area page Start=== -->
    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM `category`";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo "<div class='alert alert-danger'>Error fetching categories: " . mysqli_error($conn) . "</div>";
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    $category_id = $row['category_id'];
                    $category_name = $row['category_name'];
                    $image_path = "../img/" . $category_id . ".jpg";
                    
                    // Check if the image exists, else use a fallback
                    if (!file_exists($image_path)) {
                        $image_path = "../img/default.jpg";
                    }

                    echo '
                    <div class="col-md-4 mb-4">
                        <a href="serviceshow.php?category_id=' . $category_id . '" class="text-reset text-decoration-none">
                            <div class="card h-100">
                                <img src="' . $image_path . '" class="card-img-top" style="width:100%; height:200px; object-fit:cover;" alt="Category Image">
                                <div class="card-body text-center">
                                    <h5 class="card-title">' . htmlspecialchars($category_name) . '</h5>
                                </div>
                            </div>
                        </a>
                    </div>';
                }
            }
            ?>
        </div>
    </div>
    <!-- ===main area page End=== -->

    <?php
    include '../includes/footer.php';
    include 'includes/navfooter.php';
    ?>
</body>
