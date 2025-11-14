CREATE TABLE dispositivos (
    id_dispositivo SERIAL PRIMARY KEY,
    nome_dispositivo VARCHAR(100) NOT NULL,
    status VARCHAR(20) DEFAULT 'ativo' CHECK (status IN ('ativo', 'inativo'))
);

CREATE TABLE perguntas (
    id_pergunta SERIAL PRIMARY KEY,
    texto_pergunta TEXT NOT NULL,
    status VARCHAR(20) DEFAULT 'ativa' CHECK (status IN ('ativa', 'inativa')),
    ordem INT NOT NULL DEFAULT 0
);

CREATE TABLE setores (
    id_setor SERIAL PRIMARY KEY,
    nome_setor VARCHAR(100) NOT NULL,
    status VARCHAR(20) DEFAULT 'ativo' CHECK (status IN ('ativo', 'inativo'))
);

CREATE TABLE avaliacoes (
    id_avaliacao SERIAL PRIMARY KEY,
    id_setor INT REFERENCES setores(id_setor),
    id_pergunta INT REFERENCES perguntas(id_pergunta),
    id_dispositivo INT REFERENCES dispositivos(id_dispositivo),
    resposta INT NOT NULL CHECK (resposta >= 0 AND resposta <= 10),
    feedback_textual TEXT,
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios_admin (
    id_usuario SERIAL PRIMARY KEY,
    login VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    status VARCHAR(20) DEFAULT 'ativo' CHECK (status IN ('ativo', 'inativo'))
);

INSERT INTO setores (nome_setor) VALUES 
('Recepção'),
('Vendas'),
('Caixa'),
('Estacionamento');

INSERT INTO dispositivos (nome_dispositivo) VALUES 
('Tablet Recepção'),
('Tablet Vendas'),
('Tablet Caixa'),
('Tablet Estacionamento');

INSERT INTO perguntas (texto_pergunta, ordem) VALUES 
('Como você avalia o atendimento recebido?', 1),
('Qual o seu nível de satisfação com a limpeza do ambiente?', 2),
('Como você avalia a organização do estabelecimento?', 3),
('Você recomendaria nossos serviços?', 4);

INSERT INTO usuarios_admin (login, senha, nome) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrador');