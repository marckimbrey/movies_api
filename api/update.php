<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Method: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// require DB & movie model
include_once "../config/Database.php";
include_once "../models/Movie.php";

// instanciate with DB
$database = new Database();
$db = $database->connect();
$movie = new Movie($db);

// get post data
$data = json_decode(file_get_contents("php://input"));

// check if all data needed is in the $data request
if (!empty($data->title) && !empty($data->genre) && !empty($data->release_date) && !empty($data->id)) {

    // set propertties of $movie object
    $movie->id = $data->id;
    $movie->title = $data->title;
    $movie->genre = $data->genre;
    $movie->release_date = $data->release_date;

    // create movie
    if($movie->update()) {
        echo json_encode(["message" => "Movie was updated"]);
    } else {
        echo json_encode(["message" => "Movie could not be updated"]);
    }
}

