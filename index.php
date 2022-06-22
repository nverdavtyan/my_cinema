<?php 

require_once 'lib/database.php';
require_once 'models/search_movies.php';
require_once 'models/cinema.php';


 $cats=  getAllCat();
 
 
if(!empty($_POST) == true){

    $pdo = connect();
    $query = $pdo->prepare('SELECT  name,movie.id as id,date_begin, title,duration, date(release_date) as release_date  from movie 
    inner join movie_genre on movie.id = movie_genre.id_movie 
    inner join genre on movie_genre.id_genre = genre.id 
     inner join movie_schedule on  movie_schedule.id = movie.id 
     WHERE title  LIKE ?');
    $query->execute([ '%' . $_POST['title'] . '%' ]);
    $movies = $query->fetchAll(PDO::FETCH_ASSOC);
  
}
else if(isset($_GET['from_date']) && isset($_GET['to_date']))
{
    $pdo = connect();
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    $query = $pdo->prepare("SELECT name, movie.id as id,date_begin, title,duration, date(release_date) as release_date FROM movie_schedule  
    inner join movie on movie.id = movie_schedule.id_movie 
    inner join movie_genre on movie.id = movie_genre.id_movie 
    inner join genre on movie_genre.id_genre = genre.id 
     WHERE date_begin BETWEEN '$from_date' AND '$to_date'");
    $query->execute();
    $movies= $query->fetchAll(PDO::FETCH_ASSOC);


}
else if(!empty($_GET['name'])==true){
$movies =   getAllFilmbyCat($_GET['name']);

    
}
else{
    $movies =  getAllMovies();  
}


 require './templates/index.phtml';