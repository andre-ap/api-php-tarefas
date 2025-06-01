CREATE DATABASE tarefas_api;

use tarefas_api;

CREATE TABLE tarefa (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(128) NOT NULL,
    prioridade INT DEFAULT NULL,
    feita BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY (id),
    INDEX(nome)
); 


 INSERT INTO tarefa (nome, prioridade, feita) VALUES
 ('Comprar um tenis', 2, true),
 ('Renovar identidate', 2, false),
 ('Pintar a parede do quarto', NULL, true);