<?php
    include('../config.php');

    $id=$_GET['id'];
	
	$client=$_POST['client'];
	$url=$_POST['url'];
  
    mysqli_query($db, "update adverts set client='$client', url='$url' where id='$id'");
	header('location:adverts.php');
?>