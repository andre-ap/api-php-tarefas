<?php

namespace Src\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Src\Services\Database;
use Src\Services\RepositorioTarefaEmBDR;


class TarefaController
{

    public function buscar(Request $request, Response $response, array $args = []): Response
    {
        $response->getBody()->write("Buscar Tarefas");
        return $response;
    }

    public function listarTodas(Request $request, Response $response, array $args = []): Response
    {
        $response->getBody()->write("Listar Todas Tarefas");
        return $response;
    }

    public function registrarNovaTarefa(Request $request, Response $response, array $args = []): Response
    {
        $response->getBody()->write("Registrar Nova Tarefa");
        return $response;
    }

    public function removerTarefa(Request $request, Response $response, array $args = []): Response
    {
        $id = $args['id'];
        $response->getBody()->write("Remover Tarefa de $id");
        return $response;
    }

    public function atualizarTarefa(Request $request, Response $response, array $args = []): Response
    {
        $response->getBody()->write("Atualizar Tarefa");
        return $response;
    }
}
