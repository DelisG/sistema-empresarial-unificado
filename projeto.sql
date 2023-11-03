-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/11/2023 às 16:20
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id21473938_empresa`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `descricao` text DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  `contato` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `descricao`, `nome`, `data_hora`, `contato`) VALUES
(1, 'Exemplo de comentário', 'João', '2023-11-02 16:54:42', 'joao@email.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcao`
--

CREATE TABLE `funcao` (
  `setor` varchar(15) NOT NULL,
  `salario` float NOT NULL,
  `descricao` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcao`
--

INSERT INTO `funcao` (`setor`, `salario`, `descricao`, `id`) VALUES
('Desenvolvimento', 2150, 'Analista', 1),
('Desenvolvimento', 5000, 'Gerente', 2),
('Desenvolvimento', 3000, 'Programador', 3),
('Recepcao', 3500, 'Supervisao', 4),
('recepção', 1200, 'Recepcionista', 5),
('Desenvolvimento', 3300, 'Designer', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `endereco` varchar(55) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `cpf` int(11) DEFAULT NULL,
  `id_funcao` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`endereco`, `email`, `data_nasc`, `telefone`, `id`, `cpf`, `id_funcao`, `nome`, `sobrenome`) VALUES
('rua das Flores', 'joao@mail.com', '1990-03-15', 987654321, 11, 2147483647, 1, 'João', 'Silva'),
('avenida do Sol', 'maria@mail.com', '1985-07-20', 123456789, 12, 2147483647, 2, 'Maria', 'Pereira'),
('rua da Esperança', 'carlos@mail.com', '1982-11-10', 555555555, 13, 2147483647, 3, 'Carlos', 'Oliveira'),
('avenida dos Sonhos', 'ana@mail.com', '1988-05-30', 777777777, 14, 2147483647, 4, 'Ana', 'Rodrigues'),
('rua da Paz', 'pedro@mail.com', '1995-12-25', 888888888, 15, 2147483647, 5, 'Pedro', 'Ferreira'),
('avenida da Liberdade', 'lucia@mail.com', '1980-04-05', 999999999, 16, 2147483647, 6, 'Lúcia', 'Santos');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_funcao` (`id_funcao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcao`
--
ALTER TABLE `funcao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`id_funcao`) REFERENCES `funcao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
