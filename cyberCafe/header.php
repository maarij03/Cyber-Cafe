<?php 
    ob_start();
    include 'config.php';
    if(!file_exists('class/database.php')){
        header('location:'.$base_url.'install');
        die();
      }

    if(!session_id()){ session_start(); }
    if(!isset($_SESSION['username'])) {
        header("Location:".$base_url); 
    }
    $DB = new Database();
    $DB->select('admin','com_name',null,null,null,null);
    $settings = $DB->getResult();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Title Page-->
   <title><?php if(isset($title) && $title != ''){ echo $title; }?> | <?php echo $settings[0]['com_name']; ?></title>
   <!-- Fontfaces CSS-->
   <link href="assets/css/font-face.css" rel="stylesheet" media="all">
   <link href="assets/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
   <link href="assets/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
   <link href="assets/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
   <link href="assets/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
   <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" media="all">
   <!-- Bootstrap CSS-->
   <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="all">
   <link href="assets/css/sweetalert-bootstrap-4.min.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
   <link href="assets/css/theme.css" rel="stylesheet" media="all">
   <style>
    table{
        font-size: 14px;
    }
    .id_type,
    .id_value,
    .user_name{
        display: none;
    }
   </style>
</head>
<body>
<div class="page-wrapper">
<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <h4><?php echo $settings[0]['com_name']; ?></h4>
                </a>
                <button class="hamburger hamburger--slider text-dark" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="computer.php">
                        <i class="fas fa-desktop"></i>Computer</a>
                </li>
                <li>
                    <a href="users.php">
                        <i class="fas fa-users"></i>Users</a>
                </li>
                <li>
                    <a href="search.php">
                        <i class="fas fa-search"></i>Search</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="date_reports.php">
                        <i class="fas fa-copy"></i>Report</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="date_reports.php">Between Date Reports</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->
<!-- PAGE CONTAINER-->
<div class="page-container">
<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap flex-row-reverse">
                <div class="header-button ">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="images/icon/avatar-01.png" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo $_SESSION["username"]; ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="images/icon/avatar-01.png" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php echo 'Hi '.$_SESSION['username']; ?></a>
                                        </h5>
                                        <span class="email">Site Administrator</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="my_profile.php">
                                            <i class="zmdi zmdi-account"></i>My Profile</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="change_password.php">
                                            <i class="zmdi zmdi-account"></i>Change Password</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="logout.php">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->