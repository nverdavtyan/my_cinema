<?php
require_once '../lib/database.php';


function userdetails($id){
  // Connexion à la base de données avec PDO
  $pdo = connect();

  // Préparation de la requête SQL de lecture
  $query = $pdo->prepare('SELECT user.id as userid,
         firstname,lastname,email,
         date(membership.date_begin) as date_begin,
         membership.id_user as id_user,
         id_subscription, subscription.name  as subname
         from user
         left join membership  on user.id = membership.id_user
         left join subscription on subscription.id = membership.id_subscription where user.id = ?

  ');


  $query->execute([$id]);

 $result =$query->fetch();
 return $result;
}


function userhistory($id){

  $pdo = connect();


  $query = $pdo->prepare('SELECT movie_history.id as id,title,movie_schedule.date_begin  as datemoviesession, name, room.floor as etage from  user

  left join membership on membership.id_user = user.id
  left join  movie_history on movie_history.history_user_id = user.id 
  left join movie_schedule on movie_schedule.id = movie_history.history_movie_id 
  left join movie on movie.id = movie_schedule.id_movie
  left join room on room.id = movie_schedule.id_room
    where user.id = ?

  ');


  $query->execute([$id]);


 $result =$query->fetchAll();
 return $result;
}


function listMovieSchedules(){
  $pdo = connect();


$query = $pdo->prepare('SELECT movie_schedule.id as id ,title, name,date_begin FROM `movie_schedule` 
inner join movie on movie.id = movie_schedule.id_movie
inner join room on room.id = movie_schedule.id_room
order by date_begin desc limit 40
  ');


  $query->execute();


 $result =$query->fetchAll();
 return $result;
}