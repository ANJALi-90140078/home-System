<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Unsolved Complaints
            </h6>
        </div>


        <div class="card-body">

            <div class="table-responsive">
                <?php
                $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");
               // $sql = "SELECT * FROM complaint where C_STATUS='Pending' order by C_ID DESC";
                $sql = "SELECT `member`.*, `house`.*, `complaint`.* FROM `member` 
                LEFT JOIN `house` ON `member`.`HOUSE_H_ID` = `house`.`H_ID` 
                LEFT JOIN `complaint` ON `complaint`.`MEMBER_M_ID` = `member`.`M_ID` 
                where complaint.C_STATUS='Pending' order by complaint.C_ID DESC";
                
                            $chk = mysqli_query($con, $sql);

                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Complaint Date </th>
                            <th> Subject </th>
                            <th>Details</th>
                            <th>Name</th>
                            <th>House</th>
                            <th>Status</th>
                            <th>Add Remarks </th>
                            <!-- <th>DELETE </th> -->
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
                            <td><?php echo $dateformate; ?> </td>
                            <td><?php echo $row['C_SUBJECT']; ?> </td>
                            <td><?php echo $row['C_DETAILS']; ?> </td>
                            <td><?php echo $row['M_F_NAME']; ?> </td>
                            <td><?php echo $row['H_NO']; ?> </td>
                            <td><?php echo $row['C_STATUS']; ?> </td>

                            <td>
                                <form action="editunsolved.php" method="post">

                                    <input type="hidden" name="editid" value="<?php echo $row['C_ID']; ?>" required>
                                    <input type="hidden" name="editidss" value="<?php echo $_SESSION['editidss']= $row['C_ID']; ?>" required>
                                    <button type="submit" name="editbtn" class="btn btn-info"> Add Remark</button>
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
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
// include('includes/footer.php');
?>