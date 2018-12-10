<?php
	include('../config.php');
	$id=$_GET['id'];
	mysqli_query($db,"delete from fixtures where id='$id'");
	header('location:fixtures.php');
?>