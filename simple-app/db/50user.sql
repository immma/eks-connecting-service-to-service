/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 9.0.1 : Database - simpledb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`simpledb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `simpledb`;

/*Table structure for table `userlist` */

DROP TABLE IF EXISTS `userlist`;

CREATE TABLE `userlist` (
  `seq` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `first` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `userlist` */

insert  into `userlist`(`seq`,`first`,`email`) values 
(00064,'Franklin','vigrozbir@bibhof.lb\r'),
(00065,'Steven','ih@upa.im\r'),
(00066,'Bryan','se@bagoz.tr\r'),
(00067,'Hallie','hulkone@lipoeza.kp\r'),
(00068,'Jesus','pu@sib.br\r'),
(00069,'Jackson','bofvamet@miermo.je\r'),
(00070,'Amy','zehat@juwsizov.tf\r'),
(00071,'Helena','dabwi@hemri.cl\r'),
(00072,'Harold','kozuudu@ahole.ba\r'),
(00073,'Stanley','fipi@leha.co\r'),
(00074,'Sally','sunip@owicuvsu.bm\r'),
(00075,'Della','sillusi@awuposac.hm\r'),
(00076,'Jessie','lehiupi@pu.eg\r'),
(00077,'Isaiah','biajoow@bu.zw\r'),
(00078,'Eliza','nivcueb@iw.gov\r'),
(00079,'Angel','kijafja@ni.cl\r'),
(00080,'Eula','ruof@uv.mx\r'),
(00081,'Chad','aj@fe.ga\r'),
(00082,'Matilda','fep@bo.vc\r'),
(00083,'Bobby','uzuze@mo.pn\r'),
(00084,'Shane','tadotet@pudias.sn\r'),
(00085,'Travis','hojaraiji@gedlidhaf.km\r'),
(00086,'Hunter','co@vuzezci.aq\r'),
(00087,'Mae','siv@zapi.fo\r'),
(00088,'Maria','zatzer@calvo.fm\r'),
(00089,'Abbie','ut@pe.ge\r'),
(00090,'Hilda','ar@itebuzag.gb\r'),
(00091,'Myrtle','hoktapec@joltujad.cm\r'),
(00092,'Chris','ilurowa@rucjuli.km\r'),
(00093,'Thomas','nuh@jofces.jo\r'),
(00094,'Christian','na@asi.mv\r'),
(00095,'Jay','roelo@eris.tc\r'),
(00096,'Lottie','figwo@imume.tf\r'),
(00097,'Francis','sif@hucuvmar.mq\r'),
(00098,'Frank','ni@veav.eh\r'),
(00099,'Mae','uga@zarepiiw.ci\r'),
(00100,'Alex','tovviik@ewcotew.gb\r'),
(00101,'Philip','kil@bu.vi\r'),
(00102,'Estelle','poaj@zut.bz\r'),
(00103,'Marcus','jemmimgu@pefeviza.km\r'),
(00104,'Ricardo','rokguil@uka.bz\r'),
(00105,'Lou','vejdesec@cawankij.pm\r'),
(00106,'Genevieve','fiv@zahir.ni\r'),
(00107,'Floyd','ojeowo@mus.aw\r'),
(00108,'Max','tauj@sabuegu.ne\r'),
(00109,'Fanny','loligu@jagegpuh.ss\r'),
(00110,'Claudia','agmed@zonehof.vi\r'),
(00111,'Francis','gug@kif.pg\r'),
(00112,'Elsie','idtewag@vawagto.pw\r'),
(00113,'Essie','ecefe@sabo.fj\r');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
