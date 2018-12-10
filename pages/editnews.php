<?php
    include('../config.php');

    $id=$_GET['id'];
	
	$title=$_POST['title'];
	$details=$_POST['details'];
    $smallimage=$_POST['image'];
    $image=$_POST['image'];
    $date= date('Y-m-d');
    $ishome = '1';
	
    mysqli_query($db, "update bolanews set title='$title', details='$details', smallimage='$smallimage', image='$image', date='$date', ishome='$ishome' where id='$id'");
	header('location:news.php');
?>