<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Cuisine\Router($_SERVER["REQUEST_URI"]);

//home get
$router->get('/', "ClientController@showPage");




$router->run();
