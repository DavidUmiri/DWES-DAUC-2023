<?php 
    class Database {
        private $host = "127.0.0.1";
        private $database_name = "phpapidb";
        private $username = "root";
        private $password = "xxxxxxxx";
        public $conn;
        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:dbname=phpapidb;host=localhost","pagina","pagina");
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>