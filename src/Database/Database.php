<?php

namespace Src\Database;

use PDO;
use Dotenv\Dotenv;

class Database
{
    private static ?PDO $conexao = null;

    public static function conectar(): PDO
    {
        if (!self::$conexao) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->load();

            $host = $_ENV['DB_HOST'];
            $dbname = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASS'];
            
            $dns = "mysql:host={$host};dbname={$dbname};charset=utf8";

            self::$conexao = new PDO(
                $dns,
                $user,
                $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }

        return self::$conexao;
    }
}
