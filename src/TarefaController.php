<?php

class TarefaController
{

    public function buscar(string $id): void
    {
        echo "Buscar com {$id}";
    }

    public function listar(): void
    {
        echo 'Listar Tarefas';
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
