<?php

require(dirname(__DIR__) . "/vendor/autoload.php");

$url = $_SERVER['REQUEST_URI'];
$metodo = $_SERVER['REQUEST_METHOD'];
$controller = new TarefaController;

if ($metodo === 'GET' && preg_match('/^\/api\/tarefas\/([0-9]+)\/?$/i', $url, $casamentos)) {
    // Busca tarefa com ID
    list(, $id) = $casamentos;
    $controller->buscar($id);
} elseif ($metodo === 'GET' && preg_match('/^\/api\/tarefas\/?$/i', $url)) {
    // Listar todas as tarefas
    $controller->listar();
} elseif ($metodo === 'POST' && preg_match('/^\/api\/tarefas\/?$/i', $url)) {
    // Criar nova tarefa
    $controller->criar();
} elseif ($metodo === 'PUT' && preg_match('/^\/api\/tarefas\/([0-9]+)\/?$/i', $url, $casamentos)) {
    // Alterar uma tarefa
    list(, $id) = $casamentos;
    $controller->atualizar($id);
} elseif ($metodo === 'DELETE' && preg_match('/^\/api\/tarefas\/([0-9]+)\/?$/i', $url, $casamentos)) {
    list(, $id) = $casamentos;
    $controller->remover($id);
}
