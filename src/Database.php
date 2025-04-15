<?php

class Database
{
    private $pdo = null;

    public function __construct($config, $usuario = 'root', $senha = 'root')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {
            $this->pdo = new PDO($dsn, $usuario, $senha, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // 👈 Ativa exceções
            ]);
        } catch (PDOException $e) {
            die("Erro na conexão com o banco: " . $e->getMessage());
        }
    }

    public function conectar()
    {
        return $this->pdo;
    }
}
