<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once __DIR__.'/model_article.php';

$response = array();
if(!isset($_POST)||empty($_POST['url'])){
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
		else if(strcmp($functionName, 'index')==0){
			if(count($urlParams)!=2){
				$response['success'] = 'false';
				$response['data'] = 'alamat tidak dikenali';
			}else{
				$response['success'] = 'true';
				$response['data'] = $functionName($urlParams[1]);
			}
		}
		else if(strcmp($functionName, 'feature')==0){
			if(count($urlParams)!=2){
				$response['success'] = 'false';
				$response['data'] = 'alamat tidak dikenali';
			}else{
				$response['success'] = 'true';
				$response['data'] = $functionName($urlParams[1]);
			}	
		}else if(strcmp($functionName, 'delete')==0){
			if(count($urlParams)!=3){
				$response['success'] = 'false';
				$response['data'] = 'alamat tidak dikenali';
			}else{
				$response['success'] = 'true';
				$response['data'] = $functionName($urlParams[1],$urlParams[2]);
			}	
		}else{
			$response['success'] = 'false';
			$response['data'] = 'alamat tidak dikenali';
		}
	}
}

echo json_encode($response);

function all(){	
	$artikel = new Article();
	return $artikel->getAllArticle();
}

function index($id){
	$artikel = new Article();
	return $artikel->getArticle($id); 
}

function feature($id){
	$artikel = new Article();
	return $artikel->getFeature($id); 
}

function delete($author,$id){
	$artikel = new Article();
	return $artikel->delete($id); 
}