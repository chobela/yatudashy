<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

class DB_Functions {

       private $conn;

    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    public function storeUser($username, $team) {
        $uuid = uniqid('', true);


$stmt = $this->conn->prepare("INSERT INTO bolausers (unique_id, username, team, created_at) VALUES(?, ?, ?, NOW())");

$stmt->bind_param("sss", $uuid, $username, $team);

$result = $stmt->execute();

$stmt->close();

// check for successful store

if ($result) {

$stmt = $this->conn->prepare("SELECT * FROM bolausers WHERE username = ?");

$stmt->bind_param("s", $username);

$stmt->execute();

$user = $stmt->get_result()->fetch_assoc();

$stmt->close();

return $user;

} else {

return false;

}
    }

   public function getUserByEmailAndPassword($email, $password) {

       if( $stmt = $this->conn->prepare("SELECT * FROM bolausers WHERE email = ?")){

        $stmt->bind_param("s", $email);

$stmt->execute();

$stmt->store_result();

$stmt->bind_result($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8);

$user=array();

while($stmt->fetch()){

$user[unique_id] = $v2;

$user[username] = $v3;

$user[email] = $v4;

$user[team] = $v5;

$user[encrypted_password] = $v6;

$user[salt] = $v7;

$user[created_at] = $v8;

$salt =$user['salt'];

$encrypted_password = $user['encrypted_password'];

$hash = $this->checkhashSSHA($salt, $password);

if ($encrypted_password == $hash) {

return $user;
}
}

} else {

return NULL;

}
    }

  public function isUserExisted($username) {
        $stmt = $this->conn->prepare("SELECT username from bolausers WHERE username = ?");

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // user existed 
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }

  
}

?>
