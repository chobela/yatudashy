<?php
 
$con=mysqli_connect("localhost", "u243922266_bola", "yatu123", "u243922266_yatu'");
if (mysqli_connect_errno($con))
{
   echo '{"query_result":"ERROR"}';
}

 $newsid = $_GET['newsid']; 
$username = $_GET['username'];
$comment = $_GET['comment'];
	
$result = mysqli_query($con,"INSERT INTO bolacomments (newsid, username, comment, date)
VALUES ('$newsid','$username','$comment', NOW())");
 
if($result == true) {

    mysqli_query($con,"UPDATE bolanews SET comments = comments + 1 WHERE id = $newsid");

    echo '{"query_result":"SUCCESS"}';
}
else{
    echo '{"query_result":"FAILURE"}';
}
mysqli_close($con);

?>
