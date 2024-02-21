<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Cuisine\Router($_SERVER["REQUEST_URI"]);

//home page
$router->get('/', "MealController@index");

//sort page
$router->post('/meals/sort_ingredient', "MealController@sort_ingredient");
$router->post('/meals/sort_title', "MealController@sort_title");
$router->post('/meals/sort_origin', "MealController@sort_origin");

//cart page
$router->get('/cart', "CartController@index");
$router->post('/cart', "CartController@store");
//update amount page
$router->post('/cart/update', "CartController@update_amount");
$router->get('/cart/valid_cart', "CartController@delete_cart");

//login and logout page
$router->get('/login', "ClientController@showLogin");
$router->post('/login', "ClientController@login");
$router->get('/logout', "ClientController@logout");

$router->run();
