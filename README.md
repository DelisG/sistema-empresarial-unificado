# CRUD em PHP e MySQL

Desenvolvimento de um Sistema Empresarial utilizando o acesso a banco de dados, com funções de cadastrar, modificar, visualizar e remover os dados.

## Projeto em Produção -  [🎬 Visualizar Projeto](https://delisguerra-empresa.000webhostapp.com/)

![](assets/img/mockup.png)

O projeto foi implantado na plataforma de subdomínio https://br.000webhost.com/ e está totalmente funcional em produção. Integrado com o banco de dados [PHPMyAdmin](https://www.phpmyadmin.net/), garantindo que todos os dados necessários para o funcionamento do projeto sejam gerenciados de forma eficaz.



Para visualizar o projeto em ação, basta clicar no link:  [Visualizar Projeto](https://delisguerra-empresa.000webhostapp.com/)

## 📌 Tecnologias

- PHP
- MySQL | PhpMyAdmin
- JavaScript
- HTML
- CSS
- BOOTSTRAP

## 📌 Assuntos Abordados no Desenvolvimento do Projeto:

- Acesso a banco de dados com o MySql
- Otimização da conexão com o banco de dados através do PDO (PHP Data Object)
- Uso de tecnologias, como: JavaScript e CSS
- Uso do framework Bootstrap para realização de um layout responsivo para o projeto.

## 📌 Conexão com Banco de Dados:

```
$dbNome = 'nomeDaTable'
$dbHost = 'nomeDoDominioOuIP:Porta'
$dbUsuario = 'usuarioDoMysql'
$dbSenha 'senhaDoUsuario'

```

## 📌 Instruções para Importar o Banco de Dados

Para utilizar o projeto, siga estas etapas:

1. Faça o download do arquivo `projeto.sql` no repositório.
2. Abra seu sistema de gerenciamento de banco de dados (por exemplo, MySQL Workbench).
3. Crie um novo banco de dados ou selecione um banco de dados existente onde deseja importar os dados.
4. Importe o arquivo `projeto.sql` no banco de dados:
   - No MySQL Workbench, vá para "Server" > "Data Import" > "Import from Self-Contained File" e selecione o arquivo `projeto.sql`.
5. Siga as instruções do seu sistema de gerenciamento de banco de dados para concluir o processo de importação.

Agora você está pronto para usar o projeto com o banco de dados importado.

## 📌 Código SQL para criação e manipulação dos dados no Banco de dados

### Criando Banco de dados
- Este código SQL cria um novo banco de dados denominado "Empresa". A ação principal é a criação de um ambiente de armazenamento de dados dedicado, onde informações relacionadas à empresa serão gerenciadas e armazenadas.

```
CREATE DATABASE Empresa;

```

### Criando Tabela Funcionarios
- Este código SQL cria uma tabela chamada "funcionarios" com colunas para armazenar informações sobre funcionários, incluindo identificação (Chave Primária), nome, sobrenome, cargo, data de nascimento e salário.

```
CREATE TABLE `funcionarios` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `salario` decimal(10, 2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```

### Inserindo valores na tabela Funcionarios
- Este código SQL realiza a inserção de registros na tabela 'funcionarios' em um banco de dados. Ele insere informações de quatro funcionários, incluindo seus nomes, sobrenomes, salários, datas de nascimento e cargos.
  
```
  INSERT INTO `funcionarios` (`nome`, `sobrenome`, `salario`, `data_nascimento`, `cargo`) VALUES
('João', 'Silva', 3500.50, '1990-05-15', 'Analista'),
('Maria', 'Pereira', 2800.75, '1985-12-10', 'Gerente'),
('Carlos', 'Santos', 4200.00, '1992-08-20', 'Programador'),
('Ana', 'Oliveira', 3100.25, '1988-07-05', 'Designer');
```

### Criando Tabela Cargos
- Este código SQL cria uma tabela chamada "cargos" em um banco de dados. A tabela possui duas colunas: "id" que é uma chave primária auto-incremento e "descricao" que armazena texto de até 50 caracteres.
```
CREATE TABLE cargos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  descricao VARCHAR(50) NOT NULL
);
```

### Inserindo valores na tabela Cargos
- Este código SQL executa uma inserção de dados na tabela chamada "cargos". Ele insere cinco registros na tabela, onde cada registro representa um cargo

```
INSERT INTO cargos (descricao) VALUES
('Gerente'),
('Analista de Sistemas'),
('Programador'),
('Designer'),
('Atendente');
```

### Listando todos os Cargos
- Consulta na tabela "cargos" para exibir todos os registros, ordenados em ordem decrescente com base na coluna "id".

```
SELECT * FROM cargos ORDER BY id DESC;
```

### Listando todos os Funcionarios
- Consulta na tabela "funcionarios" para exibir todos os registros, ordenados em ordem decrescente com base na coluna "id".
  
```
SELECT * FROM funcionarios ORDER BY id DESC;
```

### Adição de Cargos
-  Inserindo novo registro na tabela "cargos", o único campo sendo preenchido é "descricao," que recebe um valor especificado posteriormente, representado pelo marcador '?'

```
INSERT INTO cargos (descricao) VALUES(?);
```

### Adição de Funcionarios
-  Inserindo novo registro na tabela "funcionarios", os campos sendo preenchidos são "nome, sobrenome, data_nascimento, salario e cargo" que recebem um valor especificado posteriormente, representado pelo marcador '?'
  
```
INSERT INTO funcionarios (nome, sobrenome, data_nascimento, salario, cargo) VALUES(?,?,?,?,?);
```

### Consulta de Cargo
- Consulta na tabela "cargos" para buscar todas as colunas de um registro onde o ID corresponde a um valor específico fornecido como parâmetro.

```
 SELECT * FROM cargos where id = ?;
```

### Consulta de Funcionario
- Consulta na tabela "funcionarios" para buscar todas as colunas de um registro onde o ID corresponde a um valor específico fornecido como parâmetro.

```
 SELECT * FROM funcionarios where id = ?;
```

### Atualização de Cargo
-  Alterando valor na tabela "cargos" e campo "descricao" para um novo valor. A condição para essa atualização é que o campo "id" na tabela "cargos" corresponda ao valor fornecido como parâmetro.

```
 UPDATE cargos  set descricao = ?  WHERE id = ?;
```

### Atualização de Funcionario
-   Os campos a serem atualizados são nome, sobrenome, salário, data de nascimento e cargo. A atualização é aplicada a na tabela "funcionários" ao funcionário com ID corresponde ao valor fornecido como parâmetro.

```
UPDATE funcionarios  set nome = ?, sobrenome = ?, salario = ?, data_nascimento = ?, cargo = ? WHERE id = ?;
```

### Exclusão de Cargo
- Exclusão de um registro na tabela "cargos" com base em um critério específico, no caso, o ID fornecido como parâmetro.

```
 DELETE FROM cargos where id = ?;
```

### Exclusão de Funcionario
- Exclusão de um registro na tabela "funcionarios" com base no ID fornecido como parâmetro.

```
 DELETE FROM funcionarios where id = ?;
```

:tada: Agradecemos por visitar e explorar o nosso projeto! Se tiver alguma dúvida ou feedback, não hesite em entrar em contato: **delisgmarques@gmail.com**.
