<?php
define('PAGE', 'SubmitRequest');
include('../db.php');
session_start();
if ($_SESSION['owner']) {
    $Email = $_SESSION['oEmail'];
} else {
    echo "<script> location.href='login.php'; </script>";
}
if (isset($_POST['submit'])) {
    $name = strtoupper(trim($_POST['name']));
    $type = trim($_POST['type']);
    $about = strtoupper(trim($_POST['about']));
    $address1 = strtoupper(trim($_POST['address1']));
    $address2 = strtoupper(trim($_POST['address2']));
    $area =strtoupper( trim($_POST['area']));
    $city = strtoupper(trim($_POST['city']));
    $type_for = trim($_POST['type_for']);
    $mobile = trim($_POST['mobile']);
    $fees = trim($_POST['fees']);
    $food = trim($_POST['food']);
    $submit_date = trim($_POST['sdate']);
    $target="../uploadimages/".basename($_FILES['imageup']['name']);
	$image=$_FILES['imageup']['name'];
    $image_tmp=$_FILES['imageup']['tmp_name'];		
    move_uploaded_file($image_tmp, $target);
    
    $status = "Pending";
    $sql1 = "select pg_id from owner where email='" . $Email . "'";

    $res = mysqli_query($con, $sql1) or die("email id of owner is not found " . mysqli_error($con));
    $row = mysqli_fetch_row($res);
    $pg_id = $row[0];
    $sql = "INSERT INTO pg_hostel (pg_hostel_id, name, address, area, city,fees, pg_id, type, pg_type, staus, about, rdate, mobile, road, food) VALUES ('','" . $name . "','" . $address1 . "','" . $area . "','" . $city . "'," . $fees . "," . $pg_id . ",'" . $type . "','" . $type_for . "','" . $status . "','" . $about . "','" . $submit_date . "'," . $mobile . ",'" . $address2 . "','" . $food . "')";
    $res = mysqli_query($con, $sql) or die("not insert into database " . mysqli_error($con));
    $pg_in_id=mysqli_insert_id($con);
    $sql="insert into imgaes values('','".$image."','$pg_in_id')";
    $res=mysqli_query($con,$sql) or die("not upload image ".$sql."<br>" . mysqli_error($con));
    if ($res) {
        echo '<script> alert("Successfully insert into database "); </script>';
    } else {
        echo '<script> alert(swal("Good job!", "You clicked the button!", "success")); </script>';
    }
    if($res)
    {
        echo "<script> location.href='dashboard.php'; </script>";
    }
   
}

include('header.php')
?>
<div class="col-sm-9 col-md-10 mt-5">
    <p class=" bg-dark text-white p-2">Submit Hostel / PG Request </p>
    <hr>
    <div class="col-md-12 mt-5">
        <form class="mx-5" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name of PG/Hostle</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Enter Name Hostle / PG" name="name" required>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Type">Type</label>
                        <select id="type" class="form-control" name="type" required>
                            <option value="">Select Type</option>
                            <option value="PG">PG </option>
                            <option value="Hostel">Hostel</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="about">Description</label>
                        <textarea type="text" class="form-control" id="about" placeholder="Write About Hostel / PG " name="about" required></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputAddress">Address Line 1</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="address1" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputAddress2">Address Line 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="address2" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="area">Area</label>
                        <input type="text" class="form-control" id="area" placeholder="Area Name" name="area" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="City">City</label>
                        <input type="text" class="form-control" id="city" placeholder="City Name" name="city" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tpye_for"> Hostel / PG For </label>
                        <select id="type_for" class="form-control" name="type_for" required>
                            <option selected value="">Select ...</option>
                            <option value="Boys">Boys</option>
                            <option value="Girls">Girls</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile number" required pattern="[0-9]{10}" title="Please Enter Number only">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fees">Fees</label>
                        <input type="tel" class="form-control" id="fees" name="fees" placeholder="Enter the mothly Fees " required pattern="[0-9]{2,8}" title="Please Enter Number only">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Food">Food</label>
                        <select id="type_for" class="form-control" name="food" required>
                            <option selected value="">Select ...</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputDate">Date</label>
                        <input type="date" class="form-control" id="inputDate" name="sdate" readonly value="<?php echo date('Y-m-d');  ?>">
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                        <label for="exampleFormControlFile1">Image </label>
                        <input type="file" class="form-control-file" id="imageup" name="imageup"   accept="image/gif, image/jpeg, image/png">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger" name="submit">Submit</button>
            <button type="reset" class="btn btn-secondary ml-4">Reset</button>
        </form>
    </div>

</div>
</div>
</div>



<?php
include('footer.php');
?>