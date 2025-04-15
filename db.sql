CREATE DATABASE tarefas_api;

use tarefas_api;

CREATE TABLE tarefa (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(128) NOT NULL,
    prioridade INT DEFAULT NULL,
    esta_feita BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY (id),
    INDEX(name)
); 