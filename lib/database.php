<?php

function connect()
{

    $db= "cinema";
    $user= "root";
    $pass= "";
    $dbh = null;
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=' . $db, $user, $pass );
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    } catch(PDOException $e){
        print "Erreur!:" . $e->getMessage() ."<br/>";
        die();
    }
    return $dbh;
	echo $dbh;
}

?>