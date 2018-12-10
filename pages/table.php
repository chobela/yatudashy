<?php
 // Enabling error reporting
 error_reporting(-1);
 ini_set('display_errors', 'On');

include("../config.php");
include("../classes/Menu.php");
session_start();
$link = $_SERVER['PHP_SELF'];
if (!isset ($_SESSION ['id']) && !isset ($_SESSION ['usergroup']) && !isset ($_SESSION ['firstname'])   && !isset ($_SESSION ['email'])) {

  header('Location: ../login.php');
 
 } else
 
 if ($_SESSION ['usergroup'] != '1') {
 
  header('Location:user.php');
 
 } 
 
 $name = $_SESSION ['firstname'];
$menu = new Menu;


$sql = "SELECT id AS newsid, title FROM bolanews";
	
$res = mysqli_query($db,$sql);

if (isset($_POST['submitted'])){


$con=mysqli_connect("localhost", "root", "theresa1", "bola");
if (mysqli_connect_errno($con))
{
echo '{"query_result":"ERROR"}';
}


$newsid = $_POST['newsid'];
$comment = mysqli_real_escape_string($con, $_POST['comment']);
$username = 'Football Yatu';

require_once 'firebase/firebase.php';
 require_once 'firebase/push.php';

 $firebase = new Firebase();
 $push = new Push();

 // optional payload
 $payload = array();
 $payload['team'] = 'India';
 $payload['score'] = '5.6';

 // notification title
 $title =  'Football Yatu';

// notification message
 $message =  $comment;

 // whether to include to image or not
 $include_image = isset($_GET['include_image']) ? TRUE : FALSE;


 $push->setTitle($title);
 $push->setMessage($message);
 if ($include_image) {
     $push->setImage('http://api.androidhive.info/images/minion.jpg');
 } else {
     $push->setImage('');
 }
 $push->setIsBackground(FALSE);
 $push->setPayload($payload);


 $json = '';
 $response = '';


     $json = $push->getPush();
     $response = $firebase->sendToTopic('global', $json);

$result = mysqli_query($con, "INSERT INTO bolacomments (newsid, username, comment, date)
VALUES ('$newsid','$username','$message', NOW())");

if($result 
== true) {

mysqli_query($con,"UPDATE bolanews SET comments = comments + 1 WHERE id = $newsid");
echo '{"query_result":"SUCCESS"}';

} else{

echo '{"query_result":"FAILURE"}';
}

mysqli_close($con);
  
  }
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
        <small>Matchday - Live</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
    <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Live Action</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" name="contact" method="post">
            <input type="hidden" name="submitted" value="true"/>
              <div class="box-body">
              <div class="form-group">
                  <label for="position">News Title:</label>
               
  <select class="form-control select" id="newsid" name="newsid" style="width: 100%;">
  
 <option selected="selected"></option>
                 
						<?php 
					
						foreach($res as $r) { 
							echo "<option value=\"$r[newsid]\">$r[title]</option>" ;
						}
					        ?>


                </select>

                </div>

                <div class="form-group">
                <label for="password">Action :<label/>
    
          <textarea type="text" id="comment" name="comment" class="form-control" rows="3" placeholder="Enter ..." cols="55"></textarea>
                </div>
               
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <button id="submit" class="btn btn-primary" type="submit" name="submit">Submit</button>
               
              </div>
            </form>
          </div>
          <!-- /.box -->

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
</body>
</html>
