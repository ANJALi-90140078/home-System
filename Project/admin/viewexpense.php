<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">View Expense</h6>
        </div>

        <div class="card-body">


            <div class="table-responsive">
                <?php
                $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                $sql = "SELECT * FROM expense where MONTH(E_DATE)=MONTH(now()) and YEAR(E_DATE)=YEAR(now()) order by E_ID DESC";
                $chk = mysqli_query($con, $sql);

                ?>

                <table class="table table-bordered table table-hover table" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-secondary">
                        <tr>
                            <th> Date </th>
                            <th> Subject </th>
                            <th>To Whome </th>
                            <th>Amount </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>

<?php
$date = $row['E_DATE'];
$dateformate = date_format(new DateTime($date), "d-m-Y");

?>

                        <tr>
                            <td><b><?php echo $dateformate; ?></b> </td>
                            <td><b><?php echo $row['E_SUBJECT']; ?> </b></td>
                            <td><b><?php echo $row['E_TOWHOME']; ?> </b></td>
                            <td><b><?php echo $row['E_AMOUNT']; ?> </b></td>
                        </tr>

                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>


                        <?php
                        $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                        $sql = "SELECT sum(E_AMOUNT) as sum FROM expense where MONTH(E_DATE)=MONTH(now()) and YEAR(E_DATE)=YEAR(now())";
                        $chk = mysqli_query($con, $sql);

                        ?>
                        <?php
                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>
                        <tr class="table-success">
                            <td colspan="3"><b>
                                    <center>Total</center>
                                </b> </td>
                            <td><b><?php echo $row['sum']; ?></b> </td>
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
?>