<?php
define('PAGE', 'room');
define('PAGE1', 'add_room');

include('../db.php');
 session_start();
 if($_SESSION['owner'])
 {
    $owner_Email = $_SESSION['oEmail'];
    $id=$_SESSION['pg_id'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
 if(isset($_POST['add']))
 {
        $roomno=trim($_POST['roomno']);
        $pg_hoste_id=$_POST['pg_name'];
        $bed=$_POST['bed'];
        $sql="select room_no from rooms where room_no=$roomno and pg_hostel_id=$pg_hoste_id";
        $res=mysqli_query($con,$sql) or die("not found <br>". $sql. "<br>".mysqli_error($con));
        $count=mysqli_num_rows($res);
       
        if($count==0)
        {
            $sql="INSERT INTO rooms(pg_hostel_id, room_no, bed, fees) VALUES(".$pg_hoste_id.",".$roomno.",".$bed.",'0')";
           $res= mysqli_query($con,$sql) or die("not found <br>".$sql ."<br>" . mysqli_error($con));
           if($res)
           {
            echo "<script> alert('Successfully Room Added .....!') </script>";
            unset($_POST);
           }
        }
        else{
            $msg='<small class="text-danger">Room Number Already Exist </small>';
        }
 }

 include('header.php');
$sql="select pg_hostel_id,name from pg_hostel where pg_id=$id";
$res=mysqli_query($con,$sql) or die("not found <br>".$sql."<br>".mysqli_error($con));
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
<p class=" bg-dark text-white p-2 text-left">Add Room Details </p>
<hr>
<div class="col-md-12 mt-5">
<form method="POST">
  <div class="form-group row">
    <label for="Pg_hostel_name" class="col-sm-2 col-form-label">Select PG / Hostel </label>
    <div class="col-sm-10">
   
      <select id="pg_name" class="form-control" name="pg_name" required>
             <option value="">Choose...</option>
         <?php  while($row=mysqli_fetch_row($res))
         {      
      echo '   <option value='.$row[0].'>'.$row[1].'</option>'; } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Room Number</label>
    <div class="col-sm-10">
      <input type="tel" class="form-control" id="roomno" name="roomno" placeholder="Enter Room Number" required pattern="[0-9]{2,8}" title="Please Enter Number only">
    <?php  if(isset($msg)){ echo $msg; } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="Pg_hostel_name" class="col-sm-2 col-form-label"> Total Bed  </label>
    <div class="col-sm-10">
   
      <select id="bed" class="form-control" name="bed" required>
        <option value="">Choose...</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary" name="add">Add</button>
    </div>
  </div>
</form>
</div>
</div>




<?php
include("footer.php");
?>