<?php
$server_name = "localhost";
$user_name = "id21154769_couragedb";
$password = "CourageDBPassword2115!";
$db_name = "id21154769_couragedb";

$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

if (!$conn){
    echo "Connection failed!";
}
?>
