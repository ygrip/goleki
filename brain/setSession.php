<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once __DIR__.'/lib/session.php';

$response = array();
if(!isset($_POST)){
	$response['success'] = 'false';
	$response['data'] = 'tidak ada request';
}else{
	$_SESSION['user_session'] = $_POST['id'];
	$response['success'] = 'true';
	$response['data'] = $_SESSION['user_session'];
}


echo json_encode($response);