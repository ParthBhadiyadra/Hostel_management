<?php
session_start();
require("../db.php");
define('PAGE', 'hostel');

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
    echo "<script> location.href='pg_hostel.php'; </script>";
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
        if($row[0]=="Approved") {
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
                    echo "<script> location.href='pg_hostel.php'; </script>";
                     }
                else{
                    echo '<script> alert("Error not update... !"); </script>';
                }
    }
}

include("header.php");
?>
<div class="col-sm-9 col-md-10">
    <div class="mx-5 mt-5 text-center">
        <!--Table-->
        <p class=" bg-dark text-white p-2">List of Hostel / PG</p>
        <?php


        $sql = "SELECT * FROM pg_hostel";
       $res=mysqli_query($con,$sql) or die("Error ?");
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
    while($row = mysqli_fetch_row($res)){
        $sql=$sql = "SELECT Fname, Lname from owner INNER join pg_hostel on pg_hostel.pg_id=owner.pg_id where  pg_hostel.pg_id=$row[6]";
        $r=mysqli_query($con,$sql) or die("not found");
        $n=mysqli_fetch_row($r);
        $owner_name=$n[0]."&nbsp;".$n[1];
    echo '<tr>';
        echo '<td >'.$count.'</td>';
        echo '<td>'. $row[1].'</td>';
        echo '<td>'.$owner_name.'</td>';
        echo '<td>'.$row[3].'</td>';
        echo '<td>'.$row[4].'</td>';
        echo '<td>'.$row[5].'</td>';
        echo '<td>'.$row[7].'</td>';
        echo '<td>'.$row[8].'</td>';
        echo '<td>'.$row[9].'</td>';
        $temp=strcmp($row[9],'Pending');
        $temp1=strcmp($row[9],'Approved');
       
        if($temp==0)
        {   
            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to approve this PG / Hostel');\" href='pg_hostel.php?pg=".$row[0]."'><i class='fas fa-thumbs-up text-dark'></i></a> &nbsp; &nbsp;
            <a onClick=\"javascript: return confirm('Are you sure you want to approve this PG / Hostel');\" href='pg_hostel.php?del=".$row[0]."'><i class='fa fa-trash text-dark' aria-hidden='true'></i></a>
            
            </td>";
            
           
         } else{
            echo    "<td><a onClick=\"javascript: return alert('Already Approved ... !');\"><i class='fas fa-thumbs-up text-dark'></i></a> &nbsp; &nbsp;
            <a onClick=\"javascript: return confirm('Are you sure you want to approve this PG / Hostel');\" href='pg_hostel.php?del=".$row[0]."'><i class='fa fa-trash text-dark' aria-hidden='true'></i></a>
            </td>";       
     
           }
    }
    echo '</tbody>
    </table>';
?>
</div>
<?php
include("footer.php");
?>