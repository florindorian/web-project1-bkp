<?php

namespace MobdevUfopa\Erpl\Controller;

use MobdevUfopa\Erpl\Response\Response;

class HomeController implements Controller
{

    public function processRequest(): Response
    {
        return new Response(
            headers: [],
            body: [
                'pageFile' => 'home',
                'pageData' => []
            ]
        );
    }
}