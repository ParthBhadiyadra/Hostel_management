<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin || Dashboard
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../css/mystyle.css">
</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-dark p-0 shadow">
        <a class="navbar-brand col-sm-2 col-md-2 mr-0 text-warning font-weight-bold  title-head" href="dashboard.php">HOSTEL MANAGEMENT SYSTEM</a>
    </nav>


    <!-- Side Bar -->
    <div class="container-fluid mb-5 sid mt-4 mb-0"  >
        <div class="row" style=" height: 582px;">
            <nav class="col-sm-3 col-md-2 bg-dark sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-warning <?php if (PAGE == 'dashboard') {
                                                    echo 'active';
                                                } ?> links" href="dashboard.php">
                                <i class="fas fa-clock"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning <?php if (PAGE == 'STUD') {
                                                    echo 'active';
                                                } ?> links" href="student.php">
                                <i class="fas fa-user-graduate"></i>
                                Student
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link  text-warning <?php if (PAGE == 'owner') {
                                                    echo 'active';
                                                } ?> links" href="owner.php">
                                <i class="fab fa-teamspeak"></i>
                                Owner
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link  text-warning <?php if (PAGE == 'hostel') {
                                                    echo 'active';
                                                } ?> links" href="pg_hostel.php">
                                <i class="fas fa-table"></i>
                                Hostel/PG
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning <?php if (PAGE == 'changepass') {
                                                    echo 'active';
                                                } ?> links" href="changepass.php">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning <?php if (PAGE == 'feedback') {
                                                    echo 'active';
                                                } ?> links" href="showfeed.php">
                                <i class="fas fa-comments"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link links text-warning" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>