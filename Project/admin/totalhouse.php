<?php
include('includes/authadmin.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Manage House
    </h6>
  </div>

  
  <div class="card-body">

    <div class="table-responsive">
<?php
$con=mysqli_connect("localhost","root","","sms") or die("Connection Failed...");
$sql = "SELECT * FROM house order by H_NO ASC";
$chk=mysqli_query($con, $sql);

?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           
            <th> House No </th>
            <th>House Type </th>
            <th>Maintenance Charge</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     <?php

     if(mysqli_num_rows($chk)>0)
     {
      while($row=mysqli_fetch_assoc($chk))
      {
        ?>

          <tr>
            <td><?php echo $row['H_NO']; ?> </td>
            <td><?php echo $row['H_TYPE']; ?> </td>
            <td><?php echo $row['H_CHARGE']; ?> </td>
            
            <td>
                <form action="edithouse.php" method="post">

                    <input type="hidden" name="editid" value="<?php echo $row['H_ID'];?>" required>
                    <button  type="submit" name="editbtn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="php/deletehouse.php" method="post">
                  <input type="hidden" name="dltid" value="<?php echo $row['H_ID'];?>" required>
                  <button type="submit" name="dltbtn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
      }
     }
     else
     {
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