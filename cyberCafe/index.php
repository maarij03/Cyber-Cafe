<?php
 include 'config.php';
 if(!file_exists('class/database.php')){
    header('location:'.$base_url.'install');
    die();
  }
 if(!session_id()){ session_start(); }
 if(isset($_SESSION['username'])) {
    header("Location:".$base_url."dashboard.php"); 
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
    <title><?php echo $settings[0]['com_name']; ?></title>
    <!-- Fontfaces CSS-->
    <link href="assets/css/font-face.css" rel="stylesheet" media="all">
    <!-- <link href="assets/css/fontawesome-all.min.css" rel="stylesheet" media="all"> -->
    <!-- Bootstrap CSS-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="assets/css/sweetalert-bootstrap-4.min.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="assets/css/theme.css" rel="stylesheet" media="all">
</head>
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h3><?php echo $settings[0]['com_name']; ?></h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form id="adminLogin" method="Post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="username" name="u_name" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="u_pass" placeholder="Enter Password">
                                </div>
                                <input type="submit" class="au-btn au-btn--block au-btn--green m-b-20 submit" name="login" value="Log In">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" class="site-url" value="<?php echo $base_url; ?>" hidden>
    <!-- Jquery JS-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/sweetalert2.min.js"></script>
    <!-- Main JS-->
    <script src="assets/js/login.js"></script>
</body>
</html>