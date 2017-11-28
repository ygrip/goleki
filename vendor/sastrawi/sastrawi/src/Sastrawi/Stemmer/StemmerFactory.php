<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer;

use Sastrawi\Dictionary\ArrayDictionary;
use \Sastrawi\Database;

/**
 * Stemmer factory helps creating pre-configured stemmer
 */
class StemmerFactory
{
    private $db;
    public function __construct() {
        $this->db = new Database();
        // print_r(get_declared_classes());
    }
    const APC_KEY = 'sastrawi_cache_dictionary';

    /**
     * @return \Sastrawi\Stemmer\Stemmer
     */
    public function createStemmer($isDev = false)
    {
        $words      = $this->getWords($isDev);
        $dictionary = new ArrayDictionary($words);
        $stemmer    = new Stemmer($dictionary);

        $resultCache   = new Cache\ArrayCache();
        $cachedStemmer = new CachedStemmer($resultCache, $stemmer);

        return $cachedStemmer;
    }

    protected function getWords($isDev = false)
    {
        if ($isDev || !function_exists('apc_fetch')) {
            $words = $this->getWordsFromDatabase();
        } else {

            $words = apc_fetch(self::APC_KEY);

            if ($words === false) {
                $words = $this->getWordsFromDatabase();
                apc_store(self::APC_KEY, $words);
            }else{
                $words = $this->getWordsFromDatabase();
            }
        }

        return $words;
    }

    protected function getWordsFromDatabase(){
        // $basepath = BASE_PATH;
        $conn = $this->db->connect();

        $sql = "SELECT katadasar FROM tb_katadasar";
        $result = mysqli_query($conn,$sql);
        // $data = mysqli_fetch_array($result,MYSQLI_ASSOC);
        // print_r($result);
        $words = array();

        foreach ($result as $word) {
            # code...
            // print_r($word['katadasar']);
            array_push($words, $word['katadasar']);
        }

        $this->db->disconnect();

        return $words;
    }

    protected function getWordsFromFile()
    {
        $dictionaryFile = __DIR__ . '/../../../data/kata-dasar.txt';
        if (!is_readable($dictionaryFile)) {
            throw new \Exception('Dictionary file is missing. It seems that your installation is corrupted.');
        }

        return explode(PHP_EOL, file_get_contents($dictionaryFile));
    }
}
