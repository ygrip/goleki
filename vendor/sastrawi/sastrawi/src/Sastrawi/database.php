<?php
namespace Sastrawi;
class Database
{
    /*variabel koneksi*/
    private $hostname;
    private $username;
    private $pass;
    private $dbname;
    private $connection;

    //collect tables name
    private $dbresults = array();

    public function __construct() {
          $this->hostname = 'localhost';
          $this->username = 'root';
          $this->pass     = '';
          $this->dbname   = 'engine';
    }
     
    public function connect()
    {
      $this->connection =  mysqli_connect($this->hostname, $this->username, $this->pass, $this->dbname);
      
      return $this->connection; //mengembalikan koneksi saat ini
    } 

    public function disconnect()
    {
       mysqli_close($this->connection); //memutus koneksi
    }
}
?>