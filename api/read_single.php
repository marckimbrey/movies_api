<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// require DB & movie model
include_once "../config/Database.php";
include_once "../models/Movie.php";

// instanciate with DB
$database = new Database();
$db = $database->connect();
$movie = new Movie($db);

// get id from url query or Die()
$movie->id = isset($_GET['id'])? $_GET['id']: die();

// query DB
$movie->read_single();

// create array to return
$movie_arr =[
    "id" => $movie->id,
    "title" => $movie->title,
    "genre" => $movie->genre,
    "release_date" => $movie->release_date
];

// return as json
echo json_encode($movie_arr);