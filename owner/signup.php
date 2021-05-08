<?php
error_reporting(0);
include('../db.php');
date_default_timezone_set("Asia/Kolkata");
session_start();
$temp="";
    if(isset($_POST['submit']))
    {
        $email=trim($_POST['email']);
        $pass=md5($_POST['password']);
        $fname=strtoupper(trim($_POST['fname']));
        $lname=strtoupper(trim($_POST['lname']));
        $mobile=trim($_POST['mobile']);
        $city=strtoupper(trim($_POST['city']));
        
        $sql="select * from owner where email='".$email."' and email_status =1";
            
        $res=mysqli_query($con,$sql) or die("error not fatch email");
      
        if(0==mysqli_num_rows($res))
        {
            $otp=rand(100000,999999);
            $n_otp=md5($otp);
            $sql1="INSERT INTO owner(email,password,mob_no,Fname,Lname,city) VALUES('".$email."','".$pass."','".$mobile."','".$fname."','".$lname."','".$city."')";
            $res = mysqli_query($con, $sql1) or die("error not insert into owner");
            $pg_id=mysqli_insert_id($con);
            $_SESSION['pg_id']=$pg_id;
           
            $sql1="insert into otp(opt,c_at,user_id) values('".$n_otp."','".date("Y-m-d H:i:s")."','".$pg_id."')";
            $res=mysqli_query($con,$sql1) or die("error");
            $id=mysqli_insert_id($con);
            if(!empty($id))
            {
              $temp=1;
            }
            $_SESSION['otp_id']=$id;
            $_SESSION['email']=$email;
            include("../sendemail.php");
            $alertmsg=send_otp($email,$otp);
           

            
        }
        else{
          $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Email id is Already Registred </div>';
        }
    
    }
    if(isset($_POST['verify']))
    {
        $id=$_SESSION['otp_id'];
        $user_otp=md5($_POST['opt']);
        $sql="select *  from otp where otp_id=".$id." AND is_exp != 1 AND NOW() <=DATE_ADD(c_at, INTERVAL 15 MINUTE)";
        $res=mysqli_query($con,$sql) or die("not fetch ");
        $count= mysqli_num_rows($res);
        if(!empty($count))
        {
            $row=mysqli_fetch_row($res);
            $email=$_SESSION['email'];
            $pg=$_SESSION['pg_id'];
            if($row[1]==$user_otp)
            {
              $sql= "UPDATE owner set email_status =1 WHERE  pg_id=$pg";
              $res=mysqli_query($con,$sql) or die("not update".mysqli_error($con));
              $sql="update otp set is_exp=1 where otp_id=".$id;
              $res= mysqli_query($con,$sql) or die("not update otp");
              $temp=2;
              $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">registered Successfully </div>';
              $sql = "DELETE FROM otp WHERE otp_id=$id";
              mysqli_query($con,$sql) or die("OTP is Not Deleted ....");
            }
            else
            {
              $otpmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> otp is not correct  </div>';
              $temp=1;
            }
        }
        else{
          $otpmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> otp is not correct  </div>';
          $temp=1;
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
   
    .box{
        background: rgba(255,255,255,0.5);
    }
   </style>
  <title>Registration</title>
</head>

<body class=bg>
  <div class="mb-3 text-center mt-5 box" style="font-size: 30px;">
    <i class="fas fa-stethoscope"></i>
    <span class="box">Hostel / PG Managment System</span>
  </div>
  <p class="text-center box" style="font-size: 20px;"> <i class="fas fa-user-secret text-danger"></i> <span> PG / hostel owner Registration
    </span>
  </p>    
  <div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
      <div class="col-sm-6 col-md-4">
      <?php
      
            if(!empty($temp == 1))
            {
             ?>
             <form action="" class="shadow-lg p-4 box " method="POST">
          <div class="form-group">
         <!-- <div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">OPT is successfully send <br>Ckeck Email For OTP </div> -->
         <?php if(isset($alertmsg)){ echo $alertmsg;} ?>
            <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">One Time Password</label><input type="tel"
              class="form-control" placeholder="OTP" name="opt" required pattern="[0-9]{6}" title="Onle Six Digits can  allowed">
            <!--Add text-white below if want text color white-->
            <?php if(isset($otpmsg)) {echo $otpmsg; } ?>
          </div>
          <button type="submit" name="verify" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold">Verify</button>
          </form>
           
       


      <?php  }
      else if($temp == 2)
      {
        ?>
          <?php echo "<script> location.href='login.php'; </script>"; ?>
        <?php
      }
      else{
  ?>
    
        <form action="" class="shadow-lg p-4 box " method="POST">
          <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
              class="form-control" placeholder="Email" name="email" required>
            <!--Add text-white below if want text color white-->
            <?php if(isset($msg)) {echo $msg; } ?>
            <small class="form-text">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input type="password" class="form-control" placeholder="Password" name="password" required>
          </div>
          <div class="form-group">
            <i class="fas fa-user"></i><label for="fname" class="pl-2 font-weight-bold">First Name</label>
            <input type="text" class="form-control" placeholder="First Name " name="fname" required pattern="[a-zA-Z]{2,}" title="only characters are allowed">
          </div>
          <div class="form-group">
            <i class="fas fa-user"></i><label for="lname" class="pl-2 font-weight-bold">Last Name</label>
            <input type="text" class="form-control" placeholder="Last Name " name="lname" required pattern="[a-zA-Z]{2,}" title="only characters are allowed">
          </div>
          <div class="form-group">
            <i class="fas fa-mobile-alt"></i><label for="mobile" class="pl-2 font-weight-bold">Mobile</label>
            <input type="tel" class="form-control" placeholder="Mobile Number " name="mobile" required pattern="[0-9]{10}" title="only Number can allowed and 10 digit">
          </div>
          <div class="form-group">
            <i class="fas fa-city"></i><label for="City" class="pl-2 font-weight-bold">City</label>
            <input type="text" class="form-control" placeholder="Your City " name="city" required pattern="[a-zA-Z]{2,}" title="only characters are allowed">
          </div>
          
          <button type="submit" name="submit" class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold">Submit</button>
          
        </form>
        <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back
            to Home</a></div>

       
      <?php 
      }
    
      ?>
    </div>
  </div>

  <!-- Boostrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 
</body>

</html>