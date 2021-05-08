<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD || OWNER
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../css/mystyle.css">

</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-warning title-head" href="#">HOSTEL MANAGEMENT SYSTEM</a>
    </nav>

    <div class="container-fluid mb-5 " style="margin-top:40px;">
        <div class="row pt-2">
            <div class="col-2 collapse show d-md-flex bg-dark pt-5 pl-0 min-vh-100" id="sidebar">
                <ul class="nav flex-column flex-nowrap overflow-hidden">

                    <li class="nav-item">
                        <a class="nav-link links text-warning <?php if (PAGE == 'dashboard') {
                                                        echo 'active';
                                                    } ?>" href="dashboard.php">
                            <i class="fa fa-desktop "></i>
                            dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link links text-warning <?php if (PAGE == 'SubmitRequest') {
                                                        echo 'active';
                                                    } ?>" href="request.php">
                            <i class="fab fa-accessible-icon"></i>
                            Submit Request
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link links  text-warning <?php if (PAGE == 'pg_detail') {
                                                        echo 'active';
                                                    } ?>" href="pg_detail.php">
                            <i class="fas fa-align-center"></i>
                            PG - Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed text-truncate links text-warning  <?php if (PAGE == 'room') {
                                                                                echo 'active';
                                                                            } ?>" href="javascript:void(0);" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-table"></i> &nbsp;&nbsp;<span class="d-none d-sm-inline  ">Room</span></a>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item"><a class="nav-link text-warning links py-0 <?php if (PAGE1 == 'add_room') {
                                                                                        echo 'active';
                                                                                    } ?>" href="add_room.php"><i class="fa fa-plus-circle"></i> &nbsp;&nbsp;<span>Add Room</span></a></li>
                                <li class="nav-item"><a class="nav-link text-warning links py-0 <?php if (PAGE1 == 'manage') {
                                                                                        echo 'active';
                                                                                    } ?>" href="manage_room.php"><i class="fa fa-cog"></i>&nbsp;&nbsp;<span>Manage Room</span></a></li>
                                    <li class="nav-item"><a class="nav-link text-warning links py-0 <?php if (PAGE1 == 'info') {
                                                                                        echo 'active';
                                                                                    } ?>" href="Info.php"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;<span>Info Room</span></a></li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning links  <?php if (PAGE == 'profile') {
                                                        echo 'active';
                                                    } ?>" href="profile.php">
                            <i class="fas fa-user "></i> &nbsp;
                            Profile
                        </a>
                    <li class="nav-item">
                        <a class="nav-link links text-warning" href="../logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>