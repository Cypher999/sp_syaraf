-- MariaDB dump 10.19  Distrib 10.4.19-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sp_syaraf
-- ------------------------------------------------------
-- Server version	10.4.19-MariaDB

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
-- Table structure for table `gej`
--
CREATE DATABASE IF NOT EXISTS `sp_syaraf`;
USE `sp_syaraf`;
DROP TABLE IF EXISTS `gej`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gej` (
  `kd_gej` varchar(4) NOT NULL,
  `nm_gej` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_gej`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gej`
--

LOCK TABLES `gej` WRITE;
/*!40000 ALTER TABLE `gej` DISABLE KEYS */;
INSERT INTO `gej` VALUES ('G1','sakit kepala yang hebat'),('G10','otot kaku'),('G11','gerakan tangan dan kaki yang aneh dan berulang'),('G12','sering kehilangan kesadaran'),('G13','mudah kebingungan'),('G14','wajah kaku'),('G2','demam tinggi'),('G3','leher kaku'),('G4','Mati rasa pada wajah'),('G5','Kesulitan berbicara'),('G6','lumpuh di beberapa bagian tubuh'),('G7','penglihatan  kabur'),('G8','sering kelelahan'),('G9','matirasa dibeberapa bagian tubuh');
/*!40000 ALTER TABLE `gej` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hasil_diag`
--

