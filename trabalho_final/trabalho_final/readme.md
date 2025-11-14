# Instruções de Instalação e Execução

## 1. Criar o Banco de Dados

1. Abra o pgAdmin.
2. Crie um banco com o nome:

```
sistema_avaliacao
```

3. Abra o arquivo:

```
sql/setup.sql
```

4. Execute todo o conteúdo para criar as tabelas e dados iniciais.

---

## 2. Configurar a Conexão com o Banco

Edite o arquivo:

```
config/database.php
```

E ajuste os dados conforme o PostgreSQL instalado:

```php
$host = 'localhost';
$dbname = 'sistema_avaliacao';
$user = 'postgres';
$password = 'SENHA_DO_POSTGRES';
```

---

## 3. Colocar o Projeto na Pasta do Servidor

Mover a pasta do projeto para:

```
C:\xampp\htdocs\
```

Ficando assim:

```
C:\xampp\htdocs\trabalho_final\
```

---

## 4. Iniciar o Servidor

1. Abra o XAMPP.
2. Inicie o Apache.
3. Certifique-se de que o PostgreSQL está em execução.

---

## 5. Acessar o Formulário de Avaliação

No navegador, abrir:

```
http://localhost/trabalho_final/public/
```

O formulário será carregado automaticamente, com perguntas vindas do banco.  
As avaliações serão salvas na tabela "avaliacoes".

---

## 6. Observação sobre Anonimato

O sistema não armazena nenhum dado pessoal dos usuários.  
Todas as respostas são anônimas conforme solicitado no trabalho.

