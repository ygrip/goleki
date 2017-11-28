<?php
class Article{
	private $db;

	public function __construct(){
		// include composer autoloader
		require_once __DIR__ . '/../vendor/autoload.php';

		$this->db = new \Sastrawi\Database;
	}

	public function getAllArticle(){
		$conn = $this->db->connect();
		$data = array();

		$sql = "SELECT * FROM tb_artikel";
		$result = mysqli_query($conn,$sql);
		foreach ($result as $artikel) {
			# code...
			array_push($data, $artikel);
		}
		$this->db->disconnect();
		return $data;
	}

	public function getArticle($id){
		$conn = $this->db->connect();

		$sql = "SELECT * FROM tb_artikel WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$this->db->disconnect();
		return $data;
	}

	public function getFeature($id){
		$conn = $this->db->connect();

		$sql = "SELECT * FROM tb_artikel WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$this->db->disconnect();
		return $data['feature'];
	}

	public function delete($author,$id){
		$conn = $this->db->connect();

		$sql = "DELETE FROM tb_artikel WHERE id = '$id' AND author = '$author';";
		$result = mysqli_query($conn,$sql);
		$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$this->db->disconnect();
		return $data['feature'];
	}
}
?>