<?php
include("../config.php");
$sql = "SELECT id AS transferid, date, player, fromm, too, status, news FROM transfers order by date desc";
$res = mysqli_query($db,$sql);
$result = array();
while($row = mysqli_fetch_array($res)){
array_push($result,
array('transferid'=>$row[0],
'date'=>$row[1],
'player'=>$row[2],
'fromm'=>$row[3],
'too'=>$row[4],
'status'=>$row[5],
'news'=>$row[6]
));
}
echo json_encode(array("result"=>$result));
header("content-type:application/json");
mysqli_close($db);
?>

