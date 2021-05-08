<?php
date_default_timezone_set("Asia/Kolkata");
include('db.php');
$ref=@$_GET['q'];
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];

$date=date("Y-m-d");

$feedback = $_POST['feedback'];
$q=mysqli_query($con,"INSERT INTO feedback_tbl VALUES('' , '$name', '$email' , '$subject', '$feedback' , '$date')")or die ("Error". mysqli_error($con));
header("location:$ref?q=Thank you for your valuable feedback");
?>