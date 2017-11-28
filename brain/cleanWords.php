<?php
class cleanWords{
	protected $result = array();

	public function __construct($sentence){
		require_once __DIR__ . '/stopWords.php';
		$words = explode(' ', $sentence);

		$stopWords = new StopWords();
		$this->result = array_diff($words, $stopWords->getStopWords());
	}

	public function getCleanWords(){
		return $this->result;
	}
}
?>