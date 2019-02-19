CREATE DATABASE  IF NOT EXISTS `matekgyak` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `matekgyak`;
-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: matekgyak
-- ------------------------------------------------------
-- Server version	10.1.8-MariaDB

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'Egy egyszerű int id',
  `usr_email` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '255 karaketes email cím\n',
  `usr_lstnm` varchar(64) COLLATE utf8_bin NOT NULL COMMENT 'A felhasználó keresztneve.',
  `usr_fstnm` varchar(128) COLLATE utf8_bin NOT NULL COMMENT 'A felhasználó vezetékneve\n',
  `usr_pwd` varchar(45) COLLATE utf8_bin DEFAULT '6367C48DD193D56EA7B0BAAD25B19455E529F5EE' COMMENT 'A jelszó sha1',
  `pwdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `usrlstlogin` datetime DEFAULT CURRENT_TIMESTAMP,
  `usr_name` varchar(128) CHARACTER SET utf8 DEFAULT NULL COMMENT 'A felhasználó neve, egyediséget követelünk :).',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `usr_name_UNIQUE` (`usr_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bejelnetkezésre hivatott felhasználók alapadatai.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (0,'peter.steingart@renault.hu','Péter','Steingart','F38B498ACA22ABD53C7316F73E8FB8A48865BD44','2019-02-18 12:23:48','2019-02-18 12:23:48','ax07057');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'matekgyak'
--

--
-- Dumping routines for database 'matekgyak'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_GET_PWD_FOR_USRNM` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`ax07057`@`localhost` PROCEDURE `sp_GET_PWD_FOR_USRNM`(IN usrNm VARCHAR(128))
    READS SQL DATA
    DETERMINISTIC
    COMMENT 'Rövid comment a tárolt eljárásról'
BEGIN
-- <nn>
-- Leaírás a tárolt eljárás logikájáról, lépéseiról
    -- +-----------------------------------------------------------------------------+
    -- |POSTGRESQL átírás: ???                                                       |
    -- +-----------------------------------------------------------------------------+
    -- |MS SQL SEVER átírás: ???                                                     |
    -- +-----------------------------------------------------------------------------+
-- </nn>


-- <nn>
--  A valós kód...
-- </nn>
SELECT * FROM matekgyak.users WHERE usr_name = usrNm;
-- <nn>
--  A létrhozó utasítás lezárása.
-- </nn> 

-- <nn>
--  Logolás.
-- </nn>
-- SET @dsc = 'Event napi törlés';
-- SET @tbl = 'több';
-- SET @u = 'EVENT';
-- SET @note = 'A 200 napnál régebbi tételek törölve az LIKP-PS/LTAK-AP/VBRK-RP/VEKP-PO táblákból.';


-- CALL sp_ADD_LOG(@dsc,@tbl,@u,@note);


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-18 14:05:05
