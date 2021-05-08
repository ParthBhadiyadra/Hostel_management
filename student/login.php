<?php

session_start();
require("../db.php");
if(isset($_POST['log']))
{
    $email=trim($_POST['aEmail']);
    $pass=md5(trim(($_POST['aPassword'])));
    $str="select * from user where email='".$email."' and password='".$pass."' and status=1";
    $res=mysqli_query($con,$str) or die("error <br>". $sql.'<br>'. mysqli_error($con));
    if(1==mysqli_affected_rows($con))
    {
      $_SESSION['student'] = true;
      $_SESSION['Email'] = $email;
      $_SESSION['user']="Student";
      $row=mysqli_fetch_row($res);
      $_SESSION['student_id']=$row['0'];
      // Redirecting to RequesterProfile page on Correct Email and Pass
      echo "<script> location.href='home.php'; </script>";
      exit;
    } else {
      $msg = '<div class="alert alert-warning " role="alert"> Enter Valid Email and Password </div>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../css/mystyle.css">
  <style>
    .custom-margin {
         margin-top: 8vh;
      }
   </style>
  <title>Login</title>
</head>

<body>
  <div class="mb-3 text-center mt-5" style="font-size: 30px;">
    <span> PG / HOSTEL Management System</span>
  </div>
  <p class="text-center" style="font-size: 20px;"> <i class="fa fa-graduation-cap text-danger"></i> <span class="badge badge-pill badge-danger">Student Login
       </span> &nbsp;<span class="links"> <i class="fas fa-user-secret "></i> &nbsp;<a href="../owner/login.php" class=" badge badge-pill badge-primary">Owner Login</a> </span>
  </p>
  <div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
      <div class="col-sm-6 col-md-4">
        <form action="" class="shadow-lg p-4" method="POST">
          <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
              class="form-control" placeholder="Email" name="aEmail">
            <!--Add text-white below if want text color white-->
            <small class="form-text">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input type="password"
              class="form-control" placeholder="Password" name="aPassword">
          </div>
          <button type="submit"  name="log" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold">Login</button>
          <?php if(isset($msg)) {echo $msg; } ?>
          <div class="form-group mt-4">
          <label for="pass" class="pl-2 font-weight-bold"> <a href="signup.php" class="text-dark font-weight-bold mt-3 pl-2">Create An Account .. Clikc Here</a> </label>
          </div>
        </form>
        <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back
            to Home</a></div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>