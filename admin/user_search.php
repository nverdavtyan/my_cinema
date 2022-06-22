<?php
require_once '../lib/database.php';

$pdo = connect();


if(empty($_POST) == false)
{



    $query = $pdo->prepare('SELECT user.id as userid ,firstname, lastname, email,country,zipcode, date(date_begin) as date_begin  from user 
    left join membership on membership.id_user = user.id 
    left join subscription on subscription.id = membership.id_subscription 
   
        WHERE firstname LIKE ?
        ORDER BY userid asc
    ');


    $query->execute([ '%' . $_POST['firstname'] . '%' ]);
}
else
{
 
    $query = $pdo->prepare('SELECT user.id as userid ,firstname, lastname, email,country,zipcode, date(date_begin) as date_begin  from user 
    left join membership on membership.id_user = user.id 
    left join subscription on subscription.id = membership.id_subscription  ORDER BY userid asc

    ');


    $query->execute();
}



$users = $query->fetchAll(PDO::FETCH_ASSOC);