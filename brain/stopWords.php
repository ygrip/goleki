<?php
class StopWords{
	protected $list_stopwords = array();

	public function __construct(){
		// include composer autoloader
		require_once __DIR__ . '/../vendor/autoload.php';

		$db = new \Sastrawi\Database;

		//stopwords
		$conn = $db->connect();

		$sql = "SELECT kata FROM tb_stopwords";
		$result = mysqli_query($conn,$sql);

		$db->disconnect();
		foreach ($result as $word) {
		    # code...
		    // print_r($word['kata']);
		    array_push($this->list_stopwords, $word['kata']);
		}

	}

	public function getStopWords(){
		return $this->list_stopwords;
	}
}
?>