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


 INSERT INTO tarefa (nome, prioridade, esta_feita) VALUES
 ('Comprar um tenis', 2, true),
 ('Renovar identidate', 2, false),
 ('Pintar a parede do quarto', NULL, true);