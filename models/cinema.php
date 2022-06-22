
<?php
function getAllCat() // requête pour trouver toutes les catégories
{
    $pdo = connect();
    $query = $pdo->prepare('SELECT  id_genre, 
    name FROM movie_genre   
       inner join genre on genre.id = movie_genre.id_genre  
       inner join movie on movie.id = genre.id   
        GROUP BY  id_genre    order by name asc');
    $query->execute();
    $result = $query->fetchAll();
    
    return $result;
}

function getAllFilmbyCat($id) //requête pour trouver toutes  les film par son catégorie
{
     $pdo = connect();
  
   
    $query = $pdo->prepare('SELECT name,movie.id as id,date_begin, title,duration, date(release_date) as release_date  FROM movie
    inner join movie_genre on movie.id = movie_genre.id_movie 
   inner join genre on movie_genre.id_genre = genre.id 
    left join movie_schedule on  movie_schedule.id = movie.id
   where genre.name = ? ');
    $query->execute([ $id ]);
    $result = $query->fetchAll();
    
    return $result;
}




function getDetailMovie($id) // //requête pour trouver d'un film par son detail
{
    $pdo = connect();
    $query = $pdo->prepare('SELECT * FROM movie

   where movie.id = ? ');
    $query->execute([ $id ]);
    $result = $query->fetch();
    
    return $result;
}

