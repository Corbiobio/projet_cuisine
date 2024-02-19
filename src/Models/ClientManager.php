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
        $sql = "SELECT * FROM Client";

        $result = $this->bdd->query($sql);

        return $result;
    }
}