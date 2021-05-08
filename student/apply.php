<?php
session_start();
if ($_SESSION['student']) {
  $Email =$_SESSION['Email'];
  $student_id=$_SESSION['student_id'];
  
} else {
  echo "<script> location.href='login.php'; </script>";
}
include("../db.php");
if(isset($_POST['apply']))
{
  $room_no=$_POST['rooms'];
  $bed_no=$_POST['bed'];
  $sdate=$_POST['sdate'];
  $ldate=$_POST['ldate'];
  $sql="INSERT INTO allocated (user_id , bed_no , room_id ,	ldate ,sdate ) values(".$student_id.",".$bed_no.",".$room_no.",'".$ldate."','".$sdate."')";
  $result=mysqli_query($con,$sql) or die("not found <br>".$sql."<br>". mysqli_error($con));
  if($result)
  {
    echo "<script> alert('Your Bed is successfully Assign....');</script>";
    echo "<script> location.href='dash.php'; </script>";
  }
  else{
    die("some errror");
  }
}
if(isset($_GET['id']))
{    $stud_id=$_SESSION['student_id'];
    $id=$_GET['id'];
    $sql="SELECT * FROM `allocated` where user_id=$stud_id and 	0 <= DATEDIFF(ldate,Now()) ";
    $res=mysqli_query($con,$sql) or die("not found <br>".$sql."<br>". mysqli_error($con) );
    $row=mysqli_affected_rows($con);
    $sql="select gender from user where email='$Email'";
    $q=mysqli_query($con,$sql) or die("no t");
   $stu_id=mysqli_fetch_row($q);
   $gender=$stu_id[0];
   $sql="select pg_type from pg_hostel where pg_hostel_id=$id";
   $s=mysqli_query($con,$sql) or die("not found");
   $type=mysqli_fetch_row($s);
   $h=$type[0];
   if($h=="Boys")
   {
     $temp="M";
   }
   else{
     $temp="F";
   }
   if($temp!=$gender)
   {
    echo "<script> alert('Hostel is only for ".$h."');</script>";
   
   }
   if($temp!=$gender)
   {
    echo "<script> location.href='home.php'; </script>";
   }
  
    if($row!=0)
    {
      echo "<script> alert('You are Already Enroll in Hostel'); </script>";
    }
   
    if($row!=0)
    {
      echo "<script> location.href='dash.php'; </script>";
    }
   else{
      $sql="select * from rooms where pg_hostel_id=$id ";
      $r=mysqli_query($con,$sql) or die("not found <br>".$sql."<br>". mysqli_error($con) );
    
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apply For Hostel</title>
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

      <div class="container mt-3">
      <form method="POST" action="" >
      <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="emial"  value='<?php  echo $Email;  ?>'  readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Room </label>
    <select class="form-control" id="rooms" name="rooms" required>
      <option value="">Select Room</option>
    <?php  while($data=mysqli_fetch_row($r))
      {
       echo " <option value=".$data[0].">".$data[2]."</option> ";
      }  ?>
      
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select bed </label>
    <select class="form-control" id="bed" name="bed" required>
       <option value="">Select Bed</option>
    </select>
  </div>
  <div class="form-group">
    <label for="Date">Start Date</label>
    <input type="date" class="form-control" id="sdate" name="sdate" value="<?php echo date("Y-m-d");?>" required >
    </select>
  </div>
  <div class="form-group">
    <label for="Date">End Date</label>
   <input type="date" class="form-control" id="ldate" name="ldate" required >
    </select>
  </div>
      <input type="hidden" name="pg_hostel_id" value="<?php echo $id; ?>">
  <input type="submit" value="Apply" name="apply" id="apply" class="btn btn-primary mybtn">
</form>
      </div>
  
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#rooms').on('change',function(){
            var H_ID = $(this).val();
            if(H_ID){
              $.ajax({
                url: "ajaxFile.php",
                method: "POST",
                data: { Hostel_id:H_ID },
                success: function(html) {
                  
                  $('#bed').html(html);
                
                }
                });
            }else{
                $('#bed').html('<option value="">Select room first</option>');
            
            }
        });
    });
</script>
</body>
</html>




<?php
}
else{
  echo "<script> location.href='home.php'; </script>";
}



?>