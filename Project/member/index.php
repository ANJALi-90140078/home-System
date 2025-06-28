<?php
include('includes/authadmin.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<script type="text/javascript">
    function preventBack() {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
</script>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <center>
                <h6 class="m-0 font-weight-bolder text-dark">My Details</h6>
            </center>
        </div>

        <div class="card-body">



            <div class="table-responsive">


                <?php
                $con = mysqli_connect("localhost", "root", "", "sms") or die("Connection Failed...");

                $id = $_SESSION["mid"];
                $sql = "SELECT * FROM member where M_ID='$id'";
                $rq = mysqli_query($con, $sql);


                $sql = "SELECT * FROM house INNER JOIN member ON house.H_ID = member.HOUSE_H_ID where M_ID=$id";
                $rq = mysqli_query($con, $sql);

                if (mysqli_num_rows($rq) > 0) {
                    while ($row = mysqli_fetch_assoc($rq)) {
                ?>

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> <b> NAME </b> </th>
                                    <td><b><?php echo $row['M_F_NAME']; ?> </td>
                                </tr>

                                <tr>
                                    <th> <b>CONTACT</b> </th>
                                    <td><b><?php echo $row['M_PHONE']; ?> </td>
                                </tr>

                                <tr>
                                    <th><b>EMAIL</b> </th>
                                    <td><b><?php echo $row['M_EMAIL']; ?> </td>
                                </tr>

                                <tr>
                                    <th><b>HOUSE NUMBER</b> </th>
                                    <td><b><?php echo $row['H_NO']; ?> </td>
                                </tr>

                                <tr>
                                    <th><b>HOUSE TYPE</b> </th>
                                    <td><b><?php echo $row['H_TYPE']; ?> </td>
                                </tr>

                                <tr>
                                    <th><b>MAINTENANCE CHARGE</b> </th>
                                    <td><b><?php echo $row['H_CHARGE']; ?> </td>
                                </tr>



                            </thead>
                            <tbody>
                        <?php
                    }
                }
                        ?>







            </div>



        </div>
    </div>

</div>

<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>