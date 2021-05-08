<?php
include("db.php");
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
    <link rel="stylesheet" href="css/mystyle.css">
    <script>
    window.onload=function(){
			document.getElementById('preloader').style.display="none";
			document.getElementById('content').style.display="block";
    };
    </script>
   <style>
    #content { display: none;}
    </style>
</head>
<body>
<div id="preloader">
    		<div class="book">
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		</div>
    	</div>
<div class="container-fluid p-0 m-0" id="content">
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
               <a href="" class="nav-link text-white">HOME</a>
             </li>
             <li class="nav-item">
              <a href="#service" class="nav-link text-white"> SERVICE</a>
            </li>
            <li class="nav-item">
              <a href="#about" class="nav-link text-white">ABOUT </a>
            </li>
            <li class="nav-item">
              <a href="feedback.php" class="nav-link text-white">CONATCT </a>
            </li>
            <li class="nav-item">
              <a href="student/login.php" class="nav-link text-white"> LOGIN</a>
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
            <img src="image/h3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
           
            </div>
          </div>
          <div class="carousel-item">
            <img src="image/hostel1.png" class="d-block w-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">
            
            </div>
          </div>
          <div class="carousel-item">
            <img src="image/h1.jpg" class="d-block w-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">
            
            </div>
          </div>
          <div class="carousel-item">
            <img src="image/h5.jpg" class="d-block w-100 " alt="...">
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

<section class="section-1 bg-light  pt-3 mt-0">
  <div class="container text-center">
      <h1 class="heading-1">Our Hostels</h1>
      <p class="para-1">We provides a Best Hostel as well as Paying Guest Facilities. 
      </p>
      <?php
      
      $sql = "SELECT * FROM pg_hostel where staus='Approved' ORDER BY pg_hostel_id DESC LIMIT 6";
      $res=mysqli_query($con,$sql) or die("not found <br>".$sql."<br>". mysqli_error($con));
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
                  <img  class='card-img-top cimg' src='uploadimages/".$img[1]."'/> 
                </div>
                <div class='content'>
                  <div class='main'>
                  <h5 class='card-title text-uppercase  pt-2 text-center'>".$row[1]."</h5> <hr>

                  <p class='text-justify text-capitalize'>".$row[10]."</p>
                  <p class='text-left text-capitalize'><address class='text-capitalize text-left'><strong> Address :-</strong> ".$row[3].", ".$row[13].", ".$row[3].", ".$row[4]."</address></p>
                  <p class='text-left text-capitalize'><strong > Phone : </strong>".$row[12]."</p>
                  <p class='text-left'><b>".$row[7]."</b> For only <b> ".$row[8]."</b> &nbsp; ".$food." </p>
                  <p class='text-left'><b>Monthly Fees :- </b>".$row[5]."</p>
                 
                 
                   
                  </div>
                  <div class='card-footer'>
                  <small class='text-muted'>Login for Apply </small>
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
    <div class=" showm float-right">
  <a href="student/login.php" class="nav-link text-right  btn  border text-info">Show more</a>
  </div>
   
  </div>
</section>
<!--Hostle details --> 

<section class="container-fluid text-center section-2 mt-0 pt-4" id="service">
  <div class="container">
  <h1 class="text-danger pt-3">SERVICES</h1>
  <h5 class="p-3">Our Servies </h5>
  <div class="row pt-2 pb-2">
      <div class="col-lg-4 col-md-4 col-sm-10 d-block m-auto ">
        <div class="d-block m-auto bg-warning iconset">
          <i class="fa fa-comments ico text-white mt-3"></i>
        </div>
        <h3 class="pt-2">24/7 Customer service</h3>
        <p>You can contact 24/7.Available in Gujarati, Hind, English Helping You meet the Hostel</p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-10 d-block m-auto">
        <div class="d-block m-auto bg-warning iconset">
          <i class="fa fa-check-circle  ico text-white mt-4"></i>
        </div>
        <h3 class="pt-2">Instant Confirmation</h3>
        <p>Instant Confirmation of your Hostel booking and provide all information about the hostel</p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-10 d-block m-auto">
        <div class="iconset d-block m-auto bg-warning iconset">
          <i class="fas fa-shield-alt ico mt-4 text-white"></i>
        </div>
        <h3 class="pt-2">Security</h3>
        <p>We Provide Best Security for all the students. and we also care about girls students</p>
      </div>
  </div>
  </div>
