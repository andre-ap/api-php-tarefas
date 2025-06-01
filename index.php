<?php

require __DIR__ . '/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Src\Controllers\TarefaController;

$app = AppFactory::create();

$app->get('/api/tarefas/', [TarefaController::class, 'listarTodas']);
$app->get('/api/tarefas/{id}', [TarefaController::class, 'buscar']);
$app->post('/api/tarefas/', [TarefaController::class, 'registrarNovaTarefa']);
$app->put('/api/tarefas/{id}', [TarefaController::class, 'atualizarTarefa']);
$app->delete('/api/tarefas/{id}', [TarefaController::class, 'removerTarefa']);


$app->run();