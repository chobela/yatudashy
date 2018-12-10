<?php
	include('../config.php');
	$id=$_GET['id'];
	mysqli_query($db,"delete from results where id='$id'");
	header('location:results.php');
?>