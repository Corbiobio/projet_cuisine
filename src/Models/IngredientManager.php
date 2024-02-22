<?php

namespace Cuisine\Models;

use PDO;

class IngredientManager
{
    private PDO $bdd;

    function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function get_all(): array
    {
        $sql = "SELECT * FROM ingredient";
        $result = $this->bdd->query($sql);

        return $result->fetchAll();
    }
    function get_all_meal($id_meal): array
    {
        $sql = "SELECT * FROM `ingredient_meal` join ingredient On ingredient_meal.id_ingredient = ingredient.id_ingredient WHERE id_meal = ?;";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $id_meal
            )
        );
        return $result->fetchAll();
    }
    function get_one($id)
    {
        $sql = "SELECT * FROM ingredient where id_ingredient = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $id
            )
        );
        return $result->fetch();
    }

    function create(string $label): void
    {
        $sql = "INSERT INTO ingredient (id_ingredient, label_ingredient) VALUES (?, ?);";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                uniqid(),
                htmlspecialchars($label)
            )
        );
    }
    function delete(string $id_ingredient): void
    {
        $sql = "DELETE FROM ingredient WHERE id_ingredient = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $id_ingredient
            )
        );
    }
    function update(string $label_ingredient, string $id_ingredient): void
    {
        $sql = "UPDATE ingredient SET label_ingredient = ? WHERE id_ingredient = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $label_ingredient,
                $id_ingredient
            )
        );
    }
}