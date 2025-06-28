<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">View Complaint</h6>
        </div>

        <div class="card-body">


            <div class="table-responsive">



                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Date </th>
                            <th> Subject </th>
                            <th>Details </th>
                            <th>Status </th>
                            <th>See Details </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
               
               $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

               $id = $_SESSION["musername"];
               $sql = "SELECT * FROM member where M_USERNAME='$id'";
               $rq = mysqli_query($con, $sql);

                        if (mysqli_num_rows($rq) > 0) {
                            while ($row = mysqli_fetch_assoc($rq)) {
                                $id = $row['M_ID'];
                            }
                        }
                        

                        $sql = "SELECT * FROM complaint where MEMBER_M_ID='$id' order by C_ID desc";
                        $chk = mysqli_query($con, $sql);

                        if (mysqli_num_rows($chk) > 0) {
                            while ($row = mysqli_fetch_assoc($chk)) {
                        ?>
<?php
$date = $row['C_DATE'];
$dateformate = date_format(new DateTime($date), "d-m-Y");

?>
                        <tr>
                            <td><b><?php echo $dateformate; ?></b> </td>
                            <td><b><?php echo $row['C_SUBJECT']; ?> </b></td>
                            <td><b><?php echo $row['C_DETAILS']; ?> </b></td>
                            <td><b><?php echo $row['C_STATUS']; ?> </b></td>

                            <td>
                                <form action="seecomplaint.php" method="post">

                                    <input type="hidden" name="editid" value="<?php echo $row['C_ID']; ?>" required>
                                    <input type="hidden" name="editidss" value="<?php echo $_SESSION['editidss']= $row['C_ID']; ?>" required>
                                    <button type="submit" name="editbtn" class="btn btn-info"> See Details</button>
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