/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.34-MariaDB : Database - forge
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `appointment` */

insert  into `appointment`(`PatientId`,`Appointmentdate`,`Start`,`End`,`Physician`,`Condition`,`hosptal`,`TherapyStartDate`,`hosptalId`,`Note`,`status`,`postponed`,`Postponementdate`,`postponementreason`,`AppointmentID`) values (1,'2019-05-11','01:07:45','01:07:45','1','fever',NULL,'1970-01-01',1,'nothing','SUSPENDED','Y','2019-05-15','xxxxxxxx',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2018712345 DEFAULT CHARSET=latin1;

/*Data for the table `billsum` */

insert  into `billsum`(`billno`,`billdetail`,`invoiceno`,`billamount`,`billdate`,`Patientid`,`id`,`Paymentstatus`) values (2018712327,'M.P. SHAH HOSPITAL=',2018712327,'4000','2019-05-11',1,2018712329,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'5600','2019-05-11',1,2018712330,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'15540','2019-05-11',1,2018712331,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'130640','2019-05-11',1,2018712332,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'4000','2019-05-11',1,2018712333,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'1900','2019-05-11',1,2018712334,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'17500','2019-05-11',1,2018712335,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'146','2019-05-11',1,2018712336,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'4000','2019-05-11',1,2018712337,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'651','2019-05-11',1,2018712338,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'1600','2019-05-11',1,2018712339,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'1900','2019-05-11',1,2018712340,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'4000','2019-05-11',1,2018712341,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'4000','2019-05-11',1,2018712342,NULL),(2018712327,'M.P. SHAH HOSPITAL=',2018712327,'880','2019-05-11',1,2018712343,NULL),(2018712327,'M.P. SHAH HOSPITAL',2018712327,'4000','2019-05-11',1,2018712344,NULL);

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
  PRIMARY KEY (`coverid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cover` */

insert  into `cover`(`coverid`,`covername`) values (1,'AAR INSURANCE'),(2,'Solidarity Fund');

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

insert  into `doctor`(`docid`,`doctorname`,`email`,`mobile`,`hosptalid`) values (1,'Maliga','maliga@gmail.com','0725811554',1),(2,'Peter Kagwanja','geofrey@fortunekenya.com','072581155',2),(3,'ABWAO VINCENT','abwao@fortunekenya.com','072581155',2),(4,'JOHN WASONGA','geofrey@fortunekenya.com','0725811554',1);

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
  PRIMARY KEY (`docid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `documents` */

insert  into `documents`(`Patientid`,`document`,`datecreated`,`invoiceno`,`documenttype`,`hosptalid`,`docid`,`Paymentstatus`) values (1,'1_invoice_1_invoice_1_invoice_7.jpg','2019-05-11','2018712327','INV','1',1,'PAID'),(3,'3_invoice_181138326.jpg','2019-05-20','35553535','INV','1',2,NULL),(2,'2_invoice_Machine1 SNNO.jpg','2019-06-02','INV0002','INV','1',3,NULL);

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
  PRIMARY KEY (`hosptalid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hosptal` */

insert  into `hosptal`(`hosptalid`,`hosptalname`) values (1,'MPASHAH HOSPTAL'),(2,'NAIROBI HOSPTAL');

/*Table structure for table `insurancecover` */

DROP TABLE IF EXISTS `insurancecover`;

CREATE TABLE `insurancecover` (
  `PatientId` int(18) NOT NULL,
  `startdate` date DEFAULT NULL,
  `expirydate` date DEFAULT NULL,
  `coverid` int(18) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`PatientId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `insurancecover` */

insert  into `insurancecover`(`PatientId`,`startdate`,`expirydate`,`coverid`,`status`,`amount`) values (1,'2019-05-11','2019-05-11',1,'SUSPENDED','300000');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `mbillsum` */

insert  into `mbillsum`(`billno`,`billdetail`,`invoiceno`,`billamount`,`billdate`,`Patientid`,`description`,`createdby`) values (2,NULL,2018712327,NULL,'2019-05-11',1,'Bill Detail for 12018712327','aduda Geofrey');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `notifications` */

insert  into `notifications`(`Patientid`,`notification`,`description`,`datecreated`,`type`,`timecreated`,`id`) values (1,'New Apointment has been Created Starting 2019-05-11','New Appointment Creation','2019-05-14','Reminder','09:40:26',1),(9999,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-05-14','Notific','11:50:02',2),(9999,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-03','Notific','06:46:21',3),(9999,'New Member|staff|Patient Created','New Member|staff|Patient Creation','2019-06-03','Notific','06:57:25',4),(1,'New Apointment has been Created Starting 2019-05-11','New Appointment Creation','2019-06-06','Reminder','02:48:35',5),(1,'New Apointment has been Created Starting 2019-05-11','New Appointment Creation','2019-06-06','Reminder','02:48:44',6);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

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
  `Picture` varchar(250) DEFAULT NULL,
  `Nationality` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`PatientId`,`IMSNO`),
  UNIQUE KEY `PatientId` (`PatientId`,`IMSNO`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `patient` */

insert  into `patient`(`PatientId`,`IMSNO`,`FirstName`,`LastName`,`Address`,`MobileNo`,`InsuranceID`,`DOB`,`Age`,`GroupNo`,`CountryCode`,`OptionNo`,`Gender`,`MaritalStatus`,`BloodGroup`,`BloodPressure`,`Sugar`,`Condition`,`Email`,`Picture`,`Nationality`) values (1,'0','Geofrey','Aduda',NULL,NULL,NULL,NULL,NULL,NULL,'KEN',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'adusoftjeff@gmail.com',NULL,NULL),(2,'80023000783','SIMON','FR. WAMBUA MUNYOKI','XXXX','0',NULL,'1959-01-01',60,4,'KEN',4,'Not Applicable','Not Applicable','A+','NONE','NONE','NONE','x@gmail.com','','KEN'),(3,'80023000785','FORESE','FR. GILBERTO','XXXXXX','XXX',NULL,'1941-01-03',NULL,4,'KEN',4,'Not Applicable','Not Applicable','NOT DEFINED','XXXX','XXXX','XXX','x@gmail.com','','ITA'),(4,'80023000788','FR. NICOLA','FOGLIACCO','XXXX','XXX',NULL,'1938-06-01',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXX','XXXX','XXXXX','x@gmail.com','','ITA'),(7,'80023000789','FR. ROBERTO','SIBILIA','NA','XXX',NULL,'1951-03-04',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','','ITA'),(8,'80023000793','BR. JOSEPH','WAMALWA','NA','XXX',NULL,'1974-03-05',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','','KEN'),(9,'80023000797','FR.JOHN','PETER NJOROGE','NA','XXX',NULL,'1953-01-09',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','','KEN'),(10,'80023000802','FR.MURUGARA','JACKSON','NA','XXX',NULL,'1970-07-04',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','','KEN'),(11,'80023000803','FR.ALBERICO','ZANATTA','NA','XXX',NULL,'1943-06-06',NULL,4,'ITA',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','','KEN'),(12,'80023000808','FR.EGIDIO','PEDENZINI','NA','XXX',NULL,'1939-08-06',NULL,4,'ITA',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','','KEN'),(13,'80023000814','FR.ENRIQUE','RITUERTO','NA','XXX',NULL,'1945-01-15',NULL,4,'SPANI',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','','KEN'),(14,'80023000818','FR.RIBOLI','ANGELO','NA','XXX',NULL,'1951-12-05',NULL,4,'ITA',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','','KEN'),(15,'80023000820','FR.JOSEPH','WAITHAKA','NA','XXX',NULL,'1960-12-05',NULL,4,'KEN',4,'Male','Not Applicable','NOT DEFINED','XXXX','XXXX','XXXX','x@gmail.com','','KEN');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'aduda Geofrey','adusoftjeff@gmail.com','$2y$12$1b/142w6XJodJthW9/CwAepUO1RsNm10lNQsSot.BuW/ylx24QQKy','ZVoaHBJSYv9vmaxRLOSTkZ3GeQ3hj1QC7ln97v3uALVVpJNTxgTADQnJdX6g','2019-05-11 13:01:06','2019-05-11 13:01:15'),(2,'GEOFREY ONYANGO','geofrey@fortunekenya.com','$2y$10$XfWqAiAA3KJwedwecpt0sOLcAHsGpIH1QhAkxVg607FUk3cJYs9zm','unzyeuRcMSUQcc3v0mNcBIBsYML1HUMkjIlmqNrr59mcTyazGlBtuNFfEeMb','2019-05-13 13:05:23','2019-05-13 13:05:23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