DROP TABLE IF EXISTS `hasil_diag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hasil_diag` (
  `kd_diag` varchar(5) NOT NULL,
  `nm_pasien` varchar(30) NOT NULL,
  `nm_pendiag` varchar(30) NOT NULL,
  `tgl` datetime NOT NULL,
  `kd_gej` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`kd_diag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hasil_diag`
--

LOCK TABLES `hasil_diag` WRITE;
/*!40000 ALTER TABLE `hasil_diag` DISABLE KEYS */;
INSERT INTO `hasil_diag` VALUES ('L6Mso','dass','sss','2021-07-16 04:08:11','G3'),('rxShC','dass','sss','2021-07-16 04:08:11','G1'),('x29C9','dass','sss','2021-07-16 04:08:11','G2');
/*!40000 ALTER TABLE `hasil_diag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penyakit`
--

DROP TABLE IF EXISTS `penyakit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penyakit` (
  `kd_pen` varchar(4) NOT NULL,
  `nm_pen` varchar(30) NOT NULL,
  `des_pen` varchar(500) NOT NULL,
  `kd_sol` varchar(255) NOT NULL,
  PRIMARY KEY (`kd_pen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penyakit`
--

LOCK TABLES `penyakit` WRITE;
/*!40000 ALTER TABLE `penyakit` DISABLE KEYS */;
INSERT INTO `penyakit` VALUES ('P1','meningitis','Meningitis atau radang selaput otak adalah salah satu jenis penyakit saraf yang kerap dialami seseorang, terutama pada bayi, anak-anak, dan remaja. Peradangan pada selaput otak ini umumnya disebabkan oleh infeksi virus atau bakteri, tetapi bisa juga  tetapi bisa juga terjadi akibat penyakit non-infeksi, seperti alergi obat atau sarkoidosis','9YwqN,lVHwH,xtL06'),('P2','Stroke','Stroke merupakan salah satu penyakit tidak menular penyebab kematian terbesar di dunia, termasuk di Indonesia. Penyakit saraf ini terjadi karena terganggunya pasokan darah ke otak akibat penyumbatan atau pecahnya pembuluh darah.\r\n\r\nKondisi ini menyebabkan','9yjRa,Cpzsw'),('P3','Multiple sclerosis','Penyakit sklerosis ganda atau multiple sclerosis adalah jenis penyakit saraf yang berisiko tinggi mengenai otak dan sumsum tulang belakang. Faktanya, penyakit saraf ini merupakan penyebab kecacatan paling umum pada orang-orang berusia 20–30 tahun.\r\n\r\nMultiple sclerosis bisa memengaruhi penglihatan, gerakan lengan atau kaki, dan keseimbangan tubuh penderitanya. \r\n\r\nPenyebab multiple sclerosis sejauh ini belum diketahui secara pasti. Namun, penyakit ini diduga terjadi akibat penyakit autoimun. Dal','MSfA4,yH777'),('P4','Epilepsi','Epilepsi atau yang biasa disebut dengan ayan adalah penyakit saraf akibat aktivitas listrik otak yang tidak normal. Penyakit ini bisa menyebabkan penderita mengalami kejang yang berulang tanpa pemicu yang jelas.\r\n\r\nKelainan pada aktivitas listrik otak bisa terjadi karena beberapa hal, antara lain trauma di kepala, gula darah yang sangat rendah, demam tinggi, dan pengaruh alkohol.','nBNgb,pCe49,Z6v2I'),('P5','Bell’s Palsy','Bell’s palsy adalah penyakit saraf yang menyebabkan kelemahan atau kelumpuhan sementara pada otot-otot di wajah. Kondisi ini terjadi ketika saraf perifer yang mengontrol otot wajah mengalami peradangan, pembengkakan, atau penekanan,Penyakit saraf merupakan penyakit yang cukup berbahaya yang bisa memengaruhi kualitas hidup penderitanya, bahkan bisa mengancam nyawa.','Hwk25,kbtIc,MmjdD,x4cL9');
/*!40000 ALTER TABLE `penyakit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rule`
--

DROP TABLE IF EXISTS `rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rule` (
  `kd_rule` varchar(5) NOT NULL,
  `kd_pen` varchar(5) NOT NULL,
  `kd_gej` varchar(4) DEFAULT NULL,
  `cek_gej` varchar(255) NOT NULL,
  PRIMARY KEY (`kd_rule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rule`
--

LOCK TABLES `rule` WRITE;
/*!40000 ALTER TABLE `rule` DISABLE KEYS */;
INSERT INTO `rule` VALUES ('14hQL','P3','G8','G7,G8,G9,G10'),('5gnzF','P4','G12','G11,G12,G13'),('5Nuwa','P4','G13','G11,G12,G13'),('9wARE','P2','G5','G4,G5,G6'),('DKLxp','P3','G7','G7,G8,G9,G10'),('gV03y','P1','G1','G1,G2,G3'),('iCdHp','P2','G6','G4,G5,G6'),('Jv2uo','P3','G10','G7,G8,G9,G10'),('LPuh1','P4','G11','G11,G12,G13'),('oClLd','P1','G3','G1,G2,G3'),('pOesj','P5','G14','G14'),('QIGA7','P2','G4','G4,G5,G6'),('vDI5n','P1','G2','G1,G2,G3'),('waKVZ','P3','G9','G7,G8,G9,G10');
/*!40000 ALTER TABLE `rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sol`
--

DROP TABLE IF EXISTS `sol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sol` (
  `kd_sol` varchar(5) NOT NULL,
  `sol` varchar(255) NOT NULL,
  PRIMARY KEY (`kd_sol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sol`
--

LOCK TABLES `sol` WRITE;
/*!40000 ALTER TABLE `sol` DISABLE KEYS */;
INSERT INTO `sol` VALUES ('6B3xR','Penyuntikan rtPA (recombinant tissue plasminogen activator) '),('9yjRa','berikan obat golongan statin, seperti atorvastatin, untuk menurunkan kadar kolesterol yang tinggi.'),('9YwqN','pastikan tubuh terhidrasi dengan baik'),('Cpzsw','berikan Obat antihipertensi digunakan untuk mengendalikan tekanan darah'),('Hwk25','pemberian obat pereda nyeri'),('kbtIc','pemberian Obat kortikosteroid'),('l5uZ9','berikan Obat antikoagulan'),('lVHwH','jangan berbagi barang pribadi'),('MmjdD','pemberian terapi fisik'),('MSfA4','pemberian obat anti inflamasi'),('nBNgb','obat anti konvulsan'),('pCe49','pemberian obat nyeri syaraf'),('x4cL9','pemberian obat antivirus'),('xtL06','pemberian vaksin meningitis'),('yH777','terapi fisik seperti akupuntur'),('Z6v2I','obat penenang'),('zxs94','Berikan Obat antiplatelet');
/*!40000 ALTER TABLE `sol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('AGh9g','Root','827ccb0eea8a706c4c34a16891f84e7b');
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

-- Dump completed on 2021-07-16 10:05:14
