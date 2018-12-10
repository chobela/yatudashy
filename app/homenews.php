<?php
include("../config.php");
$sql = "SELECT id AS newsid, title, details, smallimage, image, date, comments FROM bolanews WHERE ishome = 1 ORDER BY id DESC";
$res = mysqli_query($db,$sql);
$result = array();
while($row = mysqli_fetch_array($res)){
array_push($result,
array('newsid'=>$row[0],
'title'=>$row[1],
'details'=>$row[2],
'smallimage'=>$row[3],
'image'=>$row[4],
'date'=>$row[5],
'comments'=>$row[6]
));
}
echo json_encode(array("result"=>$result));
mysqli_close($db);
?>
