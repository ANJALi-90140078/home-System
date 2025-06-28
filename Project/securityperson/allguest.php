<?php
include('includes/authadmin.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Guest Details</h6>
        </div>

        <div class="card-body">


            <div class="table-responsive">
                <?php
                $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                $sql = "SELECT `guest`.*, `house`.*, `security_person`.*
                FROM `guest` 
                    LEFT JOIN `house` ON `guest`.`HOUSE_H_ID` = `house`.`H_ID` 
                    LEFT JOIN `security_person` ON `guest`.`SP_ID` = `security_person`.`S_ID` 
                    where MONTH(G_ARRIVAL) = MONTH(CURRENT_DATE()) AND YEAR(G_ARRIVAL) = YEAR(CURRENT_DATE()) 
                    and G_STATUS='Allowed' or G_STATUS='Denied' order by G_ID DESC";
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
                            <th>Guest Type</th>
                            <th>Allowed/Denied By</th>
                            <th>Entry</th>
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
                                    $sid = $row['SP_ID'];
                                    $sql = "SELECT * FROM security_person where S_ID='$sid'";
                                    $rq = mysqli_query($con, $sql);

                                    if (mysqli_num_rows($rq) > 0) {
                                        while ($row2 = mysqli_fetch_assoc($rq)) {
                                            $sname = $row2['S_F_NAME'];
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
                                    <td><b><?php echo $row['G_TYPE']; ?> </b></td>
                                    <td><b><?php echo $sname ?></b> </td>
                                    <?php

                                    if ($row['G_STATUS'] == "Allowed") {
                                    ?>
                                        <td style="color: green;"><b><?php echo $row['G_STATUS']; ?> </b></td>
                                    <?php
                                    } else { ?>
                                        <td style="color: red;"><b><?php echo $row['G_STATUS']; ?> </b></td>
                                    <?php
                                    }
                                    ?>

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