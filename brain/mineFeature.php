<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include model
require_once __DIR__ . '\simplify.php';
require_once __DIR__ . '\cleanWords.php';
require_once __DIR__.'\lib\util.php';

function strip_tags_content($text, $tags = '', $invert = FALSE) {

  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
  $tags = array_unique($tags[1]);
   
  if(is_array($tags) AND count($tags) > 0) {
    if($invert == FALSE) {
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
    }
    else {
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);
    }
  }
  elseif($invert == FALSE) {
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
  }
  return $text;
} 

if (!empty($_POST)) {	
	if(empty($_POST['sentence'])){
		echo '{';
	        echo '"success": "false"';
	    echo '}';
	}else{
		$sentence = urldecode($_POST['sentence']);
		$cleanWords = new CleanWords($sentence); //tokenizing dan filtering
		$simplify = new Simplify($cleanWords->getCleanWords()); //stemming dan tagging
		
		$article = array();
		$article["feature"] = array();

		$result = $simplify->simplifyWords();
		$feature = array_unique($result);
		foreach ($feature as $element) {
			# code...
			$count = 0;
			foreach ($result as $word) {
				# code...
				if(strcmp($element, $word)==0){
					$count++;
				}
			}
			$article_feature = array(
				"word" => $element,
				"count" => $count
			);
			array_push($article["feature"],$article_feature);
		}
		ArrayUtil::sortBySubKey($article['feature'],'count',SORT_DESC); //urutkan berdasar fitur dominan
		$article["success"] = "true";
		echo json_encode($article);
	}
}else{
	echo '{';
        echo '"success": "false"';
    echo '}';
}