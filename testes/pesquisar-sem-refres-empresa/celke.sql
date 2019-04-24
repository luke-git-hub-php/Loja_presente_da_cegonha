-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/08/2017 às 02:04
-- Versão do servidor: 5.7.14
-- Versão do PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `pais_id` int(11) NOT NULL,
  `estado_sgl` varchar(10) CHARACTER SET utf8 NOT NULL,
  `estado_nome` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `estados`
--

INSERT INTO `estados` (`id`, `pais_id`, `estado_sgl`, `estado_nome`) VALUES
(1, 1, 'AC', 'Acre'),
(2, 1, 'AL', 'Alagoas'),
(3, 1, 'AP', 'AmapÃ¡'),
(4, 1, 'AM', 'Amazonas'),
(5, 1, 'BA', 'Bahia'),
(6, 1, 'CE', 'CearÃ¡'),
(7, 1, 'DF', 'Distrito Federal'),
(8, 1, 'ES', 'EspÃ­rito Santo'),
(9, 1, 'GO', 'GoiÃ¡s'),
(10, 1, 'MA', 'MaranhÃ£o'),
(11, 1, 'MT', 'Mato Grosso'),
(12, 1, 'MS', 'Mato Grosso do Sul'),
(13, 1, 'MG', 'Minas Gerais'),
(14, 1, 'PA', 'ParÃ¡'),
(15, 1, 'PB', 'ParaÃ­ba'),
(16, 1, 'PR', 'ParanÃ¡'),
(17, 1, 'PE', 'Pernambuco'),
(18, 1, 'PI', 'PiauÃ­'),
(19, 1, 'RJ', 'Rio de Janeiro'),
(20, 1, 'RN', 'Rio Grande do Norte'),
(21, 1, 'RS', 'Rio Grande do Sul'),
(22, 1, 'RO', 'RondÃ´nia'),
(23, 1, 'RR', 'Roraima'),
(24, 1, 'SC', 'Santa Catarina'),
(25, 1, 'SP', 'SÃ£o Paulo'),
(26, 1, 'SE', 'Sergipe'),
(27, 1, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura para tabela `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `estado_id`) VALUES
(1, 'Celke - Matriz', '5550 Avenida Republica Argentina, Curitiba', -25.494970, -49.294357, 'Educação', 16),
(2, 'Celke - Filial 1', '1610 Av. Carlos Gomes, Porto Alegre', -30.034855, -51.177143, 'Educação', 21),
(3, 'Celke - Filial 2', '575 Avenida Paulista, SÃ£o Paulo', -23.568130, -46.649166, 'Educação', 25),
(4, 'Filial 7', '58 Av. Mal. Floriano Peixoto', -23.967110, -46.334839, 'EducaÃ§Ã£o', 25),
(5, 'Filial 8', '79 Via BinÃ¡rio do Porto', -22.897062, -43.202164, 'EducaÃ§Ã£o', 19);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de tabela `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
