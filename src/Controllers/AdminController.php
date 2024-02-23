<?php

namespace Cuisine\Controllers;

use Cuisine\Models\CategoryManager;
use Cuisine\Models\MealManager;
use Cuisine\Models\DietManager;
use Cuisine\Models\IngredientManager;
use Cuisine\Models\OriginManager;
use Cuisine\Validator;

class AdminController
{
    private CategoryManager $CategoryManager;
    private MealManager $MealManager;
    private DietManager $DietManager;
    private IngredientManager $IngredientManager;
    private OriginManager $OriginManager;
    private Validator $validator;

    function __construct()
    {
        $this->CategoryManager = new CategoryManager();
        $this->MealManager = new MealManager();
        $this->DietManager = new DietManager();
        $this->IngredientManager = new IngredientManager();
        $this->OriginManager = new OriginManager();
        $this->validator = new Validator();
    }
    function index()
    {
        $content_admin = "<p>Admin page</p>";
        require VIEWS . "./page/admin/admin_layout.php";
    }
    function index_origins()
    {
        $origins = $this->OriginManager->get_all();
        require VIEWS . "./page/admin/origins.php";
    }

    function manage_origins()
    {
        if (isset($_POST["create"]) && $_POST["create"]) {
            //create
            $this->OriginManager->create($_POST["label"]);
        } else if (isset($_POST["delete"]) && $_POST["delete"]) {
            //delete
            $this->OriginManager->delete($_POST["id_origin"]);
        } else if (isset($_POST["update"]) && $_POST["update"]) {
            //update
            $this->OriginManager->update($_POST["label_origin"], $_POST["id_origin"]);
        }

        header("location: /admin/origins");
    }
    function index_ingredients()
    {
        $ingredients = $this->IngredientManager->get_all();
        require VIEWS . "./page/admin/ingredients.php";
    }

    function manage_ingredients()
    {
        if (isset($_POST["create"]) && $_POST["create"]) {
            //create
            $this->IngredientManager->create($_POST["label"]);
        } else if (isset($_POST["delete"]) && $_POST["delete"]) {
            //delete
            $this->IngredientManager->delete($_POST["id_ingredient"]);
        } else if (isset($_POST["update"]) && $_POST["update"]) {
            //update
            $this->IngredientManager->update($_POST["label_ingredient"], $_POST["id_ingredient"]);
        }

        header("location: /admin/ingredients");
    }
    function index_diets()
    {
        $diets = $this->DietManager->get_all();
        require VIEWS . "./page/admin/diets.php";
    }

    function manage_diets()
    {
        if (isset($_POST["create"]) && $_POST["create"]) {
            //create
            $this->DietManager->create($_POST["label"]);
        } else if (isset($_POST["delete"]) && $_POST["delete"]) {
            //delete
            $this->DietManager->delete($_POST["id_diet"]);
        } else if (isset($_POST["update"]) && $_POST["update"]) {
            //update
            $this->DietManager->update($_POST["label_diet"], $_POST["id_diet"]);
        }

        header("location: /admin/diets");
    }
    function index_meals()
    {
        $meals = $this->MealManager->get_all();
        $origins = $this->OriginManager->get_all();
        $diets = $this->DietManager->get_all();
        $categorys = $this->CategoryManager->get_all();
        $ingredients = $this->IngredientManager->get_all();
        require VIEWS . "./page/admin/meals.php";
    }

    function manage_meals()
    {
        if (isset($_POST["create"]) && $_POST["create"]) {
            //create
            $this->MealManager->create($_POST["origin"], $_POST["diet"], $_POST["category"], $_POST["title"], $_POST["price"], $_POST["weight"]);
            foreach ($_POST["ingredients"] as $ingredient_id) {
                $this->IngredientManager->create_meal_ingr($ingredient_id, $_POST["id"]);
            }
        } else if (isset($_POST["delete"]) && $_POST["delete"]) {
            //delete
            $this->MealManager->delete($_POST["id"]);
        } else if (isset($_POST["update"]) && $_POST["update"]) {
            //update
            $this->MealManager->update($_POST["id"], $_POST["origin"], $_POST["diet"], $_POST["category"], $_POST["title"], $_POST["price"], $_POST["weight"]);

            foreach ($_POST["ingredients"] as $ingredient_id) {
                $result = $this->IngredientManager->get_meal_ingr($ingredient_id, $_POST["id"]);
                // if not exist create
                if (!$result) {
                    $this->IngredientManager->create_meal_ingr($ingredient_id, $_POST["id"]);
                }
            }
        }

        header("location: /admin/meals");
    }
}