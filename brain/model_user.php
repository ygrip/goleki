<?php
class User{
    private $db;

    public function __construct(){
        // include composer autoloader
        require_once __DIR__ . '/../vendor/autoload.php';

        $this->db = new \Sastrawi\Database;
    }

    public function getAllUser(){
        $conn = $this->db->connect();
        $data = array();

        $sql = "SELECT * FROM tb_user";
        $result = mysqli_query($conn,$sql);
        foreach ($result as $user) {
            # code...
            array_push($data, array('id'=>$user['id'],'username'=>$user['username'],'fullname'=>$user['fullname']));
        }
        $this->db->disconnect();
        return $data;
    }

    public function getUser($id){
        $conn = $this->db->connect();

        $sql = "SELECT * FROM tb_user WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $this->db->disconnect();
        return array('id'=>$data['id'],'username'=>$data['username'],'fullname'=>$data['fullname']);
    }

    public function userLogin($email,$password){
        $conn = $this->db->connect();

        $sql = "SELECT * FROM tb_user WHERE email = '".$email."'";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_array($result,MYSQLI_ASSOC);
            // print_r($data);
        $response = array();
        if(mysqli_num_rows($result) > 0 ){
            if($password == $data['password']){
                $response['success'] = 'true';
                $response['id'] = $data['id'];
            }else{
                $response['success'] = 'false';
                $response['message'] = 'password yang anda masukkan tidak sesuai';
            }
        }else{
            $response['success'] = 'false';
            $response['message'] = 'email tidak ditemukan';
        }
        $this->db->disconnect();
        return $response;
    }
}
?>