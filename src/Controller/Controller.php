<?php

namespace MobdevUfopa\Erpl\Controller;

use MobdevUfopa\Erpl\Response\Response;

interface Controller
{
    public function processRequest(): Response;
}