<?php
include('includes/authadmin.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Manage Pre-Invited Guest</h6>
        </div>

        <div class="card-body">


            <div class="table-responsive">
                <?php
                $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                $sql = "SELECT `guest`.*, `house`.*
                FROM `guest` 
                    LEFT JOIN `house` ON `guest`.`HOUSE_H_ID` = `house`.`H_ID` where G_TYPE='Pre-Invited' and G_STATUS='Pending' order by G_ID DESC";
                $chk = mysqli_query($con, $sql);

                ?>

                <table class="table table-bordered table table-hover table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> House Number </th>
                            <th> Guest Name </th>
                            <th>Guest Contact </th>
                            <th>Arrival Time </th>
                            <th>Total Guest </th>
                            <th>Allow</th>
                            <th>Deny</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>

                        <tr>

                            <?php
                                $hid = $row['HOUSE_H_ID'];
                                $sql = "SELECT * FROM house where H_ID='$hid'";
                                $rq = mysqli_query($con, $sql);

                                if (mysqli_num_rows($rq) > 0) {
                                    while ($row1 = mysqli_fetch_assoc($rq)) {
                                        $hno = $row1['H_NO'];

                                    }
                                }

                            ?>
                             <?php
                                $gdate = $row['G_ARRIVAL'];
                                $dateformate = date_format(new DateTime($gdate), "d-m-Y h:i A");
                        ?>


                            <td><b><?php echo $hno ?></b> </td>
                            <td><b><?php echo $row['G_NAME']; ?> </b></td>
                            <td><b><?php echo $row['G_CONTACT']; ?> </b></td>
                            <td><b><?php echo $dateformate; ?> </b></td>
                            <td><b><?php echo $row['G_NO']; ?> </b></td>

                            <td>
                                <form action="php/allowguest.php" method="post">

                                    <input type="hidden" name="gid" value="<?php echo $row['G_ID']; ?>">
                                    <button type="submit" name="allow" class="btn btn-success"> Allow</button>
                                </form>
                            </td>
                            <td>
                                <form action="php/denyguest.php" method="post">
                                <input type="hidden" name="gid" value="<?php echo $row['G_ID']; ?>">
                                    <button type="submit" name="deny" class="btn btn-danger"> Deny</button>
                                </form>
                            </td>
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