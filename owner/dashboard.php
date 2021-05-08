<?php
define('PAGE', 'dashboard');
include('../db.php');
session_start();
if ($_SESSION['owner']) {
  $owner_Email = $_SESSION['oEmail'];
 $owner_id= $_SESSION['pg_id'];
} else {
  echo "<script> location.href='../index.php'; </script>";
}

include('header.php');
?>

<div class="col-sm-9 col-md-10">
  <p class=" bg-dark text-white p-2 mt-2">Dashboard </p>
  <hr>

  <div class="row mx-5 text-center">
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header">Students</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php
            $sql = "SELECT allocated.user_id from allocated INNER JOIN rooms on allocated.room_id = rooms.room_id INNER join pg_hostel on rooms.pg_hostel_id= pg_hostel.pg_hostel_id INNER JOIN owner on owner.pg_id=pg_hostel.pg_id where  owner.pg_id=$owner_id";
            $res = mysqli_query($con, $sql) or die("not count" . mysqli_error($con));
            $nostud = mysqli_num_rows($res);
            echo $nostud;
            ?>
          </h4>
          <a class="btn text-white" href="Info.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Hostel</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php
            $sql = "SELECT pg_hostel_id FROM pg_hostel where pg_id=" . $_SESSION['pg_id'];
            $res = mysqli_query($con, $sql) or die("not count" . mysqli_error($con));
            $nopg = mysqli_num_rows($res);
            echo $nopg;
            ?>
          </h4>
          <a class="btn text-white" href="pg_detail.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">Rooms</div>
        <div class="card-body">
          <h4 class="card-title">
            <?php 
$sql ="SELECT room_no from rooms inner join pg_hostel on pg_hostel.pg_hostel_id=rooms.pg_hostel_id inner join owner on 
owner.pg_id=pg_hostel.pg_id where owner.pg_id=".$_SESSION['pg_id'];
$res=mysqli_query($con,$sql) or die("not count". mysqli_error($con));
$rooms=mysqli_num_rows($res);
            echo $rooms;
            ?>
          </h4>
          <a class="btn text-white" href="manage_room.php">View</a>
        </div>
      </div>
    </div>
  </div>
  <div class="mx-5 mt-5 text-center">

  </div>
</div>


<?php
include('footer.php');
?>