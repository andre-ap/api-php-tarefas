<?php

namespace Src\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Src\Gateway\TarefaGateway;

class TarefaController
{
    public function __construct(private TarefaGateway $gateway) {}

    public function buscar(Request $request, Response $response, array $args = []): Response
    {
        $resultado = $this->gateway->buscar($args['id']);

        if ($resultado === false) {
            return $this->notFound($response, $args['id']);
        }

        $response->getBody()->write(json_encode($resultado));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function listarTodas(Request $request, Response $response, array $args = []): Response
    {
        $resultado = $this->gateway->listarTarefas();
        $response->getBody()->write(json_encode($resultado));
        return $response->withHeader('Content-Type', 'application/json');
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

    private function notFound(Response $response, int $id): Response
    {
        $response->getBody()->write(json_encode(['erro' => "Tarefa com ID $id não encontrada"]));
        return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
    }
}
