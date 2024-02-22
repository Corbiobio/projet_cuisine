<?php

namespace Cuisine\Controllers;

use Cuisine\Models\CartManager;
use Cuisine\Validator;

class CartController
{
    private CartManager $CartManager;
    private Validator $validator;

    function __construct()
    {
        $this->CartManager = new CartManager();
        $this->validator = new Validator();
    }
    function index(): void
    {
        if (!is_login()) {
            //redirect if not login
            header("location: login");
        }

        $meals = $this->CartManager->get_all_from_cart_user_id($_SESSION["id"]);
        require VIEWS . "./page/cart.php";
    }

    function store(): void
    {
        if (!is_login()) {
            //redirect if not login
            header("location: login");
        }

        $meal = $this->CartManager->get_one_cart($_SESSION["id"], $_POST["id_meal"]);

        if ($meal) {
            $old_quantity = $meal["amount_meal"];
            $new_quantity = $old_quantity + $_POST["amount"];

            $this->CartManager->update_amount_meal_user_id($_POST["id_meal"], $_SESSION["id"], $new_quantity);
        } else {
            $this->CartManager->store($_POST["id_meal"], $_SESSION["id"], $_POST["amount"]);
        }
        header("location: /cart");
    }

    function update_amount(): void
    {
        if (!is_login()) {
            //redirect if not login
            header("location: login");
        }

        foreach ($_POST["amount"] as $id_meal => $amount) {
            $this->CartManager->update_amount_meal_user_id($id_meal, $_SESSION["id"], $amount);
        }
        header("location: /cart");
    }

    function delete_cart(): void
    {
        if (!is_login()) {
            //redirect if not login
            header("location: login");
        }

        $this->CartManager->delete_user_cart($_SESSION["id"]);
        header("location: /cart");
    }

    //slug = id_meal
    function delete_one_meal($slug): void
    {
        if (!is_login()) {
            //redirect if not login
            header("location: login");
        }

        $this->CartManager->delete_meal_user($_SESSION["id"], $slug);
        header("location: /cart");
    }
}