<?php
	include('../config.php');
	
	$hteam=$_POST['hteam'];
	$ateam=$_POST['ateam'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $town= $_POST['town'];
    $type = $_POST['type'];
    $stadium = $_POST['stadium'];
	
	mysqli_query($db,"insert into fixtures (home, away, date, time, town, type, venue) values ('$hteam', '$ateam', '$date', '$time', '$town', '$type', '$stadium')");
	header('location:fixtures.php');

?>