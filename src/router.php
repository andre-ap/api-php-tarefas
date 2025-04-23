<?php

class Router
{
    public static function rotear($url, $metodo, $config)
    {
        $db = new Database($config['database']);
        $gateway = new TarefaGateway($db);

        $rotaEncontrada = false;

        if ($metodo === 'GET' && preg_match('/^\/api\/tarefas\/([0-9]+)\/?$/i', $url, $casamentos)) {
            // Busca tarefa com ID
            $rotaEncontrada = true;
            list(, $id) = $casamentos;
            echo json_encode ($gateway->buscar($id));
        } elseif ($metodo === 'GET' && preg_match('/^\/api\/tarefas\/?$/i', $url)) {
            // Listar todas as tarefas
            $rotaEncontrada = true;
            echo json_encode($gateway->listar());
        } elseif ($metodo === 'POST' && preg_match('/^\/api\/tarefas\/?$/i', $url)) {
            // Criar nova tarefa
            $rotaEncontrada = true;
            $gateway->criar();
        } elseif ($metodo === 'PUT' && preg_match('/^\/api\/tarefas\/([0-9]+)\/?$/i', $url, $casamentos)) {
            // Alterar uma tarefa
            $rotaEncontrada = true;
            list(, $id) = $casamentos;
            $gateway->atualizar($id);
        } elseif ($metodo === 'DELETE' && preg_match('/^\/api\/tarefas\/([0-9]+)\/?$/i', $url, $casamentos)) {
            // Remover uma tarefa
            $rotaEncontrada = true;
            list(, $id) = $casamentos;
            $gateway->remover($id);
        }

        if (!$rotaEncontrada) {
            if (preg_match('#^/api/tarefas(/([0-9]+))?/?$#', $url)) {
                http_response_code(405);
                echo json_encode(['erro' => 'Metodo nao permitido']);
            } else {
                http_response_code(404);
                echo json_encode(['erro' => 'Rota nao encontrada']);
            }
        }
    }
}