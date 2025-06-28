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


                <?php
                $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

                $id = $_SESSION["musername"];
                $sql = "SELECT * FROM member where M_USERNAME='$id'";
                $rq = mysqli_query($con, $sql);

                        if (mysqli_num_rows($rq) > 0) {
                            while ($row = mysqli_fetch_assoc($rq)) {
                                $mid = $row['M_ID'];
                            }
                        }

                if (isset($_POST['editbtn'])) {
                    
                    $cid = $_POST['editid'];
                
                    $sql = "SELECT * FROM complaint INNER JOIN reply_complaint ON complaint.C_ID = reply_complaint.COMPLAINT_C_ID 
                        WHERE MEMBER_M_ID='$mid' and COMPLAINT_C_ID='$cid' ORDER BY RC_ID DESC LIMIT 1;";
                    $rq = mysqli_query($con, $sql);

                    if (mysqli_num_rows($rq) > 0) {
                        while ($row = mysqli_fetch_assoc($rq)) {
                ?>

                
<?php
$date = $row['C_DATE'];
$dateformate = date_format(new DateTime($date), "d-m-Y");

?>

<?php
$date1 = $row['RC_DATE'];
$dateformate1 = date_format(new DateTime($date1), "d-m-Y");

?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> <b> Complaint Registered Date</b> </th>
                            <td><b><?php echo $dateformate; ?> </td>
                        </tr>

                        <tr>
                            <th> <b>Your Complaint Subject</b> </th>
                            <td><b><?php echo $row['C_SUBJECT']; ?> </td>
                        </tr>

                        <tr>
                            <th><b>Complaint Details</b> </th>
                            <td><b><?php echo $row['C_DETAILS']; ?> </td>
                        </tr>

                        <tr>
                            <th><b>Complaint Status</b> </th>
                            <td><b><?php echo $row['C_STATUS']; ?> </td>
                        </tr>

                        <tr>
                            <th><b> Date Of Reply</b> </th>
                            <td><b><?php echo $dateformate1; ?> </td>
                        </tr>

                        <tr>
                            <th><b>Remark Given By Staff</b> </th>
                            <td><b><?php echo $row['RC_DESC']; ?> </td>
                        </tr>

                        <tr>
                            
                            <form action="viewcomplaint.php" method="post">

                                    <center>
                                        <div class="btn-group btn-group-lg">
                                            <button class="btn btn-success mb-4">BACK</button>
                                        </div>
                                    </center>
                        </form></tr>
                        
                    </thead>
                    <tbody>
                        
                        <?php
                        }

                    } else {
                        echo "<h4><center>Remarks Not Given By Staff Till Now!</center></h4>";?>
                        <form action="viewcomplaint.php" method="post">

                                    <center>
                                        <div class="btn-group btn-group-lg">
                                            <button class="btn btn-success mb-4">BACK</button>
                                        </div>
                                    </center>
                        </form>
                  <?php  }
                }

                        ?>

                       




            </div>
            
        </div>

        
    </div>
    






    <?php
    include('includes/scripts.php');
    //include('includes/footer.php');
    ?>