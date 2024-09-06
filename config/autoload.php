<?php

// FUNÇÃO: spl_autoload_register: registra um autoloader
// Toda vez que uma classe não conhecida pelo PHP for encontrada, a função interna registrada será chamada para fazer
// o autoload da classe
// OBS: Esse autoloader foi feito para ser usado dentro do arquivo "/public/index" apenas
spl_autoload_register(function (string $fullClassName) {
    // EXEMPLO:
    // Recebe: MobdevUfopa\Erpl\Infrastructure\ConnectionCreator
    // Transforma em: src/Infrastructure/ConnectionCreator.php

    $filePath = str_replace('MobdevUfopa\\Erpl', 'src', $fullClassName);
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $filePath);
    $filePath .= '.php';

    // Como o autoload das classes é chamado dentro do arquivo "/public/index", é preciso subir um nível de diretório
    // para encontrar o "$filePath".
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $filePath;

    if (file_exists($filePath)) {
        require_once $filePath;
    }
});