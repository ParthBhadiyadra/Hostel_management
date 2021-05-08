<?php
include '../db.php';
define('PAGE', 'room');
define('PAGE1', 'info');

session_start();
if ($_SESSION['owner']) {
  $Email = $_SESSION['oEmail'];
} else {
  echo "<script> location.href='login.php'; </script>";
}

$sql = "select pg_id from owner where email='" . $Email . "'";
$res = mysqli_query($con, $sql) or die("id not found " . mysqli_error($con));
$row = mysqli_fetch_row($res);
$owner_id = $row[0];
$sql = "SELECT * FROM allocated INNER JOIN user ON user.user_id = allocated.user_id INNER JOIN rooms on rooms.room_id=allocated.room_id INNER JOIN pg_hostel ON pg_hostel.pg_hostel_id=rooms.pg_hostel_id where pg_hostel.pg_id=$owner_id";
$result = mysqli_query($con, $sql) or die("not found error");
include "header.php";
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <p class=" bg-dark text-white p-2 text-left">Bed Allocate Details </p>
  <div class="container">

    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">

          </div>
        </div>
      </div>
      <br />
      <div id="hostel_table">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              
              <th>Stu Name </th>
              <th>Hostel Name</th>
              <th>Room No</th>
              <th>Bed No</th>
              
            </tr>
          </thead>
        <?php
          while ($row = mysqli_fetch_array($result)) {
          ?>
            <tr>
              <td><?php echo $row["fname"]; ?></td>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["room_no"]; ?></td>
              <td><?php echo $row[2]; ?></td>
             </tr>
          <?php
          }
          ?>
        </table>

      </div>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>