</section>
<!--SErviece Section end-->


<!--Footer -->
<footer class="bg-dark text-info pt-5 mt-0" id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h4 class="text-center">About us </h4>
        <p class="text-justify">The Hostel Management System is an online site developed for managing different activities in the hostel as well as easy to find best hostel and pg in different city. It is very easy to use with a user-friendly GUI to automate, arrange and handle all the procedures of managing hostel offices.</p>
      </div>
      <div class="col-lg-3">
        <h4 class="text-center">usefull links </h4>
        <ul class="list-unstyled">
          <li><a href="https://www.facebook.com/parth.bhadiyadra.5/" class="qlink" ><i class="fab fa-facebook  "></i> &nbsp;Facebook </a></li>
          <li><a href="https://www.instagram.com/parth_bhadiyadra/?hl=en" class="qlink"><i class="fab fa-instagram"></i> &nbsp; Instagram </a></li>
          
        </ul>
      </div>
      <div class="col-lg-3">
        <h4 class="text-center">Contact us</h4>
        <p>
            <address class="">Goverment MCA College , Khokhra,Ahmedabad-380008</address>
            <strong>Phone :</strong>9624201726<br>
            <strong>Email :</strong><a href="mailto:soniparth598@gmail.com" style="text-decoration:none;" class="text-info">Parth soni</a> 

        </p>
      </div>
      <div class="col-lg-3">
        <div class="conatiner">
          <div class="row text-center ">
            <div class="col-lg-12 col-sm-12 col-md-12 text-center">
            <h4> OUR TEAM</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6  m-auto pt-5">
              <img src="image/parth.png" height="80px" width="80px" alt="..." class="rounded-circle" data-toggle="modal" data-target="#exampleModalCenter">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6  m-auto pt-5">
             <img src="image/harsh.png" height="80px" width="80px" alt="..." class="rounded-circle" data-toggle="modal" data-target="#exampleModalCenter1">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="container-fluid text-white text-center p-1">
&copy; 2020-2021 All rights are reserved.
</div>

</footer>

<div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Developer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>
        <div class="row">
        <div class="col-md-4">
        <img src="image/parth.png" width=100 height=100 alt="Parth bhadiyadra" class="img-rounded">
        </div>
        <div class="col-md-8">
        <a href="https://www.facebook.com/parth.bhadiyadra.5" target="_blank" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Parth bhadiyadra</a>
        <h6 style="font-family:'typo' "><i class="fa fa-mobile-alt"></i>&nbsp;&nbsp; : 9624201726</h6>
        <h6 style="font-family:'typo' "><i class="fa fa-at"></i>&nbsp;&nbsp;: soniparth598@gmail.com</h6>
        <h6 style="font-family:'typo' "><i class="fa fa-university"></i>&nbsp;&nbsp;: 195690693010</h6>
        </div></div>
		</p>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Designer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>
        <div class="row">
        <div class="col-md-4">
        <img src="image/harsh.png" width=100 height=100 alt="Parth bhadiyadra" class="img-rounded">
        </div>
        <div class="col-md-8">
        <a href="https://www.facebook.com/harsh.raval.4109" target="_blank" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Harsh Raval</a>
        <h6 style="font-family:'typo' "><i class="fa fa-mobile-alt"></i>&nbsp;&nbsp; : 8734808287</h6>
        <h6 style="font-family:'typo' "><i class="fa fa-at"></i>&nbsp;&nbsp;: ravalharsh006@gmail.com</h6>
        <h6 style="font-family:'typo' "><i class="fa fa-university"></i>&nbsp;&nbsp;: 195690693061</h6>
        </div></div>
		</p>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>


</div>





    


  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>
$(window).load(function() {
    $("#preloader").fadeOut("slow");
    console.log("a");
});

</script>

</body>
</html>