<?php
session_start();
require("../db.php");
define('PAGE', 'STUD');

if (isset($_SESSION['Admin'])) {
  $email = $_SESSION['Email'];
  
} else {
  echo "<script> location.href='login.php'; </script>";
}
if(isset($_GET['del']))
{
  $del_id=$_GET['del'];
  $sql="delete from user where user_id=$del_id";
  $res=mysqli_query($con,$sql) or die ("not deleted");
  if($res)
  {
    echo "<script> alert('Owner Successfully Deleted ....!'); </script>";
      echo "<script> location.href='student.php'; </script>";  
  }
}

include("header.php");
?>
<div class="col-sm-9 col-md-10">
  <div class="mx-5 mt-5 text-center">
    <!--Table-->
    <p class=" bg-dark text-white p-2">Students Details</p>
    <?php
    $sql = "SELECT * FROM user";
    $res = mysqli_query($con, $sql) or die("Error ?");
    ?>
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>Student Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Birth Date</th>
          <th> Gender</th>
          <th>Moblie </th>
          <th> City</th>
          <th>Remove</th>
        </tr>
      </thead>
      <tbody>
        <?php $c=1;
        while ($row = mysqli_fetch_row($res)) {
        ?>
          <tr>
            <td><?php echo  $c; $c= $c + 1 ; ?></td>
            <td><?php echo  $row['5']; ?></td>
            <td><?php echo  $row['1']; ?></td>
            <td><?php echo  $row['4']; ?></td>
            <td><?php echo  $row['3']; ?></td>
            <td><?php echo  $row['7']; ?></td>
            <td><?php echo  $row['6']; ?></td>
            <td><?php  echo "<a onClick=\"javascript: return confirm('Are you sure you want to Delete student');\" href='student.php?del=".$row[0]."'><i class='fa fa-trash-alt text-dark h3'></i></a>"; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
 



  <?php
  include("footer.php");
  ?>