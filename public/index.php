<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Cuisine\Router($_SERVER["REQUEST_URI"]);

//home page
$router->get('/', "MealController@index");

//meals page
$router->get('/meals', "MealController@show_all_meals");
$router->post('/meals/sort_ingredient', "MealController@sort_ingredient");
$router->post('/meals/sort_title', "MealController@sort_title");
$router->post('/meals/sort_origin', "MealController@sort_origin");

//cart page
$router->get('/cart', "CartController@index");
$router->post('/cart', "CartController@store");
//update amount 
$router->post('/cart/update', "CartController@update_amount");
//delete cart and meal
$router->get('/cart/valid_cart', "CartController@delete_cart");
$router->get('/cart/delete/:meal_id', "CartController@delete_one_meal");

//login and logout page
$router->get('/login', "ClientController@showLogin");
$router->post('/login', "ClientController@login");
$router->get('/logout', "ClientController@logout");

//admin page
$router->get('/admin', "AdminController@index");
//origins
$router->get('/admin/origins', "AdminController@index_origins");
$router->post('/admin/origins', "AdminController@manage_origins");
//ingredients
$router->get('/admin/ingredients', "AdminController@index_ingredients");
$router->post('/admin/ingredients', "AdminController@manage_ingredients");
//diets
$router->get('/admin/diets', "AdminController@index_diets");
$router->post('/admin/diets', "AdminController@manage_diets");

$router->run();
