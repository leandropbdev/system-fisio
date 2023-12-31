-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/08/2023 às 04:27
-- Versão do servidor: 10.4.24-MariaDB
-- Versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `system_fisio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_paciente`
--

CREATE TABLE `avaliacao_paciente` (
  `cod_avaliacao` int(11) NOT NULL,
  `ordem_paciente` int(11) DEFAULT NULL,
  `ordem_profissional` int(11) DEFAULT NULL,
  `qp_paciente` text DEFAULT NULL,
  `hma_paciente` text DEFAULT NULL,
  `tratamento_realizado` text DEFAULT NULL,
  `exames` varchar(100) DEFAULT NULL,
  `medicamentos` varchar(100) DEFAULT NULL,
  `cirurgia` varchar(100) DEFAULT NULL,
  `eva_paciente` varchar(30) DEFAULT NULL,
  `data_cad_avaliacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `avaliacao_paciente`
--

INSERT INTO `avaliacao_paciente` (`cod_avaliacao`, `ordem_paciente`, `ordem_profissional`, `qp_paciente`, `hma_paciente`, `tratamento_realizado`, `exames`, `medicamentos`, `cirurgia`, `eva_paciente`, `data_cad_avaliacao`) VALUES
(24, 33, 1, 'sei la', 'qualquer coisa', 'se não', 'sim', 'sim', 'sim', 'Dor Moderada', '2023-08-12'),
(25, 34, 2, '', '', '', '', '', '', 'Dor Moderada', '2023-08-14'),
(26, 35, 1, 'Paciente Reclama de dor ', 'Paciente esta em casa e caiu', 'Fez compresas', 'Temum exame', 'Inbuprofeno', '', 'Dor Intensa', '2023-08-16'),
(28, 37, 1, '', '', '', '', '', '', '', '2023-08-16'),
(29, 38, 1, '', '', '', '', '', '', '', '2023-08-16'),
(31, 40, 2, '', '', '', '', '', '', 'Dor Intensa', '2023-08-17'),
(32, 41, 1, 'Paciente alega sentir muitas dores ao pontos de so conseguir dormi a noite se tomat medicamentos.', 'Paceinte estava a caminho de casa qaundo foi subriendido por um outro veiculo e fraturou a cravicula. ', 'Paciente nnão havia realizado nenhum tipo de tratamento até o momento.', 'Raio-x ', 'Inbuprofeno, Dipirona', 'Paciente passou por uma cirurgia de cravicula ', 'Dor Intensa', '2023-08-17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bairros`
--

CREATE TABLE `bairros` (
  `cod_bairro` int(11) NOT NULL,
  `nome_bairro` varchar(50) NOT NULL,
  `data_cad_bairro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `bairros`
--

INSERT INTO `bairros` (`cod_bairro`, `nome_bairro`, `data_cad_bairro`) VALUES
(1, 'Vila Falcão', '2023-07-12'),
(2, 'Bairro da Fonte', '2023-07-12'),
(3, 'Pantanal', '2023-07-12'),
(4, 'Centro', '2023-07-12'),
(5, 'N.Sra. de Fatima', '2023-07-12'),
(6, 'São José', '2023-07-12'),
(7, 'Barra Limpa', '2023-07-12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estado_paciente`
--

CREATE TABLE `estado_paciente` (
  `cod_estado` int(11) NOT NULL,
  `nome_estado` varchar(50) DEFAULT NULL,
  `data_cad_estado` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `estado_paciente`
--

INSERT INTO `estado_paciente` (`cod_estado`, `nome_estado`, `data_cad_estado`) VALUES
(1, 'Rolar', '2023-07-19'),
(2, 'Sentar', '2023-07-19'),
(3, 'Cont.Cervical', '2023-07-19'),
(4, 'Engatinha', '2023-07-19'),
(5, 'Deambula', '2023-07-19'),
(6, 'Deambula apoio', '2023-07-19'),
(7, 'Cadeirante', '2023-07-19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `etnia`
--

CREATE TABLE `etnia` (
  `cod_etnia` int(11) NOT NULL,
  `nome_etnia` varchar(50) NOT NULL,
  `data_cad_etnia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `etnia`
--

INSERT INTO `etnia` (`cod_etnia`, `nome_etnia`, `data_cad_etnia`) VALUES
(1, 'Banawá', '2023-07-12'),
(2, 'Deni', '2023-07-12'),
(3, 'Jarawara', '2023-07-12'),
(4, 'Jamamadi', '2023-07-12'),
(5, 'Apurinã', '2023-07-12'),
(6, 'Paumari', '2023-07-12'),
(7, 'Suruwaha ', '2023-07-12'),
(8, 'Hi-Merimã', '2023-07-12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `evolucao_paciente`
--

CREATE TABLE `evolucao_paciente` (
  `cod_evolucao` int(11) NOT NULL,
  `ordem_profissional` int(11) DEFAULT NULL,
  `ordem_paciente` int(11) DEFAULT NULL,
  `estado_saude` text DEFAULT NULL,
  `conduta_aplicada` text DEFAULT NULL,
  `resultados` text DEFAULT NULL,
  `intercorrencia` varchar(100) DEFAULT NULL,
  `data_cad_evolucao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `inspecao`
--

CREATE TABLE `inspecao` (
  `cod_inspecao` int(11) NOT NULL,
  `nome_inspecao` varchar(50) DEFAULT NULL,
  `data_cad_inspecao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `inspecao`
--

INSERT INTO `inspecao` (`cod_inspecao`, `nome_inspecao`, `data_cad_inspecao`) VALUES
(1, 'Normal', '2023-07-18'),
(2, 'Edema', '2023-07-18'),
(3, 'Cicatrização Incompleta', '2023-07-18'),
(4, 'Eritemas', '2023-07-18'),
(5, 'Próteses Fixas', '2023-07-18'),
(6, 'Outros', '2023-07-18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `cod_paciente` int(11) NOT NULL,
  `nome_paciente` varchar(100) NOT NULL,
  `sexo_paciente` enum('M','F') NOT NULL,
  `cpf_paciente` char(16) DEFAULT NULL,
  `data_nasc_paciente` date DEFAULT NULL,
  `telefone_paciente` char(20) DEFAULT NULL,
  `rua_paciente` varchar(50) DEFAULT NULL,
  `bairro_paciente` varchar(50) DEFAULT NULL,
  `profissao_paciente` varchar(50) DEFAULT NULL,
  `sus_paciente` int(15) UNSIGNED DEFAULT NULL,
  `etnia_paciente` varchar(45) DEFAULT NULL,
  `diag_medico_paciente` text DEFAULT NULL,
  `cid_paciente` char(5) DEFAULT NULL,
  `diag_fisio_paciente` text DEFAULT NULL,
  `data_cad_paciente` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`cod_paciente`, `nome_paciente`, `sexo_paciente`, `cpf_paciente`, `data_nasc_paciente`, `telefone_paciente`, `rua_paciente`, `bairro_paciente`, `profissao_paciente`, `sus_paciente`, `etnia_paciente`, `diag_medico_paciente`, `cid_paciente`, `diag_fisio_paciente`, `data_cad_paciente`) VALUES
(33, 'Landro Braga', 'M', '700.091.912-40', '1996-06-12', '(97) 98423-2486', 'Antonio medeiros', 'Vila Falcão', 'Analista de Sistema', 4294967295, '', ' Nao tem nenhum', '23ee3', 'Não tenhe nenhum!', '2023-08-12'),
(34, 'José Antonio', 'M', '700.091.912-54', '1989-04-16', '(97) 98433-2222', 'Antônio Medeiros 83', 'Vila Falcão', '', 4294967295, 'Deni', ' ', '', '', '2023-08-14'),
(35, 'Maira Antonia', 'F', '700.091.912-45', '1992-12-06', '(97) 98432-4535', 'Rua das Palmeiras', 'Pantanal', 'Agricultora', 4294967295, 'Banawá', ' Paciente com fratura precisando de cuidads', '4R5DF', 'Paciente precisa receber tratamentos especifico', '2023-08-16'),
(37, 'Fernanda Rodringues', 'F', '', '2015-06-12', '', '', '', '', 0, '', ' ', '', '', '2023-08-16'),
(38, 'Godofredo Silva', 'M', '', '2010-08-12', '', '', '', '', 0, '', ' ', '', '', '2023-08-16'),
(40, 'Felipe João', 'M', '', '1995-05-12', '', '', '', '', 0, '', ' ', '', '', '2023-08-17'),
(41, 'Helio Bezerra da Silva', 'M', '999.999.999-99', '2000-09-08', '(97) 98423-7546', 'Francisco Paiva, 3456', 'N.Sra. de Fatima', 'Agricultor', 4294967295, 'Apurinã', 'Paciente precisa de cuidados fisioterapeutico, suas sequelas precisão sem bem cuidadas e avaliadas.', '3A4D', 'Paciente chegou em um estado critico, inicaremos o tratamento para melhora rapida do mesmo.', '2023-08-17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `profissionais`
--

CREATE TABLE `profissionais` (
  `cod_profissional` int(11) NOT NULL,
  `nome_profissional` varchar(50) NOT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `profissao` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `data_cad_profissional` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `profissionais`
--

INSERT INTO `profissionais` (`cod_profissional`, `nome_profissional`, `sexo`, `profissao`, `cargo`, `data_cad_profissional`) VALUES
(1, 'Flavia Mendes', 'F', 'Fisioterapeuta', 'Fisioterapia', '2023-07-12'),
(2, 'Leandro Braga', 'M', 'Ortopedista', 'Ortopedico', '2023-07-19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recurso_tratamento`
--

CREATE TABLE `recurso_tratamento` (
  `cod_recurso` int(11) NOT NULL,
  `nome_recurso` varchar(50) NOT NULL,
  `data_cad_recurso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `recurso_tratamento`
--

INSERT INTO `recurso_tratamento` (`cod_recurso`, `nome_recurso`, `data_cad_recurso`) VALUES
(1, 'Eletro analgesia', '2023-07-18'),
(2, 'Fisioterapia', '2023-07-18'),
(3, 'Pilates', '2023-07-18'),
(4, 'Cinesioterapia', '2023-07-18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `situacao_paciente`
--

CREATE TABLE `situacao_paciente` (
  `cod_situacao` int(11) NOT NULL,
  `nome_situacao` varchar(50) NOT NULL,
  `data_situacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `situacao_paciente`
--

INSERT INTO `situacao_paciente` (`cod_situacao`, `nome_situacao`, `data_situacao`) VALUES
(1, 'HAS', '2023-07-19'),
(2, 'Diabetico', '2023-07-19'),
(3, 'Idoso', '2023-07-19'),
(4, 'Ac.Trânsito', '2023-07-19'),
(5, 'Gestante', '2023-07-19'),
(6, 'Vacinado', '2023-07-19'),
(7, 'Ansiedade', '2023-07-19'),
(8, 'Depressão', '2023-07-19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_estado_paciente`
--

CREATE TABLE `tipo_estado_paciente` (
  `cod_situacao` int(11) NOT NULL,
  `ordem_avaliacao` int(11) DEFAULT NULL,
  `ordem_estado` int(11) DEFAULT NULL,
  `data_cad_situacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tipo_estado_paciente`
--

INSERT INTO `tipo_estado_paciente` (`cod_situacao`, `ordem_avaliacao`, `ordem_estado`, `data_cad_situacao`) VALUES
(8, 24, 4, '2023-08-12'),
(9, 25, 3, '2023-08-14'),
(10, 26, 6, '2023-08-16'),
(11, 31, 2, '2023-08-17'),
(12, 31, 5, '2023-08-17'),
(13, 31, 6, '2023-08-17'),
(14, 32, 3, '2023-08-17'),
(15, 32, 6, '2023-08-17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_inspecao`
--

CREATE TABLE `tipo_inspecao` (
  `cod_tipo_inspecao` int(11) NOT NULL,
  `ordem_avaliacao` int(11) DEFAULT NULL,
  `ordem_inspecao` int(11) DEFAULT NULL,
  `data_cad_tipo_inspecao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tipo_inspecao`
--

INSERT INTO `tipo_inspecao` (`cod_tipo_inspecao`, `ordem_avaliacao`, `ordem_inspecao`, `data_cad_tipo_inspecao`) VALUES
(3, 24, 3, '2023-08-12'),
(4, 25, 3, '2023-08-14'),
(5, 31, 3, '2023-08-17'),
(6, 31, 4, '2023-08-17'),
(7, 32, 3, '2023-08-17'),
(8, 32, 5, '2023-08-17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_recurso_tratamento`
--

CREATE TABLE `tipo_recurso_tratamento` (
  `cod_tipo_recurso` int(11) NOT NULL,
  `ordem_avaliacao` int(11) DEFAULT NULL,
  `ordem_recurso` int(11) DEFAULT NULL,
  `data_cad_tipo_recurso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tipo_recurso_tratamento`
--

INSERT INTO `tipo_recurso_tratamento` (`cod_tipo_recurso`, `ordem_avaliacao`, `ordem_recurso`, `data_cad_tipo_recurso`) VALUES
(14, 24, 2, '2023-08-12'),
(15, 24, 3, '2023-08-12'),
(16, 24, 4, '2023-08-12'),
(17, 25, 3, '2023-08-14'),
(18, 26, 2, '2023-08-16'),
(19, 26, 3, '2023-08-16'),
(21, 28, 3, '2023-08-16'),
(22, 29, 3, '2023-08-16'),
(24, 31, 2, '2023-08-17'),
(25, 31, 3, '2023-08-17'),
(26, 31, 4, '2023-08-17'),
(27, 32, 2, '2023-08-17'),
(28, 32, 3, '2023-08-17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_situacao_paciente`
--

CREATE TABLE `tipo_situacao_paciente` (
  `cod_tipo_situacao` int(11) NOT NULL,
  `ordem_situacao` int(11) DEFAULT NULL,
  `ordem_paciente` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tipo_situacao_paciente`
--

INSERT INTO `tipo_situacao_paciente` (`cod_tipo_situacao`, `ordem_situacao`, `ordem_paciente`, `data`) VALUES
(17, 7, 33, '2023-08-12'),
(18, 2, 34, '2023-08-14'),
(19, 4, 34, '2023-08-14'),
(20, 2, 35, '2023-08-16'),
(21, 3, 35, '2023-08-16'),
(22, 2, 37, '2023-08-16'),
(23, 6, 38, '2023-08-16'),
(25, 4, 40, '2023-08-17'),
(26, 6, 40, '2023-08-17'),
(27, 2, 41, '2023-08-17'),
(28, 4, 41, '2023-08-17'),
(29, 6, 41, '2023-08-17'),
(30, 7, 41, '2023-08-17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_tratamento_paciente`
--

CREATE TABLE `tipo_tratamento_paciente` (
  `cod_tipo_tratamento` int(11) NOT NULL,
  `ordem_avaliacao` int(11) DEFAULT NULL,
  `ordem_tratamento` int(11) DEFAULT NULL,
  `data_cad_tipo_tratamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tipo_tratamento_paciente`
--

INSERT INTO `tipo_tratamento_paciente` (`cod_tipo_tratamento`, `ordem_avaliacao`, `ordem_tratamento`, `data_cad_tipo_tratamento`) VALUES
(10, 24, 3, '2023-08-12'),
(11, 25, 2, '2023-08-14'),
(12, 26, 2, '2023-08-16'),
(13, 26, 4, '2023-08-16'),
(15, 28, 3, '2023-08-16'),
(16, 29, 3, '2023-08-16'),
(18, 31, 3, '2023-08-17'),
(19, 31, 4, '2023-08-17'),
(20, 32, 1, '2023-08-17'),
(21, 32, 2, '2023-08-17'),
(22, 32, 3, '2023-08-17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tratamento_paciente`
--

CREATE TABLE `tratamento_paciente` (
  `cod_tratamento` int(11) NOT NULL,
  `nome_tratamento` varchar(50) NOT NULL,
  `data_cad_tratamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tratamento_paciente`
--

INSERT INTO `tratamento_paciente` (`cod_tratamento`, `nome_tratamento`, `data_cad_tratamento`) VALUES
(1, 'Analgisia', '2023-07-18'),
(2, 'Anti-inflamatório', '2023-07-18'),
(3, 'Fortalecimento', '2023-07-18'),
(4, 'Extensibilidade', '2023-07-18'),
(5, 'Mobilidade', '2023-07-18'),
(6, 'Função', '2023-07-18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` char(20) DEFAULT NULL,
  `cpf` char(20) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `nivel` varchar(50) DEFAULT NULL,
  `ativo` enum('sim','nao') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`cod`, `nome`, `email`, `telefone`, `cpf`, `senha`, `nivel`, `ativo`, `foto`, `data`) VALUES
(1, 'Leandro Braga', NULL, NULL, NULL, 'b7463760284fd06773ac2a48e29b0acf', 'Administrador', 'sim', NULL, '2023-07-04');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacao_paciente`
--
ALTER TABLE `avaliacao_paciente`
  ADD PRIMARY KEY (`cod_avaliacao`),
  ADD KEY `ordem_paciente` (`ordem_paciente`),
  ADD KEY `ordem_profissional` (`ordem_profissional`);

--
-- Índices de tabela `bairros`
--
ALTER TABLE `bairros`
  ADD PRIMARY KEY (`cod_bairro`);

--
-- Índices de tabela `estado_paciente`
--
ALTER TABLE `estado_paciente`
  ADD PRIMARY KEY (`cod_estado`);

--
-- Índices de tabela `etnia`
--
ALTER TABLE `etnia`
  ADD PRIMARY KEY (`cod_etnia`);

--
-- Índices de tabela `evolucao_paciente`
--
ALTER TABLE `evolucao_paciente`
  ADD PRIMARY KEY (`cod_evolucao`),
  ADD KEY `ordem_profissional` (`ordem_profissional`),
  ADD KEY `ordem_paciente` (`ordem_paciente`);

--
-- Índices de tabela `inspecao`
--
ALTER TABLE `inspecao`
  ADD PRIMARY KEY (`cod_inspecao`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`cod_paciente`);

--
-- Índices de tabela `profissionais`
--
ALTER TABLE `profissionais`
  ADD PRIMARY KEY (`cod_profissional`);

--
-- Índices de tabela `recurso_tratamento`
--
ALTER TABLE `recurso_tratamento`
  ADD PRIMARY KEY (`cod_recurso`);

--
-- Índices de tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  ADD PRIMARY KEY (`cod_situacao`);

--
-- Índices de tabela `tipo_estado_paciente`
--
ALTER TABLE `tipo_estado_paciente`
  ADD PRIMARY KEY (`cod_situacao`),
  ADD KEY `ordem_avaliacao` (`ordem_avaliacao`),
  ADD KEY `ordem_estado` (`ordem_estado`);

--
-- Índices de tabela `tipo_inspecao`
--
ALTER TABLE `tipo_inspecao`
  ADD PRIMARY KEY (`cod_tipo_inspecao`),
  ADD KEY `ordem_avaliacao` (`ordem_avaliacao`),
  ADD KEY `ordem_inspecao` (`ordem_inspecao`);

--
-- Índices de tabela `tipo_recurso_tratamento`
--
ALTER TABLE `tipo_recurso_tratamento`
  ADD PRIMARY KEY (`cod_tipo_recurso`),
  ADD KEY `ordem_avaliacao` (`ordem_avaliacao`),
  ADD KEY `ordem_recurso` (`ordem_recurso`);

--
-- Índices de tabela `tipo_situacao_paciente`
--
ALTER TABLE `tipo_situacao_paciente`
  ADD PRIMARY KEY (`cod_tipo_situacao`),
  ADD KEY `ordem_paciente` (`ordem_paciente`),
  ADD KEY `ordem_situacao` (`ordem_situacao`);

--
-- Índices de tabela `tipo_tratamento_paciente`
--
ALTER TABLE `tipo_tratamento_paciente`
  ADD PRIMARY KEY (`cod_tipo_tratamento`),
  ADD KEY `ordem_avaliacao` (`ordem_avaliacao`),
  ADD KEY `ordem_tratamento` (`ordem_tratamento`);

--
-- Índices de tabela `tratamento_paciente`
--
ALTER TABLE `tratamento_paciente`
  ADD PRIMARY KEY (`cod_tratamento`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao_paciente`
--
ALTER TABLE `avaliacao_paciente`
  MODIFY `cod_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `bairros`
--
ALTER TABLE `bairros`
  MODIFY `cod_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `estado_paciente`
--
ALTER TABLE `estado_paciente`
  MODIFY `cod_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `etnia`
--
ALTER TABLE `etnia`
  MODIFY `cod_etnia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `evolucao_paciente`
--
ALTER TABLE `evolucao_paciente`
  MODIFY `cod_evolucao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `inspecao`
--
ALTER TABLE `inspecao`
  MODIFY `cod_inspecao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `cod_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `profissionais`
--
ALTER TABLE `profissionais`
  MODIFY `cod_profissional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `recurso_tratamento`
--
ALTER TABLE `recurso_tratamento`
  MODIFY `cod_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  MODIFY `cod_situacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tipo_estado_paciente`
--
ALTER TABLE `tipo_estado_paciente`
  MODIFY `cod_situacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tipo_inspecao`
--
ALTER TABLE `tipo_inspecao`
  MODIFY `cod_tipo_inspecao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tipo_recurso_tratamento`
--
ALTER TABLE `tipo_recurso_tratamento`
  MODIFY `cod_tipo_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tipo_situacao_paciente`
--
ALTER TABLE `tipo_situacao_paciente`
  MODIFY `cod_tipo_situacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tipo_tratamento_paciente`
--
ALTER TABLE `tipo_tratamento_paciente`
  MODIFY `cod_tipo_tratamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tratamento_paciente`
--
ALTER TABLE `tratamento_paciente`
  MODIFY `cod_tratamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacao_paciente`
--
ALTER TABLE `avaliacao_paciente`
  ADD CONSTRAINT `ordem_paciente` FOREIGN KEY (`ordem_paciente`) REFERENCES `pacientes` (`cod_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ordem_profissional` FOREIGN KEY (`ordem_profissional`) REFERENCES `profissionais` (`cod_profissional`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `evolucao_paciente`
--
ALTER TABLE `evolucao_paciente`
  ADD CONSTRAINT `evolucao_paciente_ibfk_1` FOREIGN KEY (`ordem_profissional`) REFERENCES `profissionais` (`cod_profissional`),
  ADD CONSTRAINT `evolucao_paciente_ibfk_2` FOREIGN KEY (`ordem_paciente`) REFERENCES `pacientes` (`cod_paciente`);

--
-- Restrições para tabelas `tipo_estado_paciente`
--
ALTER TABLE `tipo_estado_paciente`
  ADD CONSTRAINT `tipo_estado_paciente_ibfk_1` FOREIGN KEY (`ordem_avaliacao`) REFERENCES `avaliacao_paciente` (`cod_avaliacao`),
  ADD CONSTRAINT `tipo_estado_paciente_ibfk_2` FOREIGN KEY (`ordem_estado`) REFERENCES `estado_paciente` (`cod_estado`);

--
-- Restrições para tabelas `tipo_inspecao`
--
ALTER TABLE `tipo_inspecao`
  ADD CONSTRAINT `tipo_inspecao_ibfk_1` FOREIGN KEY (`ordem_avaliacao`) REFERENCES `avaliacao_paciente` (`cod_avaliacao`),
  ADD CONSTRAINT `tipo_inspecao_ibfk_2` FOREIGN KEY (`ordem_inspecao`) REFERENCES `inspecao` (`cod_inspecao`);

--
-- Restrições para tabelas `tipo_recurso_tratamento`
--
ALTER TABLE `tipo_recurso_tratamento`
  ADD CONSTRAINT `ordem_avaliacao` FOREIGN KEY (`ordem_avaliacao`) REFERENCES `avaliacao_paciente` (`cod_avaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ordem_recurso` FOREIGN KEY (`ordem_recurso`) REFERENCES `recurso_tratamento` (`cod_recurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tipo_situacao_paciente`
--
ALTER TABLE `tipo_situacao_paciente`
  ADD CONSTRAINT `tipo_situacao_paciente_ibfk_1` FOREIGN KEY (`ordem_paciente`) REFERENCES `pacientes` (`cod_paciente`),
  ADD CONSTRAINT `tipo_situacao_paciente_ibfk_2` FOREIGN KEY (`ordem_situacao`) REFERENCES `situacao_paciente` (`cod_situacao`);

--
-- Restrições para tabelas `tipo_tratamento_paciente`
--
ALTER TABLE `tipo_tratamento_paciente`
  ADD CONSTRAINT `tipo_tratamento_paciente_ibfk_1` FOREIGN KEY (`ordem_avaliacao`) REFERENCES `avaliacao_paciente` (`cod_avaliacao`),
  ADD CONSTRAINT `tipo_tratamento_paciente_ibfk_2` FOREIGN KEY (`ordem_tratamento`) REFERENCES `tratamento_paciente` (`cod_tratamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
