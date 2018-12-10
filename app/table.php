<?php
include("../config.php");
$sql = "SELECT team_id, position, logo, team, p, gd, pts FROM `league_table` LEFT JOIN teams ON teams.id = league_table.team_id ORDER BY position ASC";
$res = mysqli_query($db,$sql);
$result = array();
while($row = mysqli_fetch_array($res)){
array_push($result,
array('team_id'=>$row[0],
'position'=>$row[1],
'logo'=>$row[2],
'team'=>$row[3],
'p'=>$row[4],
'gd'=>$row[5],
'pts'=>$row[6]
));
}
echo json_encode(array("result"=>$result));
mysqli_close($db);
?>
