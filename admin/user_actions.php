<?php
require_once 'user_detail.php';


$userdetails  =  userdetails($_GET['id']);


include ('../templates/user_detail.phtml');