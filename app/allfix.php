<?php
include("../config.php");
$sql = "SELECT fixtures.id AS fixture_id, teams.logo AS home_logo, teams.team AS home_team , away_teams.team AS away_team, away_teams.logo AS away_logo, fixtures.date AS date, fixtures.time AS time, stadia.stadium, fixtures.town, fixtures.type, stadia.image AS image
FROM fixtures LEFT JOIN teams ON fixtures.home = teams.id LEFT JOIN away_teams ON fixtures.away = away_teams.id LEFT JOIN stadia ON stadia.id = fixtures.venue ORDER BY date DESC;";
$res = mysqli_query($db,$sql);
$result = array();
while($row = mysqli_fetch_array($res)){
array_push($result,
array('fixture_id'=>$row[0],
'home_logo'=>$row[1],
'home_team'=>$row[2],
'away_team'=>$row[3],
'away_logo'=>$row[4],
'date'=>$row[5],
'time'=>$row[6],
'stadium'=>$row[7],
'town'=>$row[8],
'type'=>$row[9],
'image'=>$row[10]
));
}
echo json_encode(array("result"=>$result));
mysqli_close($db);
?>


