<?php
include("../config.php");
$sql = "SELECT results.id AS result_id, teams.team AS home_team , away_teams.team AS away_team, results.home_score,results.away_score,results.date, teams.logo AS home_logo, away_teams.logo AS away_logo
FROM results 
LEFT JOIN teams ON results.home = teams.id LEFT JOIN away_teams ON results.away = away_teams.id ORDER BY date DESC;";
$res = mysqli_query($db,$sql);
$result = array();
while($row = mysqli_fetch_array($res)){
array_push($result,
array('result_id'=>$row[0],
'home_team'=>$row[1],
'away_team'=>$row[2],
'home_score'=>$row[3],
'away_score'=>$row[4],
'date'=>$row[5],
'home_logo'=>$row[6],
'away_logo'=>$row[7]
));
}
echo json_encode(array("result"=>$result));
mysqli_close($db);
?>

