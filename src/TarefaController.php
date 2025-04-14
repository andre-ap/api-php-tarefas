<?php

class TarefaController
{

    public function buscar($id)
    {
        echo "Buscar com {$id}";
    }

    public function listar()
    {
        echo 'Listar Tarefas';
    }

    public function criar()
    {
        echo 'Criar Tarefa';
    }

    public function atualizar($id)
    {
        echo "Atualizar tarefa {$id}";
    }

    public function remover($id) {
        echo "Remover tarefa {$id}";
    }
}
