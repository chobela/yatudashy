<?php
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
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Table showing upcoming fixtures</h3>
              <button type="button" href="#addnew" data-toggle="modal" class="btn btn-success btn-sm">Add New</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Home Team</th>
                  <th>Away Team</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Stadium</th>
                  <th>Town</th>
                  <th>Type</th>              
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php

				
				$query=mysqli_query($db,"SELECT fixtures.id AS fixture_id, teams.logo AS home_logo, teams.team AS home_team, away_teams.team AS away_team, away_teams.logo AS away_logo, fixtures.date AS date, fixtures.time AS time, stadia.stadium, fixtures.town, fixtures.type, stadia.image AS image
        FROM fixtures LEFT JOIN teams ON fixtures.home = teams.id LEFT JOIN away_teams ON fixtures.away = away_teams.id LEFT JOIN stadia ON stadia.id = fixtures.venue ORDER BY date DESC;");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $row['home_team'];?></td>
						<td><?php echo $row['away_team']; ?></td>
						<td><?php echo $row['date']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><?php echo $row['stadium']; ?></td>
            <td><?php echo $row['town']; ?></td>
            <td><?php echo $row['type']; ?></td>		
            <td><button href="#del<?php echo $row['fixture_id']; ?>" data-toggle="modal" type="button" class="btn btn-danger btn-sm">Delete</button>
            <?php include('fixtures/button2.php'); ?>
            <td/>					
					</tr>
					<?php
				}
			?>
          </tfoot>                  
              </table>
            </div>
            <?php include('fixtures/add_modal.php'); ?>
            <!-- /.box-body -->
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
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
