<?php

declare(strict_types=1);

ini_set("display_errors", "On");

require __DIR__ . '/vendor/autoload.php';

use DI\Container;
use Slim\Factory\AppFactory;
use Src\Controllers\TarefaController;
use Src\Exception\TratadorDeErros;
use Src\Gateway\TarefaGateway;

set_exception_handler([TratadorDeErros::class, 'tratarException']);

$container = new Container();

$container->set(TarefaGateway::class, function () {
    return new TarefaGateway();
});

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->get('/api/tarefas/', [TarefaController::class, 'listarTodas']);
$app->get('/api/tarefas/{id}', [TarefaController::class, 'buscar']);
$app->post('/api/tarefas/', [TarefaController::class, 'registrarNovaTarefa']);
$app->put('/api/tarefas/{id}', [TarefaController::class, 'atualizarTarefa']);
$app->delete('/api/tarefas/{id}', [TarefaController::class, 'removerTarefa']);

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$errorMiddleware->setDefaultErrorHandler(function (
    Psr\Http\Message\ServerRequestInterface $request,
    Throwable $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails
) use ($app) {
    $response = $app->getResponseFactory()->createResponse();
    return TratadorDeErros::tratarException($exception, $response);
});

$app->run();
