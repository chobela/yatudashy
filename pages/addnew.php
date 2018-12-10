<?php
	include('../config.php');
	
	$title=$_POST['title'];
	$details=$_POST['details'];
    $smallimage=$_POST['image'];
    $image=$_POST['image'];
    $date= date('Y-m-d');
    $ishome = '1';
	
	mysqli_query($db,"insert into bolanews (title, details, smallimage, image, date, ishome) values ('$title', '$details', '$image', '$image', '$date', '$ishome')");
	header('location:news.php');

?>