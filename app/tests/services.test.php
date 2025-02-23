<?php

require_once '../../vendor/autoload.php';
require_once '../config/config.php';
require_once '../classes/db.class.php';
require_once '../classes/services.class.php';

$service = new Services();
var_dump($service->getNearestServicesByCategory(-20.167634, 28.649736, 'education'));
//var_dump($service->newReview(1, 'Something', 4));