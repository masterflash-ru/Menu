-- MySQL dump 10.13  Distrib 5.6.37, for FreeBSD11.0 (i386)
--
-- Host: localhost    Database: simba4
-- ------------------------------------------------------
-- Server version	5.6.37

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

delete from design_tables where table_name='menu';
delete from design_tables where table_name='menu';
INSERT INTO `design_tables` (`interface_name`, `table_name`, `table_type`, `col_name`, `caption_style`, `row_type`, `col_por`, `pole_spisok_sql`, `pole_global_const`, `pole_prop`, `pole_type`, `pole_style`, `pole_name`, `default_sql`, `functions_befo`, `functions_after`, `functions_befo_out`, `functions_befo_del`, `properties`, `value`, `validator`, `sort_item_flag`, `col_function_array`) VALUES 
  ('menu', 'menu', 1, '1,1,1,1,1,0', '', 0, 0, 'locale=\"$pole_dop0\" and sysname=\"$pole_dop1\"  order by poz', '', 'id,subid,level', '', '', '', '', '', '', '', '', '', '', 'menu', 1, ''),
  ('menu', 'menu', 1, '', '', 1, 1, '', '', 'onChange=this.form.submit()', '4', '', '', '', '', '', '\\Mf\\Menu\\Lib\\Func\\GetLocales', '', 'a:2:{i:0;s:1:\"0\";i:1;s:1:\"0\";}', '', '', 0, ''),
  ('menu', 'menu', 1, '', '', 1, 2, '', '', 'onChange=this.form.submit()', '4', '', '', '', '', '', '\\Mf\\Menu\\Lib\\Func\\GetMenuNames', '', 'a:2:{i:0;s:1:\"0\";i:1;s:1:\"0\";}', '', '', 0, ''),
  ('menu', 'menu', 1, 'locale', '', 2, 0, '', '', '', '0', '', 'pole_dop0', '', '', '', '', '', 'N;', '', 'N;', 0, ''),
  ('menu', 'menu', 1, 'sysname', '', 2, 0, '', '', '', '0', '', 'pole_dop1', '', '', '', '', '', 'N;', '', 'N;', 0, ''),
  ('menu', 'menu', 1, 'label', '', 2, 3, '', '', '', '2', '', 'label', '', '', '', '', '', 'a:1:{i:0;s:4:\"Text\";}', '', 'N;', 0, ''),
  ('menu', 'menu', 1, 'poz', '', 2, 1, '', '', 'size=2', '2', '', 'poz', '', '', '', '', '', 'a:1:{i:0;s:4:\"Text\";}', '', 'N;', 0, ''),
  ('menu', 'menu', 1, 'mvc', '', 2, 4, '', '', '', '4', '', 'mvc', '', '', '', '\\Mf\\Menu\\Lib\\Func\\GetMvc', '', 'a:2:{i:0;s:1:\"0\";i:1;s:1:\"1\";}', '', 'N;', 0, ''),
  ('menu', 'menu', 1, 'url', '', 2, 6, '', '', '', '2', '', 'url', '', '', '', '', '', 'a:1:{i:0;s:4:\"Text\";}', '', 'N;', 0, '');

INSERT INTO `design_tables_text_interfase` (`language`, `table_type`, `interface_name`, `item_name`, `text`) VALUES 
  ('ru_RU', 1, 'menu', 'coment0', ''),
  ('ru_RU', 1, 'menu', 'caption0', '<h1> меню на сайте</h1>'),
  ('ru_RU', 1, 'menu', 'caption_dop_0', 'Локаль:'),
  ('ru_RU', 1, 'menu', 'caption_dop_1', 'Имя меню:'),
  ('ru_RU', 1, 'menu', 'caption_col_label', 'Текст:'),
  ('ru_RU', 1, 'menu', 'caption_col_url', 'или URL');

--
-- Table structure for table `seolist`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subid` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `locale` char(20) NOT NULL COMMENT 'локаль',
  `sysname` char(50) NOT NULL DEFAULT '0' COMMENT 'имя меню',
  `label` char(255) NOT NULL,
  `poz` int(11) NOT NULL DEFAULT '0',
  `url` varchar(127) NOT NULL DEFAULT '',
  `mvc` char(255) DEFAULT NULL COMMENT 'состояние сайта в терминах роутеров Zend',
  PRIMARY KEY (`id`),
  KEY `subid` (`subid`,`level`),
  KEY `locale` (`locale`),
  KEY `sysname` (`sysname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 PACK_KEYS=0 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Dumping routines for database 'simba4'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

