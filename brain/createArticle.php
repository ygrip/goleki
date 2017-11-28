<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include model
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/lib/httpRequester.php';
require_once __DIR__.'/lib/session.php';
$db = new \Sastrawi\Database;

if(!isset($_SESSION['user_session'])){
    $redirect = "../body/login.php";
    redirect($redirect);
}

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

function better_strip_tags( $str, $allowable_tags = '', $strip_attrs = false, $preserve_comments = false, callable $callback = null ) {
  $allowable_tags = array_map( 'strtolower', array_filter( // lowercase
      preg_split( '/(?:>|^)\\s*(?:<|$)/', $allowable_tags, -1, PREG_SPLIT_NO_EMPTY ), // get tag names
      function( $tag ) { return preg_match( '/^[a-z][a-z0-9_]*$/i', $tag ); } // filter broken
  ) );
  $comments_and_stuff = preg_split( '/(<!--.*?(?:-->|$))/', $str, -1, PREG_SPLIT_DELIM_CAPTURE );
  foreach ( $comments_and_stuff as $i => $comment_or_stuff ) {
    if ( $i % 2 ) { // html comment
      if ( !( $preserve_comments && preg_match( '/<!--.*?-->/', $comment_or_stuff ) ) ) {
        $comments_and_stuff[$i] = '';
      }
    } else { // stuff between comments
      $tags_and_text = preg_split( "/(<(?:[^>\"']++|\"[^\"]*+(?:\"|$)|'[^']*+(?:'|$))*(?:>|$))/", $comment_or_stuff, -1, PREG_SPLIT_DELIM_CAPTURE );
      foreach ( $tags_and_text as $j => $tag_or_text ) {
        $is_broken = false;
        $is_allowable = true;
        $result = $tag_or_text;
        if ( $j % 2 ) { // tag
          if ( preg_match( "%^(</?)([a-z][a-z0-9_]*)\\b(?:[^>\"'/]++|/+?|\"[^\"]*\"|'[^']*')*?(/?>)%i", $tag_or_text, $matches ) ) {
            $tag = strtolower( $matches[2] );
            if ( in_array( $tag, $allowable_tags ) ) {
              if ( $strip_attrs ) {
                $opening = $matches[1];
                $closing = ( $opening === '</' ) ? '>' : $closing;
                $result = $opening . $tag . $closing;
              }
            } else {
              $is_allowable = false;
              $result = '';
            }
          } else {
            $is_broken = true;
            $result = '';
          }
        } else { // text
          $tag = false;
        }
        if ( !$is_broken && isset( $callback ) ) {
          // allow result modification
          call_user_func_array( $callback, array( &$result, $tag_or_text, $tag, $is_allowable ) );
        }
        $tags_and_text[$j] = $result;
      }
      $comments_and_stuff[$i] = implode( '', $tags_and_text );
    }
  }
  $str = implode( '', $comments_and_stuff );
  return $str;
}

$result = array();
$errorMessage = array();
if (!empty($_POST)) {
    // keep track post values
    $author = $_POST['author'];
    $title = better_strip_tags($_POST['title']);
    $content = $_POST['content'];
    $incontent = better_strip_tags($_POST['content']);
         
    // validate input
    $valid = true;
    if (empty($title)) {
        array_push($errorMessage,'Judul Laporan tidak boleh kosong');
        $valid = false;
    }
    if (empty($author)) {
        array_push($errorMessage,'Identitas author tidak valid');
        $valid = false;
    }
    if (empty($content)) {
        array_push($errorMessage,'Tidak ada konten untuk disimpan');
        $valid = false;
    }
         
    // insert data
    if ($valid) {
        $url = $_SERVER['HTTP_HOST'].'/goleki/brain/mineFeature.php';
        $data = array("sentence" => $title.$incontent);
        $feature = HTTPRequester::HTTPPost($url,$data);
        $conn = $db->connect();

        $query = mysqli_query($conn,"SELECT * FROM tb_artikel WHERE author = '$author' AND title ='".$title."';");
        $sql = null;
        if (mysqli_num_rows($query) != 0){
          	$id = null;
           	foreach ($query as $row) {
           		$id = $row['id'];
           		break;
           	}
            $sql = "UPDATE tb_artikel SET author = '$author', title = '$title', content = '$content', feature = '$feature' ,created = now() WHERE ID_REPORT = '$id';";
        }else{
          	$sql = "INSERT INTO tb_artikel (author,title,content,feature,created) values('$author', '$title', '$content', '$feature', now())";
        }
            
        if ($conn->query($sql) === TRUE) {
            array_push($errorMessage,'artikel berhasil disimpan');
            $result['success'] = "true";
            $db->disconnect();
        } else {
            $db->disconnect();
            $result['success'] = "false";
            array_push($errorMessage,'gagal membuat data');
        }
    }	
}else{
    array_push($errorMessage,'kesalahan pada request');
	$result['success'] = "false";
}
$result['message'] = $errorMessage;
echo json_encode($result);