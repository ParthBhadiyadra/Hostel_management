
<?php  
    //fetch.php  
    include '../db.php'; 
    if(isset($_POST["Hostel_id"]))  
    {  
    $query  = "SELECT * FROM pg_hostel WHERE pg_hostel_id = '".$_POST["Hostel_id"]."'";  
    $result = mysqli_query($con, $query);  
    $row    = mysqli_fetch_array($result);  
    echo json_encode($row);  
    }  
 ?>