<?php

class TarefaGateway
{
    private $conexao = null;

    public function __construct(Database $database)
    {
        $this->conexao = $database->conectar($database);
    }

    public function listar()
    {
        $sql = "SELECT * FROM tarefa ORDER BY nome";

        $ps = $this->conexao->prepare($sql);
        $ps->execute();

        $data = [];

        while ($linha = $ps->fetch(PDO::FETCH_ASSOC)) {

            $linha['esta_feita'] = (bool) $linha['esta_completa'];

            $data[] = $linha;
        }

        return $data;
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
