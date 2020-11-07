<?php

class Movie {
    // DB variables
    private $conn;
    private $table = "movies";

    // movie properties
    public $id;
    public $title;
    public $genre;
    public $release_date;

    // Constructor with DB
    public function __construct($db) {
    $this->conn = $db;
    }

    // get all movies from DB
    public function read() {
        // create query
        $query = "SELECT * FROM $this->table";
        // prepare query
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }

}

?>