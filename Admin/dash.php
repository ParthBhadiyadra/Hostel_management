<?php
define('PAGE', 'feedback');
include('../db.php');
session_start();
if(isset($_SESSION['Admin']))
{
    $email = $_SESSION['Email'];
} else 
{
    echo "<script> location.href='login.php'; </script>";
}
include("header.php");
if(@$_GET['fid']) {
    echo '<br />';
    $id=@$_GET['fid'];
    echo '<div class="col-sm-9 col-md-10 bg-light">';
    $result = mysqli_query($con,"SELECT * FROM `feedback_tbl` WHERE id='$id'") or die('Error'.mysqli_error($con));
    $row = mysqli_fetch_array($result);

?>

  <div class="container-fluide mt-5 p-0 ">
      <div class="row">
          <div class="col-lg-10 col-sm-12">
              <h3 class="text-center text-bold text-uppercase"><?php echo $row['subject']; ?></h3>
          </div>
          <div class="col-lg-2 col-sm-2 float-right">
              <a href="showfeed.php" class="nav nav-link text-dark btn  btn-success">Back</a>
          </div>
          <div class="col-lg-2 col-sm-4">
              <p> <?php echo '<b>Date : </b> &nbsp;' .$row['date']; ?> </p>
          </div>
          <div class="col-lg-2 col-sm-4">
          <p> <?php echo '<b> Send by : </b> &nbsp;'.$row['name']; ?> </p>
          </div>
          <div class="col-lg-8 col-sm-4"></div>
          <div class="col-lg-12 col-sm-12">
              <hr>
              <p> <?php echo '<b>Message :</b> <br>' .$row['feedback']; ?></p> 
          </div>
      </div>
  </div>
  <?php
}
include("footer.php");
 ?>
    