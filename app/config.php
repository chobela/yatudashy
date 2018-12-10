<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u243922266_bola');
define('DB_PASSWORD', 'yatu123');
define('DB_DATABASE', 'u243922266_yatu');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);yatu12
if (mysqli_connect_errno($db))
{echo '{"query_result":"ERROR"}';}
?>
