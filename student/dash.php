<?php
session_start();
if ($_SESSION['student']) {
  $Email =$_SESSION['Email'];
  $student_id=$_SESSION['student_id'];
} else {
  echo "<script> location.href='login.php'; </script>";
}
include("../db.php");
$user_id=$_SESSION['student_id'];
if(isset($_GET['del']))
{
  $sql="delete from allocated where user_id=$user_id and room_id=$_GET[del]";
  $res=mysqli_query($con,$sql) or die("not delete".mysqli_error($con) ."<br>". $sql);
  if($res)
  {
    echo "<script> alert('Booking Deleted Successfully...');  </script>";
  }
  if($res)
  {
    echo "<script> location.href='home.php'; </script>";
  }

}
$sql="select * from allocated where user_id=$user_id and 0 <= DATEDIFF(ldate,Now())";
$res=mysqli_query($con,$sql) or die("not found");
$count=mysqli_affected_rows($con);
if($count==0)
{
  echo "<script> alert('not record found .. please Apply in hostel or pg');  </script>";
}
if($count==0)
{
  echo "<script> location.href='home.php'; </script>";
}
else{
 $sql = "select * from pg_hostel inner join rooms on pg_hostel.`pg_hostel_id`=rooms.pg_hostel_id INNER JOIN allocated on allocated.room_id=rooms.room_id INNER JOIN user on user.user_id=allocated.user_id where user.user_id=$user_id and 0 <= 0 <= DATEDIFF(allocated.ldate,Now())";
  $res=mysqli_query($con,$sql) or die("not fount");
  $row=mysqli_fetch_array($res);
 

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
    <style>
     table {
    border-collapse: collapse;
    width: 100%;
  }
  
  th, td {
    text-align: left;
    padding: 8px;
  }
  
 tr:nth-child(even) {background-color: #f2f2f2;}

      </style>
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
    <div class="container mt-4">
    <div class="table-responsive">
      <table class="table">
      <tr>
      <th>Hostel Name :</th>
      <td><?php echo $row[1]; ?></td>
      </tr>
      <tr>
      <th>City</th>
      <td><?php echo $row[4]; ?></td>
      </tr>
      <tr>
      <th>Monthly Fees</th>
      <td><?php echo $row[5]; ?></td>
      </tr>
      <tr>
      <th>Room Number :</th>
      <td><?php echo $row['room_no']; ?></td>
      </tr>
      <tr>
      <th>Bed Number :</th>
      <td><?php echo $row['bed_no']; ?></td>
      </tr>
      <tr>
      <th>Join Date :</th>
      <td><?php echo $row['sdate']; ?></td>
      </tr>
      <tr>
      <th>leave Date :</th>
      <td><?php echo $row['ldate']; ?></td>
      </tr>
      <tr>
        <td colspan="2" class="mypadd">
     <?php  echo " <a onClick=\"javascript: return confirm('Are you sure you want to Delete Booking');\" href='dash.php?del=".$row['room_id']."' class='btn btn-danger'>Delete Booking</a>"; ?>
         
        </td>
      </tr>
      </table>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
<?php
}
?>