<?php
include '../db.php';
define('PAGE', 'pg_detail');
session_start();
if ($_SESSION['owner']) {
  $Email = $_SESSION['oEmail'];
} else {
  echo "<script> location.href='login.php'; </script>";
}

$sql = "select pg_id from owner where email='" . $Email . "'";
$res = mysqli_query($con, $sql) or die("id not found " . mysqli_error($con));
$row = mysqli_fetch_row($res);
$owner_id = $row[0];
$query = "SELECT * FROM pg_hostel where pg_id=$owner_id";
$result = mysqli_query($con, $query);
include "header.php";
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <p class=" bg-dark text-white p-2 text-left">PG / Hostel Details </p>
  <div class="container">

    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">

          </div>
        </div>
      </div>
      <br />
      <div id="hostel_table">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>PG ID</th>
              <th>Name </th>
              <th>City</th>
              <th>Mobile</th>
              <th>Fees</th>
              <th>Status</th>
              <th>Show Details</th>

            </tr>
          </thead>
          <?php $count = 1;
          $status = "";
          while ($row = mysqli_fetch_array($result)) {
          ?>
            <tr>
              <td>
                <?php echo $count;
                $count = $count + 1;
                ?>
              </td>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["city"]; ?></td>
              <td><?php echo $row["mobile"]; ?></td>
              <td><?php echo $row["fees"]; ?></td>
              <td><?php echo $row["staus"]; ?></td>
              <td><input type="button" name="edit" value="Edit" id="<?php echo $row["pg_hostel_id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>
            </tr>
          <?php
          }
          ?>
        </table>

      </div>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>

<div id="add_data_Modal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Insert and Edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <form method="post" id="insert_form">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Name of PG/Hostle</label>
              <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Name Hostle / PG" required>
            </div>
            <div class="form-group col-md-6">
              <label for="Type">Type</label>
              <select id="type" class="form-control" name="type" required>
                <option value="">Select Type</option>
                <option value="PG">PG </option>
                <option value="Hostel">Hostel</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="about">Description</label>
            <textarea type="text" class="form-control" id="about" placeholder="Write About Hostel / PG " name="about" required></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputAddress">Address Line 1</label>
              <input type="text" class="form-control" id="address1" placeholder="House No. 123" name="address1" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputAddress2">Address Line 2</label>
              <input type="text" class="form-control" id="address2" placeholder="Railway Colony" name="address2" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="area">Area</label>
              <input type="text" class="form-control" id="area" placeholder="Area Name" name="area" required>
            </div>
            <div class="form-group col-md-6">
              <label for="City">City</label>
              <input type="text" class="form-control" id="city" placeholder="City Name" name="city" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tpye_for"> Hostel / PG For </label>
              <select id="type_for" class="form-control" name="type_for" required>
                <option selected value="">Select ...</option>
                <option value="Boys">Boys</option>
                <option value="Girls">Girls</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="mobile">Mobile</label>
              <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile number" required pattern="[0-9]{10}" title="Please Enter Number only" autocomplete="off">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="fees">Fees</label>
              <input type="tel" class="form-control" id="fees" name="fees" placeholder="Enter the mothly Fees " required pattern="[0-9]{2,8}" title="Please Enter Number only">
            </div>
            <div class="form-group col-md-6">
              <label for="Food">Food</label>
              <select id="food" class="form-control" name="food" required>
                <option selected value="">Select ...</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="status">Status</label>
              <input type="text" class="form-control" id="status" name="status" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="date">Status</label>
              <input type="text" class="form-control" id="sdate" name="sdate" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="hidden" name="Hostel_id" id="Hostel_id" />
              <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {
    $('#add').click(function() {
      $('#insert').val("Insert");
      $('#insert_form')[0].reset();
    });
    $(document).on('click', '.edit_data', function() {

      var Hostel_id = $(this).attr("id");
      $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
          Hostel_id: Hostel_id
        },
        dataType: "json",
        success: function(data) {
          $('#name').val(data.name);
          $('#type').val(data.type);
          $('#about').val(data.about);
          $('#address1').val(data.address);
          $('#address2').val(data.road);
          $('#area').val(data.area);
          $('#type_for').val(data.pg_type);
          $('#mobile').val(data.mobile);
          $('#fees').val(data.fees);
          $('#food').val(data.food);
          $('#status').val(data.staus);
          $('#sdate').val(data.rdate);
          $('#city').val(data.city);
          $('#Hostel_id').val(data.pg_hostel_id);
          $('#insert').val("Update");
          $('#add_data_Modal').modal('show');
        }
      });
    });
    $('#insert_form').on("submit", function(event) {
      event.preventDefault();

      $.ajax({
        url: "insert.php",
        method: "POST",
        data: $('#insert_form').serialize(),
        beforeSend: function() {
          $('#insert').val("Inserting");
        },
        success: function(data) {
          $('#insert_form')[0].reset();
          $('#add_data_Modal').modal('hide');
          $('#hostel_table').html(data);
        }
      });

    });

  });
</script>
<script>
  $(document).ready(function() {
    setTimeout(function() {
      $('#message').hide();
    }, 3000);
  });
</script>