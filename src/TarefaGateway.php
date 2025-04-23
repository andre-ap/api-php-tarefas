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

        $resultado = [];

        while ($linha = $ps->fetch(PDO::FETCH_ASSOC)) {
            // Tra

            $resultado[] = $linha;
        }

        return $resultado;
    }

    public function buscar(string $id): array | false
    {
        $sql = "SELECT * FROM tarefa WHERE id = :id";

        $ps = $this->conexao->prepare($sql);
        $ps->bindValue(":id", $id);
        $ps->execute();

        $resultado = $ps->fetch(PDO::FETCH_ASSOC);

        if ($resultado !== false) {
            $resultado['esta_feita'] = (bool) $resultado['esta_feita'];
        }

        return $resultado;
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
