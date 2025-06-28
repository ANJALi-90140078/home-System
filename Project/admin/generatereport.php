<?php
include('includes/authadmin.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bolder text-dark">Generate Reports</h6>
        </div>

        <div class="card-body">


            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body font-weight-bolder text-center">Payment Report</div>
                        <div class="card-footer text-center font-weight-bolder">
                            <a class="large text-dark stretched-link" href="paymentreport.php">View Report</a>
                            </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body font-weight-bolder text-center">Expense Report</div>
                        <div class="card-footer text-center font-weight-bolder">
                            <a class="large text-dark stretched-link" href="expensereport.php">View Report</a>
                            </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body font-weight-bolder text-center">Complaint Report</div>
                        <div class="card-footer text-center font-weight-bolder">
                            <a class="large text-dark stretched-link" href="complaintreport.php">View Report</a>
                            </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body font-weight-bolder text-center">Guest Report</div>
                        <div class="card-footer text-center font-weight-bolder">
                            <a class="large text-dark stretched-link" href="guestreport.php">View Report</a>
                            </div>
                    </div>
                </div>

                



        </div>
    </div>

</div>


<?php
include('includes/scripts.php');
?>