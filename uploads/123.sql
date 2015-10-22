-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Out-2015 às 03:09
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sigea`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor_trabalho`
--

CREATE TABLE IF NOT EXISTS `autor_trabalho` (
  `codigo_trabalho` smallint(6) NOT NULL,
  `codigo_autor` smallint(6) NOT NULL,
  `codigo_evento` smallint(6) NOT NULL,
  PRIMARY KEY (`codigo_trabalho`,`codigo_autor`,`codigo_evento`),
  KEY `cod_pessoa_idx` (`codigo_autor`),
  KEY `cod_evento_idx` (`codigo_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `inscricao_inicio` datetime NOT NULL,
  `inscricao_fim` datetime NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE IF NOT EXISTS `inscricao` (
  `codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `valor_pago` float NOT NULL,
  `status` varchar(1) NOT NULL COMMENT 'P - PAGO\nN - NÃO PAGO',
  `cod_evento` smallint(6) NOT NULL,
  `cod_tipo_inscricao` smallint(6) NOT NULL,
  `cod_pessoa` smallint(6) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `cod_evento_idx` (`cod_evento`),
  KEY `cod_pessoa_idx` (`cod_pessoa`),
  KEY `cod_tipo_insc_idx` (`cod_tipo_inscricao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscr_trabalho`
--

CREATE TABLE IF NOT EXISTS `inscr_trabalho` (
  `codigo_inscricao` smallint(6) NOT NULL AUTO_INCREMENT,
  `codigo_trabalho` smallint(6) NOT NULL,
  PRIMARY KEY (`codigo_inscricao`,`codigo_trabalho`),
  KEY `cod_trab_idx` (`codigo_trabalho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE IF NOT EXISTS `pessoas` (
  `codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `curriculo` varchar(2000) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`codigo`, `nome`, `cpf`, `email`, `curriculo`, `telefone`) VALUES
(24, 'jairo', 'jairo', 'jair', NULL, 'jairo'),
(25, 'REYVYK ANTONIO SANTOS FERREIRA', '123', '123', NULL, '123'),
(26, 'JAIRO RODRIGUES DE SOUSA', '05446062302', 'guitarristajairo@gmail.com', NULL, '+5599996316429'),
(27, 'JAIRO RODRIGUES DE SOUSA', '32924593387', 'guitarristajairo@gmail.com', NULL, '+5599996316429'),
(28, 'JAIRO RODRIGUES DE SOUSA', '03338009313', 'guitarristajairo@gmail.com', NULL, '+5599996316429'),
(29, 'JAIRO RODRIGUES DE SOUSA', '3463462346', 'guitarristajairo@gmail.com', NULL, '+5599996316429'),
(30, 'jairo rodrigues de sousa', 'wtwq4tq34yt134', 'guitarristajairo@gmail.com', NULL, '+5599996316429'),
(31, 'teste', '12222', 'guitarristajairo@gmail.com', NULL, NULL),
(32, 'teste', 'teste', 'teste', 'teste um pouco sobre mim    ', NULL),
(33, 'teste2', 'teste2', 'teste2', 'teste2 eu    ', NULL),
(34, 'jairo', '1234567890', 'jairo', 'um pouco sobre mim    ', NULL),
(35, 'sakjdgbaihb', 'jhvuhv', 'kugvkgh', 'gwergwerg    ', NULL),
(36, 'Mauro', '321', 'jairo', ' phpdjgnajdfgnojadfgnoi bdfunoiadfg   ', NULL),
(37, 'JAIRO RODRIGUES DE SOUSA', 'qewrqwer', 'wer', NULL, NULL),
(38, 'jairo', '12131', 'djbvdhb', 'jsdbfibjsdifjv ij    ', NULL),
(39, 'JAIRO RODRIGUES DE SOUSA', '01076601219', 'guitarristajairo@gmail.com', 'sou academico de sistema 22 anos trabalho como desevolvedor fronte end    ', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_atividades`
--

CREATE TABLE IF NOT EXISTS `tipo_atividades` (
  `codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tipo_atividades`
--

INSERT INTO `tipo_atividades` (`codigo`, `nome`) VALUES
(1, 'Palestra'),
(2, 'MiniCurso'),
(3, 'Banner');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_inscricao`
--

CREATE TABLE IF NOT EXISTS `tipo_inscricao` (
  `codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) NOT NULL,
  `valor_tipo` float NOT NULL,
  `observacoes` varchar(255) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalhos`
--

CREATE TABLE IF NOT EXISTS `trabalhos` (
  `codigo` smallint(6) NOT NULL AUTO_INCREMENT,
  `resumo` varchar(255) NOT NULL,
  `corpo` varchar(1) NOT NULL COMMENT 'Vai ser feito upload de pdf',
  `data_submetido` date NOT NULL,
  `data_avaliacao` date NOT NULL,
  `status` varchar(1) NOT NULL COMMENT 'A - aceito\nR - não aceito\nN - não avaliado',
  `tipo_atividade` smallint(6) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `anexo` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `tipo_atividade_idx` (`tipo_atividade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `trabalhos`
--

INSERT INTO `trabalhos` (`codigo`, `resumo`, `corpo`, `data_submetido`, `data_avaliacao`, `status`, `tipo_atividade`, `titulo`, `anexo`) VALUES
(5, 'um pouco sobre o trabalho    ', '', '2015-10-10', '0000-00-00', '', 1, 'minha Palestra', 'minha Palestra.doc'),
(6, 'ihbihb    ', '', '2015-10-10', '0000-00-00', '', 2, 'lkhbij', 'lkhbij.doc'),
(7, 'ihbihb    ', '', '2015-10-10', '0000-00-00', '', 2, 'lkhbij', 'lkhbij.doc'),
(8, 'ihbihb    ', '', '2015-10-10', '0000-00-00', '', 2, 'lkhbij', 'lkhbij.doc'),
(9, 'gwerg    ', '', '2015-10-10', '0000-00-00', '', 2, 'egwertg', 'egwertg.doc'),
(10, 'gwerg    ', '', '2015-10-10', '0000-00-00', '', 2, 'egwertg', 'egwertg.doc'),
(11, 'gwerg    ', '', '2015-10-10', '0000-00-00', '', 2, 'egwertg', 'egwertg.doc'),
(12, 'gwerg    ', '', '2015-10-10', '0000-00-00', '', 2, 'egwertg', 'egwertg.doc'),
(13, 'gwerg    ', '', '2015-10-10', '0000-00-00', '', 2, 'egwertg', 'egwertg.doc'),
(14, 'gwerg    ', '', '2015-10-10', '0000-00-00', '', 2, 'egwertg', 'egwertg.doc'),
(15, 'vou ensinar     ', '', '2015-10-10', '0000-00-00', '', 1, 'como roubar um banco', 'como roubar um banco.doc'),
(16, 'çjdfçjbsdfjbj    ', '', '2015-10-10', '0000-00-00', '', 1, 'skvnaçsdjnoj', 'skvnaçsdjnoj.doc'),
(17, 'nessa paletras ireia ensinar a como criar um crud gererico unsado php    ', '', '2015-10-10', '0000-00-00', '', 1, 'Criando um crud em php', 'Criando um crud em php.doc');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `autor_trabalho`
--
ALTER TABLE `autor_trabalho`
  ADD CONSTRAINT `cod_autor` FOREIGN KEY (`codigo_autor`) REFERENCES `pessoas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cod_evento` FOREIGN KEY (`codigo_evento`) REFERENCES `eventos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cod_trabalho` FOREIGN KEY (`codigo_trabalho`) REFERENCES `trabalhos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `cod_even` FOREIGN KEY (`cod_evento`) REFERENCES `eventos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cod_p` FOREIGN KEY (`cod_pessoa`) REFERENCES `pessoas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cod_tipo_insc` FOREIGN KEY (`cod_tipo_inscricao`) REFERENCES `tipo_inscricao` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inscr_trabalho`
--
ALTER TABLE `inscr_trabalho`
  ADD CONSTRAINT `cod_insc` FOREIGN KEY (`codigo_inscricao`) REFERENCES `inscricao` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cod_trab` FOREIGN KEY (`codigo_trabalho`) REFERENCES `trabalhos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `trabalhos`
--
ALTER TABLE `trabalhos`
  ADD CONSTRAINT `tipo_atividade` FOREIGN KEY (`tipo_atividade`) REFERENCES `tipo_atividades` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
