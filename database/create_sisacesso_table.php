<?php

use MobdevUfopa\Erpl\Infrastructure\ConnectionCreator;

require_once __DIR__ . "/../src/Infrastructure/ConnectionCreator.php";

$dotenv = parse_ini_file(__DIR__ . '/../.env');

$connection = ConnectionCreator::createConnection();

// Comando para a criação da tabela de usuários
$sqlCreate = "
CREATE TABLE IF NOT EXISTS erpl.sis_acesso (
	idacesso SERIAL,
    uuid_acesso VARCHAR(48),
    login VARCHAR(255) NOT NULL, -- Form
    sha VARCHAR(255) NOT NULL, -- Form
    ultacesso VARCHAR(255),
    email VARCHAR(255), -- Form
    nivel VARCHAR(255), -- Form
    nome VARCHAR(255), -- Form
    ativo ENUM('s', 'n'),
    func INTEGER NOT NULL
);";

// Comando para a criação do usuário admin (o primeiro usuário, responsável por cadastrar os demais)
$sqlInsert = "
    INSERT INTO erpl.sis_acesso (login, sha, email, nivel, nome, func) VALUES 
        (:login, :sha, 'admin@admin.com', '0', 'admin', 0);
";

try {
    $connection->exec($sqlCreate);

    $stmt = $connection->prepare("SELECT * FROM erpl.sis_acesso;");
    $stmt->execute();
    $arrayData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    if (sizeof($arrayData) > 0) {
        throw new Exception("Usuário padrão já cadastrado!");
    }

    $stmt = $connection->prepare($sqlInsert);
    $stmt->bindValue(':login', $dotenv['ADMIN_LOGIN']);
    $stmt->bindValue(':sha', password_hash($dotenv['ADMIN_PASSWORD'], PASSWORD_ARGON2ID));
    $stmt->execute();
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    exit();
}

echo 'Banco criado e usuário admin cadastrado com sucesso!' . PHP_EOL;