<?php

namespace Cuisine\Models;

use PDO;

class CategoryManager
{
    private PDO $bdd;

    function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function get_all()
    {
        $sql = "SELECT * FROM category_meal";
        $result = $this->bdd->query($sql);

        return $result->fetchAll();
    }
    function get_one($id)
    {
        $sql = "SELECT * FROM category_meal where id_category = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $id
            )
        );
        return $result->fetch();
    }
}