<?php
	include('../config.php');
	
	$client=$_POST['client'];
	$url=$_POST['url'];
  
	mysqli_query($db,"insert into adverts (client, url) values ('$client', '$url')");
	header('location:adverts.php');

?>