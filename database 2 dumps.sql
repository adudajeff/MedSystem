/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.26 : Database - forge
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`forge` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `forge`;

/*Table structure for table `appointment` */

DROP TABLE IF EXISTS `appointment`;

CREATE TABLE `appointment` (
  `PatientId` int(18) NOT NULL,
  `Appointmentdate` date DEFAULT NULL,
  `Start` time DEFAULT NULL,
  `End` time DEFAULT NULL,
  `Physician` varchar(250) DEFAULT NULL,
  `Condition` varchar(250) DEFAULT NULL,
  `hosptal` int(11) DEFAULT NULL,
  `TherapyStartDate` date DEFAULT NULL,
  `hosptalId` int(11) DEFAULT NULL,
  `Note` text,
  `status` varchar(50) DEFAULT NULL,
  `postponed` varchar(50) DEFAULT NULL,
  `Postponementdate` date DEFAULT NULL,
  `postponementreason` text,
  `AppointmentID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`PatientId`,`AppointmentID`),
  KEY `AppointmentID` (`AppointmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `appointment` */

insert  into `appointment`(`PatientId`,`Appointmentdate`,`Start`,`End`,`Physician`,`Condition`,`hosptal`,`TherapyStartDate`,`hosptalId`,`Note`,`status`,`postponed`,`Postponementdate`,`postponementreason`,`AppointmentID`) values (1,'2019-06-26','07:59:15','07:59:15','2','fever',NULL,'2019-06-26',1,'nothing',NULL,NULL,NULL,NULL,4),(3,'2019-06-28','01:27:15','01:27:15','2','xxxx',NULL,'2019-06-28',1,'nothing',NULL,NULL,NULL,NULL,6),(7,'2019-06-27','10:30:45','10:30:45','3','xxx',NULL,'2019-06-27',2,'nothing',NULL,NULL,NULL,NULL,5);

/*Table structure for table `billsum` */

DROP TABLE IF EXISTS `billsum`;

CREATE TABLE `billsum` (
  `billno` int(11) NOT NULL,
  `billdetail` varchar(250) DEFAULT NULL,
  `invoiceno` int(18) DEFAULT NULL,
  `billamount` decimal(10,0) DEFAULT NULL,
  `billdate` date DEFAULT NULL,
  `Patientid` int(18) DEFAULT NULL,
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `Paymentstatus` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`billno`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2018712349 DEFAULT CHARSET=latin1;

/*Data for the table `billsum` */

insert  into `billsum`(`billno`,`billdetail`,`invoiceno`,`billamount`,`billdate`,`Patientid`,`id`,`Paymentstatus`) values (190225059,'aghakana hostpatal',677222,'6150','2019-06-25',1,2018712345,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'4000','2019-05-11',1,2018712329,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'5600','2019-05-11',1,2018712330,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'15540','2019-05-11',1,2018712331,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'130640','2019-05-11',1,2018712332,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'4000','2019-05-11',1,2018712333,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'1900','2019-05-11',1,2018712334,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'17500','2019-05-11',1,2018712335,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'146','2019-05-11',1,2018712336,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'4000','2019-05-11',1,2018712337,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'651','2019-05-11',1,2018712338,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'1600','2019-05-11',1,2018712339,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'1900','2019-05-11',1,2018712340,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'4000','2019-05-11',1,2018712341,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'4000','2019-05-11',1,2018712342,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'880','2019-05-11',1,2018712343,NULL),(2018712327,'M.P. SHAH HOSPITAL',2018712327,'4000','2019-05-11',1,2018712344,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'6000','2019-05-11',1,2018712346,NULL),(2018712327,'Needle G21',45545453,'2000','2019-06-26',8,2018712347,NULL),(2018712327,'EXAMINATION GLOVES(LATEX) MEDIUM',4554545,'50000','2019-06-26',8,2018712348,NULL);

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `CountryCode` varchar(50) DEFAULT NULL,
  `Country` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `country` */

insert  into `country`(`CountryCode`,`Country`) values ('KEN','KENYA'),('UG','UGANDA'),('ITA','ITALIAN'),('TAN','TANZANIA'),('SPANI','SPANIARD');

/*Table structure for table `cover` */

DROP TABLE IF EXISTS `cover`;

CREATE TABLE `cover` (
  `coverid` int(18) NOT NULL AUTO_INCREMENT,
  `covername` varchar(250) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `coverno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`coverid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cover` */

insert  into `cover`(`coverid`,`covername`,`Description`,`coverno`) values (1,'AAR','AAR INSURANCE',NULL),(2,'SF','SOLIDARITY FUND',NULL),(3,'IMS','IMS FUND',NULL);

/*Table structure for table `doctor` */

DROP TABLE IF EXISTS `doctor`;

CREATE TABLE `doctor` (
  `docid` int(18) NOT NULL AUTO_INCREMENT,
  `doctorname` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `hosptalid` int(18) DEFAULT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `doctor` */

insert  into `doctor`(`docid`,`doctorname`,`email`,`mobile`,`hosptalid`) values (1,'Maliga','maliga@gmail.com','0725811554',1),(2,'Peter Kagwanja','adusoftjeff@gmail.com','0725811554',2),(3,'ABWAO VINCENT','abwao@fortunekenya.com','072581155',2),(4,'JOHN WASONGA','geofrey@fortunekenya.com','0725811554',1);

/*Table structure for table `documents` */

DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents` (
  `Patientid` int(18) DEFAULT NULL,
  `document` varchar(250) DEFAULT NULL,
  `datecreated` date DEFAULT NULL,
  `invoiceno` varchar(250) DEFAULT NULL,
  `documenttype` varchar(250) DEFAULT NULL,
  `hosptalid` varchar(250) DEFAULT NULL,
  `docid` int(18) NOT NULL AUTO_INCREMENT,
  `Paymentstatus` varchar(50) DEFAULT NULL,
  `Amount` double NOT NULL DEFAULT '0',
  `Invoicedate` date DEFAULT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `documents` */

insert  into `documents`(`Patientid`,`document`,`datecreated`,`invoiceno`,`documenttype`,`hosptalid`,`docid`,`Paymentstatus`,`Amount`,`Invoicedate`) values (1,'1_invoice_1_invoice_1_invoice_7.jpg','2019-05-11','2018712327','INV','1',1,'PAID',0,NULL),(3,'3_invoice_181138326.jpg','2019-05-20','35553535','INV','1',2,'PAID',0,NULL),(2,'2_invoice_Machine1 SNNO.jpg','2019-06-02','INV0002','INV','1',3,'PAID',0,NULL),(2,'2_invoice_camera-backup.jpg','2019-06-22','2018707817','INV','1',4,NULL,0,NULL),(2,'2_invoice_Machine1 SNNO.jpg','2019-06-25','677222','INV','1',5,NULL,0,NULL),(4,'4_invoice_Machine2 SNO.jpg','2019-06-26','2080712327','INV','1',6,NULL,687,NULL),(8,'8_invoice_Machine1 SNNO.jpg','2019-06-26','4554545','INV','2',7,NULL,1000,NULL),(1,'1_invoice_NYONGESA JOHN.pdf','2019-06-26','23333322','INV','2',8,NULL,2034,'2019-06-26'),(8,'8_invoice_Machine1 SNNO.jpg','2019-06-26','45545453','INV','2',9,NULL,1000,NULL);

/*Table structure for table `documenttype` */

DROP TABLE IF EXISTS `documenttype`;

CREATE TABLE `documenttype` (
  `type` varchar(50) NOT NULL,
  `documenttype` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `documenttype` */

insert  into `documenttype`(`type`,`documenttype`) values ('DSF','DISCHARGE FORM'),('INV','INVOICE'),('RCT','RECEIPT');

/*Table structure for table `hosptal` */

DROP TABLE IF EXISTS `hosptal`;

CREATE TABLE `hosptal` (
  `hosptalid` int(18) NOT NULL AUTO_INCREMENT,
  `hosptalname` varchar(250) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `mobile` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`hosptalid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hosptal` */

insert  into `hosptal`(`hosptalid`,`hosptalname`,`email`,`mobile`) values (1,'MPASHAH HOSPTAL',NULL,NULL),(2,'NAIROBI HOSPTAL','adusoftjeff@gmail.com','0725811554'),(3,'COPTIC HOSPITAL','admin@admin.com','0725811554');

/*Table structure for table `insurancecover` */

DROP TABLE IF EXISTS `insurancecover`;

CREATE TABLE `insurancecover` (
  `PatientId` int(18) NOT NULL,
  `startdate` date DEFAULT NULL,
  `expirydate` date DEFAULT NULL,
  `coverid` int(18) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `TransId` int(11) NOT NULL AUTO_INCREMENT,
  `reconamount` decimal(18,0) DEFAULT '0',
  PRIMARY KEY (`TransId`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

/*Data for the table `insurancecover` */

insert  into `insurancecover`(`PatientId`,`startdate`,`expirydate`,`coverid`,`status`,`amount`,`TransId`,`reconamount`) values (1,'2019-03-31','2020-03-30',1,'PAID','100000',1,'100000'),(2,'2019-03-31','2020-03-30',1,'PAID','100000',2,NULL),(3,'2019-03-31','2020-03-30',1,'PAID','100000',3,NULL),(4,'2019-03-31','2020-03-30',1,'PAID','100000',4,NULL),(7,'2019-03-31','2020-03-30',1,'PAID','100000',5,NULL),(8,'2019-03-31','2020-03-30',1,'PAID','100000',6,NULL),(9,'2019-03-31','2020-03-30',1,'PAID','100000',7,NULL),(10,'2019-03-31','2020-03-30',1,'PAID','100000',8,NULL),(11,'2019-03-31','2020-03-30',1,'PAID','100000',9,NULL),(12,'2019-03-31','2020-03-30',1,'PAID','100000',10,NULL),(13,'2019-03-31','2020-03-30',1,'PAID','100000',11,NULL),(14,'2019-03-31','2020-03-30',1,'PAID','100000',12,NULL),(15,'2019-03-31','2020-03-30',1,'PAID','100000',13,NULL),(16,'2019-03-31','2020-03-30',1,'PAID','100000',14,NULL),(17,'2019-03-31','2020-03-30',1,'PAID','100000',15,NULL),(18,'2019-03-31','2020-03-30',1,'PAID','100000',16,NULL),(20,'2019-03-31','2020-03-30',1,'PAID','100000',17,NULL),(21,'2019-03-31','2020-03-30',1,'PAID','100000',18,NULL),(22,'2019-03-31','2020-03-30',1,'PAID','100000',19,NULL),(23,'2019-03-31','2020-03-30',1,'PAID','100000',20,NULL),(24,'2019-03-31','2020-03-30',1,'PAID','100000',21,NULL),(25,'2019-03-31','2020-03-30',1,'PAID','100000',22,NULL),(26,'2019-03-31','2020-03-30',1,'PAID','100000',23,NULL),(27,'2019-03-31','2020-03-30',1,'PAID','100000',24,NULL),(28,'2019-03-31','2020-03-30',1,'PAID','100000',25,NULL),(29,'2019-03-31','2020-03-30',1,'PAID','100000',26,NULL),(30,'2019-03-31','2020-03-30',1,'PAID','100000',27,NULL),(31,'2019-03-31','2020-03-30',1,'PAID','100000',28,NULL),(32,'2019-03-31','2020-03-30',1,'PAID','100000',29,NULL),(33,'2019-03-31','2020-03-30',1,'PAID','100000',30,NULL),(34,'2019-03-31','2020-03-30',1,'PAID','100000',31,NULL),(35,'2019-03-31','2020-03-30',1,'PAID','100000',32,NULL),(36,'2019-03-31','2020-03-30',1,'PAID','100000',33,NULL),(37,'2019-03-31','2020-03-30',1,'PAID','100000',34,NULL),(38,'2019-03-31','2020-03-30',1,'PAID','100000',35,NULL),(39,'2019-03-31','2020-03-30',1,'PAID','100000',36,NULL),(40,'2019-03-31','2020-03-30',1,'PAID','100000',37,NULL),(41,'2019-03-31','2020-03-30',1,'PAID','100000',38,NULL),(42,'2019-03-31','2020-03-30',1,'PAID','100000',39,NULL),(43,'2019-03-31','2020-03-30',1,'PAID','100000',40,NULL),(44,'2019-03-31','2020-03-30',1,'PAID','100000',41,NULL),(45,'2019-03-31','2020-03-30',1,'PAID','100000',42,NULL),(46,'2019-03-31','2020-03-30',1,'PAID','100000',43,NULL),(47,'2019-03-31','2020-03-30',1,'PAID','100000',44,NULL),(48,'2019-03-31','2020-03-30',1,'PAID','100000',45,NULL),(49,'2019-03-31','2020-03-30',1,'PAID','100000',46,NULL),(50,'2019-03-31','2020-03-30',1,'PAID','100000',47,NULL),(51,'2019-03-31','2020-03-30',1,'PAID','100000',48,NULL),(52,'2019-03-31','2020-03-30',1,'PAID','100000',49,NULL),(53,'2019-03-31','2020-03-30',1,'PAID','100000',50,NULL),(54,'2019-03-31','2020-03-30',1,'PAID','100000',51,NULL),(55,'2019-03-31','2020-03-30',1,'PAID','100000',52,NULL),(56,'2019-03-31','2020-03-30',1,'PAID','100000',53,NULL),(57,'2019-03-31','2020-03-30',1,'PAID','100000',54,NULL),(58,'2019-03-31','2020-03-30',1,'PAID','100000',55,NULL),(59,'2019-03-31','2020-03-30',1,'PAID','100000',56,NULL),(60,'2019-03-31','2020-03-30',1,'PAID','100000',57,NULL),(61,'2019-03-31','2020-03-30',1,'PAID','100000',58,NULL),(62,'2019-03-31','2020-03-30',1,'PAID','100000',59,NULL),(63,'2019-03-31','2020-03-30',1,'PAID','100000',60,NULL),(64,'2019-03-31','2020-03-30',1,'PAID','100000',61,NULL),(65,'2019-03-31','2020-03-30',1,'PAID','100000',62,NULL),(66,'2019-03-31','2020-03-30',1,'PAID','100000',63,NULL),(67,'2019-03-31','2020-03-30',1,'PAID','100000',64,NULL),(68,'2019-03-31','2020-03-30',1,'PAID','100000',65,NULL),(69,'2019-03-31','2020-03-30',1,'PAID','100000',66,NULL),(70,'2019-03-31','2020-03-30',1,'PAID','100000',67,NULL),(71,'2019-03-31','2020-03-30',1,'PAID','100000',68,NULL),(72,'2019-03-31','2020-03-30',1,'PAID','100000',69,NULL),(73,'2019-03-31','2020-03-30',1,'PAID','100000',70,NULL),(74,'2019-03-31','2020-03-30',1,'PAID','100000',71,NULL),(75,'2019-03-31','2020-03-30',1,'PAID','100000',72,NULL),(76,'2019-03-31','2020-03-30',1,'PAID','100000',73,NULL),(77,'2019-03-31','2020-03-30',1,'PAID','100000',74,NULL),(78,'2019-03-31','2020-03-30',1,'PAID','100000',75,NULL),(79,'2019-03-31','2020-03-30',1,'PAID','100000',76,NULL),(80,'2019-03-31','2020-03-30',1,'PAID','100000',77,NULL),(81,'2019-03-31','2020-03-30',1,'PAID','100000',78,NULL),(82,'2019-03-31','2020-03-30',1,'PAID','100000',79,NULL),(83,'2019-03-31','2020-03-30',1,'PAID','100000',80,NULL),(84,'2019-03-31','2020-03-30',1,'PAID','100000',81,NULL),(85,'2019-03-31','2020-03-30',1,'PAID','100000',82,NULL),(1,'2019-01-01','2020-12-01',2,'PAID','15040',83,NULL),(2,'2019-01-01','2020-12-01',2,'PAID','15040',84,NULL),(3,'2019-01-01','2020-12-01',2,'PAID','15040',85,NULL),(4,'2019-01-01','2020-12-01',2,'PAID','15040',86,NULL),(7,'2019-01-01','2020-12-01',2,'PAID','15040',87,NULL),(8,'2019-01-01','2020-12-01',2,'PAID','15040',88,NULL),(9,'2019-01-01','2020-12-01',2,'PAID','15040',89,NULL),(10,'2019-01-01','2020-12-01',2,'PAID','15040',90,NULL),(11,'2019-01-01','2020-12-01',2,'PAID','15040',91,NULL),(12,'2019-01-01','2020-12-01',2,'PAID','15040',92,NULL),(13,'2019-01-01','2020-12-01',2,'PAID','15040',93,NULL),(14,'2019-01-01','2020-12-01',2,'PAID','15040',94,NULL),(15,'2019-01-01','2020-12-01',2,'PAID','15040',95,NULL),(16,'2019-01-01','2020-12-01',2,'PAID','15040',96,NULL),(17,'2019-01-01','2020-12-01',2,'PAID','15040',97,NULL),(18,'2019-01-01','2020-12-01',2,'PAID','15040',98,NULL),(20,'2019-01-01','2020-12-01',2,'PAID','15040',99,NULL),(21,'2019-01-01','2020-12-01',2,'PAID','15040',100,NULL),(22,'2019-01-01','2020-12-01',2,'PAID','15040',101,NULL),(23,'2019-01-01','2020-12-01',2,'PAID','15040',102,NULL),(24,'2019-01-01','2020-12-01',2,'PAID','15040',103,NULL),(25,'2019-01-01','2020-12-01',2,'PAID','15040',104,NULL),(26,'2019-01-01','2020-12-01',2,'PAID','15040',105,NULL),(27,'2019-01-01','2020-12-01',2,'PAID','15040',106,NULL),(28,'2019-01-01','2020-12-01',2,'PAID','15040',107,NULL),(29,'2019-01-01','2020-12-01',2,'PAID','15040',108,NULL),(30,'2019-01-01','2020-12-01',2,'PAID','15040',109,NULL),(31,'2019-01-01','2020-12-01',2,'PAID','15040',110,NULL),(32,'2019-01-01','2020-12-01',2,'PAID','15040',111,NULL),(33,'2019-01-01','2020-12-01',2,'PAID','15040',112,NULL),(34,'2019-01-01','2020-12-01',2,'PAID','15040',113,NULL),(35,'2019-01-01','2020-12-01',2,'PAID','15040',114,NULL),(36,'2019-01-01','2020-12-01',2,'PAID','15040',115,NULL),(37,'2019-01-01','2020-12-01',2,'PAID','15040',116,NULL),(38,'2019-01-01','2020-12-01',2,'PAID','15040',117,NULL),(39,'2019-01-01','2020-12-01',2,'PAID','15040',118,NULL),(40,'2019-01-01','2020-12-01',2,'PAID','15040',119,NULL),(41,'2019-01-01','2020-12-01',2,'PAID','15040',120,NULL),(42,'2019-01-01','2020-12-01',2,'PAID','15040',121,NULL),(43,'2019-01-01','2020-12-01',2,'PAID','15040',122,NULL),(44,'2019-01-01','2020-12-01',2,'PAID','15040',123,NULL),(45,'2019-01-01','2020-12-01',2,'PAID','15040',124,NULL),(46,'2019-01-01','2020-12-01',2,'PAID','15040',125,NULL),(47,'2019-01-01','2020-12-01',2,'PAID','15040',126,NULL),(48,'2019-01-01','2020-12-01',2,'PAID','15040',127,NULL),(49,'2019-01-01','2020-12-01',2,'PAID','15040',128,NULL),(50,'2019-01-01','2020-12-01',2,'PAID','15040',129,NULL),(51,'2019-01-01','2020-12-01',2,'PAID','15040',130,NULL),(52,'2019-01-01','2020-12-01',2,'PAID','15040',131,NULL),(53,'2019-01-01','2020-12-01',2,'PAID','15040',132,NULL),(54,'2019-01-01','2020-12-01',2,'PAID','15040',133,NULL),(55,'2019-01-01','2020-12-01',2,'PAID','15040',134,NULL),(56,'2019-01-01','2020-12-01',2,'PAID','15040',135,NULL),(57,'2019-01-01','2020-12-01',2,'PAID','15040',136,NULL),(58,'2019-01-01','2020-12-01',2,'PAID','15040',137,NULL),(59,'2019-01-01','2020-12-01',2,'PAID','15040',138,NULL),(60,'2019-01-01','2020-12-01',2,'PAID','15040',139,NULL),(61,'2019-01-01','2020-12-01',2,'PAID','15040',140,NULL),(62,'2019-01-01','2020-12-01',2,'PAID','15040',141,NULL),(63,'2019-01-01','2020-12-01',2,'PAID','15040',142,NULL),(64,'2019-01-01','2020-12-01',2,'PAID','15040',143,NULL),(65,'2019-01-01','2020-12-01',2,'PAID','15040',144,NULL),(66,'2019-01-01','2020-12-01',2,'PAID','15040',145,NULL),(67,'2019-01-01','2020-12-01',2,'PAID','15040',146,NULL),(68,'2019-01-01','2020-12-01',2,'PAID','15040',147,NULL),(69,'2019-01-01','2020-12-01',2,'PAID','15040',148,NULL),(70,'2019-01-01','2020-12-01',2,'PAID','15040',149,NULL),(71,'2019-01-01','2020-12-01',2,'PAID','15040',150,NULL),(72,'2019-01-01','2020-12-01',2,'PAID','15040',151,NULL),(73,'2019-01-01','2020-12-01',2,'PAID','15040',152,NULL),(74,'2019-01-01','2020-12-01',2,'PAID','15040',153,NULL),(75,'2019-01-01','2020-12-01',2,'PAID','15040',154,NULL),(76,'2019-01-01','2020-12-01',2,'PAID','15040',155,NULL),(77,'2019-01-01','2020-12-01',2,'PAID','15040',156,NULL),(78,'2019-01-01','2020-12-01',2,'PAID','15040',157,NULL),(79,'2019-01-01','2020-12-01',2,'PAID','15040',158,NULL),(80,'2019-01-01','2020-12-01',2,'PAID','15040',159,NULL),(81,'2019-01-01','2020-12-01',2,'PAID','15040',160,NULL),(82,'2019-01-01','2020-12-01',2,'PAID','15040',161,NULL),(83,'2019-01-01','2020-12-01',2,'PAID','15040',162,NULL),(84,'2019-01-01','2020-12-01',2,'PAID','15040',163,NULL),(85,'2019-01-01','2020-12-01',2,'PAID','15040',164,NULL);

/*Table structure for table `insurancecover$` */

DROP TABLE IF EXISTS `insurancecover$`;

CREATE TABLE `insurancecover$` (
  `PatientId` double DEFAULT NULL,
  `startdate` timestamp(6) NULL DEFAULT NULL,
  `expirydate` timestamp(6) NULL DEFAULT NULL,
  `coverid` double DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `insurancecover$` */

insert  into `insurancecover$`(`PatientId`,`startdate`,`expirydate`,`coverid`,`status`,`amount`) values (1,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(2,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(3,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(4,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(7,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(8,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(9,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(10,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(11,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(12,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(13,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(14,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(15,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(16,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(17,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(18,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(20,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(21,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(22,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(23,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(24,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(25,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(26,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(27,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(28,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(29,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(30,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(31,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(32,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(33,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(34,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(35,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(36,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(37,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(38,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(39,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(40,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(41,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(42,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(43,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(44,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(45,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(46,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(47,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(48,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(49,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(50,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(51,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(52,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(53,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(54,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(55,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(56,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(57,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(58,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(59,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(60,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(61,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(62,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(63,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(64,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(65,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(66,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(67,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(68,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(69,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(70,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(71,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(72,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(73,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(74,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(75,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(76,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(77,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(78,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(79,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(80,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(81,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(82,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(83,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(84,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000),(85,'2019-03-31 00:00:00.000000','2020-03-30 00:00:00.000000',1,'NULL',100000);

/*Table structure for table `mbillsum` */

DROP TABLE IF EXISTS `mbillsum`;

CREATE TABLE `mbillsum` (
  `billno` int(11) NOT NULL AUTO_INCREMENT,
  `billdetail` varchar(250) DEFAULT NULL,
  `invoiceno` int(18) DEFAULT NULL,
  `billamount` decimal(10,0) DEFAULT NULL,
  `billdate` date DEFAULT NULL,
  `Patientid` int(18) DEFAULT NULL,
  `description` text,
  `createdby` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`billno`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `mbillsum` */

insert  into `mbillsum`(`billno`,`billdetail`,`invoiceno`,`billamount`,`billdate`,`Patientid`,`description`,`createdby`) values (2,NULL,2018712327,NULL,'2019-05-11',1,'Bill Detail for 12018712327','aduda Geofrey'),(3,NULL,677222,NULL,'2019-06-25',1,'Bill Detail for 1677222','aduda Geofrey'),(4,NULL,4554545,NULL,'2019-06-26',8,'Bill Detail for 84554545','BR. JOSEPH WAMALWA'),(5,NULL,2080712327,NULL,'2019-03-04',4,'Bill Detail for 42080712327','FR. NICOLA FOGLIACCO');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (3,'2014_10_12_000000_create_users_table',1),(4,'2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `Patientid` int(11) DEFAULT NULL,
  `notification` text,
  `description` varchar(250) DEFAULT NULL,
  `datecreated` date DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `timecreated` time DEFAULT NULL,
  `id` int(18) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

/*Data for the table `notifications` */

insert  into `notifications`(`Patientid`,`notification`,`description`,`datecreated`,`type`,`timecreated`,`id`) values (1,'New Apointment has been Created Starting 2019-05-11','New Appointment Creation','2019-05-14','Reminder','09:40:26',1),(9999,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-05-14','Notific','11:50:02',2),(9999,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-03','Notific','06:46:21',3),(9999,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-03','Notific','06:57:25',4),(1,'New Apointment has been Created Starting 2019-05-11','New Appointment Creation','2019-06-06','Reminder','02:48:35',5),(1,'New Apointment has been Created Starting 2019-05-11','New Appointment Creation','2019-06-06','Reminder','02:48:44',6),(8,'New Apointment has been Created Starting 2019-07-18','New Appointment Creation','2019-06-23','Reminder','08:57:03',7),(1,'New Apointment has been Created Starting 2019-06-24','New Appointment Creation','2019-06-24','Reminder','06:21:10',8),(1,'New Apointment has been Created Starting 2019-06-24','New Appointment Creation','2019-06-24','Reminder','06:21:30',9),(8,'New Apointment has been Created Starting 2019-07-18','New Appointment Creation','2019-06-24','Reminder','06:21:40',10),(53,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','01:40:02',11),(25,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','01:50:28',12),(51,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','01:51:07',13),(14,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','01:52:22',14),(74,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','01:53:31',15),(68,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','01:54:20',16),(30,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','01:54:59',17),(50,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','01:56:11',18),(63,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','01:56:39',19),(72,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','01:58:46',20),(77,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:00:16',21),(10,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:01:05',22),(49,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:01:34',23),(32,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:02:13',24),(52,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:02:46',25),(38,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:04:04',26),(15,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:04:24',27),(22,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:05:12',28),(65,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:05:31',29),(36,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:06:10',30),(43,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:06:39',31),(34,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:07:08',32),(66,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:08:23',33),(56,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:09:04',34),(47,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:10:33',35),(13,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:10:58',36),(31,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:11:28',37),(70,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:12:42',38),(76,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:13:11',39),(57,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:13:32',40),(42,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-24','Notific','02:14:01',41),(1,'New Apointment has been Created Starting 2019-06-26','New Appointment Creation','2019-06-26','Reminder','04:59:41',42),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','07:31:11',43),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','07:31:46',44),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','07:32:53',45),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','07:34:13',46),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','07:35:48',47),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','07:40:13',48),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','07:44:55',49),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','07:46:03',50),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','07:49:21',51),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','07:54:21',52),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','07:55:00',53),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','08:02:34',54),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','08:03:08',55),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','08:04:20',56),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','08:04:47',57),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','08:08:36',58),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','08:09:16',59),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','08:17:05',60),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','08:23:44',61),(7,'New Apointment has been Created Starting 2019-06-27','New Appointment Creation','2019-06-27','Reminder','08:34:15',62),(3,'New Apointment has been Created Starting 2019-06-28','New Appointment Creation','2019-06-28','Reminder','10:27:16',63),(2,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-29','Notific','04:52:22',64),(2,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-29','Notific','04:53:40',65),(2,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-29','Notific','04:55:47',66),(2,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-29','Notific','05:34:38',67),(2,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-30','Notific','07:54:42',68),(2,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-30','Notific','07:55:12',69);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values ('adusoftjeff@gmail.com','$2y$10$AvaoO3eX7benfNVrW3eNk.snThbY7AEwJ5yrgSSq6KMzR.CjD4qxy','2019-06-30 07:26:16');

/*Table structure for table `patient` */

DROP TABLE IF EXISTS `patient`;

CREATE TABLE `patient` (
  `PatientId` int(18) NOT NULL AUTO_INCREMENT,
  `IMSNO` decimal(18,0) NOT NULL,
  `FirstName` varchar(250) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `Address` text,
  `MobileNo` varchar(250) DEFAULT NULL,
  `InsuranceID` int(11) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `GroupNo` int(11) DEFAULT NULL,
  `CountryCode` varchar(50) DEFAULT NULL,
  `OptionNo` int(20) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `MaritalStatus` varchar(50) DEFAULT NULL,
  `BloodGroup` varchar(50) DEFAULT NULL,
  `BloodPressure` varchar(250) DEFAULT NULL,
  `Sugar` varchar(250) DEFAULT NULL,
  `Condition` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Picture` varchar(500) DEFAULT NULL,
  `Nationality` varchar(250) DEFAULT NULL,
  `AARno` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`PatientId`,`IMSNO`),
  UNIQUE KEY `PatientId` (`PatientId`,`IMSNO`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

/*Data for the table `patient` */

insert  into `patient`(`PatientId`,`IMSNO`,`FirstName`,`LastName`,`Address`,`MobileNo`,`InsuranceID`,`DOB`,`Age`,`GroupNo`,`CountryCode`,`OptionNo`,`Gender`,`MaritalStatus`,`BloodGroup`,`BloodPressure`,`Sugar`,`Condition`,`Email`,`Picture`,`Nationality`,`AARno`) values (2,'80023000783','SIMON','FR. WAMBUA MUNYOKI','XXXXx','xxxx',NULL,'1959-01-01',60,4,'KEN',4,'Not Applicable','Not Applicable','NOT DEFINED','NONE','NONE','NONE','x@gmail.com','avatar.png','KEN',NULL),(3,'80023000785','FORESE','FR. GILBERTO','XXXXXX','XXX',NULL,'1941-01-03',NULL,4,'KEN',4,'Not Applicable','Not Applicable','NOT DEFINED','XXXX','XXXX','XXX','x@gmail.com','avatar.png','ITA',NULL),(4,'80023000788','FR. NICOLA','FOGLIACCO','XXXX','XXX',NULL,'1938-06-01',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXX','XXXX','XXXXX','x@gmail.com','avatar.png','ITA',NULL),(7,'80023000789','FR. ROBERTO','SIBILIA','NA','XXX',NULL,'1951-03-04',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','ITA',NULL),(8,'80023000793','BR. JOSEPH','WAMALWA','NA','XXX',NULL,'1974-03-05',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(9,'80023000797','FR.JOHN','PETER NJOROGE','NA','XXX',NULL,'1953-01-09',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(10,'80023000802','FR.MURUGARA','JACKSON','NA','XXX',NULL,'1970-07-04',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','FR.MURUGARA_profilepic_Fr. Jackson Murugara.jpg','KEN',NULL),(11,'80023000803','FR.ALBERICO','ZANATTA','NA','XXX',NULL,'1943-06-06',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(12,'80023000808','FR.EGIDIO','PEDENZINI','NA','XXX',NULL,'1939-08-06',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(13,'80023000814','FR.ENRIQUE','RITUERTO','NA','XXX',NULL,'1945-01-15',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','FR.ENRIQUE_profilepic_Fr. nrique Rituerto.jpg','SPANI',NULL),(14,'80023000818','FR.RIBOLI','ANGELO','NA','XXX',NULL,'1951-12-05',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','FR.RIBOLI_profilepic_Fr. Angelo Riboli.jpg','KEN',NULL),(15,'80023000820','FR.JOSEPH','WAITHAKA','NA','XXX',NULL,'1960-12-05',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','FR.JOSEPH_profilepic_Fr. Joseph Waithaka.jpg','KEN',NULL),(16,'80023000822','FR.ORAZIO','MAZZUCCHI','NA','XXX',NULL,'1940-05-13',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','ITA',NULL),(17,'80023000825','FR.ANTONIO','BIANCHI','NA','XXX',NULL,'1922-06-13',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','ITA',NULL),(18,'80023000829','FR.GUMERSINDO','RUIZ MANZANEDO','NA','XXX',NULL,'1943-08-11',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','SPANI',NULL),(20,'80023000833','Fr. Maina','Tarcisio','NA','XXX',0,'1956-08-12',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(21,'80023000835','Fr. Gerardo','Martinelli','NA','XXX',0,'1941-05-16',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(22,'80023000838','Fr. Hieronymus','Joya','NA','XXX',0,'1965-04-17',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Hieronymus_profilepic_Fr. Joya Hieronimus.jpg','KEN',NULL),(23,'80023000842','Fr. Lacchin','Mario ','NA','XXX',0,'1935-10-12',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(24,'80023000843','Fr. Aldo','Giuliani','NA','XXX',0,'1940-10-13',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(25,'80023000844','Br. Wekesa','Kenneth','NA','XXX',0,'1968-08-15',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Br. Wekesa_profilepic_Br. Kenneth Wekesa.jpg','KEN',NULL),(26,'80023000847','Fr. Angelo','Fantacci','NA','XXX',0,'1924-10-14',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(27,'80023000848','Fr. Chrispine','Agunja','NA','XXX',0,'1968-08-16',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(28,'80023000851','Fr. Michael','Njagi','NA','XXX',0,'1964-11-13',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(29,'80023000856','Fr. Ottone','Cantore','NA','XXX',0,'1944-04-23',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(30,'80023000857','Fr. Charles','Jjagwe','NA','XXX',0,'1970-02-25',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Charles_profilepic_Fr. Chalse JJague.JPG','KEN',NULL),(31,'80023000858','Fr. Libana','Paschal','NA','XXX',0,'1959-07-21',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Libana_profilepic_Fr. Pascal Libana.jpg','KEN',NULL),(32,'80023000865','Fr. John Irungu','Muragu','NA','XXX',0,'1963-10-20',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. John Irungu_profilepic_Fr. John Muragu.jpg','KEN',NULL),(33,'80023000867','Fr. Eugenio','Ferrari','NA','XXX',0,'1940-02-29',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(34,'80023000871','Fr. Marino','Gemma','NA','XXX',0,'1964-09-23',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Marino_profilepic_Fr. marino Gemma.jpg','KEN',NULL),(35,'80023000872','Fr. Kanyuguto Ndirangu','Andrew','NA','XXX',0,'1967-12-20',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(36,'80023000873','Fr. Leo','Bagenda','NA','XXX',0,'1960-10-22',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Leo_profilepic_Fr. Leo Bagenda.jpg','KEN',NULL),(37,'80023000876','Fr. Anthony','Magnante','NA','XXX',0,'1944-09-24',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(38,'80023000883','Fr. Joseph Omondi','Oguok','NA','XXX',0,'1970-07-28',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Joseph Omondi_profilepic_Fr. Joseph Omondi Oguok.jpg','KEN',NULL),(39,'80023000885','Fr. Mino','Vaccari','NA','XXX',0,'1930-08-28',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(40,'80023000886','Fr. Joseph Otieno','Omullubi','NA','XXX',0,'1954-06-30',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(41,'80023000888','Fr. Stephen','Mugo','NA','XXX',0,'1953-11-26',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(42,'80023000889','Fr. Stephen','Korambu','NA','XXX',0,'1969-12-26',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Stephen_profilepic_Fr. Stephen Korambo.jpg','KEN',NULL),(43,'80023000892','Fr. Luigi','Brambilla','NA','XXX',0,'1939-12-28',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Luigi_profilepic_Fr. Luigi Brambilla.jpg','KEN',NULL),(44,'80023002469','Fr. Lucas Ogola','Juma','NA','XXX',0,'1976-06-25',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(45,'80023002470','Fr. Kariuki','Peter','NA','XXX',0,'1966-11-16',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(46,'80023002471','Fr. Zachariah','King\'aru','NA','XXX',0,'1953-03-05',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(47,'80023002473','Fr. Nicholas Makau','Mutunga','NA','XXX',0,'1973-06-27',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Nicholas Makau_profilepic_Fr. Nikolus Makau.jpg','KEN',NULL),(48,'80023002478','Fr. Michael Mutaku','Njue','NA','XXX',0,'1956-08-20',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(49,'80023002483','Fr. Ndonga Dede','Jacob','NA','XXX',0,'1964-12-28',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Ndonga Dede_profilepic_Fr. jacob Ndonga.jpg','KEN',NULL),(50,'80023002486','Fr. Davie','Kibirango Deogratias','NA','XXX',0,'1965-11-11',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Davie_profilepic_Fr. Deogratias Kibirango.jpg','KEN',NULL),(51,'80023002807','Br. Mark','Waweru','NA','XXX',0,'1965-01-09',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Br. Mark_profilepic_Br. Mark Waweru.jpg','KEN',NULL),(52,'80023003669','Fr. Kihwaga','Joseph','NA','XXX',0,'1973-07-07',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Kihwaga_profilepic_Fr. Joseph Kihwaga.jpg','KEN',NULL),(53,'80023003954','Br.Clarence','Lukungu','NA','07000000000',0,'1980-08-23',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Br.Clarence_profilepic_Br. Clarnce Lukungu.jpg','KEN',NULL),(54,'80023004380','Fr. David Mbugua','Ngigi','NA','XXX',0,'1978-04-28',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(55,'80023004895','Fr. Zacchaeus Okoth','Alaroh','NA','XXX',0,'1978-05-05',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(56,'80023004898','Fr. Magak Arose','Matthew','NA','0725811554',0,'1963-10-12',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Magak Arose_profilepic_Fr. Matthew Magak.jpg','KEN',NULL),(57,'80023005015','Fr. Wachira','Samuel','NA','XXX',0,'1972-08-13',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Wachira_profilepic_Fr. Samuel Wachira.jpg','KEN',NULL),(58,'80023007037','Fr. Gabriel Clement  ','Odwori','NA','XXX',0,'1969-02-27',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(59,'80023007040','Fr. Deogratias Lyimo','Mtika','NA','XXX',0,'1977-11-02',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(60,'80023007041','Fr. Alexander Nthenge','Muthengi','NA','XXX',0,'1983-05-25',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(61,'80023007043','Fr. Stanley Thinwa','Muriuki ','NA','XXX',0,'1976-09-15',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(62,'80023007222','Fr. Charles','Muwanga','NA','XXX',0,'1984-03-03',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(63,'80023007223','Fr.  Evans Mochama','Mogwanchi','NA','XXX',0,'1979-06-03',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr.  Evans Mochama_profilepic_Fr. Evans Mchama.jpg','KEN',NULL),(64,'80023007225','Fr. Urbanus Ndunda','Mutunga','NA','XXX',0,'1973-06-27',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(65,'80023008215','Fr. Gichure Mwangi','Julius','NA','XXX',0,'1970-09-25',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Gichure Mwangi_profilepic_Fr. Julius Gichure.jpg','KEN',NULL),(66,'80023008216','Fr. Kirema Kamwara','Mathew','NA','XXX',0,'1980-12-01',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Kirema Kamwara_profilepic_Fr. Mathew Kirema.jpg','KEN',NULL),(67,'80023008217','Fr. Raphael Miring\'u','Miru','NA','XXX',0,'1972-03-14',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(68,'80023008220','Fr. Joseph Caesar','Walusimbi','NA','XXX',0,'1983-01-20',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Joseph Caesar_profilepic_Fr. Cezar Walusimbi.jpg','KEN',NULL),(69,'80023109259','Fr. Bernard Dennis','Ofwono ','NA','XXX',0,'1975-07-23',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(70,'80023109260','Fr. Paul Ngatia','Maina','NA','XXX',0,'1968-07-05',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Paul Ngatia_profilepic_Fr. Paul maina Ngatia.jpg','KEN',NULL),(71,'80023109261','Fr. Timothy Maguithi','Mugecha','NA','XXX',0,'1973-11-04',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(72,'80023110900','Fr. Geoffrey Kimathi','Kiria','NA','XXX',0,'1977-12-02',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Geoffrey Kimathi_profilepic_Fr. Geofrey Kiria.jpg','KEN',NULL),(73,'80023110901','Fr. Joseph Khaemba','Mang\'ong\'o','NA','XXX',0,'1965-07-16',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(74,'80023110902','Fr. Bernard Maina','Mwangi','NA','XXX',0,'1975-05-06',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Bernard Maina_profilepic_Fr. Bernad Mwangi.jpg','KEN',NULL),(75,'80023110903','Br. Daniel','Ndihu','NA','XXX',0,'1959-03-25',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(76,'80023110904','Fr. Samuel Kariuki','Nyagah','NA','XXX',0,'1979-01-07',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Samuel Kariuki_profilepic_Fr. Samuel Nyagah.jpg','KEN',NULL),(77,'80023110906','Fr. Gordon Osina','Okoth','NA','XXX',0,'1973-07-10',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','Fr. Gordon Osina_profilepic_Fr. Gordon Okoth.jpg','KEN',NULL),(78,'80023111114','Deacon Bonface Ochieng','Mutanda','NA','XXX',0,'1985-01-26',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(79,'80023111117','Fr. Deonicious Mututa','Mugo','NA','XXX',0,'1982-04-18',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(80,'80023111118','Fr. Paul Otieno','Onyango','NA','XXX',0,'1982-12-10',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(81,'81',' Fr. Joakim','Kamau ','NA','XXX',0,'1982-12-10',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(82,'82','Fr. Stephen','Okelo ','NA','XXX',0,'1982-12-10',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(83,'80023007380','Bro.John Gachoki','Kariuki','NA','XXX',0,'1987-07-10',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(84,'80023007221','Fr. Jude Katende','Kamya','NA','XXX',0,'1973-06-01',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL),(85,'80023111116','Fr. Josephat Mwendwa','Mwanake','NA','XXX',0,'1982-01-05',0,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','avatar.png','KEN',NULL);

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `userid` int(11) NOT NULL,
  `patients` int(11) DEFAULT NULL,
  `doctors` int(11) DEFAULT NULL,
  `appointments` int(11) DEFAULT NULL,
  `billing` int(11) DEFAULT NULL,
  `covermanagement` int(11) DEFAULT NULL,
  `documents` int(11) DEFAULT NULL,
  `reconciliation` int(11) DEFAULT NULL,
  `reports` int(11) DEFAULT NULL,
  `settings` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_roles` */

insert  into `user_roles`(`userid`,`patients`,`doctors`,`appointments`,`billing`,`covermanagement`,`documents`,`reconciliation`,`reports`,`settings`) values (1,1,1,1,1,1,1,1,1,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `patients` int(11) DEFAULT '0',
  `doctors` int(11) DEFAULT '0',
  `appointments` int(11) DEFAULT '0',
  `billing` int(11) DEFAULT '0',
  `covermanagement` int(11) DEFAULT '0',
  `documents` int(11) DEFAULT '0',
  `reconciliation` int(11) DEFAULT '0',
  `reports` int(11) DEFAULT '0',
  `settings` int(11) DEFAULT '0',
  `Picture` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`,`patients`,`doctors`,`appointments`,`billing`,`covermanagement`,`documents`,`reconciliation`,`reports`,`settings`,`Picture`) values (1,'aduda Geofrey','adusoftjeff@gmail.com','$2y$12$1b/142w6XJodJthW9/CwAepUO1RsNm10lNQsSot.BuW/ylx24QQKy','7Y3fV1I08VBiTMgznbthAWYZMjlD4HA7sYsYgzsoxU9BKtsNA81H0HrNBzJY','2019-05-11 13:01:06','2019-05-11 13:01:15',1,1,1,1,1,1,1,1,1,'_profilepic__profilepic_jeff.jpg'),(56,'Magak Arose','magak@gmail.com','$2y$10$LyxC6IwjJYnbpBhsJ00bwupQELZGn8NBzJWmZONrmfUGse.RzJf4e','waGJY37NQ21LXZLn96iqXSpaZiytCeeXQ9uFYo6VoeoPHiy7StP13QtzOQws','2019-06-27 19:12:57','2019-06-27 19:12:57',1,1,1,1,1,1,1,1,1,NULL),(100,'GEOFREY ONYANGO','geofrey@fortunekenya.com','$2y$10$XfWqAiAA3KJwedwecpt0sOLcAHsGpIH1QhAkxVg607FUk3cJYs9zm','pK3TRxQggqtwikqvantVTn8s2zcZLkTrZncdGbDL1rRyuTvmJAUOvJ7BRA1D','2019-05-13 13:05:23','2019-05-13 13:05:23',1,1,1,1,1,1,1,1,1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
