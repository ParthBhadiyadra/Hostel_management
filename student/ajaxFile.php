<?php
include("../db.php");
if(isset($_POST["Hostel_id"]))
{
  $hostel_id=$_POST['Hostel_id'];
  $sql="SELECT * FROM rooms where room_id=$hostel_id";
  $res=mysqli_query($con,$sql) or die("not Found <br>".$sql."<br>".mysqli_error($con));
  $row=mysqli_fetch_row($res);
  $pg_id=$row[1];
  $room_id=$row[0];
  $sql="SELECT * FROM allocated where room_id=$room_id";
  $result=mysqli_query($con,$sql) or die("not Found <br>".$sql."<br>".mysqli_error($con));
  $i=1;
 
  $count=mysqli_affected_rows($con);
  $sql="SELECT bed_no FROM allocated where room_id=$room_id";
  $fl= mysqli_query($con,$sql) or die("Not found ");
  
  while($b=mysqli_fetch_row($fl))
  {
    $bed_array[]= $b[0];
  }
  sort($bed_array);

    $i=1; $temp=0;
    for($i=1; $i <= $row[3] ; $i++ )
    {     
        if($i==$bed_array[$temp])
        {
            $temp++;
            continue;
        }
        else{
          echo " <option value=".$i.">".$i."</option> ";
        }
    }
    if($temp==$row[3])
    {
      echo " <option value=''>All bed alloacted please select another room</option> ";
    }

 
    
}
?>