<?php

use MobdevUfopa\Erpl\Controller\Error404Controller;

require_once __DIR__ . '/../config/autoload.php';

// Obtém o array de rotas
$routes = require_once __DIR__ . '/../config/routes.php';
$pathInfo = $_SERVER['PATH_INFO'] ?? '/'; // Caso não exista o PATH_INFO, o caminho é a raiz (/)
$httpMethod = $_SERVER['REQUEST_METHOD'];
$key = "$httpMethod|$pathInfo";

// Controle de sessões, de acordo com o status de "logado" do usuário
session_start();
$loggedIn = (array_key_exists('loggedIn', $_SESSION)) ? $_SESSION['loggedIn'] : null;
if ($loggedIn) {
    $resultMessage = $isloggedIn = (array_key_exists('resultMessage', $_SESSION)) ? $_SESSION['resultMessage'] : null;
    unset($_SESSION['loggedIn']); // AÇÃO DE SEGURANÇA: impede o uso de antigas sessões para entrar no sistema
    unset($_SESSION['resultMessage']);
    session_regenerate_id(); // AÇÃO DE SEGURANÇA: gera um novo id de sessão.
    $_SESSION['loggedIn'] = $loggedIn;
    $_SESSION['resultMessage'] = $resultMessage;
}

// Redireciona o usuário para a tela de login se ele não estiver logado, exceto se ele já estiver na tela de login
// Logo, a tela de login torna-se o ponto central de entrada da aplicação
$isLoginRoute = $pathInfo === '/login';
if ($loggedIn !== true && !$isLoginRoute) {
    header('Location: /login');
    return;
}

// Redireciona o usuário para a rota requisitada (no caso, o Controller daquela rota), após o login
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes[$key];
    $controller = new $controllerClass();
} else {
    $controller = new Error404Controller();
}

$response = $controller->processRequest();
$response->getBody();
