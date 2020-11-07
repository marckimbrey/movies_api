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

// query DB
$results = $movie->read();

// check results length
$num = $results->rowCount();

// if any results
if ($num > 0) {
    // create array
    $movies_arr = [];
    // loop over results
    while ($data = $results->fetch(PDO::FETCH_ASSOC)) {
        
        extract($data);
        $db_movie = array(
            'id' => $id,
            'title' => $title,
            'genre' => $genre,
            'release_date' => $release_date
        );

        array_push($movies_arr, $db_movie);

    }
    echo json_encode($movies_arr);
   
} else {
    // no movies found
    echo json_encode(
        ['message' => 'No Movies Found']
      );
}


