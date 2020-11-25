-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: Sys_judge
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `challenger`
--

DROP TABLE IF EXISTS `challenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `challenger` (
  `ch_id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_FirstName` varchar(40) DEFAULT NULL,
  `ch_LastName` varchar(40) DEFAULT NULL,
  `ch_UserName` varchar(40) DEFAULT NULL,
  `ch_email` varchar(40) DEFAULT NULL,
  `ch_password` varchar(40) DEFAULT NULL,
  `ch_Adress` varchar(60) DEFAULT NULL,
  `ch_country` varchar(40) DEFAULT NULL,
  `ch_tel` varchar(20) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  PRIMARY KEY (`ch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `challenger`
--

LOCK TABLES `challenger` WRITE;
/*!40000 ALTER TABLE `challenger` DISABLE KEYS */;
INSERT INTO `challenger` VALUES (1,'abdelmoula','bouchreb','escanor','abdelmoulabouchareb12@gmail.com','9214678',NULL,NULL,'0639809519','male');
/*!40000 ALTER TABLE `challenger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fields` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`field_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fields`
--

LOCK TABLES `fields` WRITE;
/*!40000 ALTER TABLE `fields` DISABLE KEYS */;
INSERT INTO `fields` VALUES (1,'PHP'),(2,'C'),(3,'PROBLEM SOLVING'),(4,'JAVASCRIPT'),(5,'SHELL'),(6,'SQL'),(7,'OOP');
/*!40000 ALTER TABLE `fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lang_field`
--

DROP TABLE IF EXISTS `lang_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lang_field` (
  `lang_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  PRIMARY KEY (`lang_id`,`field_id`),
  KEY `field_id` (`field_id`),
  CONSTRAINT `lang_field_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`lang_id`),
  CONSTRAINT `lang_field_ibfk_2` FOREIGN KEY (`field_id`) REFERENCES `fields` (`field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lang_field`
--

LOCK TABLES `lang_field` WRITE;
/*!40000 ALTER TABLE `lang_field` DISABLE KEYS */;
INSERT INTO `lang_field` VALUES (1,2),(1,3),(2,3),(2,7),(3,3),(3,7),(4,3),(4,7),(5,3),(6,3),(6,7),(7,3),(8,3),(9,3),(9,7),(10,3),(10,7),(11,3),(11,4),(12,3),(12,4),(13,3),(14,3),(15,3),(16,1),(16,3),(16,7),(17,3),(17,7),(18,3),(18,7),(19,3),(20,3),(21,3),(22,3),(23,3),(24,3);
/*!40000 ALTER TABLE `lang_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(22) DEFAULT NULL,
  `lang_arg` varchar(22) DEFAULT NULL,
  `pr_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`lang_id`),
  KEY `pr_id` (`pr_id`),
  CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`pr_id`) REFERENCES `problems` (`pr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'C','C',NULL),(2,'C++','CPP',NULL),(3,'C++11','CPP11',NULL),(4,'C++14','CPP14',NULL),(5,'Clojure','CLOJURE',NULL),(6,'C#','CSHARP',NULL),(7,'Go','GO',NULL),(8,'Haskell','HASKELL',NULL),(9,'Java','JAVA',NULL),(10,'Java8','JAVA8',NULL),(11,'JavaScript(Rhino)','JAVASCRIPT',NULL),(12,'JavaScript(Nodejs)','JAVASCRIPT_NODE',NULL),(13,'ObjectiveC','OBJECTIVEC',NULL),(14,'Pascal','PASCAL',NULL),(15,'Perl','PERL',NULL),(16,'PHP','PHP',NULL),(17,'Python2','PYTHON',NULL),(18,'Python3','PYTHON3',NULL),(19,'R','R',NULL),(20,'Ruby','RUBY',NULL),(21,'Rust','RUST',NULL),(22,'Scala','SCALA',NULL),(23,'Swift','SWIFT',NULL),(24,'Swift4.1','SWIFT_4_1',NULL),(26,NULL,NULL,65);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prob_field`
--

DROP TABLE IF EXISTS `prob_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prob_field` (
  `pr_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `pr_name` varchar(40) DEFAULT NULL,
  `field_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pr_id`,`field_id`),
  KEY `field_id` (`field_id`),
  CONSTRAINT `prob_field_ibfk_1` FOREIGN KEY (`pr_id`) REFERENCES `problems` (`pr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prob_field`
--

LOCK TABLES `prob_field` WRITE;
/*!40000 ALTER TABLE `prob_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `prob_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prob_lang_set`
--

DROP TABLE IF EXISTS `prob_lang_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prob_lang_set` (
  `pr_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `pb_title` text DEFAULT NULL,
  `lang_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pr_id`,`lang_id`),
  KEY `lang_id` (`lang_id`),
  CONSTRAINT `prob_lang_set_ibfk_1` FOREIGN KEY (`pr_id`) REFERENCES `problems` (`pr_id`),
  CONSTRAINT `prob_lang_set_ibfk_2` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prob_lang_set`
--

LOCK TABLES `prob_lang_set` WRITE;
/*!40000 ALTER TABLE `prob_lang_set` DISABLE KEYS */;
INSERT INTO `prob_lang_set` VALUES (68,1,NULL,NULL),(75,16,'one one two','PHP'),(77,16,'','PHP'),(78,1,'test c compiler','C');
/*!40000 ALTER TABLE `prob_lang_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problems` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `pr_title` varchar(50) DEFAULT NULL,
  `pr_description` text DEFAULT NULL,
  `pr_level` enum('easy','meduim','hard','expert','god') DEFAULT NULL,
  `pr_input` text DEFAULT NULL,
  `pr_output` text DEFAULT NULL,
  `path` text DEFAULT NULL,
  `pr_language` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`pr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problems`
--

LOCK TABLES `problems` WRITE;
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
INSERT INTO `problems` VALUES (1,'','',NULL,'','',NULL,NULL),(2,'jckjdskfjs','<p>l;dksf;lksl;dkf</p>',NULL,'125','151',NULL,NULL),(3,'kjdsfks','werwerwerwe','hard','1254','112548',NULL,NULL),(4,'kjdsfks','werwerwerwe','hard','1254','112548',NULL,NULL),(5,'kjdsfks','werwerwerwe','hard','1254','112548',NULL,NULL),(6,'kjdsfks','werwerwerwe','hard','1254','112548',NULL,NULL),(7,'kjdsfks','werwerwerwe','hard','1254','112548',NULL,NULL),(8,'fact','werwerwerwe','hard','1254','112548',NULL,NULL),(9,'power','werwerwerwe','','1254','112548',NULL,NULL),(10,'fact999','werwerwerwe','god','1254','112548',NULL,NULL),(11,'palying with chars','<p><strong>Input Format</strong></p><p>First, take a character, as input.<br>Then take the string, as input.<br>Lastly, take the sentence as input.</p><p><strong>Constraints</strong></p><p>Strings for and will have fewer than 100 characters, including the newline.</p><p><strong>Output Format</strong></p><p>Print three lines of output. The first line prints the character, .<br>The second line prints the string, .<br>The third line prints the sentence, .</p>',NULL,'125','151',NULL,NULL),(12,'ldkfjkldsj','',NULL,'dsfsd','sdfs',NULL,NULL),(13,'ldkfjkldsj','<p><strong>Objective</strong></p><p>This challenge will help you to learn how to take a character, a string and a sentence as input in C.</p><p>To take a single character as input, you can use scanf(\"%c\", &amp;ch ); and printf(\"%c\", ch) writes a character specified by the argument char to stdout</p><p>char ch;\r\nscanf(\"%c\", &amp;ch);\r\nprintf(\"%c\", ch);\r\n</p><p>This piece of code prints the character .</p><p>You can take a string as input in C using scanf(“%s”, s). But, it accepts string only until it finds the first space.</p><p>In order to take a line as input, you can use scanf(\"%[^\\n]%*c\", s); where is defined as char s[MAX_LEN] where is the maximum size of . Here, [] is the scanset character. ^\\n stands for taking input until a newline isn\'t encountered. Then, with this %*c, it reads the newline character and here, the used * indicates that this newline character is discarded.</p><p><strong>Note:</strong> The statement: scanf(\"%[^\\n]%*c\", s); will not work because the last statement will read a newline character, \\n, from the previous line. This can be handled in a variety of ways. One way is to use scanf(\"\\n\"); before the last statement.</p><p><strong>Task</strong></p>',NULL,'dsfsd','sdfs',NULL,NULL),(14,'test33','<p><strong>Objective</strong></p><p>This challenge will help you to learn how to take a character, a string and a sentence as input in C.</p><p>To take a single character as input, you can use scanf(\"%c\", &amp;ch ); and printf(\"%c\", ch) writes a character specified by the argument char to stdout</p><p>char ch;\r\nscanf(\"%c\", &amp;ch);\r\nprintf(\"%c\", ch);\r\n</p><p>This piece of code prints the character .</p><p>You can take a string as input in C using scanf(“%s”, s). But, it accepts string only until it finds the first space.</p><p>In order to take a line as input, you can use scanf(\"%[^\\n]%*c\", s); where is defined as char s[MAX_LEN] where is the maximum size of . Here, [] is the scanset character. ^\\n stands for taking input until a newline isn\'t encountered. Then, with this %*c, it reads the newline character and here, the used * indicates that this newline character is discarded.</p><p><strong>Note:</strong> The statement: scanf(\"%[^\\n]%*c\", s); will not work because the last statement will read a newline character, \\n, from the previous line. This can be handled in a variety of ways. One way is to use scanf(\"\\n\"); before the last statement.</p><p><strong>Task</strong></p>',NULL,'nsd','fsdf',NULL,NULL),(15,'','',NULL,'','',NULL,NULL),(16,'','',NULL,'','',NULL,NULL),(17,'','',NULL,'','',NULL,NULL),(18,'factroral number','',NULL,'','',NULL,NULL),(19,'factroral number','',NULL,'','',NULL,NULL),(20,'factroral number','',NULL,'','',NULL,NULL),(21,'','',NULL,'','',NULL,NULL),(22,'','',NULL,'','',NULL,NULL),(23,'','',NULL,'','',NULL,NULL),(24,'','',NULL,'','',NULL,NULL),(25,'','',NULL,'','',NULL,NULL),(26,'','',NULL,'','',NULL,NULL),(27,'','',NULL,'','',NULL,NULL),(28,'','',NULL,'','',NULL,NULL),(29,'','',NULL,'','',NULL,NULL),(30,'','',NULL,'','',NULL,NULL),(31,'','',NULL,'','',NULL,NULL),(32,'','',NULL,'','',NULL,NULL),(33,'','',NULL,'','',NULL,NULL),(34,'','',NULL,'','',NULL,NULL),(35,'','',NULL,'','',NULL,NULL),(36,'','',NULL,'','',NULL,NULL),(37,'','',NULL,'','',NULL,NULL),(38,'','',NULL,'','',NULL,NULL),(39,'','',NULL,'','',NULL,NULL),(40,'','',NULL,'','',NULL,NULL),(41,'','',NULL,'','',NULL,NULL),(42,'','',NULL,'','',NULL,NULL),(43,'','',NULL,'','',NULL,NULL),(44,'','',NULL,'','',NULL,NULL),(45,'factorial_number','',NULL,'','',NULL,NULL),(46,'factorial_number','',NULL,'','',NULL,NULL),(47,'atoi problem','',NULL,'','',NULL,NULL),(48,'atoi problem','',NULL,'','',NULL,NULL),(49,'xxxxxxxxxxxxxxxx','',NULL,'','',NULL,NULL),(50,'xxxxxxxxxxxxxxxx','',NULL,'','',NULL,NULL),(51,'xxxxxxxxxxxxxxxx','',NULL,'','',NULL,NULL),(52,'xxxxxxxxxxxxxxxx','',NULL,'','',NULL,NULL),(53,'xxxxxxxxxxxxxxxx','',NULL,'','',NULL,NULL),(54,'xxxxxxxxxxxxxxxx','',NULL,'','',NULL,NULL),(55,'xxxxxxxxxxxxxxxx','',NULL,'','',NULL,NULL),(56,'xxxxxxxxxxxxxxxx','',NULL,'','','uploaded/problems_items/xxxxxxxxxxxxxxxx_56',NULL),(57,'xxxxxxxxxxxxxxxx','',NULL,'','','uploaded/problems_items/xxxxxxxxxxxxxxxx_57',NULL),(58,'','',NULL,'','','uploaded/problems_items/_58',NULL),(59,'first setup','',NULL,'','','uploaded/problems_items/first_setup_59',NULL),(60,'','',NULL,'','','uploaded/problems_items/_60',NULL),(61,'','',NULL,'','','uploaded/problems_items/_61',NULL),(62,'','',NULL,'','','uploaded/problems_items/_62',NULL),(63,'','',NULL,'','','uploaded/problems_items/_63',NULL),(64,'','',NULL,'','','uploaded/problems_items/_64',NULL),(65,'test test 1','',NULL,'','','uploaded/problems_items/test_test_1_65',NULL),(66,'test test 1','',NULL,'','','uploaded/problems_items/test_test_1_66',NULL),(67,'test test 1','',NULL,'','','uploaded/problems_items/test_test_1_67',NULL),(68,'test test 1','',NULL,'','','uploaded/problems_items/test_test_1_68',NULL),(69,'dfklsd sdfsdf','',NULL,'','','uploaded/problems_items/dfklsd_sdfsdf_69',NULL),(70,'dfklsd sdfsdf','',NULL,'','','uploaded/problems_items/dfklsd_sdfsdf_70',NULL),(71,'dfklsd sdfsdf','',NULL,'','','uploaded/problems_items/dfklsd_sdfsdf_71',NULL),(72,'dfklsd sdfsdf','',NULL,'','','uploaded/problems_items/dfklsd_sdfsdf_72',NULL),(73,'','',NULL,'','','uploaded/problems_items/_73',NULL),(74,'one one two','',NULL,'','','uploaded/problems_items/one_one_two_74',NULL),(75,'one one two','',NULL,'','','uploaded/problems_items/one_one_two_75',NULL),(76,'first one test','',NULL,'','','uploaded/problems_items/first_one_test_76',NULL),(77,'','',NULL,'','','uploaded/problems_items/_77',NULL),(78,'test c compiler','',NULL,'','','uploaded/problems_items/test_c_compiler_78',NULL);
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solves`
--

DROP TABLE IF EXISTS `solves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solves` (
  `lang_name` varchar(24) DEFAULT NULL,
  `prob_category` varchar(50) DEFAULT NULL,
  `chall_id` int(11) NOT NULL,
  `prob_id` int(11) NOT NULL,
  PRIMARY KEY (`chall_id`,`prob_id`),
  KEY `prob_id` (`prob_id`),
  CONSTRAINT `solves_ibfk_1` FOREIGN KEY (`prob_id`) REFERENCES `problems` (`pr_id`),
  CONSTRAINT `solves_ibfk_2` FOREIGN KEY (`chall_id`) REFERENCES `challenger` (`ch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solves`
--

LOCK TABLES `solves` WRITE;
/*!40000 ALTER TABLE `solves` DISABLE KEYS */;
/*!40000 ALTER TABLE `solves` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-25 16:53:30
