<?php

// Fazer o require deste arquivo "routes.php" irá retornar o array abaixo, que pode ser guardado em uma variável
return [
    'GET|/' => \MobdevUfopa\Erpl\Controller\HomeController::class,
    'GET|/login' => \MobdevUfopa\Erpl\Controller\Controller53\LoginFormController::class,
    'POST|/login' => \MobdevUfopa\Erpl\Controller\Controller53\LoginController::class,
    'GET|/logout' => \MobdevUfopa\Erpl\Controller\Controller53\LogoutController::class,
    'GET|/cadastro-usuario' => \MobdevUfopa\Erpl\Controller\Controller53\UserRegistrationFormController::class,
    'POST|/cadastro-usuario' => \MobdevUfopa\Erpl\Controller\Controller53\UserRegistrationController::class,
];
