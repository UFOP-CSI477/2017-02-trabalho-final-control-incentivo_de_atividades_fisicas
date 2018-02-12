SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE DATABASE IF NOT EXISTS `movimente` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `movimente`;

-- DROP USER `movimente`@`localhost`;
CREATE USER 'movimente'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON movimente. * TO 'movimente'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE usuarios (
id INT PRIMARY KEY AUTO_INCREMENT,
cpf VARCHAR(14) NOT NULL UNIQUE KEY,
nome VARCHAR(150) NOT NULL,
login VARCHAR(45) NOT NULL UNIQUE KEY,
senha VARCHAR(255) NOT NULL,
email VARCHAR(100) NOT NULL,
data_nascimento DATE NOT NULL
);

CREATE TABLE modalidades (
id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(45) NOT NULL UNIQUE KEY,
descricao TEXT NOT NULL
);

CREATE TABLE modalidades_usuarios (
id INT PRIMARY KEY AUTO_INCREMENT,
id_usuario INT NOT NULL,
id_modalidade INT NOT NULL,
pontuacao_obtida INT NOT NULL DEFAULT 0,
CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
CONSTRAINT fk_modalidade FOREIGN KEY (id_modalidade) REFERENCES modalidades (id)
);

CREATE TABLE atividades (
id INT PRIMARY KEY AUTO_INCREMENT,
id_modalidade INT NOT NULL,
id_usuario INT NOT NULL,
descricao VARCHAR(100) NOT NULL,
data DATE NOT NULL,
pontuacao INT NOT NULL,
gols_sofridos TINYINT(3) UNSIGNED,
CONSTRAINT fk_modalidade_atividades FOREIGN KEY (id_modalidade) REFERENCES modalidades (id),
CONSTRAINT fk_usuario_atividades FOREIGN KEY (id_usuario) REFERENCES usuarios (id)
);

CREATE TABLE recompensas (
id INT PRIMARY KEY AUTO_INCREMENT,
id_modalidade INT NOT NULL,
pontuacao_meta INT NOT NULL,
descricao VARCHAR(100) NOT NULL,
mensagem TEXT NOT NULL,
CONSTRAINT fk_modalidade_recompensas FOREIGN KEY (id_modalidade) REFERENCES modalidades(id)
);

CREATE TABLE recompensas_usuarios (
id INT PRIMARY KEY AUTO_INCREMENT,
id_recompensa INT NOT NULL,
id_usuario INT NOT NULL,
data_conquista DATE NOT NULL,
CONSTRAINT fk_recompensa FOREIGN KEY (id_recompensa) REFERENCES recompensas(id),
CONSTRAINT fk_usuario_recompensa FOREIGN KEY (id_usuario) REFERENCES usuarios (id)
);

CREATE TABLE medidas_corporais (
id INT PRIMARY KEY AUTO_INCREMENT,
id_usuario INT NOT NULL,
data_cadastro DATE NOT NULL,
altura DECIMAL(3, 2) NULL,
peso DECIMAL(4, 1) NULL,
biceps DECIMAL(4, 1) NULL,
antebraco DECIMAL(4, 1) NULL,
peito DECIMAL(4, 1) NULL,
cintura DECIMAL(4, 1) NULL,
quadris DECIMAL(4, 1) NULL,
coxas DECIMAL(4, 1) NULL,
panturrilha DECIMAL(4, 1) NULL,
CONSTRAINT fk_usuario_medidas FOREIGN KEY (id_usuario) REFERENCES usuarios (id)
);

