# ************************************************************
# Sequel Pro SQL dump
# Versión 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.14)
# Base de datos: webhelp
# Tiempo de Generación: 2014-04-14 04:21:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla registro
# ------------------------------------------------------------

DROP TABLE IF EXISTS `registro`;

CREATE TABLE `registro` (
  `regid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `comentario` varchar(500) DEFAULT NULL,
  `usuarioid` int(11) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL,
  `usuario_can` int(11) DEFAULT NULL,
  `fecha_can` datetime DEFAULT NULL,
  PRIMARY KEY (`regid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;

INSERT INTO `registro` (`regid`, `fecha`, `comentario`, `usuarioid`, `estatus`, `usuario_can`, `fecha_can`)
VALUES
	(3,'2014-04-13 14:23:41','Mi tercer mensaje a webhelp',3,2,2,'2014-04-13 23:01:06'),
	(4,'2014-04-13 17:33:26','Un comentario activo para ser desactivado\nasdasd\na\nsd\nasd\nas\nda\nsd\nasd\na\nasd\nas\nda\nsd\nasd\nasd\nas\nda\nsd',3,0,NULL,NULL),
	(5,'2014-04-13 17:36:21','&lt;script&gt;\nalert(&quot;Esto es una alerta XSS&quot;);\n&lt;/script&gt;',3,0,NULL,NULL);

/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla usuario
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `nombre` varchar(50) DEFAULT NULL,
  `ap_pat` varchar(50) DEFAULT NULL,
  `ap_mat` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `e_mail` varchar(50) DEFAULT NULL,
  `tipo_usuario` int(13) DEFAULT NULL,
  `usuarioid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`usuarioid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;

INSERT INTO `usuario` (`nombre`, `ap_pat`, `ap_mat`, `usuario`, `pass`, `direccion`, `telefono`, `e_mail`, `tipo_usuario`, `usuarioid`)
VALUES
	('Miguel Angel','Velazco','Martinez','MIke','123456','Calle x colonia y ciudad z','12345','mvelazco@netwarmonitor.com',1,2),
	('Jose Angel','Tula','Rubio','tula','123456','Calle OrduÃƒÂ±ez #123 Colonia el Cuco, Gomez Palacio, Durango, Mexico','712312313','mvelazco@live.com',2,3);

/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
