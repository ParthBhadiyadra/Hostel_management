<?php
$con =mysqli_connect("localhost","root","","hostel");
if($con)
{
    
}
else{
    echo "failed";
}



/*
try
{
    $con = new PDO("mysql:host=localhost;dbname=hostel","root","");
}
catch(PDOException $e)
{
        die("Connection Failed ". $e->getmessage());
}*/
?>