<?php
	include('../config.php');
	$id=$_GET['id'];
	mysqli_query($db,"delete from bolanews where id='$id'");
	header('location:news.php');

?>