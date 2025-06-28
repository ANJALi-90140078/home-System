<?php
include '../db/dbconnect.php';
$title = 'Make Service Gig';
include 'assets/include/sp_header.php';
?>

<?php
include '../db/dbconnect.php';
// session_start();


//Make gig in spservice table
$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $servicetitle = $_POST['servicetitle'];
    $sp_login_id = $_SESSION['sp_login_id'];
    $service_id = $_POST['service'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $service_availibility = $_POST['service_availibility'];

    // fetch service provicer id from SP table throught login id 
    $fetchspid = "SELECT * FROM `sp` WHERE login_id = $sp_login_id";
    $fetchresult = mysqli_query($conn, $fetchspid);
    $numexist = mysqli_num_rows($fetchresult);
    if ($numexist > 0 && $numexist < 2) {
        $row = mysqli_fetch_assoc($fetchresult);
        $sp_id =  $row['sp_id'];
    }

    $input = "INSERT INTO `sp_service` (`sp_id`, `service_id`, `service_title`, `price`, `description`, `availability`) VALUES ('$sp_id', '$service_id', '$servicetitle', '$price' ,'$description', '$service_availibility')";
    // $input = "INSERT INTO `sp_service` (`sp_id`, `service_id`, `service_title`, `price`, `description`, `availability`) VALUES ('47', '18', 'Best Hair cut ', '300', 'I cut customize hair with style', '1')";
    $inputresult = mysqli_query($conn, $input);
    //ALERT OR ERROR!
    if ($inputresult) {
        $showAlert = "Your Gig Successfully Created.";
    } else {
        $showError = "Sorry! Your Gig is not Created.";
    }
}
?>




<div class="col-sm-9 col-xs-12 content pt-3 pl-0">

    <div class="row ">
        <div class="col-lg-5">

            <h5 class="mb-0"><strong>Make Service</strong></h5>
            <span class="text-secondary">Workspace<i class="fa fa-angle-right"></i> make Service</span>
        </div>
        <div class="col-md-auto col-lg-7">

            <!-- Message section -->
            <?php
            //Alert OR Error Message:
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
                    <strong>Success! </strong> ' . $showError . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
            }
            ?>




        </div>
    </div>


    <div class="row mt-3">

        <div class="col-sm-12">





            <!-- create service -->
            <!--Hoverable Table-->
            <div class="mt-3 mb-3 p-1 button-container  bg-white shadow-sm border">
                <!-- <h6>Hoverable table</h6> -->
              



                
            </div>
            <!--/Hoverable Table-->
        </div>
    </div>

    <script>
        $('#category').on('change', function() {
            var category_id = this.value;
            // console.log(category);
            $.ajax({
                url: 'assets/ajax/_category_ajax.php',
                type: "POST",
                data: {
                    // you can give you any name because this variable goes into ajax file
                    // category_anything: category_id
                    category_id: category_id
                },
                success: function(result) {
                    $('#service').html(result);
                    // console.log(result);
                }
            })
        })
    </script>



    <?php
    include 'assets/include/sp_footer.php';
    ?>