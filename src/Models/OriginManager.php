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

    function create(string $label): void
    {
        $sql = "INSERT INTO origin (id_origin, label_origin) VALUES (?, ?);";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                uniqid(),
                htmlspecialchars($label)
            )
        );
    }
    function delete(string $id_origin): void
    {
        $sql = "DELETE FROM origin WHERE id_origin = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $id_origin
            )
        );
    }
    function update(string $label_origin, string $id_origin): void
    {
        $sql = "UPDATE origin SET label_origin = ? WHERE id_origin = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $label_origin,
                $id_origin
            )
        );
    }


}