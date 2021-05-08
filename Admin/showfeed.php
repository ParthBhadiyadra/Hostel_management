<?php

include('../db.php');
session_start();
define('PAGE', 'feedback');
if(isset($_SESSION['Admin']))
{
    $email = $_SESSION['Email'];
   
} else 
{
    echo "<script> location.href='login.php'; </script>";
}
if(isset($_GET['del']))
{
    $del_id=$_GET['del'];
    $sql="delete from feedback_tbl where id=$del_id";
    $res=mysqli_query($con,$sql) or die ("not deleted");
    if($res)
    {
        echo "<script> location.href='showfeed.php'; </script>";  
    }
}
include('header.php');
?>

<div class="col-sm-9 col-md-10">
  <div class="mx-5 mt-5 text-center">
    <!--Table-->
    <p class=" bg-dark text-white p-2">Students Feedback</p>
    <?php
    $result = mysqli_query($con,"SELECT * FROM `feedback_tbl`") or die('Error' .mysqli_error($con));
    ?>
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th> Date</th>
          <th>Show </th>
          <th> Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
       $c=1;
       while($row = mysqli_fetch_array($result)) {
           $date = $row['date'];
           $date= date("d-m-Y",strtotime($date));
           
           $subject = $row['subject'];
           $name = $row['name'];
           $email = $row['email'];
           $id = $row['id'];
        ?>
          <tr>
            <td><?php echo  $c;  $c= $c + 1 ; ?></td>
            <td><?php echo  $name; ?></td>
            <td><?php echo  $email; ?></td>
            <td><?php echo  '<a title="Click to open feedback"  class="nav nav-link text-dark" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a>'; ?></td>
            <td><?php echo  $date; ?></td>
            <td><?php echo '<a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'"><i class="fa fa-envelope text-dark h3"></a>'; ?></td>
            <td><?php echo  "<a onClick=\"javascript: return confirm('Are you sure you want to Delete Feedback');\" href='showfeed.php?del=".$id."'><i class='fa fa-trash-alt text-dark h3'></a>"; ?></td>
    
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
 
  <?php
include("footer.php");
?>
