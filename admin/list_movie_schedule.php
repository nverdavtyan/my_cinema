<?php
require_once 'user_detail.php';

$listmovieschedules  = listMovieSchedules();


include ('../templates/list_movie_schedule.phtml');