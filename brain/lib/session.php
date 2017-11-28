<?php
session_start();
if (isset($_SESSION['user_session'])){
    $user_check = $_SESSION['user_session'];

   require_once __DIR__ . '/../../vendor/autoload.php';
	$myDatabase = new \Sastrawi\Database;
    $connection = $myDatabase->connect();
    $sql = "SELECT id FROM tb_user WHERE id ='$user_check'";
    $result = @mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $myDatabase->disconnect();
    $login_session = $row['id'];   
}

?>