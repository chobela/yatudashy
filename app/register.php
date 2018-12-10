<?php

require_once 'DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);
   
if (isset($_POST['username']) && isset($_POST['team'])) {

    // receiving the post params
    $username = $_POST['username'];
    $team = $_POST['team'];
   

    // check if user is already existed with the same email
    if ($db->isUserExisted($username)) {
        // user already existed
        $response["error"] = TRUE;
        $response["error_msg"] = "Username " . $username . " Already exists";
        echo json_encode($response);
    } else {
        // create a new user
        $user = $db->storeUser($username, $team);
        if ($user) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["uid"] = $user["unique_id"];
            $response["user"]["username"] = $user["username"];         
            $response["user"]["team"] = $user["team"];
            $response["user"]["created_at"] = $user["created_at"];

            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred during registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (name, sex, email, phone, town, or password) is missing!";
    echo json_encode($response);
}
?>

