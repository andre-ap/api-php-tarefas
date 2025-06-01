<?php
// src/Exception/TratadorDeErros.php

namespace Src\Exception;

use Throwable;
use Slim\Exception\HttpNotFoundException;
use Slim\Exception\HttpMethodNotAllowedException;
use Psr\Http\Message\ResponseInterface as Response;

class TratadorDeErros
{
    public static function tratarException(Throwable $exception, Response $response): Response
    {
        $codigo = 500;
        $mensagem = 'Erro interno do servidor';

        if ($exception instanceof HttpNotFoundException) {
            $codigo = 404;
            $mensagem = 'Rota não encontrada';
        } elseif ($exception instanceof HttpMethodNotAllowedException) {
            $codigo = 405;
            $mensagem = 'Método não permitido';
        } else {
            $mensagem = $exception->getMessage();
        }

        $response->getBody()->write(json_encode([
            "code" => $codigo,
            "mensagem" => $mensagem,
            "arquivo" => $exception->getFile(),
            "linha" => $exception->getLine()
        ], JSON_UNESCAPED_UNICODE));

        return $response->withHeader('Content-Type', 'application/json')
                        ->withStatus($codigo);
    }
}
