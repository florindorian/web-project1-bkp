<?php

namespace MobdevUfopa\Erpl\Controller\Controller53;

use MobdevUfopa\Erpl\Controller\Controller;
use MobdevUfopa\Erpl\Response\Response;

class LogoutController implements Controller
{

    public function processRequest(): Response
    {
        $_SESSION['loggedIn'] = false;
        return new Response(
            headers: ['Location' => '/login'],
            body: []
        );
    }
}