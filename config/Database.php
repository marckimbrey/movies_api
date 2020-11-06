<?php

class Database  {
    // db variables
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db_name = 'movies';
    private $conn;

    // connect to db
    public function connect() {
        $this->conn = null;
       
        try {
            $this->conn = new PDO("mysql:host=". $this->host . ";dbname=" . $this->db_name, $this->user, $this->pass);
        } catch (PDOException $e) {
            echo "conection error";
        }
        return $this->conn;
    }

}
