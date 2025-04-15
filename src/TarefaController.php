<?php

class TarefaController
{
    private $conexao = null;

    public function __construct(PDO $database)
    {   
        $this->conexao = $database;
    }

    public function listar(): array
    {
        $sql = "SELECT * FROM tarefas ORDER BY nome";
        $ps = $this->conexao->prepare($sql);

        return $ps->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar(string $id): void
    {
        echo "Buscar com {$id}";
    }

    public function criar(): void
    {
        echo 'Criar Tarefa';
    }

    public function atualizar(string $id): void
    {
        echo "Atualizar tarefa {$id}";
    }

    public function remover(string $id): void
    {
        echo "Remover tarefa {$id}";
    }
}

