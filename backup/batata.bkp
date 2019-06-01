-- MySQL dump 10.13  Distrib 8.0.11, for Win64 (x86_64)
--
-- Host: localhost    Database: db_roadrunner
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_evento`
--

DROP TABLE IF EXISTS `tbl_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_evento` (
  `id_eventos` int(11) NOT NULL AUTO_INCREMENT,
  `foto_evento` text NOT NULL,
  `local_evento` varchar(100) NOT NULL,
  `data_evento` varchar(50) NOT NULL,
  `nome_evento` varchar(100) NOT NULL,
  `desc_evento` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_eventos`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_evento`
--

LOCK TABLES `tbl_evento` WRITE;
/*!40000 ALTER TABLE `tbl_evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_faleconosco`
--

DROP TABLE IF EXISTS `tbl_faleconosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_faleconosco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `sugestao` text,
  `telefone` varchar(100) DEFAULT NULL,
  `homepage` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `informacoes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_faleconosco`
--

LOCK TABLES `tbl_faleconosco` WRITE;
/*!40000 ALTER TABLE `tbl_faleconosco` DISABLE KEYS */;
INSERT INTO `tbl_faleconosco` VALUES (2,'Pedro','11 94002-8922','pedro@almeida.com.br','Programador','M',' jhhg ui nb buoy ','11 4002-8922','http://www.com.br','http://www.com.br','Testando o Banco ');
/*!40000 ALTER TABLE `tbl_faleconosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_loja`
--

DROP TABLE IF EXISTS `tbl_loja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_loja` (
  `id_loja` int(11) NOT NULL AUTO_INCREMENT,
  `nome_loja` varchar(100) NOT NULL,
  `endereco_loja` varchar(100) NOT NULL,
  `cidade_loja` varchar(100) NOT NULL,
  `telefone_loja` varchar(100) NOT NULL,
  `iframe_loja` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `imagem_loja` varchar(225) NOT NULL,
  PRIMARY KEY (`id_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_loja`
--

LOCK TABLES `tbl_loja` WRITE;
/*!40000 ALTER TABLE `tbl_loja` DISABLE KEYS */;
INSERT INTO `tbl_loja` VALUES (16,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','44444444444444444444','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',1,'arquivos/36ab24649d4ffe85ad22e6ba4af572b7.png'),(17,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','44444444444444444444','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',1,'arquivos/36ab24649d4ffe85ad22e6ba4af572b7.png');
/*!40000 ALTER TABLE `tbl_loja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel_usuario`
--

DROP TABLE IF EXISTS `tbl_nivel_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_nivel_usuario` (
  `id_nivel_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_usuario` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_nivel_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel_usuario`
--

LOCK TABLES `tbl_nivel_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_nivel_usuario` DISABLE KEYS */;
INSERT INTO `tbl_nivel_usuario` VALUES (10,'CEO',1),(11,'NOEMI',1);
/*!40000 ALTER TABLE `tbl_nivel_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_noticia`
--

DROP TABLE IF EXISTS `tbl_noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_noticia` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_noticia` varchar(100) NOT NULL,
  `texto_noticia` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_noticia`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_noticia`
--

LOCK TABLES `tbl_noticia` WRITE;
/*!40000 ALTER TABLE `tbl_noticia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL,
  `imagem_produto` varchar(225) NOT NULL,
  `preconovo_produto` varchar(100) DEFAULT NULL,
  `precoantigo_produto` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto`
--

LOCK TABLES `tbl_produto` WRITE;
/*!40000 ALTER TABLE `tbl_produto` DISABLE KEYS */;
INSERT INTO `tbl_produto` VALUES (1,'bike 1','aaa','','100',1),(2,'bike3','bbb',NULL,'200',1);
/*!40000 ALTER TABLE `tbl_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_promocao` (
  `id_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `porcentagem_promocao` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_promocao`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `tbl_promocao_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocao`
--

LOCK TABLES `tbl_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_promocao` DISABLE KEYS */;
INSERT INTO `tbl_promocao` VALUES (38,1,10,1),(39,2,20,1),(40,1,0,1);
/*!40000 ALTER TABLE `tbl_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sobreloja`
--

DROP TABLE IF EXISTS `tbl_sobreloja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_sobreloja` (
  `id_sobreloja` int(11) NOT NULL AUTO_INCREMENT,
  `id_texto_loja` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_sobreloja`),
  KEY `id_texto_loja` (`id_texto_loja`),
  CONSTRAINT `tbl_sobreloja_ibfk_1` FOREIGN KEY (`id_texto_loja`) REFERENCES `tbl_texto_sobreloja` (`id_texto_loja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sobreloja`
--

LOCK TABLES `tbl_sobreloja` WRITE;
/*!40000 ALTER TABLE `tbl_sobreloja` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_sobreloja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_texto_sobreloja`
--

DROP TABLE IF EXISTS `tbl_texto_sobreloja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_texto_sobreloja` (
  `id_texto_loja` int(11) NOT NULL AUTO_INCREMENT,
  `txt_quemsomos` text,
  `txt_nossamissao` text,
  `txt_nossavisao` text,
  `txt_nossosvalores` text,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_texto_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_texto_sobreloja`
--

LOCK TABLES `tbl_texto_sobreloja` WRITE;
/*!40000 ALTER TABLE `tbl_texto_sobreloja` DISABLE KEYS */;
INSERT INTO `tbl_texto_sobreloja` VALUES (69,'O assassinato de Spencer Perceval, primeiro-ministro do Reino Unido da Grã-Bretanha e Irlanda, ocorreu às 17h15min de 11 de maio de 1812, uma segunda-feira. Perceval morreu após ser baleado no saguão da Câmara dos Comuns, em Londres. Seu assassino era John Bellingham, um comerciante de Liverpool que mantinha reclamações contra o governo. Bellingham foi detido e, quatro dias após o assassinato, foi julgado, condenado e sentenciado à morte. Uma semana depois, foi enforcado na Prisão de Newgate.\r\n\r\nPerceval liderava o governo conservador desde 1809, durante uma fase crítica das Guerras Napoleônicas. Sua determinação em defender a guerra usando as medidas mais severas causou pobreza generalizada e agitação no país; desta forma, a notícia de sua morte foi motivo de regojizo nas partes mais afetadas. Apesar dos temores iniciais de que o assassinato pudesse estar ligado a uma revolta geral, verificou-se que Bellingham havia agido sozinho, protestando contra o tratamento que recebeu do governo alguns anos antes, quando foi preso na Rússia devido a uma dívida comercial. A falta de remorso de Bellingham e a aparente certeza de que sua ação era justificada levantaram questões sobre sua sanidade, mas em seu julgamento ele foi considerado legalmente responsável por suas ações.\r\n\r\nApós a morte de Perceval, o Parlamento estabeleceu uma generosa pensão para sua viúva e filhos, também aprovando a construção de monumentos para homenageá-lo. Além disso, seu ministério foi logo esquecido, suas políticas revertidas, e Perceval é geralmente mais conhecido pelo modo de sua morte do que por quaisquer de suas conquistas. Posteriormente, historiadores caracterizaram o julgamento e a execução apressados de Bellingham como contrários aos princípios da justiça. A possibilidade de que ele estava agindo como parte de uma conspiração, em nome de um consórcio de comerciantes de Liverpool hostil às políticas econômicas de Perceval, foi o tema de um estudo de 2012.','O assassinato de Spencer Perceval, primeiro-ministro do Reino Unido da Grã-Bretanha e Irlanda, ocorreu às 17h15min de 11 de maio de 1812, uma segunda-feira. Perceval morreu após ser baleado no saguão da Câmara dos Comuns, em Londres. Seu assassino era John Bellingham, um comerciante de Liverpool que mantinha reclamações contra o governo. Bellingham foi detido e, quatro dias após o assassinato, foi julgado, condenado e sentenciado à morte. Uma semana depois, foi enforcado na Prisão de Newgate.\r\n\r\nPerceval liderava o governo conservador desde 1809, durante uma fase crítica das Guerras Napoleônicas. Sua determinação em defender a guerra usando as medidas mais severas causou pobreza generalizada e agitação no país; desta forma, a notícia de sua morte foi motivo de regojizo nas partes mais afetadas. Apesar dos temores iniciais de que o assassinato pudesse estar ligado a uma revolta geral, verificou-se que Bellingham havia agido sozinho, protestando contra o tratamento que recebeu do governo alguns anos antes, quando foi preso na Rússia devido a uma dívida comercial. A falta de remorso de Bellingham e a aparente certeza de que sua ação era justificada levantaram questões sobre sua sanidade, mas em seu julgamento ele foi considerado legalmente responsável por suas ações.\r\n\r\nApós a morte de Perceval, o Parlamento estabeleceu uma generosa pensão para sua viúva e filhos, também aprovando a construção de monumentos para homenageá-lo. Além disso, seu ministério foi logo esquecido, suas políticas revertidas, e Perceval é geralmente mais conhecido pelo modo de sua morte do que por quaisquer de suas conquistas. Posteriormente, historiadores caracterizaram o julgamento e a execução apressados de Bellingham como contrários aos princípios da justiça. A possibilidade de que ele estava agindo como parte de uma conspiração, em nome de um consórcio de comerciantes de Liverpool hostil às políticas econômicas de Perceval, foi o tema de um estudo de 2012.','O assassinato de Spencer Perceval, primeiro-ministro do Reino Unido da Grã-Bretanha e Irlanda, ocorreu às 17h15min de 11 de maio de 1812, uma segunda-feira. Perceval morreu após ser baleado no saguão da Câmara dos Comuns, em Londres. Seu assassino era John Bellingham, um comerciante de Liverpool que mantinha reclamações contra o governo. Bellingham foi detido e, quatro dias após o assassinato, foi julgado, condenado e sentenciado à morte. Uma semana depois, foi enforcado na Prisão de Newgate.\r\n\r\nPerceval liderava o governo conservador desde 1809, durante uma fase crítica das Guerras Napoleônicas. Sua determinação em defender a guerra usando as medidas mais severas causou pobreza generalizada e agitação no país; desta forma, a notícia de sua morte foi motivo de regojizo nas partes mais afetadas. Apesar dos temores iniciais de que o assassinato pudesse estar ligado a uma revolta geral, verificou-se que Bellingham havia agido sozinho, protestando contra o tratamento que recebeu do governo alguns anos antes, quando foi preso na Rússia devido a uma dívida comercial. A falta de remorso de Bellingham e a aparente certeza de que sua ação era justificada levantaram questões sobre sua sanidade, mas em seu julgamento ele foi considerado legalmente responsável por suas ações.\r\n\r\nApós a morte de Perceval, o Parlamento estabeleceu uma generosa pensão para sua viúva e filhos, também aprovando a construção de monumentos para homenageá-lo. Além disso, seu ministério foi logo esquecido, suas políticas revertidas, e Perceval é geralmente mais conhecido pelo modo de sua morte do que por quaisquer de suas conquistas. Posteriormente, historiadores caracterizaram o julgamento e a execução apressados de Bellingham como contrários aos princípios da justiça. A possibilidade de que ele estava agindo como parte de uma conspiração, em nome de um consórcio de comerciantes de Liverpool hostil às políticas econômicas de Perceval, foi o tema de um estudo de 2012.','O assassinato de Spencer Perceval, primeiro-ministro do Reino Unido da Grã-Bretanha e Irlanda, ocorreu às 17h15min de 11 de maio de 1812, uma segunda-feira. Perceval morreu após ser baleado no saguão da Câmara dos Comuns, em Londres. Seu assassino era John Bellingham, um comerciante de Liverpool que mantinha reclamações contra o governo. Bellingham foi detido e, quatro dias após o assassinato, foi julgado, condenado e sentenciado à morte. Uma semana depois, foi enforcado na Prisão de Newgate.\r\n\r\nPerceval liderava o governo conservador desde 1809, durante uma fase crítica das Guerras Napoleônicas. Sua determinação em defender a guerra usando as medidas mais severas causou pobreza generalizada e agitação no país; desta forma, a notícia de sua morte foi motivo de regojizo nas partes mais afetadas. Apesar dos temores iniciais de que o assassinato pudesse estar ligado a uma revolta geral, verificou-se que Bellingham havia agido sozinho, protestando contra o tratamento que recebeu do governo alguns anos antes, quando foi preso na Rússia devido a uma dívida comercial. A falta de remorso de Bellingham e a aparente certeza de que sua ação era justificada levantaram questões sobre sua sanidade, mas em seu julgamento ele foi considerado legalmente responsável por suas ações.\r\n\r\nApós a morte de Perceval, o Parlamento estabeleceu uma generosa pensão para sua viúva e filhos, também aprovando a construção de monumentos para homenageá-lo. Além disso, seu ministério foi logo esquecido, suas políticas revertidas, e Perceval é geralmente mais conhecido pelo modo de sua morte do que por quaisquer de suas conquistas. Posteriormente, historiadores caracterizaram o julgamento e a execução apressados de Bellingham como contrários aos princípios da justiça. A possibilidade de que ele estava agindo como parte de uma conspiração, em nome de um consórcio de comerciantes de Liverpool hostil às políticas econômicas de Perceval, foi o tema de um estudo de 2012.',0);
/*!40000 ALTER TABLE `tbl_texto_sobreloja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_nivel_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(225) NOT NULL,
  `login_usuario` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_nivel_usuario` (`id_nivel_usuario`),
  CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_nivel_usuario`) REFERENCES `tbl_nivel_usuario` (`id_nivel_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (14,10,'pedro','202cb962ac59075b964b07152d234b70','pedro',1),(15,10,'marcel','202cb962ac59075b964b07152d234b70','marcel',1),(16,11,'NOEMI','202cb962ac59075b964b07152d234b70','NOEMI',1);
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-10 16:54:23
