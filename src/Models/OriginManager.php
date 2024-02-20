<?php

namespace Cuisine\Models;

use PDO;

class OriginManager
{
    private PDO $bdd;

    function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function get_all(): array
    {
        $sql = "SELECT * FROM origin";
        $result = $this->bdd->query($sql);

        return $result->fetchAll();
    }
    function get_one($id)
    {
        $sql = "SELECT * FROM origin where id_origin = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $id
            )
        );
        return $result->fetch();
    }
}