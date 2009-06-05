-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2009 at 08:25 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6-1+lenny2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rettiwt`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `id` int(11) NOT NULL auto_increment,
  `id_user` int(11) NOT NULL,
  `id_user_follow` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `id_user`, `id_user_follow`) VALUES
(1, 6, 7),
(2, 6, 1),
(3, 6, 8),
(4, 1, 6),
(5, 5, 6),
(6, 6, 5),
(7, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `multimidia`
--

CREATE TABLE IF NOT EXISTS `multimidia` (
  `id` int(11) NOT NULL auto_increment,
  `nomeantigo` varchar(256) character set utf8 collate utf8_unicode_ci NOT NULL,
  `nomenovo` varchar(256) character set utf8 collate utf8_unicode_ci NOT NULL,
  `tamanho` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `multimidia`
--

INSERT INTO `multimidia` (`id`, `nomeantigo`, `nomenovo`, `tamanho`, `id_usuario`, `tipo`) VALUES
(1, 'olho_protesto.png', '1bd9f2bf225e86df6d99372a78eb9df3abc2c84a.png', 8094, 4, 1),
(2, 'olho_protesto.png', 'ab4b6c817c059ee295bc315cbe857f54d47d247a.png', 8094, 4, 1),
(3, 'olho_protesto.png', 'a3157162f2cc2c244de71c8d71732a9ece1047cb.png', 8094, 4, 1),
(4, 'olho_protesto.png', '19950d1ec25fea2db8b8b2920e5b444108902cf7.png', 8094, 4, 1),
(5, 'olho_protesto.png', 'cf5e26c27e148973cd56f5a4dcf06b6c2ec444a1.png', 8094, 4, 1),
(6, 'olho_protesto.png', '22b9b187f7cd677839da0bbd221d6cfec19b8751.png', 8094, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teste`
--

CREATE TABLE IF NOT EXISTS `teste` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `idade` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teste`
--

INSERT INTO `teste` (`id`, `nome`, `idade`) VALUES
(1, 'Renan', 21),
(2, 'Matuzalém', 989),
(3, 'Ciclano', 200),
(4, 'Beltrano', 230);

-- --------------------------------------------------------

--
-- Table structure for table `twitt`
--

CREATE TABLE IF NOT EXISTS `twitt` (
  `id` int(11) NOT NULL auto_increment,
  `id_user` int(11) NOT NULL,
  `text` varchar(160) character set utf8 collate utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `id_multimidia` int(11) default NULL,
  `reply` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `twitt`
--

INSERT INTO `twitt` (`id`, `id_user`, `text`, `date`, `time`, `id_multimidia`, `reply`) VALUES
(1, 6, 'dsfddsfdgdffggfgfg', '2009-06-03', '16:44:35', 5454, NULL),
(2, 6, 'afijsdlfj oijo ijwef wowai jwae', '2009-06-10', '16:55:35', 5454, NULL),
(3, 7, 'sfdgdgf', '2009-06-04', '17:44:35', NULL, 1),
(5, 1, 'dsftgdfgdfgdf', '2009-06-04', '17:48:35', NULL, 1),
(6, 1, 'dsftgdfgdfgdf', '2009-06-04', '17:48:35', NULL, 1),
(7, 8, 'testeeeeeeeeeeee', '2009-06-05', '02:44:35', NULL, NULL),
(8, 7, 'resp 7', '2009-06-18', '02:44:35', NULL, 7),
(9, 1, 'trgf 77777', '2009-06-17', '18:55:21', NULL, 7),
(10, 6, 'sdftdfg', '2009-06-04', '11:22:32', 2, 8),
(11, 6, '.textoooo', '2009-06-04', '11:23:34', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL auto_increment,
  `password` varchar(80) character set utf8 collate utf8_unicode_ci NOT NULL,
  `email` varchar(80) character set utf8 collate utf8_unicode_ci NOT NULL,
  `alias` varchar(80) character set utf8 collate utf8_unicode_ci NOT NULL,
  `color` int(11) NOT NULL,
  `foto_id_multimidia` int(11) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`,`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `alias`, `color`, `foto_id_multimidia`) VALUES
(1, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'rodrigogelinho@hotmail.com', 'rodrigo', 1, NULL),
(2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'landopbranco@hotmail.com', 'lando', 2, NULL),
(3, '0ca9277f91e40054767f69afeb0426711ca0fddd', '', 'xx', 1, NULL),
(4, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'renanmarks@a.com', 'renan', 1, 6),
(5, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'karennakazato@gmail.com', 'karenLinda', 1, NULL),
(6, '58a73fddc840c12d640bdc1549d375454d7f5d03', 'thales@duarte.com', 'thales', 1, NULL),
(7, '356a192b7913b04c54574d18c28d46e6395428ab', 'y', 'y', 0, 0),
(8, 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', 'b', 'b', 0, 0),
(9, '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'a', 'a', 0, 0),
(10, '22ea1c649c82946aa6e479e1ffd321e4a318b1b0', 'q', 'q', 0, 0),
(11, '58e6b3a414a1e090dfc6029add0f3555ccba127f', 'e@e', 'e', 0, 0),
(12, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'teste', 'teste', 0, 0),
(13, '13fbd79c3d390e5d6585a21e11ff5ec1970cff0c', 'k', 'k', 0, 0),
(14, 'd1854cae891ec7b29161ccaf79a24b00c274bdaa', 'n', 'n', 0, 0),
(15, '395df8f7c51f007019cb30201c49e884b46b92fa', 'z', 'z', 0, 0),
(16, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'rodrigo', '', 0, 0);
