<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'theresa1');
define('DB_DATABASE', 'bola');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno($db))
{
   echo '{"query_result":"ERROR"}';
}

?>

