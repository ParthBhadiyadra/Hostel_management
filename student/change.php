<?php
session_start();
if ($_SESSION['student']) {
  $Email =$_SESSION['Email'];
  $student_id=$_SESSION['student_id'];
} else {
  echo "<script> location.href='login.php'; </script>";
}
include("../db.php");
$sql = "select * from user where 	user_id=$student_id";
$res = mysqli_query($con, $sql) or die("not select ");
$row = mysqli_fetch_row($res);
if (isset($_POST['update'])) {
  $fname = strtoupper(trim($_POST['fname']));
  $mobile = trim($_POST['mobile']);
  $city = strtoupper(trim($_POST['city']));
  $pass = trim($_POST['password']);
  $gender=$_POST['gender'];
  $dob=$_POST['bod'];

  if ($pass == '') {
    $sql = "UPDATE user SET mobile='" . $mobile . "',fname='" . $fname . "',bod='" . $dob . "',city='" . $city . "',gender='".$gender."' WHERE email='" . $Email . "'";
  } else {
    $passnew = md5($pass);
    $sql = "UPDATE user SET mobile='" . $mobile . "',password='" . $passnew . "' ,fname='" . $fname . "',bod='" . $dob . "',city='" . $city . "', gender='".$gender."' WHERE email='" . $Email . "'";
  }
  $res = mysqli_query($con, $sql) or die("not update<br>" . $sql . "<br>" . mysqli_error($con));
  if ($res) {
    echo "<script> alert('Successfully Update .... !'); </script>";
    echo "<script> location.href='change.php'; </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../css/mystyle.css">
</head>
<body>
<nva class="navbar navbar-expand-md bg-dark navbar-dark container-fuild">
        <div class="container">
        <a href="#" class="navbar-brand text-warning font-weight-bold">Hostel Management System </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" dat-target="#menulinks" href="#menulinks" >
            <span class="navbar-toggler-icon"> </span>
          </button>
          <div class="collapse navbar-collapse text-center" id="menulinks">
          <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a href="home.php" class="nav-link text-white">Home</a>
             </li>
             <li class="nav-item">
              <a href="dash.php" class="nav-link text-white">My Booking</a>
            </li>
            <li class="nav-item">
              <a href="change.php" class="nav-link text-white">Profile </a>
            </li>
            <li class="nav-item">
              <a href="feedback.php" class="nav-link text-white">Feedback</a>
            </li>
            <li class="nav-item">
              <a href="../logout.php" class="nav-link text-white"> Logout</a>
            </li>
           </ul>

          </div>
        </div>
      </nva>

<div class="container mt-4 pt-3">
<form class="mx-5" method="POST">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $row[1]; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="inputName">Full Name</label>
      <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row[5]; ?>">
    </div>
    <div class="form-group">
      <label for="lname">Birth Date</label>
      <input type="date" class="form-control" id="bod" name="bod" placeholder="YYYY-MM-DD" value="<?php echo $row[4]; ?>">
    </div>
    <div class="form-group">
      <label for="inputName">Gender</label>
      <select id="gender" class="form-control" name="gender" required>
                    <option value="">Choose...</option>
<option value="M"  <?php if($row[3]=='M') {?> selected <?php } ?> >MALE</option> 
                    <option value="F" <?php if($row[3]!='M') {?> selected <?php } ?> >FEMALE</option>
          </select>
    </div>
    <div class="form-group">
      <label for="mobile">Mobile</label>
      <input type="tel" class="form-control" id="mobile" name="mobile" required pattern="[0-9]{10}" title="Please Enter Number only" value="<?php echo $row[7]; ?>">
    </div>
    <div class="form-group">
      <label for="city">city</label>
      <input type="text" class="form-control" id="city" name="city" value="<?php echo $row[6]; ?>">
    </div>
    <div class="form-group">
      <label for="inputEmail">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="If change password ">
    </div>
    <button type="submit" class="btn btn-danger" name="update">Update</button>

  </form>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>