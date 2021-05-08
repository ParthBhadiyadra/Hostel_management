<?php
session_start();
require("../db.php");
define('PAGE', 'dashboard');

if(isset($_SESSION['Admin']))
{
    $email = $_SESSION['Email'];
} else 
{
    echo "<script> location.href='login.php'; </script>";
}

if(isset($_GET['del']))
{
  $del_id=$_GET['del'];
  $sql = "DELETE FROM pg_hostel where pg_hostel_id=$del_id";
  $r=mysqli_query($con,$sql) or die("not delete");
  if($r)
  {
    echo '<script> alert("Deleted Successfully ... !"); </script>';
    echo "<script> location.href='dashboard.php'; </script>";
  }
  else{
    echo '<script> alert("Not Deleted ... !"); </script>';
  }
}


if(isset($_GET['pg']))
{
   
        $pg=$_GET['pg'];
        $sql = "SELECT staus from pg_hostel WHERE pg_hostel_id=$pg";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_row($res);
        if($row[0]=="Approved")
        {
            echo '<script> alert("Already Approved ... !"); </script>';
        }
        else{
            $sql = "UPDATE pg_hostel SET staus='Approved' where pg_hostel_id=".$pg;
                    $res=mysqli_query($con,$sql) or die("not update");
                    if($res)
                     {
                    echo '<script> alert("Successfully Updated ...!"); </script>';
                    unset($_GET['pg']);
                    unset($_GET['ap']);
                    echo "<script> location.href='dashboard.php'; </script>";
                     }
                else{
                    echo '<script> alert("Error not update... !"); </script>';
                }
    }
}

include("header.php");
?>

<div class="col-sm-9 col-md-10">
  <div class="row mx-5 text-center">
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header">Requests Received</div>
        <div class="card-body">
          <h4 class="card-title">
<?php 
$sql = "SELECT * FROM pg_hostel WHERE staus ='Pending'";
$res=mysqli_query($con,$sql) or die("not count". mysqli_error($con));
$noreq=mysqli_num_rows($res);
echo $noreq;
?>
          </h4>
          <a class="btn text-white" href="pg_hostel.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Student</div>
        <div class="card-body">
          <h4 class="card-title">
<?php            
$sql = "SELECT * FROM user";
$res=mysqli_query($con,$sql) or die("not count". mysqli_error($con));
$nostud=mysqli_num_rows($res);
echo $nostud; ?>
          </h4>
          <a class="btn text-white" href="student.php">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">No. of Hostel</div>
        <div class="card-body">
          <h4 class="card-title">
<?php            
$sql = "SELECT * FROM pg_hostel";
$res=mysqli_query($con,$sql) or die("not count". mysqli_error($con));
$nohostel=mysqli_num_rows($res);
echo $nohostel; 
?>
          </h4>
          <a class="btn text-white" href="pg_hostel.php">View</a>
        </div>
      </div>
    </div>
  </div>
  <div class="mx-5 mt-5 text-center">
  <p class=" bg-dark text-white p-2">List of Hostel Requesters</p>
  <?php
  $sql = "SELECT * FROM pg_hostel WHERE staus ='Pending'";
  $res=mysqli_query($con,$sql) or die("not count". mysqli_error($con));
  $count=1;
  echo '<table class="table">
  <thead>
  <tr>
      <th > Id</th>
      <th>PG/Hostel Name</th>
      <th>Owner name</th>
      <th>Area</th>
      <th>City</th>
      <th>fees</th>
      <th >Type</th>
      <th >PG/Hostle</th>
      <th>Status</th>
      <th>Action </th>
  </tr>
  </thead>
  <tbody>';
  $count = 1;
  while($row = mysqli_fetch_row($res))
  {
    $sql = "SELECT Fname, Lname from owner INNER join pg_hostel on pg_hostel.pg_id = owner.pg_id WHERE pg_hostel.staus='Pending' and pg_hostel.pg_id=$row[6]";
    $r=mysqli_query($con,$sql) or die("not found");
    $n=mysqli_fetch_row($r);
  echo '<tr>';
      echo '<td >'.$count.'dd'.$row[0].'</td>';
      echo '<td>'. $row[1].'</td>';
      echo '<td>'.$n[0].'&nbsp;'.$n[1].'</td>';
      echo '<td>'.$row[3].'</td>';
      echo '<td>'.$row[4].'</td>';
      echo '<td>'.$row[5].'</td>';
      echo '<td>'.$row[7].'</td>';
      echo '<td>'.$row[8].'</td>';
      echo '<td>'.$row[9].'</td>';
      $temp=strcmp($row[9],'Pending');
      $temp1=strcmp($row[9],'Approved');
     $count = $count + 1;
      if($temp==0)
      {   
          echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to approve this PG / Hostel');\" href='dashboard.php?pg=".$row[0]."'><i class='fas fa-thumbs-up'></i></a> &nbsp; &nbsp;
          <a onClick=\"javascript: return confirm('Are you sure you want to Delete this PG / Hostel');\" href='dashboard.php?del=".$row[0]."'><i class='fa fa-trash' aria-hidden='true'></i></a>
          
          </td>";
          
         
       } else{
          echo    "<td><a onClick=\"javascript: return alert('Already Approved ... !');\"><i class='fas fa-thumbs-up'></i></a></td>";       
   
         }
  }
  echo '</tbody>
  </table>';
  ?>
  </div>
</div>

<?php
include('footer.php'); 
?>
