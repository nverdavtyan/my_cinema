<?php
require('./../lib/database.php');
require('search_movies.php');
require('cinema.php');

if(isset($_GET["query"]) && !empty($_GET["query"])){
    $query = $_GET["query"];
    $result = searchMoviejs($query);
    echo json_encode($result);
}

    
