-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Set 10, 2014 as 09:47 
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bdcaac`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb.instituicao`
--

CREATE TABLE IF NOT EXISTS `tb.instituicao` (
  `id.tbinstituicao` int(11) NOT NULL AUTO_INCREMENT,
  `rs` varchar(30) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  PRIMARY KEY (`id.tbinstituicao`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='tb referente as instituiçoes.' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `tb.instituicao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tbaluno`
--

CREATE TABLE IF NOT EXISTS `tbaluno` (
  `id.tbaluno` int(11) NOT NULL AUTO_INCREMENT,
  `id.tbinstituicao` int(11) NOT NULL,
  `horae` datetime NOT NULL,
  `horas` datetime NOT NULL,
  `matricula` int(3) NOT NULL,
  PRIMARY KEY (`id.tbaluno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='tb referente aos alunos.' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `tbaluno`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tbconvidado`
--

CREATE TABLE IF NOT EXISTS `tbconvidado` (
  `id.tbconvidado` int(11) NOT NULL AUTO_INCREMENT,
  `id.tbinstituicao` int(11) NOT NULL,
  `horae` datetime NOT NULL,
  `horas` datetime NOT NULL,
  `assunto` varchar(50) NOT NULL,
  PRIMARY KEY (`id.tbconvidado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='tb referente aos convidados.' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `tbconvidado`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcurso`
--

CREATE TABLE IF NOT EXISTS `tbcurso` (
  `id.tbcurso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `id.tbfuncionario` int(11) NOT NULL,
  `id.tbconvidado` int(11) NOT NULL,
  `id.tbaluno` int(11) NOT NULL,
  `dtinicio` date NOT NULL,
  `dtfim` date NOT NULL,
  `cargahoraria` int(2) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  PRIMARY KEY (`id.tbcurso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Cursos ou palestras realizadas no ambiente' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `tbcurso`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfrequencia`
--

CREATE TABLE IF NOT EXISTS `tbfrequencia` (
  `id.tbfrequencia` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(12) NOT NULL,
  `id.tbusuario` int(11) NOT NULL,
  `curso` varchar(20) NOT NULL,
  `horae` varchar(10) NOT NULL,
  `horas` varchar(10) NOT NULL,
  PRIMARY KEY (`id.tbfrequencia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='referente a lista frequencia' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `tbfrequencia`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfuncionario`
--

CREATE TABLE IF NOT EXISTS `tbfuncionario` (
  `id.tbfuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `horae` datetime NOT NULL,
  `horas` datetime NOT NULL,
  `id.tbinstituicao` int(11) NOT NULL,
  PRIMARY KEY (`id.tbfuncionario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='tb referente aos funcionários.' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `tbfuncionario`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipo`
--

CREATE TABLE IF NOT EXISTS `tbtipo` (
  `id.tbtipo` int(11) NOT NULL AUTO_INCREMENT,
  `id.tbfuncionario` int(11) NOT NULL,
  `id.tbaluno` int(11) NOT NULL,
  `id.tbconvidado` int(11) NOT NULL,
  `id.tbcurso` int(11) NOT NULL,
  PRIMARY KEY (`id.tbtipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='tabelas com os tipos de entidades do bd' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `tbtipo`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id.tbusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(18) NOT NULL,
  `id.tbtipo` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(16) NOT NULL,
  PRIMARY KEY (`id.tbusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `usuario`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
