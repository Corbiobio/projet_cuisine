<?php

namespace Cuisine\Controllers;

use Cuisine\Models\ClientManager;
use Cuisine\Validator;

class ClientController
{

    private ClientManager $ClientManager;
    private Validator $validator;

    function __construct()
    {
        $this->ClientManager = new ClientManager();
        $this->validator = new Validator();
    }

    //methode
    function showLogin()
    {
        require VIEWS . "./page/login.php";
    }
    function login()
    {
        //crypt password and mail
        $password = htmlspecialchars($_POST["password"]);
        $mail = htmlspecialchars($_POST["mail"]);

        //get client
        $client = $this->ClientManager->get_client($password, $mail);

        //set client info in session
        if ($client) {
            $_SESSION["id"] = $client->getId_client();
            $_SESSION["mail"] = $client->getMail_client();
        }

        require VIEWS . "./page/login.php";
    }

    function logout()
    {
        $_SESSION["id"] = false;
        $_SESSION["mail"] = false;

        header("location: /login");
    }
}