INSERT INTO modalidades (nome, descricao) VALUES 
('Ciclismo', 'A bicicleta é o transdutor perfeito para combinar com a energia metabólica do homem com a impedância de locomoção. Equipado com esta ferramenta, o homem ultrapassa a eficiência não só de todas as máquinas, mas todos os outros animais também. '),
('Corrida', 'Corra pela saúde. Corra pela superação. Corra pelo prazer. Só não pare de correr!'),
('Natação', 'O contato do corpo humano com o ambiente aquático gera uma sensação bastante agradável de bem-estar. Como uma prática regular, a Natação oferece muitos benefícios: desenvolvimento da resistência cardiorrespiratória, da força e da resistência muscular, da flexibilidade, alívio do estresse, melhora da autoimagem e controle do peso.'),
('Basquete', 'O basquete é um exercício que requer força nos ombros e coxas. É um bom exercício cardiovascular e seu gasto calórico em uma hora de jogo é de 600 calorias. Pode ser praticado ao ar livre, em praças, parques e escolas. É importante beber bastante líquido antes e durante o jogo.'),
('Futebol', 'Esteticamente, o futebol é um excelente aliado na definição e fortalecimento dos músculos das panturrilhas, coxas, glúteos, costas e abdômen. Para quem tem como foco o gasto calórico, durante uma hora de treino é possível eliminar, em média, de 450 a 600 calorias. Em relação à saúde, os benefícios são tão tentadores quanto os estéticos.'),
('Volei', 'O vôlei é um esporte de impacto, mas também trabalha o corpo todo, ele melhora a capacidade física, fortalece os músculos, melhora a atividade cardiorrespiratórias e dá mais resistência. Por ser uma atividade que envolve muitos movimentos, também ajuda a melhorar a flexibilidade, a coordenação motora, a resistência aeróbica, a força e a resistência anaeróbica.');

INSERT INTO recompensas (id_modalidade, pontuacao_meta, descricao, mensagem) VALUES
(1, 105, 'Ciclista Iniciante, percurso 105 km.', 'Parabéns! Ganhou sua primeira recompensa de 105 km!'),
(1, 250, 'Ciclista Intermediário, percurso 250 km.', 'Parabéns! Você alcançou uma nova recompensa, por percorrer 250 km!!'),
(1, 500, 'Ciclista Profissional, percurso 500 km.', 'Parabéns! O esforço e dedicação que tem mantido lhe proporcionou um novo nível, agora você é um profissinal!!'),
(2, 21, 'Corredor Iniciante, percurso 21 km.', 'Parabéns! Ganhou sua primeira Recompensa de 21 km!'),
(2, 50, 'Corredor Intermediário, percurso 50 km.', 'Parabéns! Você alcançou uma nova recompensa, por percorrer 50 km!!'),
(2, 150, 'Corredor Profissional, percurso 150 km.', 'Parabéns! O esforço e dedicação que tem mantido lhe proporcionou um novo nível, agora você é um profissinal!!'),
(3, 100, 'Nadador Iniciante, 100 m rasos.', 'Parabéns! Ganhou sua primeira recompensa por nadar 100 m rasos!'),
(3, 300, 'Nadador Intermediário, 300 rasos.', 'Parabéns! Você alcançou uma nova recompensa, por nadar 300 m!!'),
(3, 800, 'Nadador Profissional, 800 m rasos.', 'Parabéns! O esforço e dedicação que tem mantido lhe proporcionou um novo nível, agora você é um profissinal!!'),
(4, 240, 'Cestinha Iniciante, marcou 240 pontos.', 'Parabéns! Ganhou sua primeira recompensa por maracar 240 pontos no campeonato!'),
(4, 500, 'Cestinha Intermediário, marcou 500 pontos.', 'Parabéns! Você alcançou uma nova recompensa, por marcar 500 pontos!!'),
(4, 1000, 'Cestinha Profissional, marcou 1000 pontos.', 'Parabéns! O esforço e dedicação que tem mantido lhe proporcionou um novo nível, agora você é um profissinal!!'),
(5, 15, 'Artilheiro Iniciante, marcou 15 gols.', 'Parabéns! Ganhou sua primeira Recompensa por marcar 15 gols!'),
(5, 30, 'Artilheiro Intermediário, marcou 30 gols.', 'Parabéns! Você alcançou uma nova recompensa, por marcar 30 gols no campeonato!!'),
(5, 50, 'Artilheiro Profissional, marcou 50 gols.', 'Parabéns! O esforço e dedicação que tem mantido lhe proporcionou um novo nível, agora você é um profissinal!!'),
(6, 40, 'Jogador Iniciante, marcou 40 pontos.', 'Parabéns! Ganhou sua primeira Recompensa por marcar 40 pontos!'),
(6, 90, 'Jogador Intermediário, marcou 90 pontos.', 'Parabéns! Você alcançou uma nova recompensa, por marcar 90 pontos no campeonato!!'),
(6, 200, 'Jogador Profissional,  marcou 200 pontos.', 'Parabéns! O esforço e dedicação que tem mantido lhe proporcionou um novo nível, agora você é um profissinal!!');
