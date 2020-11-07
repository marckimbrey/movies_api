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

    // get single movie
    public function read_single() {
        // create query
        $query = "SELECT * FROM $this->table WHERE id = :id";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // bind id to params
        $stmt->bindParam(':id', $this->id);

        //execute statment
        $stmt->execute();

        // format response
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // set this properties
        $this->id = $data["id"];
        $this->title = $data["title"];
        $this->genre = $data["genre"];
        $this->release_date = $data["release_date"];
    }


    // public function create() {
    //     // create query
    //     $query = "INSERT INTO $this->table (id, title, genre, release_date) VALUES (null, $this->title, $this->genre, $this->release_date)";
    //     //prepare query
    //     $stmt = $this->conn->prepare($query);
    //     // bind values to query

    //     // input 
    // }

}

?>