<?php
 
 class DB {
	
   public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
	
       
        return $hash;
    }
}

 $ps = new DB;

$con=mysqli_connect("localhost", "u243922266_bola", "yatu123", "u243922266_yatu");
if (mysqli_connect_errno($con))
{
   echo '{"query_result":"ERROR"}';
}

 $email = 'chobelak@gmail.com';
 $password = 'theresa1';
 $hash = $ps->hashSSHA($password);

$encrypted_password = $hash["encrypted"]; // encrypted password
$salt = $hash["salt"]; // salt

	
$result = mysqli_query($con,"UPDATE bulausers SET encrypted_password = '$encrypted_password', salt = '$salt' WHERE email = '$email'");
 
if($result == true) {
    echo '{"query_result":"SUCCESS"}';
}
else{
    echo '{"query_result":"FAILURE"}';
}
mysqli_close($con);


//echo $salt.'<br>';
//echo $encrypted_password;


?>
