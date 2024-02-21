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
        $meals = $this->CartManager->get_all_from_cart_user_id($_SESSION["id"]);
        // var_dump($meals);
        require VIEWS . "./page/cart.php";
    }

    function store(): void
    {
        $this->CartManager->store($_POST["id_meal"], $_SESSION["id"], $_POST["amount"]);
    }

    function update_amount(): void
    {
        foreach ($_POST["amount"] as $id_meal => $amount) {
            $this->CartManager->update_amount_meal_user_id($id_meal, $_SESSION["id"], $amount);
        }

        header("location: /cart");
    }

    function delete_cart(): void
    {
        $this->CartManager->delete_user_cart($_SESSION["id"]);
        header("location: /cart");
    }
}