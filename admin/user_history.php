<?php
require_once 'user_detail.php';

$userhistory  = userhistory($_GET['id']);


include ('../templates/user_history.phtml');