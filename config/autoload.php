<?php

// FUNÇÃO: spl_autoload_register: registra um autoloader
// Toda vez que uma classe não conhecida pelo PHP for encontrada, a função interna registrada será chamada para fazer
// o autoload da classe
spl_autoload_register(function (string $fullClassName) {
    // EXEMPLO:
    // Recebe: MobdevUfopa\Erpl\Infrastructure\ConnectionCreator
    // Transforma em: src/Infrastructure/ConnectionCreator.php

    $filePath = str_replace('MobdevUfopa\\Erpl', 'src', $fullClassName);
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $filePath);
    $filePath .= '.php';

    $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $filePath;

    if (file_exists($filePath)) {
        require_once $filePath;
    }
});