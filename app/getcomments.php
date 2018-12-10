<?php
include("../config.php");
$newsid = $_POST['newsid'];
$sql = "SELECT username, comment, date FROM bolacomments WHERE newsid = $newsid ORDER BY id desc";
$res = mysqli_query($db,$sql);
$result = array();
while($row = mysqli_fetch_array($res)){
array_push($result,
array('username'=>$row[0],
'comment'=>$row[1],
'date'=>$row[2]
));
}
echo json_encode(array("result"=>$result));
mysqli_close($db);
?>

