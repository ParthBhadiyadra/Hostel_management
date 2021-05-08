<?php
include("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Managemenat system</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../css/mystyle.css">
</head>
<body>
<!-- Navigartion bar  start-->
      <nva class="navbar navbar-expand-md bg-dark navbar-dark">
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


<div class="container_fluide feed-bg pb-1">
    <div class="container pt-3 pb-4">
    <div class="row " style="height: 100%;">
    <div class="col-md-2"></div>
    <div class="col-md-8 panel mt-2  feedbox " >
        <h2 class="text-center" style="font-family:'typo'; color:#000066">FEEDBACK/REPORT A PROBLEM</h2>
        <div style="font-size:14px">
        <?php if(@$_GET['q'])echo '<span  classs="mt-4 p-3 text-center" style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
            else{
                echo' 
You can send us your feedback through e-mail on the following e-mail id:<br />
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<a href="mailto:madhavsoni598@gmail.com" style="color:#000000">madhavsoni598@gmail.com</a><br /><br />
</div><div class="col-md-1"></div></div>
<p>Or you can directly submit your feedback by filling the enteries below:-</p>
<form role="form"  method="post" action="feed.php?q=feedback.php">
<div class="row">
<div class="col-md-3"><b>Name:</b><br /><br /><br /><b>Subject:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text"><br />    
   <input id="name" name="subject" placeholder="Enter subject" class="form-control input-md" type="text">    

</div>
</div>
</div><!--End of row-->

<div class="row">
<div class="col-md-3"><b>E-Mail address:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">    
 </div>
</div>
</div><!--End of row-->

<div class="form-group"> 
<textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Write feedback here..."></textarea>
</div>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</form>';}
             ?>
    </div>
    </div>
    <div class="col-md-2 "></div>

    </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



</body>
</html>
