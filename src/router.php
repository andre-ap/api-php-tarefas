<?php

$url = $_SERVER['REQUEST_URI'];
$metodo = $_SERVER['REQUEST_METHOD'];
$db = new Database($config['database']);
$controller = new TarefaController($db->conectar());

$rotaEncontrada = false;

if ($metodo === 'GET' && preg_match('/^\/api\/tarefas\/([0-9]+)\/?$/i', $url, $casamentos)) {
    // Busca tarefa com ID
    $rotaEncontrada = true;
    list(, $id) = $casamentos;
    $controller->buscar($id);
} elseif ($metodo === 'GET' && preg_match('/^\/api\/tarefas\/?$/i', $url)) {
    // Listar todas as tarefas
    $rotaEncontrada = true;
    echo json_encode($controller->listar());
} elseif ($metodo === 'POST' && preg_match('/^\/api\/tarefas\/?$/i', $url)) {
    // Criar nova tarefa
    $rotaEncontrada = true;
    $controller->criar();
} elseif ($metodo === 'PUT' && preg_match('/^\/api\/tarefas\/([0-9]+)\/?$/i', $url, $casamentos)) {
    // Alterar uma tarefa
    $rotaEncontrada = true;
    list(, $id) = $casamentos;
    $controller->atualizar($id);
} elseif ($metodo === 'DELETE' && preg_match('/^\/api\/tarefas\/([0-9]+)\/?$/i', $url, $casamentos)) {
    // Remover uma tarefa
    $rotaEncontrada = true;
    list(, $id) = $casamentos;
    $controller->remover($id);
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
