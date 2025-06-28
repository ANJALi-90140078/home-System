<?php
include('includes/authadmin.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Message Box</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Date </th>
                            <th> Description </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

                        $id = $_SESSION["mid"];
                       
                        $sql = "SELECT * FROM notification1 where MEMBER_M_ID='$id' order by N_ID desc";
                        $chk = mysqli_query($con, $sql);

                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>
                                <?php
                                $date = $row['N_DATE'];
                                $dateformate = date_format(new DateTime($date), "d-m-Y");

                                ?>
                                <tr>
                                    <td><b><?php echo $dateformate; ?></b> </td>
                                    <td><b><?php echo $row['N_DESC']; ?> </b></td>

                                </tr>
                        <?php
                            }
                        } else {
                            echo "<center>No Record Found</center>";
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