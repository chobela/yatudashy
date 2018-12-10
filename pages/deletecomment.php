<?php
	include('../config.php');
	$id=$_GET['id'];
	mysqli_query($db,"delete from bolacomments where id='$id'");
	header('location:comments.php');

?>