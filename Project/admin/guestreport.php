<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Guest Reports</h6>
        </div>

        <div class="card-body">

            <form action="#" method="post">
                <div class="container">
                    <div class="row">

                        <div class="col-sm">

                            <label><b>From</b></label>
                            <input type="date" name="from" class="form-control" required>
                        </div>


                        <div class="col-sm ml-4">
                            <label><b>To</b></label>
                            <input type="date" name="to" class="form-control" required>

                        </div>


                        <div class="col-sm ml-4 ">

                            <input type="submit" name="fetch" class="btn btn-info mt-4 ml-4 pl-4 pr-4" value="Fetch">

                        </div>

                    </div>
                </div>
            </form>


            <br>


            <?php
            $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

            if (isset($_POST['fetch'])) {
                $from = $_POST['from'];
                $to = $_POST['to'];

                $_SESSION["from"] = $_POST['from'];
                $_SESSION["to"]  = $_POST['to'];


                $sql = "SELECT `guest`.*, `house`.*, `security_person`.*
                FROM `guest` 
                    LEFT JOIN `house` ON `guest`.`HOUSE_H_ID` = `house`.`H_ID` 
                    LEFT JOIN `security_person` ON `guest`.`SP_ID` = `security_person`.`S_ID` 
                where DATE(G_ARRIVAL) BETWEEN '$from' AND '$to' and G_STATUS='Allowed' or G_STATUS='Denied' order by G_ID DESC";


                $chk = mysqli_query($con, $sql);

            ?>

                <table class="table mt-4">


                    <thead class="thead-light">
                        <tr>
                            <th scope="col">House Number</th>
                            <th scope="col">Guest Name</th>
                            <th scope="col">Guest Contact</th>
                            <th scope="col">Arrival Time</th>
                            <th scope="col">Total Guest</th>
                            <th scope="col">Guest Type</th>
                            <th scope="col">Allowed/Denied By</th>
                            <th scope="col">Entry</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>

                                <?php
                                $date = $row['G_ARRIVAL'];
                                $dateformate = date_format(new DateTime($date), "d-m-Y");

                                ?>

                                <tr>

                                    
                                    <td><?php echo $row['H_NO']; ?> </td>
                                    <td><?php echo $row['G_NAME']; ?> </td>
                                    <td><?php echo $row['G_CONTACT']; ?> </td>
                                    <td><?php echo $dateformate; ?> </td>
                                    <td><?php echo $row['G_NO']; ?> </td>
                                    <td><?php echo $row['G_TYPE']; ?> </td>
                                    <td><?php echo $row['S_F_NAME']; ?> </td>
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

                        <tr>

                            <td><br><br>
                                <form action="php/guestreport.php" method="post">
                                    <input type="submit" name="paymentbtn" class="btn btn-danger pl-4 pr-4" value="Download">
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            <?php
            }
            ?>

        </div>
    </div>

</div>


<?php
include('includes/scripts.php');
?>