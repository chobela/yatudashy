<?php
include("../config.php");
$sql = "SELECT id AS newsid, title, details, image, date, comments FROM bolanews order by date desc";
$res = mysqli_query($db,$sql);
$result = array();
while($row = mysqli_fetch_array($res)){
array_push($result,
array('newsid'=>$row[0],
'title'=>$row[1],
'details'=>$row[2],
'image'=>$row[3],
'date'=>$row[4],
'comments'=>$row[5]
));
}
echo json_encode(array("result"=>$result));
header("content-type:application/json");
mysqli_close($db);
?>

