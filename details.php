<?php
require_once 'lib/database.php';
require_once 'models/search_movies.php';



 $moviedetails =  findMovie($_GET['id']);
 require './templates/details.phtml';