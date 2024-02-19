<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Cuisine\Router($_SERVER["REQUEST_URI"]);

// $router->get('/', require VIEWS . "./page/home.php");


//login get
$router->get('/login', "ClientController@showLogin");
//login post
$router->post('/login', "ClientController@login");

$router->run();
