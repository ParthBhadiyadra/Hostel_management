<?php
include("../db.php");
session_start();
if ($_SESSION['student']) {
  $Email =$_SESSION['Email'];
  
} else {
  echo "<script> location.href='login.php'; </script>";
}
if(isset($_POST['search']))
{
    $serach=trim($_POST['val']);
    $sql="select * from pg_hostel where 	staus='Approved' and (city like '".$serach."%' or city like '%".$serach."' or area like '".$serach."%' or area like '%".$serach."')";
    $res=mysqli_query($con,$sql) or die('no select <br>'.$sql.'<br>'. mysqli_error($con));
   
  }
  else{
    $sql="select * from pg_hostel where staus='Approved'";
    $res=mysqli_query($con,$sql) or die("not found  <br>".$sql ."<br>". mysqli_error($con));
  }



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
      <nva class="navbar navbar-expand-md bg-dark navbar-dark container-fuild">
        <div class="container">
        <a href="#" class="navbar-brand text-warning font-weight-bold">Hostel Management System </a>
        <form class="form-inline pl-5 float-right " action ="" method="post">
            <div class="input-group">
            <input class="form-control mr-sm-2 " name="val"  id="val" type="search" placeholder="Area or city" aria-label="Search">
            <div class="input-group-append">
              <button type="submit" name="search" class="btn btn-secondary"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
          <button class="navbar-toggler menu" type="button" data-toggle="collapse" dat-target="#menulinks" href="#menulinks" >
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
<!--Navigation bar end -->

<!--Slider start -->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../image/h5.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
             
            </div>
          </div>
          <div class="carousel-item">
            <img src="../image/hostel1.png" class="d-block w-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">
            
            </div>
          </div>
          <div class="carousel-item">
            <img src="../image/bgh.jpg" class="d-block w-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">
            
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
<!--Slider end -->

<section class="section-1 bg-light   mt-0">
  <div class="container ">
      <h1 class="heading-1 pb-2 text-center">Our Hostels</h1>
     <?php
      

      $count=3;

    while($row=mysqli_fetch_row($res))
      {
        $sql1="select * from imgaes where pg_hostel_id=$row[0]";
        $res1=mysqli_query($con,$sql1) or die('not found <br>'.$sql1.'<br>' . mysqli_error($con));
        $img=mysqli_fetch_row($res1);
  
        if ($count==3) {
          echo "<div class='row mt-4'>";
          $count=0;
        }
        if($row[14]=='yes')
        {
          $food="With food";
        }
        else{
          $food="No food";
        }
        echo " 
        <div class='col-md-4 col-sm-12'>
          <div class='card-container '>
            <div class='card'>
              <div class='front'>
                <div class='cover'>
                  <img  class='card-img-top cimg' src='../uploadimages/".$img[1]."'/> 
                </div>
                <div class='content'>
                  <div class='main'>
                  <h5 class='card-title text-uppercase  pt-2 text-center'>".$row[1]."</h5> <hr>

                  <p class='text-justify text-capitalize'>".$row[10]."</p>
                  <p class='text-left text-capitalize'><address class='text-capitalize'><strong> Address :-</strong> ".$row[3].", ".$row[13].", ".$row[3].", ".$row[4]."</address></p>
                  <p class='text-left text-capitalize'><strong > Phone : </strong>".$row[12]."</p>
                  <p class='text-left'><b>".$row[7]."</b> For only <b> ".$row[8]."</b> &nbsp; ".$food." </p>
                  <p class='text-left'><b>Monthly Fees :- </b>".$row[5]."</p>
                 
                 
                   
                  </div>
                  <div class='card-footer bg-white text-center'>
        <a href='apply.php?id=".$row[0]."' class='nav-link'> <button type='button' class='btn btn-primary'>Apply Now</button></a>
    </div> 
                </div>
              </div>
             
            
            </div> <!-- end card-container -->
          </div>
        </div>";

        $count++;
        if ($count==3) {
          echo '</div>';
        }
      }
      if($count !=3)
      {
        echo '</div>';
      }
   
      
    
     ?> 
  </div>
</section>
   
<!--Hostle details -->





    


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>