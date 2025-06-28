<?php
include('includes/authadmin.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
?>






<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Manage Allocated House
    </h6>
  </div>

  
  <div class="card-body">

    <div class="table-responsive">
<?php
$con=mysqli_connect("localhost","root","","sms") or die("Connection Failed...");
$sql = "SELECT * FROM house INNER JOIN member ON house.H_ID = member.HOUSE_H_ID;";
$chk=mysqli_query($con, $sql);

?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Name </th>
            <th> Contact </th>
            <th> Total Member </th>
            <th>House No </th>
            <th>House Type </th>
            <!-- <th>EDIT </th> -->
            <th>Deallocate </th>
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
            <td><?php echo $row['M_F_NAME']; ?> </td>
            <td><?php echo $row['M_PHONE']; ?> </td>
            <td><?php echo $row['M_TOTAL']; ?> </td>
            <td><?php echo $row['H_NO']; ?> </td>
            <td><?php echo $row['H_TYPE']; ?> </td>
          
            <td>
                <form action="php/deallocate.php" method="post">
                  <input type="hidden" name="deleteidh" value="<?php echo $row['H_ID'];?>" required>
                  <input type="hidden" name="deleteidm" value="<?php echo $_SESSION['mid']=$row['M_ID'];?>" required>
                  <button type="submit" name="deletebtn" class="btn btn-danger"> Deallocate</button>
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