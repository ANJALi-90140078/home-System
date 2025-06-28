<?php
include('includes/authadmin.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Add House details</h6>
        </div>

        <div class="card-body">


            <form action="php/addhouse.php" method="POST">

                <div class="form-group pl-4 pr-4">
                    <label> <b>House No </b></label>
                    <input type="text" name="hno" class="form-control" placeholder="Enter House No" required>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>House Type</b> </label>
                    <select name="htype" class="form-control">
                        <option>Select House Type</option>
                        <option value="1bhk">1bhk</option>
                        <option value="2bhk">2bhk</option>
                        <option value="3bhk">3bhk</option>
                        <option value="4bhk">4bhk</option>
                        <option value="5bhk">5bhk</option>
                    </select>
                </div>

                <div class="form-group pl-4 pr-4">
                    <label> <b>Maintenance Charges</b> </label>
                    <input type="number" name="mcharge" class="form-control" placeholder="Enter Maintenance Charges" required>
                </div>

                <center>
                    <div class="btn-group btn-group-lg">
                        <button type="submit" name="submit" class="btn btn-success">Add House</button>
                    </div>
                </center>

            </form>

        </div>
    </div>

</div>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>