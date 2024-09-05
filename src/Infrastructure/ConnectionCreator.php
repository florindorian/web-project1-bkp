<?php

namespace MobdevUfopa\Erpl\Infrastructure;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $dotenv = parse_ini_file(__DIR__ . '/../../.env');
        return new PDO('mysql:host=web-mysql;dbname=erpl', $dotenv['MYSQL_USER'], $dotenv['MYSQL_PASSWORD']);
    }
}