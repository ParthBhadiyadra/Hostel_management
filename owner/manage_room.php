<?php
define('PAGE', 'room');
define('PAGE1', 'manage');
include('../db.php');
session_start();
if ($_SESSION['owner']) {
    $owner_Email = $_SESSION['oEmail'];
    $id = $_SESSION['pg_id'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}
include('header.php');

?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class=" bg-dark text-white p-2 text-left">PG / Hostel Details </p>
    <hr>
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
                            <th>Room ID</th>
                            <th>PG/Hostel Name </th>
                            <th>Room No.</th>
                            <th>bed</th>

                        </tr>
                    </thead>
                    
                    <?php
                    $count=1;
                    $sql="Select * from rooms inner join pg_hostel on rooms.pg_hostel_id=pg_hostel.pg_hostel_id where pg_hostel.pg_id=".$id;
                   $res= mysqli_query($con,$sql) or die("not found");
                   while($row=mysqli_fetch_row($res))
                   {
                       $sql="SELECT name from  pg_hostel where 	pg_hostel_id=".$row[1];
                       $r=mysqli_query($con,$sql) or die("not ");
                       $data=mysqli_fetch_row($r);
                       $name_pg=$data[0]; ?>
                      <tr> <td>
                       <?php echo $count;
                       $count = $count + 1;
                       ?> </td>
                        <td><?php echo $name_pg; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td> </tr>


               <?php    }
                    
                    ?>

                   

                </table>

            </div>
        </div>
    </div>
</div>






<?php
include("footer.php");
?>