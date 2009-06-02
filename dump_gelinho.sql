-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Jun 02, 2009 as 06:31 PM
-- Versão do Servidor: 5.0.45
-- Versão do PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Banco de Dados: `rettiwt`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `password` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `alias` varchar(80) NOT NULL,
  `color` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`,`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `user`
-- 

INSERT INTO `user` (`id`, `password`, `email`, `alias`, `color`) VALUES 
(1, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'rodrigogelinho@hotmail.com', 'rodrigo', 1),
(2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'landopbranco@hotmail.com', 'lando', 2),
(3, '0ca9277f91e40054767f69afeb0426711ca0fddd', '', 'xx', 1);