<?php
$server_name = "localhost";
$user_name = "id20835748_csc356";
$password = "MarsDatabasePassword2083!";
$db_name = "id20835748_csc356";

$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

if (!$conn){
    echo "Connection failed!";
}
?>
