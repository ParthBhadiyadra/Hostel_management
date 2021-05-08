<?php
session_start();
 
include('../db.php');
define('PAGE', 'owner');

if(isset($_SESSION['Admin']))
{
    $email = $_SESSION['Email'];
   
} else 
{
  echo "<script> location.href='login.php'; </script>";
}
include('header.php');
if(isset($_GET['del']))
{
  $del_id=$_GET['del'];
  $sql="delete from owner where pg_id=$del_id";
  $res=mysqli_query($con,$sql) or die ("not deleted");
  if($res)
  {
    echo "<script> alert('Owner Successfully Deleted ....!'); </script>";
      echo "<script> location.href='owner.php'; </script>";  
  }
}

?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <!--Table-->
  <p class=" bg-dark text-white p-2">List of Owners ( P G )</p>
  <?php
    $sql = "SELECT * FROM owner";
    $result = mysqli_query($con,$sql) or die("error");
   
 echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">PG ID</th>
    <th scope="col">Owner Namey</th>
    <th scope="col">Mobile</th>
    <th scope="col">Email</th>
    <th scope="col">City</th>
    <th scope="col">Action</th>
   </tr>
  </thead>
  <tbody>'; $c=1;
  while($row = mysqli_fetch_row($result)){
   echo '<tr>';
    echo '<th scope="row">'.$c.'</th>';
    echo '<td>'.$row[4].' '.$row[5].'</td>';
    echo '<td>'.$row[3].'</td>';
    echo '<td>'.$row[1].'</td>';
    echo '<td>'.$row[6].'</td>';
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete Owner');\" href='owner.php?del=".$row[0]."'><i class='fa fa-trash-alt text-dark h3'></i></a></td>
   </tr>";
   $c= $c +1 ;
  }

 echo '</tbody>
 </table>';

if(isset($_REQUEST['delete'])){
  $sql = "DELETE FROM technician_tb WHERE empid = {$_REQUEST['id']}";
  if($conn->query($sql) === TRUE){
    // echo "Record Deleted Successfully";
    // below code will refresh the page after deleting the record
    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
    } else {
      echo "Unable to Delete Data";
    }
  }
?>
</div>
</div>

</div>
</div>

<?php
include('footer.php'); 
?>