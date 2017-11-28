<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once __DIR__.'/lib/httpRequester.php';
require_once __DIR__.'/lib/util.php';
require_once __DIR__ . '\simplify.php';
require_once __DIR__ . '\cleanWords.php';

$url = $_SERVER['HTTP_HOST'].'/goleki/brain/artikel.php';
$request = array('url'=>'all');
$data = HTTPRequester::HTTPPost($url,$request);
if(empty($_GET['query'])||empty($_GET)){
	$response['success'] = 'false';
	$response['data'] = 'request tidak diketahui';
}else{
	$query = urldecode($_GET['query']);
	$cleanWords = new CleanWords($query); //tokenizing dan filtering
	$simplify = new Simplify($cleanWords->getCleanWords()); //stemming dan tagging
	$keywords = $simplify->simplifyWords();
	
	$artikel = (array) json_decode(json_decode(json_encode($data)),true);
	$response['success'] = 'true';
	$response['query'] = $query;
	$response['data'] = array();
	foreach ($artikel['data'] as $element){
		$result = array(); 
		$result['keywords'] = array();
		# code...
		$count = 0;
		foreach  ($keywords as $word){
			# code...
			$feature = (array) json_decode(json_decode(json_encode($element['feature'])),true);
			$word_count = 0;
			// print_r($feature);
			foreach ($feature['feature'] as $key) {
				# code...
				// var_dump($feature);
				if(strcmp($word,$key['word'])==0){
					$word_count += $key['count'];
				}
			}
			$count += $word_count;
			array_push($result['keywords'], array('word' => $word, 'count' => $word_count));
		}
		if($count>0){
			$result['id'] = $element['id'];
			$result['url'] = $_SERVER['HTTP_HOST'].'/goleki/?p=readArticle&id='.$element['id'];
			$result['score'] = $count;
			array_push($response['data'],$result);
		}
		
	}
	if(count($response['data'])<=0){
		$response['success'] = 'false';
		$response['data'] = 'pencarian tidak ditemukan';
	}else{
		ArrayUtil::sortBySubKey($response['data'],'score',SORT_DESC);
	}
	
}
echo json_encode($response);