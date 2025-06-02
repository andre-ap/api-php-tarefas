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

        $tarefas = $ps->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tarefas as &$tarefa) {
            $tarefa['estado'] = $tarefa['estado'] ? 'feita' : 'não feita';
        }

        return $tarefas;
    }

    public function buscar(string $id): array | false
    {
        $sql = "SELECT *
                FROM tarefa
                WHERE id = :id";

        $ps = $this->conexao->prepare($sql);

        $ps->execute(['id' => $id]);

        $tarefa = $ps->fetch(PDO::FETCH_ASSOC);

        if ($tarefa !== false) {
            $tarefa['estado'] = $tarefa['estado'] ? 'feita' : 'não feita';
        }

        return $tarefa;
    }
}
