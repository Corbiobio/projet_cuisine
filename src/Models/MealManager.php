<?php

namespace Cuisine\Models;

use Cuisine\Models\Meal;
use PDO;

class MealManager
{
    private Meal $Meal;
    private PDO $bdd;

    function __construct()
    {
        $this->Meal = new Meal();
        $this->bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function get_all(): array
    {
        $sql = "SELECT * FROM meal";
        $result = $this->bdd->query($sql);

        return $result->fetchAll(PDO::FETCH_CLASS, "cuisine\Models\Meal");
    }
    function get_all_where_title(string $title): array
    {
        $title = "%" . $title . "%";

        $sql = "SELECT * FROM meal WHERE title_meal LIKE ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $title
            )
        );

        return $result->fetchAll(PDO::FETCH_CLASS, "cuisine\Models\Meal");
    }
    function get_all_where_ingredient(string $ingredient): array
    {

        $sql = "SELECT meal.* FROM `meal` JOIN ingredient_meal ON meal.id_meal = ingredient_meal.id_meal JOIN ingredient ON ingredient.id_ingredient = ingredient_meal.id_ingredient WHERE ingredient.label_ingredient = ?;";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $ingredient
            )
        );

        return $result->fetchAll(PDO::FETCH_CLASS, "cuisine\Models\Meal");
    }

    function get_all_where_origin_and_min_max_price(string $origin, float $min_price, float $max_price): array
    {

        $sql = "SELECT * FROM `meal` JOIN origin ON origin.id_origin = meal.id_origin WHERE origin.label_origin = ? AND meal.price_meal BETWEEN ? AND ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $origin,
                $min_price,
                $max_price
            )
        );

        return $result->fetchAll(PDO::FETCH_CLASS, "cuisine\Models\Meal");
    }
    function update(string $id_meal, string $id_origin, string $id_diet, string $id_category, string $title, float $price, float $weight): void
    {

        $sql = "UPDATE `meal` SET id_origin = ? ,id_diet = ? ,id_category = ?,title_meal= ?,price_meal= ?,weight_meal = ? WHERE id_meal = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $id_origin,
                $id_diet,
                $id_category,
                $title,
                $price,
                $weight,
                $id_meal
            )
        );
    }
    function create(string $id_origin, string $id_diet, string $id_category, string $title, float $price, float $weight): void
    {
        $sql = "INSERT INTO meal (id_meal, id_origin, id_diet, id_category, title_meal, price_meal, weight_meal) VALUES (?, ?, ?, ?, ?, ?, ? );";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                uniqid(),
                $id_origin,
                $id_diet,
                $id_category,
                $title,
                $price,
                $weight
            )
        );
    }
    function delete(string $id_meal): void
    {
        $sql = "DELETE FROM meal WHERE id_meal = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $id_meal
            )
        );
    }

}