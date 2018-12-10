<?php
include("../config.php");
$code = $_POST['code'];
$sql = "SELECT fixtures.id AS fixture_id, teams.team AS home_team , away_teams.team AS away_team, fixtures.date
FROM fixtures LEFT JOIN teams ON fixtures.home = teams.id LEFT JOIN away_teams ON fixtures.away = away_teams.id WHERE fixtures.home = '1' OR fixtures.away = '$code' ORDER BY date DESC;";
$res = mysqli_query($db,$sql);
$result = array();
while($row = mysqli_fetch_array($res)){
array_push($result,
array('fixture_id'=>$row[0],
'home_team'=>$row[1],
'away_team'=>$row[2],
'date'=>$row[3]
));
}
echo json_encode(array("result"=>$result));
mysqli_close($db);
?>

