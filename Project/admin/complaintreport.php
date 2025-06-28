<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Complaint Reports</h6>
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

                            <input type="submit" name="fetch" class="btn btn-info mt-4 ml-4 pl-4 pr-4" value="Fetch" required>

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


                $sql = "SELECT `member`.*, `house`.*, `complaint`.* FROM `member` 
                LEFT JOIN `house` ON `member`.`HOUSE_H_ID` = `house`.`H_ID` 
                LEFT JOIN `complaint` ON `complaint`.`MEMBER_M_ID` = `member`.`M_ID` 
                where DATE(C_DATE) BETWEEN '$from' AND '$to' order by C_ID DESC";


                $chk = mysqli_query($con, $sql);

            ?>

                <table class="table mt-4">


                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Details</th>
                            <th scope="col">Name</th>
                            <th scope="col">House Number</th>
                            <th scope="col">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>

                                <?php
                                $date = $row['C_DATE'];
                                $dateformate = date_format(new DateTime($date), "d-m-Y");

                                ?>

                                <tr>

                                    <td><b><?php echo $dateformate; ?></b> </td>
                                    <td><?php echo $row['C_SUBJECT']; ?> </td>
                                    <td><?php echo $row['C_DETAILS']; ?> </td>
                                    <td><?php echo $row['M_F_NAME']; ?> </td>
                                    <td><?php echo $row['H_NO']; ?> </td>
                                    <td><?php echo $row['C_STATUS']; ?> </td>

                                </tr>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>

                        <tr>

                            <td><br><br>
                                <form action="php/complaintreport.php" method="post">
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