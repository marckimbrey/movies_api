<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Method: DELETE');
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

// set propertties of $movie object
$movie->id = $data->id;

// create movie
if($movie->delete()) {
    echo json_encode(["message" => "Movie was deleted"]);
} else {
    echo json_encode(["message" => "Movie could not be deleted"]);
}
