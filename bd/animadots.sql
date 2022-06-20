-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Nov-2021 às 19:00
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
-- Banco de dados: `animadots`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adocao`
--

CREATE TABLE `adocao` (
  `id_adocao` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `data_criacao_adocao` timestamp DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao_adocao` timestamp NULL,
  `status_adocao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animalId_animal` int(4) NOT NULL,
  `internautaId_internauta` int(4) NOT NULL,
  `funcionarioId_funcionario` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raca_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade_animal` int(2) NOT NULL,
  `vacinado_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `castrado_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vermifugado_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especie_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porte_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deficiencia_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adotado_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notas_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Incluindo dados na tabela `animal`
--

INSERT INTO `animal` (`nome_animal`, `sexo_animal`, `raca_animal`, `idade_animal`, `vacinado_animal`, `castrado_animal`, `vermifugado_animal`, `especie_animal`, `cor_animal`, `porte_animal`, `adotado_animal`, `notas_animal`) VALUES
('lilica', 'fêmea', 'dalmata', 2, 'vacinado', 'castrado', 'vermifugado', 'cachorro', 'branco e preto', 'pequeno', 'nao_adotado', 'Oi, eu sou a Lilica!'),
('belinha', 'fêmea', 'labrador retriever', 1, 'vacinado', 'castrado', 'vermifugado', 'cachorro', 'caramelo', 'médio', 'nao_adotado', 'Oi, eu sou a Belinha!'),
('amora', 'fêmea', 'vira-lata', 2, 'vacinado', 'castrado', 'vermifugado', 'gato', 'branco', 'pequeno', 'nao_adotado', 'Oi, eu sou a Amora!'),
('rodrigo faro', 'macho', 'vira-lata', 2, 'vacinado', 'castrado', 'vermifugado', 'cachorro', 'caramelo', 'médio', 'nao_adotado', 'Oi, eu sou o Rodrigo Faro!'),
('rogério', 'macho', 'ocicat', 2, 'vacinado', 'castrado', 'vermifugado', 'gato', 'canela', 'pequeno', 'nao_adotado', 'Oi, eu sou o Rogério!'),
('layla', 'fêmea', 'vira-lata', 2, 'vacinado', 'castrado', 'vermifugado', 'cachorro', 'caramelo', 'pequeno', 'nao_adotado', 'Oi, eu sou a Layla!'),
('penélope', 'fêmea', 'lhasa apso', 5, 'vacinado', 'castrado', 'vermifugado', 'cachorro', 'branco e preto', 'pequeno', 'nao_adotado', 'Oi, eu sou a Penélope!'),
('floquinho', 'macho', 'siâmes', 1, 'vacinado', 'nao_castrado', 'vermifugado', 'gato', 'marrom', 'pequeno', 'nao_adotado', 'Oi, eu sou o Floquinho!'),
('perry', 'macho', 'rottweiler', 10, 'vacinado', 'castrado', 'vermifugado', 'cachorro', 'marrom', 'médio', 'nao_adotado', 'Oi, eu sou o Perry!'),
('alana', 'fêmea', 'siâmes', 5, 'vacinado', 'nao_castrado', 'vermifugado', 'gato', 'laranja e branco', 'pequeno', 'nao_adotado', 'Oi, eu sou a Alana!'),
('mel', 'fêmea', 'pastor-alemão', 2, 'vacinado', 'castrado', 'vermifugado', 'cachorro', 'vermelho e preto', 'médio', 'nao_adotado', 'Oi, eu sou a Mel!'),
('lalinha', 'fêmea', 'pelo curto inglês', 4, 'vacinado', 'castrado', 'vermifugado', 'gato', 'cinza escuro', 'pequeno', 'nao_adotado', 'Oi, eu sou a Lalinha!'),
('amélia', 'fêmea', 'poodle', 3, 'vacinado', 'castrado', 'vermifugado', 'cachorro', 'branco', 'médio', 'nao_adotado', 'Oi, eu sou a Amélia!'),
('hércules', 'macho', 'persa', 4, 'vacinado', 'castrado', 'vermifugado', 'gato', 'laranja', 'pequeno', 'nao_adotado', 'Oi, eu sou o Hércules!'),
('castiel', 'macho', 'pelo curto inglês', 2, 'vacinado', 'castrado', 'vermifugado', 'gato', 'branco', 'pequeno', 'nao_adotado', 'Oi, eu sou o Castiel!'),
('che guevara', 'macho', 'vira-lata', 5, 'vacinado', 'castrado', 'vermifugado', 'cachorro', 'branco e caramelo', 'pequeno', 'nao_adotado', 'Oi, eu sou o Che Guevara!'),
('alicia', 'fêmea', 'ocicat', 3, 'vacinado', 'nao_castrado', 'vermifugado', 'gato', 'ruivo', 'pequeno', 'nao_adotado', 'Oi, eu sou a Alicia!'),
('nala', 'fêmea', 'shih-tzu', 3, 'vacinado', 'nao_castrado', 'nao_vermifugado', 'cachorro', 'preto e marrom', 'médio', 'nao_adotado', 'Oi, eu sou a Nala!'),
('arnaldo', 'macho', 'vira-lata', 7, 'vacinado', 'castrado', 'vermifugado', 'cachorro', 'branco', 'médio', 'nao_adotado', 'Oi, eu sou o Arnaldo!'),
('tiquinei', 'macho', 'munchkin', 4, 'vacinado', 'castrado', 'vermifugado', 'gato', 'marrom escuro, marrom claro e bege', 'pequeno', 'nao_adotado', 'Oi, eu sou o Tiquinei!'),
('toquinho', 'macho', 'siâmes', 1, 'vacinado', 'castrado', 'vermifugado', 'gato', 'preto', 'pequeno', 'nao_adotado', 'Oi, eu sou o Toquinho!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
  `nivel_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Incluindo dados na tabela `funcionario`
--

INSERT INTO `funcionario` (`nome_funcionario`,`rg_funcionario`,`cpf_funcionario`,`telefone_funcionario`,`login_funcionario`,`senha_funcionario`,`endereco_funcionario`,`nivel_funcionario`) VALUES
('Inghryd Zeviane', '40.223.564-6', '639.225.410-20', '(11)94002-8922', 'zevi', 'zevi', 'rua fim do mundo', 'Supervisor'),
('Jonathan de Souza', '27.471.216-7', '516.281.940-90', '(11)94002-8922', 'jhow', 'jhow', 'rua fim do mundo', 'Supervisor'),
('Lucas Dias', '44.868.452-4', '974.035.200-68', '(11)94002-8922', 'lucas', 'lucas', 'rua fim do mundo', 'Supervisor'),
('Gustavo Luis', '37.913.298-9', '334.576.230-74', '(11)94002-8922', 'gustavo', 'gustavo', 'rua fim do mundo', 'Supervisor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `internauta`
--

CREATE TABLE `internauta` (
  `id_internauta` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome_internauta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg_internauta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf_internauta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_internauta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_internauta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_internauta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residencia_internauta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferenciaAnimal_internauta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


