<?php
	include('../config.php');
	
	$hteam=$_POST['hteam'];
	$ateam=$_POST['ateam'];
    $hscore=$_POST['hscore'];
    $ascore=$_POST['ascore'];
    $date= $_POST['date'];
   
	mysqli_query($db,"insert into results (home, home_score, away_score, away, date) values ('$hteam', '$hscore', '$ascore', '$ateam', '$date')");
	mysqli_query($db,"update league_table set p = (p + 1) WHERE team_id ='$hteam'");
	mysqli_query($db,"update league_table set p = (p + 1) WHERE team_id ='$ateam'");
	

if($hscore > $ascore){

	$gd = $hscore - $ascore;

	mysqli_query($db, "update league_table set pts = (pts + 3), gd = (gd + $gd) WHERE team_id ='$hteam'");
	mysqli_query($db, "update league_table set gd = (gd - $gd) WHERE team_id ='$ateam'");

} else if ($hscore < $ascore) {

	$gd = $ascore - $hscore;

	mysqli_query($db, "update league_table set pts = (pts + 3), gd = (gd + $gd) WHERE team_id ='$ateam'");
	mysqli_query($db, "update league_table set gd = (gd - $gd) WHERE team_id ='$hteam'");

} else if ($hscore == $ascore) {

	mysqli_query($db, "update league_table set pts = (pts + 1) WHERE team_id ='$ateam'");
	mysqli_query($db, "update league_table set pts = (pts + 1) WHERE team_id ='$hteam'");
}


header('location:results.php');
?>