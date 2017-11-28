<?php
class Simplify{
	protected $sentence;

	public function __construct($words){
		$this->sentence = "";
		foreach ($words as $word) {
			# code...
			$this->sentence .= $word." ";
		}

	}

	public function simplifyWords(){
		// include composer autoloader
		require_once __DIR__ . '/../vendor/autoload.php';
		$array_words = array();

		$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
		$stemmer  = $stemmerFactory->createStemmer();

		if(!isset($this->sentence)){
			return "";
		}else{
			$output   = $stemmer->stem($this->sentence);

			foreach (explode(' ', $output) as $word) {
				# code...
				array_push($array_words, $word);
			}

			return $array_words;
		}		
	}
}
?>