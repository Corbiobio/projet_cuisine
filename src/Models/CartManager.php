<?php

namespace Cuisine\Models;

use Cuisine\Models\Meal;
use PDO;

class CartManager
{
    private PDO $bdd;
    private Meal $Meal;

    function __construct()
    {
        $this->Meal = new Meal();
        $this->bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    function get_all_from_cart_user_id(string $user_id): array
    {
        $sql = "SELECT meal.*, cart.amount_meal FROM `meal` JOIN cart ON meal.id_meal = cart.id_meal WHERE cart.id_client = ?;";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $user_id
            )
        );

        return $result->fetchAll(PDO::FETCH_CLASS, "cuisine\Models\Meal");
    }
    function get_one_cart(string $user_id, string $meal_id): array|bool
    {
        $sql = "SELECT * FROM cart WHERE id_client = ? AND id_meal = ?;";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $user_id,
                $meal_id
            )
        );

        return $result->fetch();
    }

    function store($id_meal, $user_id, $amount)
    {
        $sql = "INSERT INTO cart (id_meal, id_client, amount_meal) VALUES (?, ?, ?);";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $id_meal,
                $user_id,
                $amount
            )
        );
    }

    function update_amount_meal_user_id(string $id_meal, string $user_id, $amount): void
    {
        $sql = "UPDATE cart SET amount_meal = ? WHERE cart.id_meal = ? AND cart.id_client = ? ;";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $amount,
                $id_meal,
                $user_id
            )
        );
    }
    function delete_user_cart(string $user_id): void
    {
        $sql = "DELETE FROM cart WHERE id_client = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $user_id
            )
        );
    }

    function delete_meal_user(string $user_id, string $meal_id)
    {
        $sql = "DELETE FROM cart WHERE id_client = ? AND id_meal = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $user_id,
                $meal_id
            )
        );
    }
}