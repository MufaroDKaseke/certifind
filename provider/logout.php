<?php

require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/provider.class.php';

$provider = new Provider();
$provider->logout();