<?php
include('includes/authadmin.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Payment History</h6>
        </div>

        <div class="card-body">




            <div class="table-responsive">



                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Date </th>
                            <th> Payment Type </th>
                            <th>Amount Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

                        $id = $_SESSION["mid"];
                        $sql = "SELECT `payment`.* FROM `payment` where MEMBER_M_ID='$id' order by P_ID desc";
                        $chk = mysqli_query($con, $sql);

                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>
                                <?php
                                $date = $row['P_DATE'];
                                $dateformate = date_format(new DateTime($date), "d-m-Y");

                                ?>
                                <tr>
                                    <td><b><?php echo $dateformate; ?></b> </td>
                                    <td><b><?php echo $row['P_TYPE']; ?> </b></td>
                                    <td><b><?php echo $row['P_AMOUNT']; ?> </b></td>
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


<?php
include('includes/scripts.php');
// include('includes/footer.php');
?>