<?php
     require_once '../lib/database.php';
     require_once 'user_update.php';

    if(
        isset($_POST) &&
        !empty($_POST['id_room'])
    )
     {
        movieSchedulePost($_POST);
        header("location:list_movie_schedule.php");

    }
    else{
        
 
        $movieScheduledetail= movieScheduledetail();
        $listrooms =  listroomtype();
    
        include '../templates/movie_schedule.phtml';    
    }

    

?>