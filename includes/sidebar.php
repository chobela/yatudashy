<?php include("welcome.php");?>  
  <!-- Left side column. contains the logo and sidebar -->

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">

<?php

if ($_SERVER['PHP_SELF'] == '/yatu/index.php') {       

  echo '<img src="dist/img/img.png" class="img-circle" alt="User Image">';
} else {

  echo '<img src="../dist/img/img.png" class="img-circle" alt="User Image">';
}
        
     ?>   
        </div>
        <div class="pull-left info">
     
          <p><?= welcome(). ' '. $name.' !'?></p>

  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>


       <!--   <a id="network">
          <script>myFunction();</script>
          </a>-->
        
        </div>
      </div>


<?php
echo $menu->getmenu($link);
?>
      
    </section>
    <!-- /.sidebar -->
  </aside>
