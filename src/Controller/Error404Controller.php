<?php

namespace MobdevUfopa\Erpl\Controller;

use MobdevUfopa\Erpl\Response\Response;

class Error404Controller implements Controller
{

    public function processRequest(): Response
    {
        return new Response(
            headers: [],
            body: [
                'pageFile' => 'error404',
                'pageData' => []
            ]
        );
    }
}