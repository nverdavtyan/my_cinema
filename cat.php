<?php 
require_once 'lib/database.php';
require_once './models/cinema.php';


 $moviesbycat =   getAllFilmbyCat($_GET['id']);
require './templates/cat.phtml';