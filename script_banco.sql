-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Abr-2021 às 02:42
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ds`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_cliente`
--

CREATE TABLE `cad_cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `estadoCivil` varchar(50) DEFAULT NULL,
  `profissao` varchar(50) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `CPF` varchar(15) DEFAULT NULL,
  `RG` varchar(12) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `CEP` varchar(11) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `observacoes` varchar(240) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cad_cliente`
--

INSERT INTO `cad_cliente` (`id`, `nome`, `sexo`, `estadoCivil`, `profissao`, `data_nasc`, `CPF`, `RG`, `endereco`, `numero`, `bairro`, `complemento`, `CEP`, `UF`, `cidade`, `telefone`, `celular`, `email`, `observacoes`) VALUES
(3, 'WESLEY DOS SANTOS RODRIGUES', 'M', 'solteiro', 'sem emprego', '2000-03-14', '49106275885', '53184476', 'Rua Manoel Lessa', '211', 'Jardim marieta', 'casa', '18131', 'SP', 'São Roque', '11975699770', '11912345678', 'wesley.santos140300@gmail.com', 'TESTE DE TEXTAREA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_fornecedor`
--

CREATE TABLE `cad_fornecedor` (
  `id` int(11) NOT NULL,
  `razao_social` varchar(50) NOT NULL,
  `data_abertura` date NOT NULL,
  `tipo` char(2) NOT NULL,
  `regime` varchar(50) NOT NULL,
  `CNPJ` varchar(20) NOT NULL,
  `IE` varchar(15) NOT NULL,
  `ISENTO` varchar(20) NOT NULL,
  `IM` varchar(15) NOT NULL,
  `vendedor` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `telefone1` varchar(20) NOT NULL,
  `telefone2` varchar(20) NOT NULL,
  `CEP` varchar(15) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `numero` char(10) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `site` varchar(200) NOT NULL,
  `email_cobranca` varchar(50) NOT NULL,
  `data_cadastro` date NOT NULL,
  `observacao` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cad_fornecedor`
--

INSERT INTO `cad_fornecedor` (`id`, `razao_social`, `data_abertura`, `tipo`, `regime`, `CNPJ`, `IE`, `ISENTO`, `IM`, `vendedor`, `email`, `celular`, `telefone1`, `telefone2`, `CEP`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `site`, `email_cobranca`, `data_cadastro`, `observacao`) VALUES
(2, 'TESTE 1', '2000-03-10', '..', 'Simples nacional', '0', '0', '...', '0', 'Wesley empresa', 'teste@gmail.com', '1100000000', '1100000000', '1100000000', '11000112', 'rua an', '1', 'casa', 'bairro 2', 'sao roque', 'SP', 'www.google.com.br', 'wesley55@gmail.com', '2000-03-10', 'txtisentotxtisentotxtisentotxtisentotxtisentotxtisentotxtisento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_produto`
--

CREATE TABLE `cad_produto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` varchar(50) DEFAULT NULL,
  `lote` varchar(100) DEFAULT NULL,
  `data_validade` date NOT NULL,
  `cod_barras` varchar(100) DEFAULT NULL,
  `fornecedor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cad_produto`
--

INSERT INTO `cad_produto` (`id`, `descricao`, `quantidade`, `preco`, `lote`, `data_validade`, `cod_barras`, `fornecedor`) VALUES
(3, 'Coca-Cola Garrafa 2L', 50, '10', '000000000001223', '2022-02-02', '00000000222', 'COCACOLA BRASIL LTDA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `perfil`) VALUES
(47, 'Wesley', 'wesley@gmail.com', '123', 'Adminstrador');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cad_cliente`
--
ALTER TABLE `cad_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_fornecedor`
--
ALTER TABLE `cad_fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cad_produto`
--
ALTER TABLE `cad_produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cad_cliente`
--
ALTER TABLE `cad_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cad_fornecedor`
--
ALTER TABLE `cad_fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `cad_produto`
--
ALTER TABLE `cad_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
