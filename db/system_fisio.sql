-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/01/2024 às 17:41
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

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
-- Estrutura para tabela `agendamento_paciente`
--

CREATE TABLE `agendamento_paciente` (
  `cod_agendamento` int(11) NOT NULL,
  `ordem_paciente` int(11) DEFAULT NULL,
  `ordem_profissional_agendamento` int(11) DEFAULT NULL,
  `ordem_recurso_tratamento` int(11) DEFAULT NULL,
  `horario_inicio` time DEFAULT NULL,
  `horario_final` time DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `observacao` text DEFAULT NULL,
  `data_cad_agendamento` date DEFAULT NULL,
  `data_update_agendamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimento_paciente`
--

CREATE TABLE `atendimento_paciente` (
  `cod_atendimento` int(11) NOT NULL,
  `ordem_dias_semana` int(11) DEFAULT NULL,
  `frequencia` enum('1','0') DEFAULT NULL,
  `observacao_atendimento` text DEFAULT NULL,
  `data_atendimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_atendimento`
--

CREATE TABLE `avaliacao_atendimento` (
  `cod_av_atendimento` int(11) NOT NULL,
  `ordem_paciente_av_atendimento` int(11) DEFAULT NULL,
  `avaliacao_atendimento` varchar(20) NOT NULL,
  `data_av_atendimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_paciente`
--

CREATE TABLE `avaliacao_paciente` (
  `cod_avaliacao` int(11) NOT NULL,
  `ordem_paciente` int(11) DEFAULT NULL,
  `ordem_profissional` int(11) DEFAULT NULL,
  `diag_medico_paciente` text DEFAULT NULL,
  `cid_paciente` char(5) DEFAULT NULL,
  `diag_fisio_paciente` text DEFAULT NULL,
  `qp_paciente` text DEFAULT NULL,
  `hma_paciente` text DEFAULT NULL,
  `tratamento_realizado` text DEFAULT NULL,
  `exames` varchar(100) DEFAULT NULL,
  `medicamentos` varchar(100) DEFAULT NULL,
  `cirurgia` varchar(100) DEFAULT NULL,
  `eva_paciente` int(15) DEFAULT NULL,
  `data_cad_avaliacao` date DEFAULT NULL,
  `data_atualizacao_av` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bairros`
--

CREATE TABLE `bairros` (
  `cod_bairro` int(11) NOT NULL,
  `nome_bairro` varchar(50) NOT NULL,
  `data_cad_bairro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
-- Estrutura para tabela `classificacao_paciente`
--

CREATE TABLE `classificacao_paciente` (
  `cod_classificacao` int(11) NOT NULL,
  `nome_classificacao` varchar(50) DEFAULT NULL,
  `data_cad_classificacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `classificacao_paciente`
--

INSERT INTO `classificacao_paciente` (`cod_classificacao`, `nome_classificacao`, `data_cad_classificacao`) VALUES
(1, 'Neurológico', '2023-09-26'),
(2, 'Ortopédico', '2023-09-26'),
(3, 'Cardiovascular', '2023-09-26'),
(4, 'Pneumologico', '2023-09-26'),
(5, 'Geriátrico', '2023-09-26'),
(6, 'Psicossocial', '2023-09-26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dias_semana`
--

CREATE TABLE `dias_semana` (
  `cod_dias_semana` int(11) NOT NULL,
  `nome_dias_semana` varchar(45) NOT NULL,
  `data_dias_semana` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dias_semana`
--

INSERT INTO `dias_semana` (`cod_dias_semana`, `nome_dias_semana`, `data_dias_semana`) VALUES
(1, 'Seg', '2023-09-20'),
(2, 'Ter', '2023-09-20'),
(3, 'Qua', '2023-09-20'),
(4, 'Qui', '2023-09-20'),
(5, 'Sex', '2023-09-20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dias_semana_paciente`
--

CREATE TABLE `dias_semana_paciente` (
  `cod_dias_sem_paciente` int(11) NOT NULL,
  `ordem_agendamento` int(11) DEFAULT NULL,
  `ordem_cod_dias_semana` int(11) DEFAULT NULL,
  `data_cad_dias_sem_paciente` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estado_paciente`
--

CREATE TABLE `estado_paciente` (
  `cod_estado` int(11) NOT NULL,
  `nome_estado` varchar(50) DEFAULT NULL,
  `data_cad_estado` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `etnia`
--

INSERT INTO `etnia` (`cod_etnia`, `nome_etnia`, `data_cad_etnia`) VALUES
(1, 'Banawá Yafi', '2023-07-12'),
(2, 'Deni', '2023-07-12'),
(3, 'Jarawara', '2023-07-12'),
(4, 'Jamamadi', '2023-07-12'),
(5, 'Apurinã', '2023-07-12'),
(6, 'Paumari', '2023-07-12'),
(7, 'Suruwaha ', '2023-07-12'),
(9, 'Aripuaná', '2023-10-31'),
(10, 'Bakairi', '2023-10-31'),
(11, 'Kambeba', '2023-10-31'),
(12, 'Karipuna', '2023-10-31'),
(13, 'Katurina', '2023-10-31'),
(14, 'Kaxarari', '2023-10-31'),
(15, 'Kokama', '2023-10-31'),
(16, 'Mamuri', '2023-10-31'),
(17, 'Mura', '2023-10-31'),
(18, 'Amawara', '2023-10-31'),
(19, 'Wapixana', '2023-10-31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `evolucao_paciente`
--

CREATE TABLE `evolucao_paciente` (
  `cod_evolucao` int(11) NOT NULL,
  `ordem_profissional` int(11) DEFAULT NULL,
  `ordem_paciente` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `data_cad_evolucao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `inspecao`
--

CREATE TABLE `inspecao` (
  `cod_inspecao` int(11) NOT NULL,
  `nome_inspecao` varchar(50) DEFAULT NULL,
  `data_cad_inspecao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `data_cad_paciente` date DEFAULT NULL,
  `data_atualizacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `profissionais`
--

INSERT INTO `profissionais` (`cod_profissional`, `nome_profissional`, `sexo`, `profissao`, `cargo`, `data_cad_profissional`) VALUES
(1, 'Gabriela Eusebio', 'F', 'Fisioterapeuta', 'Fisioterapia', '2023-07-12'),
(2, 'Waleska Lima', 'F', 'Fisioterapeuta', 'Fisioterapia', '2023-07-19'),
(3, 'Janaina Almeida', 'F', 'Fisioterapeuta', 'Fisioterapeuda', '2023-12-04'),
(4, 'Maria Auxiliadora', 'F', 'Fisioterapeuta', 'Fisioterapeuta', '2023-12-04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recurso_tratamento`
--

CREATE TABLE `recurso_tratamento` (
  `cod_recurso` int(11) NOT NULL,
  `nome_recurso` varchar(50) NOT NULL,
  `data_cad_recurso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `recurso_tratamento`
--

INSERT INTO `recurso_tratamento` (`cod_recurso`, `nome_recurso`, `data_cad_recurso`) VALUES
(1, 'Fisioterapia analgésica', '2023-07-18'),
(2, 'Hidroterapia', '2023-07-18'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `situacao_paciente`
--

INSERT INTO `situacao_paciente` (`cod_situacao`, `nome_situacao`, `data_situacao`) VALUES
(1, 'Hipertenso', '2023-07-19'),
(2, 'Diabetico', '2023-07-19'),
(3, 'Idoso', '2023-07-19'),
(4, 'Ac.Trânsito', '2023-07-19'),
(5, 'Gestante', '2023-07-19'),
(6, 'Vacinado', '2023-07-19'),
(7, 'Ansiedade', '2023-07-19'),
(8, 'Depressão', '2023-07-19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_classificacao_paciente`
--

CREATE TABLE `tipo_classificacao_paciente` (
  `cod_tipo_classificacao` int(11) NOT NULL,
  `ordem_avaliacao` int(11) DEFAULT NULL,
  `ordem_classificacao` int(11) DEFAULT NULL,
  `data_cad_tipo_classificacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_estado_paciente`
--

CREATE TABLE `tipo_estado_paciente` (
  `cod_situacao` int(11) NOT NULL,
  `ordem_avaliacao` int(11) DEFAULT NULL,
  `ordem_estado` int(11) DEFAULT NULL,
  `data_cad_situacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_inspecao`
--

CREATE TABLE `tipo_inspecao` (
  `cod_tipo_inspecao` int(11) NOT NULL,
  `ordem_avaliacao` int(11) DEFAULT NULL,
  `ordem_inspecao` int(11) DEFAULT NULL,
  `data_cad_tipo_inspecao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_recurso_tratamento`
--

CREATE TABLE `tipo_recurso_tratamento` (
  `cod_tipo_recurso` int(11) NOT NULL,
  `ordem_avaliacao` int(11) DEFAULT NULL,
  `ordem_recurso` int(11) DEFAULT NULL,
  `data_cad_tipo_recurso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_situacao_paciente`
--

CREATE TABLE `tipo_situacao_paciente` (
  `cod_tipo_situacao` int(11) NOT NULL,
  `ordem_situacao` int(11) DEFAULT NULL,
  `ordem_paciente` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_tratamento_paciente`
--

CREATE TABLE `tipo_tratamento_paciente` (
  `cod_tipo_tratamento` int(11) NOT NULL,
  `ordem_avaliacao` int(11) DEFAULT NULL,
  `ordem_tratamento` int(11) DEFAULT NULL,
  `data_cad_tipo_tratamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tratamento_paciente`
--

CREATE TABLE `tratamento_paciente` (
  `cod_tratamento` int(11) NOT NULL,
  `nome_tratamento` varchar(50) NOT NULL,
  `data_cad_tratamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tratamento_paciente`
--

INSERT INTO `tratamento_paciente` (`cod_tratamento`, `nome_tratamento`, `data_cad_tratamento`) VALUES
(1, 'Analgesia', '2023-07-18'),
(2, 'Anti-inflamatório', '2023-07-18'),
(3, 'Fortalecimento', '2023-07-18'),
(4, 'Extensibilidade', '2023-07-18'),
(5, 'Mobilidade', '2023-07-18'),
(7, 'Alongamento', '2023-10-06'),
(8, 'Amplitude', '2023-10-06');

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
  `nivel` char(2) DEFAULT NULL,
  `ativo` enum('sim','nao') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`cod`, `nome`, `email`, `telefone`, `cpf`, `senha`, `nivel`, `ativo`, `foto`, `data`) VALUES
(1, 'Leandro Braga', NULL, NULL, NULL, 'b7463760284fd06773ac2a48e29b0acf', '1', 'sim', NULL, '2023-07-04'),
(2, 'Gabriela Eusebio', '', '', '', '531e554a436e8d76017ced222be2256b', '2', 'sim', '', '2023-11-07'),
(3, 'Waleska Lima', '', '', '', '531e554a436e8d76017ced222be2256b', '2', 'sim', '', '2023-12-04'),
(4, 'Janaina Almeida', '', '', '', '531e554a436e8d76017ced222be2256b', '2', 'sim', '', '2023-12-04'),
(5, 'Maria Auxiliadora', '', '', '', '531e554a436e8d76017ced222be2256b', '2', 'sim', '', '2023-12-04');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamento_paciente`
--
ALTER TABLE `agendamento_paciente`
  ADD PRIMARY KEY (`cod_agendamento`),
  ADD KEY `ordem_paciente` (`ordem_paciente`),
  ADD KEY `ordem_profissional_agendamento` (`ordem_profissional_agendamento`),
  ADD KEY `ordem_recurso_tratamento` (`ordem_recurso_tratamento`);

--
-- Índices de tabela `atendimento_paciente`
--
ALTER TABLE `atendimento_paciente`
  ADD PRIMARY KEY (`cod_atendimento`),
  ADD KEY `ordem_dias_semana` (`ordem_dias_semana`);

--
-- Índices de tabela `avaliacao_atendimento`
--
ALTER TABLE `avaliacao_atendimento`
  ADD PRIMARY KEY (`cod_av_atendimento`),
  ADD KEY `ordem_paciente_av_atendimento` (`ordem_paciente_av_atendimento`);

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
-- Índices de tabela `classificacao_paciente`
--
ALTER TABLE `classificacao_paciente`
  ADD PRIMARY KEY (`cod_classificacao`);

--
-- Índices de tabela `dias_semana`
--
ALTER TABLE `dias_semana`
  ADD PRIMARY KEY (`cod_dias_semana`);

--
-- Índices de tabela `dias_semana_paciente`
--
ALTER TABLE `dias_semana_paciente`
  ADD PRIMARY KEY (`cod_dias_sem_paciente`),
  ADD KEY `ordem_agendamento` (`ordem_agendamento`),
  ADD KEY `ordem_cod_dias_semana` (`ordem_cod_dias_semana`);

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
-- Índices de tabela `tipo_classificacao_paciente`
--
ALTER TABLE `tipo_classificacao_paciente`
  ADD PRIMARY KEY (`cod_tipo_classificacao`),
  ADD KEY `ordem_avaliacao` (`ordem_avaliacao`),
  ADD KEY `ordem_classificacao` (`ordem_classificacao`);

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
-- AUTO_INCREMENT de tabela `agendamento_paciente`
--
ALTER TABLE `agendamento_paciente`
  MODIFY `cod_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de tabela `atendimento_paciente`
--
ALTER TABLE `atendimento_paciente`
  MODIFY `cod_atendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de tabela `avaliacao_atendimento`
--
ALTER TABLE `avaliacao_atendimento`
  MODIFY `cod_av_atendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `avaliacao_paciente`
--
ALTER TABLE `avaliacao_paciente`
  MODIFY `cod_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de tabela `bairros`
--
ALTER TABLE `bairros`
  MODIFY `cod_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `classificacao_paciente`
--
ALTER TABLE `classificacao_paciente`
  MODIFY `cod_classificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `dias_semana`
--
ALTER TABLE `dias_semana`
  MODIFY `cod_dias_semana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `dias_semana_paciente`
--
ALTER TABLE `dias_semana_paciente`
  MODIFY `cod_dias_sem_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT de tabela `estado_paciente`
--
ALTER TABLE `estado_paciente`
  MODIFY `cod_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `etnia`
--
ALTER TABLE `etnia`
  MODIFY `cod_etnia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `evolucao_paciente`
--
ALTER TABLE `evolucao_paciente`
  MODIFY `cod_evolucao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `inspecao`
--
ALTER TABLE `inspecao`
  MODIFY `cod_inspecao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `cod_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `profissionais`
--
ALTER TABLE `profissionais`
  MODIFY `cod_profissional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT de tabela `tipo_classificacao_paciente`
--
ALTER TABLE `tipo_classificacao_paciente`
  MODIFY `cod_tipo_classificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `tipo_estado_paciente`
--
ALTER TABLE `tipo_estado_paciente`
  MODIFY `cod_situacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de tabela `tipo_inspecao`
--
ALTER TABLE `tipo_inspecao`
  MODIFY `cod_tipo_inspecao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `tipo_recurso_tratamento`
--
ALTER TABLE `tipo_recurso_tratamento`
  MODIFY `cod_tipo_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT de tabela `tipo_situacao_paciente`
--
ALTER TABLE `tipo_situacao_paciente`
  MODIFY `cod_tipo_situacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT de tabela `tipo_tratamento_paciente`
--
ALTER TABLE `tipo_tratamento_paciente`
  MODIFY `cod_tipo_tratamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de tabela `tratamento_paciente`
--
ALTER TABLE `tratamento_paciente`
  MODIFY `cod_tratamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamento_paciente`
--
ALTER TABLE `agendamento_paciente`
  ADD CONSTRAINT `agendamento_paciente_ibfk_1` FOREIGN KEY (`ordem_paciente`) REFERENCES `pacientes` (`cod_paciente`),
  ADD CONSTRAINT `agendamento_paciente_ibfk_2` FOREIGN KEY (`ordem_profissional_agendamento`) REFERENCES `profissionais` (`cod_profissional`),
  ADD CONSTRAINT `agendamento_paciente_ibfk_3` FOREIGN KEY (`ordem_recurso_tratamento`) REFERENCES `recurso_tratamento` (`cod_recurso`);

--
-- Restrições para tabelas `atendimento_paciente`
--
ALTER TABLE `atendimento_paciente`
  ADD CONSTRAINT `atendimento_paciente_ibfk_1` FOREIGN KEY (`ordem_dias_semana`) REFERENCES `dias_semana_paciente` (`cod_dias_sem_paciente`);

--
-- Restrições para tabelas `avaliacao_atendimento`
--
ALTER TABLE `avaliacao_atendimento`
  ADD CONSTRAINT `avaliacao_atendimento_ibfk_1` FOREIGN KEY (`ordem_paciente_av_atendimento`) REFERENCES `pacientes` (`cod_paciente`);

--
-- Restrições para tabelas `avaliacao_paciente`
--
ALTER TABLE `avaliacao_paciente`
  ADD CONSTRAINT `ordem_paciente` FOREIGN KEY (`ordem_paciente`) REFERENCES `pacientes` (`cod_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ordem_profissional` FOREIGN KEY (`ordem_profissional`) REFERENCES `profissionais` (`cod_profissional`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `dias_semana_paciente`
--
ALTER TABLE `dias_semana_paciente`
  ADD CONSTRAINT `dias_semana_paciente_ibfk_1` FOREIGN KEY (`ordem_agendamento`) REFERENCES `agendamento_paciente` (`cod_agendamento`),
  ADD CONSTRAINT `dias_semana_paciente_ibfk_2` FOREIGN KEY (`ordem_cod_dias_semana`) REFERENCES `dias_semana` (`cod_dias_semana`);

--
-- Restrições para tabelas `evolucao_paciente`
--
ALTER TABLE `evolucao_paciente`
  ADD CONSTRAINT `evolucao_paciente_ibfk_1` FOREIGN KEY (`ordem_profissional`) REFERENCES `profissionais` (`cod_profissional`),
  ADD CONSTRAINT `evolucao_paciente_ibfk_2` FOREIGN KEY (`ordem_paciente`) REFERENCES `pacientes` (`cod_paciente`);

--
-- Restrições para tabelas `tipo_classificacao_paciente`
--
ALTER TABLE `tipo_classificacao_paciente`
  ADD CONSTRAINT `tipo_classificacao_paciente_ibfk_1` FOREIGN KEY (`ordem_avaliacao`) REFERENCES `avaliacao_paciente` (`cod_avaliacao`),
  ADD CONSTRAINT `tipo_classificacao_paciente_ibfk_2` FOREIGN KEY (`ordem_classificacao`) REFERENCES `classificacao_paciente` (`cod_classificacao`);

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
  ADD CONSTRAINT `ordem_recurso` FOREIGN KEY (`ordem_recurso`) REFERENCES `recurso_tratamento` (`cod_recurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipo_recurso_tratamento_ibfk_1` FOREIGN KEY (`ordem_avaliacao`) REFERENCES `avaliacao_paciente` (`cod_avaliacao`);

--
-- Restrições para tabelas `tipo_situacao_paciente`
--
ALTER TABLE `tipo_situacao_paciente`
  ADD CONSTRAINT `tipo_situacao_paciente_ibfk_2` FOREIGN KEY (`ordem_situacao`) REFERENCES `situacao_paciente` (`cod_situacao`),
  ADD CONSTRAINT `tipo_situacao_paciente_ibfk_3` FOREIGN KEY (`ordem_paciente`) REFERENCES `pacientes` (`cod_paciente`);

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
