<?php

function editUserSubscription($data)
{
    $pdo = connect();

    $query = $pdo->prepare('
    UPDATE user 
    SET 
         firstname = ?,
         lastname = ?,
         email = ?
         where id = ? 
');

$query->execute(
    [
        $data['firstname'],
        $data['lastname'],
        $data['email'],
        $data['id']
    ]);


    $todaydate = date("Y-m-d H:i:s");
    $sqlDate = date('Y-m-d H:i:s', strtotime($todaydate));
    var_dump($sqlDate);
    $query = $pdo->prepare("
        UPDATE membership 
        SET 
             id_subscription = ?,
             date_begin = '$sqlDate'
             where id_user = ? 
    ");

    $query->execute(
        [
            $data['id_subscription'],
            $data['id']
        ]);
      
}


function listSubscriptionType()
{

    $pdo = connect();


    $query = $pdo->prepare('
    SELECT
    id, 
    name as  subname
    FROM subscription
    ');

  
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}



function insertUserSubscription($data){


    $pdo = connect();



        $todaydate = date("Y-m-d H:i:s");
        $sqlDate = date('Y-m-d H:i:s', strtotime($todaydate));
        $query = $pdo->prepare("

        INSERT INTO `membership`
        (`id_subscription`, `date_begin`,`id_user`) 
        VALUES (?,'$todaydate',?)
        ");

        $query->execute(
            [
                $data['id_subscription'],
                $data['id']
            ]);
}




function movieSchedulePost($data){


    $pdo = connect();
        $query = $pdo->prepare("

        INSERT INTO `movie_schedule`
        ( `id_room`, `date_begin`,`id_movie`) 
        VALUES (?,?,?)
        ");

        $query->execute(
            [
               
                $data['id_room'],
                $data['date_begin'],
                 $data['id_movie']
            
            ]);
}


function movieScheduledetail(){
  
    $pdo = connect();


    $query = $pdo->prepare('SELECT id_room,id_movie, date_begin FROM `movie_schedule`
   
    ');

  
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}



function listroomtype(){
  
    $pdo = connect();

    $query = $pdo->prepare(' SELECT
    id, 
    name
    FROM room
    ');

  
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
