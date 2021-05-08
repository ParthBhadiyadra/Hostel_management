<?php  
include '../db.php';
 if(!empty($_POST))  
 {  
     $output       = '';  
    

     $name   =strtoupper( mysqli_real_escape_string($con, $_POST["name"]));  
     $address =strtoupper( mysqli_real_escape_string($con, $_POST["address1"])); 
     $area =strtoupper(mysqli_real_escape_string($con, $_POST["area"]));
     $city =strtoupper(mysqli_real_escape_string($con, $_POST["city"]));
     $fees=mysqli_real_escape_string($con, $_POST["fees"]);
     $type=mysqli_real_escape_string($con, $_POST["type"]);
     $pg_type=mysqli_real_escape_string($con, $_POST["type_for"]);
     $about=strtoupper(mysqli_real_escape_string($con, $_POST["about"]));
     $food=mysqli_real_escape_string($con, $_POST["food"]);
     $road=strtoupper(mysqli_real_escape_string($con, $_POST["address2"]));
     $mobile=mysqli_real_escape_string($con, $_POST["mobile"]);
     if($_POST["Hostel_id"] != '')  
     {  
          $query = "  
          UPDATE pg_hostel SET name ='".$name."', address='".$address."',area='".$area."', city = '".$city."', fees = ".$fees." , type ='".$type."',
          pg_type ='".$pg_type."',   
          about = '".$about."',   
          mobile = ".$mobile." , 
          road = '".$road."',
          food = '".$food."'
          WHERE pg_hostel_id ='".$_POST["Hostel_id"]."'"; 
          

     } 
     else{
          echo " pg_h_id not found";
     } 
     $res=mysqli_query($con,$query) or die("not run query !!! ". mysqli_error($con));

      echo "<script> location.href='pg_detail.php'; </script>";
}  
?>
 












