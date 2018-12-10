<?php 

	if($_SERVER['REQUEST_METHOD']=='GET'){
		
$code  = $_GET['code'];
		
require_once('dbConnect.php');

$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
		
$sql = "SELECT logo AS image, team, stadium, manager, titles, years, town FROM teams WHERE id = '$code'";
		
$r = mysqli_query($con,$sql);
		
$res = mysqli_fetch_array($r);
		
$result = array();
		
array_push($result,array(
"image"=>$res['image'],
"team"=>$res['team'],
"stadium"=>$res['stadium'],
"manager"=>$res['manager'],
"titles"=>$res['titles'],
"years"=>$res['years'],
"town"=>$res['town']
	)
);
		
echo json_encode(array("result"=>$result));
		
mysqli_close($con);
}
