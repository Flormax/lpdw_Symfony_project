-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: symfonyblog
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `art_content` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `art_postDate` date NOT NULL,
  `art_userId` int(11) DEFAULT NULL,
  `art_categoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`art_id`),
  UNIQUE KEY `UNIQ_23A0E664B8FD6C8` (`art_title`),
  KEY `IDX_23A0E662B090630` (`art_userId`),
  KEY `IDX_23A0E66A9762E39` (`art_categoryId`),
  CONSTRAINT `FK_23A0E662B090630` FOREIGN KEY (`art_userId`) REFERENCES `user` (`use_id`),
  CONSTRAINT `FK_23A0E66A9762E39` FOREIGN KEY (`art_categoryId`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (30,'Article 5','<p>Etiam sit amet elit sit amet orci euismod mattis. Praesent nec dignissim mi. Donec pharetra metus ut magna lacinia rutrum. Morbi lacinia nunc tortor. Pellentesque faucibus consectetur ex nec semper. Aliquam erat volutpat. Mauris nec lectus arcu. Nulla diam leo, accumsan id urna ut, tempus congue risus. Vestibulum mattis purus non sem scelerisque tempor. Curabitur nisl purus, bibendum a bibendum ac, lacinia dignissim dolor.</p>','2016-02-20',17,3),(32,'erhz','<p>ergz</p>','2016-02-27',17,4),(33,'Nibana - Ask the universe','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin velit est, maximus eu cursus sit amet, egestas vitae felis. Donec a lorem nec turpis rhoncus fermentum. Vestibulum diam mauris, dapibus a justo eu, viverra fringilla felis. Nullam ut tempus ligula. Morbi ullamcorper quis leo in euismod. Quisque eu erat gravida, convallis felis vel, aliquet justo. Pellentesque consectetur feugiat tortor sit ame<em><strong>t maximus. Donec enim arcu, tincidunt ac fermentum at, ullamcorper eget metus. Suspendisse viverra ullamcorper velit non cursus. Vestibulum orci neque, rutrum non felis vitae, fermentum blandit eros. Suspendisse libero dolor, vehicula posuere enim nec, ullamcorper finibus velit. Fusce quam d</strong></em>iam, ullamcorper vitae magna sit amet, porttitor consequat ex. Ut dictum arcu vel diam bibendum, eget luctus justo maximus. Quisque consequat lectus tincidunt, venenatis mi non, lobortis dui. Vestibulum sit amet lectus vitae urna consequat varius.</p>','2016-02-03',17,3),(34,'Nibana\'s birthday: 27/11/15','<p>Sed eget dui lacus. Phasellus sed gravida ligula. In commodo eleifend mauris, nec tincidunt mauris auctor non. Sed at enim at nisi pulvinar iaculis. In pellentesque, nunc a rhoncus tincidunt, sem quam sollicitudin orci, sed porta quam metus ut sem. Vivamus quis est ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare vulputate arcu ac rutrum. Nulla euismod suscipit tempus. Curabitur porta nibh purus, ullamcorper rutrum purus molestie sed.</p>','2015-11-17',17,2),(35,'Boom festival 2016','<p><u>Pellentesque pulvinar eros ut dolor commodo posuere.</u> Integer viverra non ante ut viverra. Aenean egestas lorem lectus, ac gravida justo auctor at. Morbi eget lectus consequat, hendrerit mi ut, rutrum metus. Donec vehicula eleifend vulputate. Sed non hendrerit sapien. Proin urna ante, gravida eget congue et, rhoncus cursus ipsum. Integer placerat arcu quis mauris gravida mollis<strong>. Vivamus posuere</strong> pulvinar mi, sed tempus turpis tristique at. Phasellus ac imperdiet neque. Donec eu risus ut sapien tincidunt bibendum. Ut ipsum nisl, finibus et molestie ut, sodales sed erat. Sed euismod quis turpis eu venenatis. Ut non erat facilisis, consequat quam ut, convallis tortor. Vivamus sed nibh tempus, aliquam augue pulvinar, cursus neque. Sed eu tincidunt nulla, id ullamcorper lorem.</p>','2016-02-07',17,1),(36,'Momento Demento Festival 2016','<p>Nulla lobortis urna volutpat justo rhoncus ullamcorper. Praesent non mauris sagittis, pulvinar nibh eget, efficitur leo. Etiam molestie, purus ac bibendum commodo, sem orci lobortis nibh, quis euismod dolor lorem sed lectus. Ut pretium euismod orci, eget mollis <strong><u>nunc volutpat</u></strong> in. Donec non enim consequat, tempus felis non, feugiat tellus. Suspendisse cursus blandit pellentesque. Integer pretium tempor velit id rhoncus. Phasellus at auctor est. Pellentesque eget tincidunt justo, eu ornare nibh. Nulla quam lorem, ullamcorper vitae lacus a, suscipit ultricies felis. In a eros vel lectus varius commodo at nec tellus. Suspendisse pharetra,<s> purus eu tempus volutpat, est est egestas lectus, ac tempor leo velit eget est.</s></p>','2016-02-03',17,1),(37,'OBYON','<p><u>Sed euismod sagittis eleifend. Praesent urna arcu, cursus id ligula et, consequat sodales tellus. Aenean arcu magna, malesuada in porttitor in, pellentesque in turpis. Praesent condimentum rutrum dui sed molestie. Sed tempor facilisis leo, sed tempus magna aliquet faucibus. Nulla molestie massa id nunc pretium fermentum. Maecenas porta, lorem quis interdum elementum, arcu tellus finibus lacus, iaculis finibus nisi mauris non metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum sed elementum lorem, egestas laoreet neque. Maecenas ipsum magna, cursus non dapibus vel, consectetur nec justo. Integer in egestas sapien. Quisque id augue quam. Sed tempor, est in rutrum commodo, diam velit rutrum ligula, vitae cursus leo massa et sem. Morbi ac molestie est. Sed et placerat metus. Proin pellentesque tincidunt fermentum</u>.</p>','2016-01-06',17,4),(38,'Universo Parallelo','<p>Nunc hendrerit sem id mi ultricies vehicula. Praesent sit amet lorem condimentum, iaculis lectus vel, pulvinar leo. Ut venenatis quam justo, a vulputate magna luctus id. Sed et felis in ligula porttitor semper. Curabitur fringilla auctor eros id elementum. Etiam et tellus scelerisque, consequat eros id, dictum lacus. Morbi pharetra accumsan dapibus. Aenean at commodo nisl. Nulla facilisi. In at nibh faucibus quam elementum mattis. Morbi id risus lacinia tortor cursus tincidunt. In ut sem hendrerit, rutrum ante at, consectetur nibh. Proin mollis, ipsum ac aliquet ultrices, risus urna aliquam leo, id lobortis est lorem id nisl.</p>','2016-01-05',17,1),(39,'Translucid II','<p>Vivamus lorem ex, aliquet nec malesuada sit amet, dapibus in dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis condimentum dolor eget leo vestibulum egestas. Nullam libero elit, auctor id nunc non, maximus interdum quam. Mauris eu pulvinar odio, at sollicitudin elit. Quisque quis posuere nisi, eu semper lectus. Donec sed efficitur turpis. Vestibulum ac sagittis dolor. Nullam tristique, libero sit amet dignissim tincidunt, arcu libero eleifend arcu, eu luctus ipsum arcu commodo neque. Aliquam suscipit tincidunt nisl sed consequat. Nunc maximus finibus tellus id dignissim. Sed suscipit tincidunt justo, nec finibus elit eleifend id. Phasellus vestibulum sed elit sed iaculis. Morbi condimentum felis sed velit euismod cursus. Etiam dignissim mauris mi, a sagittis nunc gravida vitae.</p>','2015-02-11',17,2),(40,'Fx23','<p>Morbi dignissim ante leo, ac mollis magna aliquet eu. Integer mauris lacus, lacinia sit amet elit ut, tempus mattis sapien. Sed egestas lacinia quam id lobortis. Suspendisse ut diam non orci dignissim rutrum vitae a tellus. Morbi bibendum lorem erat, volutpat tempor nibh semper vitae. Sed ultricies quam vitae sem fringilla rutrum. Sed in lacus lectus. Phasellus aliquam felis lacus, at posuere turpis tempus quis. Vestibulum ultricies fringilla commodo. Nam dolor tellus, hendrerit et enim sed, eleifend posuere nunc. Sed dictum tellus congue tellus pharetra dapibus. Praesent fermentum augue ut ipsum cursus, sit amet condimentum ex sagittis. Nam ac faucibus risus. Nunc lobortis a tellus sed volutpat. Nunc ac purus lobortis, hendrerit justo et, pretium libero. Mauris aliquet dapibus lacus, vel faucibus mauris blandit eu.</p>','2015-04-06',17,4),(41,'LE BLOG DE MAXIME','<p>Ceci est mon blog, on peut trouver sur la homepage les 5 derniers articles post&eacute;s.<br />\r\nSur l&#39;onglet all, tout les articles, pagin&eacute;s par 5 pour plus de vision de la fonctionnalit&eacute; que par 10..<br />\r\nSur cat&eacute;gorie, la liste des diff&eacute;rentes cat&eacute;gorie, avec un lien vers une liste des articles r&eacute;f&eacute;renc&eacute;es dans chaque.&nbsp;<br />\r\nL&#39;onglet recherche permet une recherche par nom, ou par tag, ou les deux (recherche de type &quot;r&eacute;sultat contenant&quot;).<br />\r\nLes onglets new article/cat&eacute;gory/tag permettent de cr&eacute;er les objets associ&eacute;s.<br />\r\nEt login/logout,... voila</p>','2016-02-15',17,1),(42,'TOTEMYSTIK festival','<p>Cras commodo justo mollis ipsum posuere pharetra. Aenean egestas nec odio vitae auctor. Donec tempor vulputate augue, consectetur accumsan purus dictum et. In sed pretium enim, vel vehicula nibh. Aliquam interdum nibh vel nisl pretium hendrerit. Integer semper est a ante dapibus, in sollicitudin lacus sagittis. Integer id ullamcorper sem. Sed lectus erat, finibus lacinia metus et, venenatis tristique nunc.</p>','2016-01-05',17,1);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `UNIQ_64C19C1431089B7` (`cat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (3,'Album release'),(4,'Artist presentation'),(1,'Festival'),(2,'One night event');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_target_id` int(11) DEFAULT NULL,
  `com_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_content` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `com_postDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`com_id`),
  KEY `IDX_9474526CC6531A59` (`com_target_id`),
  CONSTRAINT `FK_9474526CC6531A59` FOREIGN KEY (`com_target_id`) REFERENCES `article` (`art_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'ADMIN'),(2,'USER');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `UNIQ_389B783B02CC1B0` (`tag_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (8,'Deeptrance'),(4,'Downtempo'),(5,'Forest'),(3,'Full On'),(2,'Hitech'),(1,'Progressive'),(7,'Psydub'),(6,'Psytrance');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagging`
--

DROP TABLE IF EXISTS `tagging`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagging` (
  `tagging_articleId` int(11) NOT NULL,
  `tagging_tagId` int(11) NOT NULL,
  PRIMARY KEY (`tagging_articleId`,`tagging_tagId`),
  KEY `IDX_A4AED123180BEE99` (`tagging_articleId`),
  KEY `IDX_A4AED123A346FBBB` (`tagging_tagId`),
  CONSTRAINT `FK_A4AED123180BEE99` FOREIGN KEY (`tagging_articleId`) REFERENCES `article` (`art_id`),
  CONSTRAINT `FK_A4AED123A346FBBB` FOREIGN KEY (`tagging_tagId`) REFERENCES `tag` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagging`
--

LOCK TABLES `tagging` WRITE;
/*!40000 ALTER TABLE `tagging` DISABLE KEYS */;
INSERT INTO `tagging` VALUES (30,1),(30,4),(30,6),(32,7),(33,4),(33,8),(34,2),(34,5),(34,6),(35,1),(35,2),(35,3),(35,4),(35,5),(35,6),(35,7),(35,8),(36,1),(36,2),(36,3),(36,4),(36,5),(36,6),(36,7),(36,8),(37,4),(37,7),(37,8),(38,1),(38,2),(38,3),(38,4),(38,5),(38,6),(38,7),(38,8),(39,2),(39,5),(39,6),(40,2),(42,1),(42,3),(42,5),(42,7);
/*!40000 ALTER TABLE `tagging` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `use_mailAdress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `use_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `use_role` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`use_id`),
  UNIQUE KEY `UNIQ_8D93D649A7A59CF4` (`use_username`),
  UNIQUE KEY `UNIQ_8D93D649E5CF6252` (`use_mailAdress`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (17,'admin','admin@blog.fr','admin','a:2:{i:0;s:9:\"ROLE_USER\";i:1;s:10:\"ROLE_ADMIN\";}',1),(18,'user','user@blog.fr','user','a:1:{i:0;s:9:\"ROLE_USER\";}',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-15 23:23:56
