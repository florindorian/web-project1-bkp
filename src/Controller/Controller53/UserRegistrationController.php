<?php

namespace MobdevUfopa\Erpl\Controller\Controller53;

use Exception;
use MobdevUfopa\Erpl\Controller\Controller;
use MobdevUfopa\Erpl\Infrastructure\ConnectionCreator;
use MobdevUfopa\Erpl\Response\Response;

class UserRegistrationController implements Controller
{

    public function processRequest(): Response
    {
        $idFunc = filter_input(INPUT_POST, 'id_func');
        $login = filter_input(INPUT_POST, 'login');
        $nome = filter_input(INPUT_POST,'nome');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $nivel = filter_input(INPUT_POST, 'nivel');
        $senha = filter_input(INPUT_POST, 'senha');
        $senhaConf = filter_input(INPUT_POST, 'senha_conf');

        $condIdFunc = ($login == false);
        $condLogin = ($login == false); // Verdade para: false, null, ''
        $condNome = ($nome == false);
        $condEmail = ($email == false);
        $condNivel = ($nivel == false);
        $condSenha = ($senha == false);
        $condSenhaConf = ($senhaConf == false);

        $connection = ConnectionCreator::createConnection();

        try {
            if ($senha !== $senhaConf || $condIdFunc || $condLogin || $condNome || $condEmail || $condNivel || $condSenha || $condSenhaConf) {
                throw new Exception('Entradas inválidas ou inconsistentes!');
            }

            // Gera um hash para a senha
            $sha = password_hash($senha, PASSWORD_ARGON2ID);

            $stmt = $connection->prepare(
                "INSERT INTO erpl.sis_acesso (login, sha, email, nivel, nome, func)
                        VALUES (:login, :sha, :email, :nivel, :nome, :func);"
            );
            $stmt->bindValue(':login', $login);
            $stmt->bindValue(':sha', $sha);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':nivel', $nivel);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':func', $idFunc, \PDO::PARAM_INT);

            if (!$stmt->execute()) {
                throw new Exception('Falha na execução do Statement!');
            }

        } catch (Exception $e) {
            $_SESSION['resultMessage'] = $e->getMessage();
            return new Response(
                headers: [
                    'Location' => '/cadastro-usuario?success=0'
                ],
                body: []
            );
        }

        $_SESSION['resultMessage'] = 'Cadastro realizado com sucesso!';
        return new Response(
            headers: ['Location' => '/cadastro-usuario?success=1'],
            body: []
        );
    }
}