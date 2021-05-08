<?php
include('../db.php');
define('PAGE', 'profile');
session_start();
if ($_SESSION['owner']) {
  $Email = $_SESSION['oEmail'];
} else {
  echo "<script> location.href='login.php'; </script>";
}
include("header.php");
$owner_id = $_SESSION['pg_id'];
$sql = "select * from owner where pg_id=$owner_id";
$res = mysqli_query($con, $sql) or die("not select ");
$row = mysqli_fetch_row($res);
if (isset($_POST['update'])) {
  $fname = strtoupper(trim($_POST['fname']));
  $lname = strtoupper(trim($_POST['lname']));
  $mobile = trim($_POST['mobile']);
  $city = strtoupper(trim($_POST['city']));
  $pass = trim($_POST['password']);
  if ($pass == '') {
    $sql = "UPDATE owner SET mob_no='" . $mobile . "',Fname='" . $fname . "',Lname='" . $lname . "',city='" . $city . "' WHERE email='" . $Email . "'";
  } else {
    $passnew = md5($pass);
    $sql = "UPDATE owner SET mob_no='" . $mobile . "',password='" . $passnew . "' ,Fname='" . $fname . "',Lname='" . $lname . "',city='" . $city . "' WHERE email='" . $Email . "'";
  }
  $res = mysqli_query($con, $sql) or die("not update<br>" . $sql . "<br>" . mysqli_error($con));
  if ($res) {
    echo "<script> alert('Successfully Update .... !'); </script>";
    echo "<script> location.href='profile.php'; </script>";
  }
}
?>
<div class="col-sm-9 col-md-10 mt-5 ">
  <p class=" bg-dark text-white p-2">Profile </p>
  <form class="mx-5" method="POST">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $row[1]; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="inputName">First Name</label>
      <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row[4]; ?>">
    </div>
    <div class="form-group">
      <label for="lname">Last Name</label>
      <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row[5]; ?>">
    </div>
    <div class="form-group">
      <label for="mobile">Mobile</label>
      <input type="tel" class="form-control" id="mobile" name="mobile" required pattern="[0-9]{10}" title="Please Enter Number only" value="<?php echo $row[3]; ?>">
    </div>
    <div class="form-group">
      <label for="city">city</label>
      <input type="text" class="form-control" id="city" name="city" value="<?php echo $row[6]; ?>">
    </div>
    <div class="form-group">
      <label for="inputEmail">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-danger" name="update">Update</button>

  </form>
</div>



</div>




<?php
include("footer.php");
?>