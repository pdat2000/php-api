<?php

class DatabaseDB
{


    private $servername = 'localhost';
    private $username = "root";
    private $password = "";
    private $db = "restful_php_api";
    private $conn = null;

    public function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }
}