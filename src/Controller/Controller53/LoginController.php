<?php

namespace MobdevUfopa\Erpl\Controller\Controller53;

use Exception;
use MobdevUfopa\Erpl\Controller\Controller;
use MobdevUfopa\Erpl\Infrastructure\ConnectionCreator;
use MobdevUfopa\Erpl\Response\Response;
use PDO;

class LoginController implements Controller
{
    public function processRequest(): Response
    {
        $login = filter_input(INPUT_POST, 'login');
        $senha = filter_input(INPUT_POST, 'senha');

        $connection = ConnectionCreator::createConnection();

        try {
            // Busca o hash associado ao login enviado
            $stmt = $connection->prepare(
                "SELECT sha FROM erpl.sis_acesso WHERE login = :login;"
            );
            $stmt->bindValue(':login', $login);
            if (!$stmt->execute()) {
                throw new Exception("Falha na consulta!");
            }
            $shaFromDb = $stmt->fetch(PDO::FETCH_ASSOC)['sha'] ?? '';

            // true: se a senha estiver correta; false: caso contrário
            $correctPassword = password_verify($senha, $shaFromDb);

            if (!$correctPassword) {
                throw new Exception('Usuário ou senha incorretos!');
            }
        } catch (Exception $e) {
            $_SESSION['resultMessage'] = $e->getMessage();
            return new Response(
                headers: ['Location' => '/login?success=0'],
                body: []
            );
        }

        $_SESSION['loggedIn'] = true;
        return new Response(
            headers: ['Location' => '/'],
            body: []
        );
    }
}