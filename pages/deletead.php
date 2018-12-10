<?php
	include('../config.php');
	$id=$_GET['id'];
	mysqli_query($db,"delete from adverts where id='$id'");
	header('location:adverts.php');
?>