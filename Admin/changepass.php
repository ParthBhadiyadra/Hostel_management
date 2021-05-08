<?php
session_start();

define('PAGE', 'changepass');
include('../db.php');


if(isset($_SESSION['Admin']))
{
    $email = $_SESSION['Email'];
} else 
{
  echo "<script> location.href='login.php'; </script>";
}

include('header.php'); 
if (isset($_REQUEST['passupdate'])) {
  if (($_REQUEST['Password'] == "")) {
    // msg displayed if required field missing
    $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    $sql = "SELECT * FROM admin WHERE email='$email'";
    $res = mysqli_query($con, $sql) or die("error !");
    if (1 == mysqli_affected_rows($con)) {
      $Pass = MD5($_REQUEST['Password']);
      $sql = "UPDATE admin SET password = '$Pass' WHERE email = '$email'";
      if (mysqli_query($con, $sql)) {
        // below msg display on form submit success
        $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
      } else {
        // below msg display on form submit failed
        $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
  }
}
?>
<div class="col-sm-9 col-md-10">
  <div class="row">
    <div class="col-sm-6">
      <form class="mt-5 mx-5">
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" value=" <?php echo $email ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inputnewpassword">New Password</label>
          <input type="text" class="form-control" id="inputnewpassword" placeholder="New Password" name="Password">
        </div>
        <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
        <button type="reset" class="btn btn-secondary mt-4">Reset</button>
        <?php if (isset($passmsg)) {
          echo $passmsg;
        } ?>
      </form>
    </div>
  </div>
</div>
</div>
</div>
<?php
include('footer.php');
?>