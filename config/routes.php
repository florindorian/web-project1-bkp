<?php

return [
    'GET|/' => \MobdevUfopa\Erpl\Controller\HomeController::class,
    'GET|/login' => \MobdevUfopa\Erpl\Controller\Controller53\LoginFormController::class,
    'POST|/login' => \MobdevUfopa\Erpl\Controller\Controller53\LoginController::class,
    'GET|/logout' => \MobdevUfopa\Erpl\Controller\Controller53\LogoutController::class,
    'GET|/cadastro-usuario' => \MobdevUfopa\Erpl\Controller\Controller53\UserRegistrationFormController::class,
    'POST|/cadastro-usuario' => \MobdevUfopa\Erpl\Controller\Controller53\UserRegistrationController::class,
];
