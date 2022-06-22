<?php
require_once './lib/database.php';




$pdo =connect();
$count = $pdo->prepare('select count(id) as cpt  from movie');
$count->setFetchmode(PDO::FETCH_ASSOC);
$count->execute();
$tcount=$count->fetchAll();

@$page=$_GET["page"];
$nbr_elements_par_page = 10;
$nbr_de_pages=ceil($tcount[0]["cpt"]/$nbr_elements_par_page);
$debut=($page-1)*$nbr_elements_par_page;
// Récupérer les enregistrements eux-memes
 $sel=$pdo->prepare("SELECT * FROM movie  order by title limit $debut, $nbr_elements_par_page
");
$sel->setFetchmode(PDO::FETCH_ASSOC);
$sel->execute();
$movie=$sel->fetchAll();




// $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5000;
// $page = isset($_GET['page']) ? $_GET['page'] : 1;
// $start = ($page - 1) * $limit;
// $result = $pdo->prepare("SELECT * FROM movie LIMIT $start, $limit");
// $result->setFetchmode(PDO::FETCH_ASSOC);
// $result->execute();
// $result->fetchAll();


// $result1 = $pdo->prepare("SELECT count(id) AS id FROM movie");
// $result1->setFetchmode(PDO::FETCH_ASSOC);
// $result1->execute();
// $custCount = $result1->fetchAll();;
// $total = $custCount[0]['id'];
// $pages = ceil( $total / $limit );

// $Previous = $page - 1;
// $Next = $page + 1;