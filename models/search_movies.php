<?php
function getAllMovies()
{
    $pdo = connect();
    $query = $pdo->prepare('SELECT  name, movie.id as id, title,duration, date(release_date) as release_date  from movie 
      inner join movie_genre on movie.id = movie_genre.id_movie 
   inner join genre on movie_genre.id_genre = genre.id 
    
    limit 40');
    $query->execute();
     $result = $query->fetchAll();
    
    return $result;
}

function searchMovie($result){

    $pdo = connect();
    $query = $pdo->prepare('SELECT * from movie  inner join movie_genre on movie.id = movie_genre.id_movie 
    inner join genre on movie_genre.id_genre = genre.id WHERE title LIKE ?');
  $query->execute([ '%' . $_POST['title'] . '%' ]);
    $result=  $query->fetchAll();

return $result;
}

function findMovie($id){
    $pdo = connect();
    $query = $pdo->prepare('SELECT * from movie where id = ?');
    $query->execute([$id]);
    $result = $query->fetch();
    
    return $result;
}

function searchMoviejs($query){
    $pattern = '%' . $query . '%';
    $pdo = connect();
    $query = $pdo->prepare('SELECT * from movie where title LIKE :query limit 5');
    $query->execute([':query' => $pattern]);
    $result = $query->fetchAll();
    return $result;
}