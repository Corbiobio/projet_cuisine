<?php

namespace Cuisine\Models;

use Cuisine\Models\Client;
use PDO;

class ClientManager
{
    private Client $Client;
    private PDO $bdd;

    function __construct()
    {
        $this->Client = new Client();
        $this->bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function get_all()
    {
        $sql = "SELECT * FROM client";

        $result = $this->bdd->query($sql);

        return $result;
    }

    function get_client($password, $mail)
    {
        $sql = "SELECT * FROM client where mail_client = ? and password_client = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute(
            array(
                $mail,
                $password
            )
        );
        $result->setFetchMode(PDO::FETCH_CLASS, "cuisine\Models\Client");

        return $result->fetch();
    }
}