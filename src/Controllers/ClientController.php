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
    function showPage()
    {
        $Xxs = $this->ClientManager->get_all();
        require VIEWS . "./page/home.php";
    }
}


