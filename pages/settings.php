<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../config.php");
include("../classes/Menu.php");
session_start();
$link = $_SERVER['PHP_SELF'];
$menu = new Menu;
if (!isset ($_SESSION ['id']) && !isset ($_SESSION ['usergroup']) && !isset ($_SESSION ['firstname'])   && !isset ($_SESSION ['email'])) {

  header('Location:../login.php');
 
 } else
 
 if ($_SESSION ['usergroup'] != '1') {
 
  header('Location:user.php');
 
 } 

 $name = $_SESSION ['firstname'];
$email = $_SESSION ['email'];
$sql = "SELECT * FROM yatu_users WHERE firstname = '$name' AND email = '$email'";

$userID = $_SESSION ['id'];  
 
$result = mysqli_query($db,$sql);
$rs=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Football Yatu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

<?php
include ('../includes/header.php');
include ('../includes/sidebar.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      


      <div class="row">
       <div class="col-md-6">
   
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Settings</h3>
              </div>
           <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post">
 <input type="hidden" name="submitchange" value="true"/>
                <div class="box-body">

  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" value="<?=$rs['username']?>" name="username" class="form-control" id="username" placeholder="Enter Username">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" value="<?=$rs['firstname']?>" class="form-control" name="firstname" id="firstname" placeholder="Enter Firstname">
                  </div>

  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" value="<?=$rs['lastname']?>" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name">
                  </div>

  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" value="<?=$rs['email']?>" class="form-control"  name="email" id="email" placeholder="Enter email">
                  </div>

  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" value="<?=$rs['password']?>" class="form-control" name="password" id="password" placeholder="Enter password">


<input type="checkbox" onclick="myFunction()">Show Password
                  </div>

                </div>
                <!-- /.card-body -->
 <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Save</button>

<?php
/*********** post an event **********/

if (isset($_POST['submitchange'])){

    
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
  
   
    $sqlinsert = "UPDATE yatu_users SET username = '$username', firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password' WHERE yatu_users.id = '$userID'";
    
    if (!mysqli_query($db, $sqlinsert)) {
    
 echo ' <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i><font color="#FF0000"> Error submitting record</font></label>';
         
 } else {
         
        echo  ' <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> <font color="#009900">Your details have been submitted</font> </label> ';
         
         }
}
?>
                </div>
              </form>
            </div>
          </div>      
            </div>
            <!-- /.card -->
          <!-- /.card -->
    
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 include ('../includes/footer.php');
 ?>
 
</div>

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script>
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
</body>
</html>
