<?php

namespace Src\Gateway;

use PDO;
use Src\Database\Database;

class TarefaGateway
{
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Database::conectar();
    }

    public function listarTarefas(): array
    {
        $sql = "SELECT *
                FROM tarefa
                ORDER BY nome";

        $ps = $this->conexao->query($sql);

        return $ps->fetchAll(PDO::FETCH_ASSOC);
    }
}
