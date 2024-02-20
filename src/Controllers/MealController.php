<?php

namespace Cuisine\Controllers;

use Cuisine\Models\MealManager;
use Cuisine\Models\IngredientManager;
use Cuisine\Models\OriginManager;
use Cuisine\Validator;

class MealController
{
    private MealManager $MealManager;
    private IngredientManager $IngredientManager;
    private OriginManager $OriginManager;
    private Validator $validator;

    function __construct()
    {
        $this->MealManager = new MealManager();
        $this->IngredientManager = new IngredientManager();
        $this->OriginManager = new OriginManager();
        $this->validator = new Validator();
    }

    function index()
    {
        // $meals = $this->MealManager->get_all();
        // $meals[0]->getLabel_origin();
        // $meals[0]->getLabel_diet();
        // $meals[0]->getLabel_category();
        // $meals[0]->getIngredient();
        // var_dump($meals);
        // var_dump($meals);

        if (is_login()) {
            //home page multiple sort
            $ingredients = $this->IngredientManager->get_all();
            $origins = $this->OriginManager->get_all();
            require VIEWS . "page/home.php";
        } else {
            require VIEWS . "page/login.php";
        }
    }

    function sort_ingredient()
    {
        $meals = $this->MealManager->get_all_where_ingredient($_POST["ingredients"]);
        require VIEWS . "page/meal_list.php";
    }
    function sort_title()
    {
        $meals = $this->MealManager->get_all_where_title($_POST["title"]);
        require VIEWS . "page/meal_list.php";
    }
    function sort_origin()
    {
        $meals = $this->MealManager->get_all_where_origin_and_min_max_price($_POST["origin"], $_POST["min_price"], $_POST["max_price"]);
        require VIEWS . "page/meal_list.php";
    }
}