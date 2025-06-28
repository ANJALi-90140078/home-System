<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Expense Reports</h6>
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



                $sql = "SELECT * FROM expense where DATE(E_DATE) BETWEEN '$from' AND '$to' order by E_ID DESC";


                $chk = mysqli_query($con, $sql);

            ?>

                <table class="table mt-4">


                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Subject</th>
                            <th scope="col">To Whome</th>
                            <th scope="col">Amount</th>
                           
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

                        if (isset($_POST['fetch'])) {
                            $from = $_POST['from'];
                            $to = $_POST['to'];

                            $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
                            $sql = "SELECT sum(E_AMOUNT) as sum FROM expense where DATE(E_DATE) BETWEEN '$from' AND '$to'";
                            $chk = mysqli_query($con, $sql);

                        ?>
                            <?php
                            if (mysqli_num_rows($chk) > 0) {
                                while ($row = mysqli_fetch_assoc($chk)) {
                            ?>
                                    <tr class="table-info">
                                        <td colspan="3"><b>
                                                <center>Total</center>
                                            </b> </td>
                                        <td><b><?php echo $row['sum']; ?>
                                       <?php $_SESSION["sum"]= $row['sum']; ?>
                                  
                                    </b> </td>
                                    </tr>

                        <?php
                                }
                            } else {
                                echo "";
                            }
                        }

                        ?>


                        <tr>

                            <td><br><br>
                                <form action="php/expensereport.php" method="post">
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