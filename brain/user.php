<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once __DIR__.'/model_user.php';
require_once __DIR__.'/lib/session.php';

$response = array();
if(!isset($_POST)){
	$response['success'] = 'false';
	$response['data'] = 'tidak ada request';
}else{
	$urlParams = explode('/', $_POST['url']);
	if(count($urlParams)<1){
		$response['success'] = 'false';
		$response['data'] = 'alamat tidak dikenali';
	}else{
		$functionName = $urlParams[0];
		if(strcmp($functionName, 'all')==0){
			if(count($urlParams)>1){
				$response['success'] = 'false';
				$response['data'] = 'alamat tidak dikenali';
			}else{
				$response['success'] = 'true';
				$response['data'] = $functionName();
			}
		}
		else if(strcmp($functionName, 'id')==0){
			if(count($urlParams)!=2){
				$response['success'] = 'false';
				$response['data'] = 'alamat tidak dikenali';
			}else{
				$response['success'] = 'true';
				$response['data'] = $functionName($urlParams[1]);
			}
		}
		else if(strcmp($functionName, 'auth')==0){
			if(count($urlParams)!=3){
				$response['success'] = 'false';
				$response['data'] = 'alamat tidak dikenali';
			}else{
				$response['data'] = $functionName($urlParams[1],$urlParams[2]);
				$_SESSION['user_session'] = $response['data']['id'];
			}	
		}else{
			$response['success'] = 'false';
			$response['data'] = 'alamat tidak dikenali';
		}
	}
}


echo json_encode($response);

function all(){	
	$user = new User();
	return $user->getAllUser();
}

function id($id){
	$user = new User();
	return $user->getUser($id); 
}

function auth($email,$password){
	$user = new User();
	return $user->userLogin($email,$password); 
}