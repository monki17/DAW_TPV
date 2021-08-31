-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.50-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema tpv
--

CREATE DATABASE IF NOT EXISTS tpv;
USE tpv;

--
-- Definition of table `camareros`
--

DROP TABLE IF EXISTS `camareros`;
CREATE TABLE `camareros` (
  `cod_camarero` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_camarero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camareros`
--

/*!40000 ALTER TABLE `camareros` DISABLE KEYS */;
INSERT INTO `camareros` (`cod_camarero`,`Nombre`,`contrasena`,`Apellido`,`Direccion`) VALUES 
 (1,'Pepe','pepe','Perez','calle papes'),
 (2,'Pedro','pedro','Pereira','Calle mi amigo'),
 (3,'Jefe','root','Rodriguez','Mi calle jeje');
/*!40000 ALTER TABLE `camareros` ENABLE KEYS */;


--
-- Definition of table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas` (
  `num_factura` int(10) unsigned NOT NULL,
  `fecha` datetime NOT NULL,
  `cod_camarero` int(10) unsigned NOT NULL,
  PRIMARY KEY (`num_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturas`
--

/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` (`num_factura`,`fecha`,`cod_camarero`) VALUES 
 (1,'2013-12-03 00:00:00',1),
 (2,'2013-12-03 22:18:36',1),
 (3,'2013-12-03 22:43:27',1),
 (4,'2013-12-03 22:50:18',1),
 (5,'2013-12-03 22:52:52',1),
 (6,'2013-12-03 22:55:33',1),
 (7,'2013-12-03 23:02:55',1),
 (8,'2013-12-03 23:04:37',1),
 (9,'2013-12-03 23:06:28',1),
 (10,'2013-12-07 20:54:34',1),
 (11,'2013-12-07 22:27:11',2),
 (12,'2013-12-07 23:33:19',3),
 (13,'2013-12-07 23:41:39',1),
 (14,'2013-12-12 20:49:55',3),
 (15,'2013-12-12 21:00:27',3),
 (16,'2013-12-12 21:02:55',3),
 (17,'2013-12-12 21:04:27',3),
 (18,'2013-12-12 21:07:12',3),
 (19,'2013-12-12 21:12:25',3),
 (20,'2013-12-12 21:13:08',3),
 (21,'2013-12-12 21:15:10',3),
 (22,'2013-12-12 21:22:00',1),
 (23,'2013-12-12 21:26:17',1),
 (24,'2013-12-12 21:37:29',1),
 (25,'2013-12-12 21:43:13',1),
 (26,'2013-12-12 21:44:20',1),
 (27,'2013-12-12 22:14:16',1),
 (28,'2013-12-12 22:28:23',1),
 (29,'2013-12-12 22:29:49',1),
 (30,'2013-12-12 22:32:28',1),
 (31,'2013-12-12 22:32:41',1),
 (32,'2013-12-12 22:35:39',1),
 (33,'2013-12-12 22:37:16',1),
 (34,'2013-12-13 02:25:20',1),
 (35,'2013-12-13 03:34:36',1),
 (36,'2013-12-13 03:56:29',3),
 (37,'2013-12-13 08:35:35',2),
 (38,'2013-12-13 12:21:12',3),
 (39,'2013-12-16 13:46:29',1);
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;


--
-- Definition of table `lineas_facturas`
--

DROP TABLE IF EXISTS `lineas_facturas`;
CREATE TABLE `lineas_facturas` (
  `num_factura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_producto` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  PRIMARY KEY (`num_factura`,`cod_producto`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lineas_facturas`
--

/*!40000 ALTER TABLE `lineas_facturas` DISABLE KEYS */;
INSERT INTO `lineas_facturas` (`num_factura`,`cod_producto`,`cantidad`) VALUES 
 (1,3,7),
 (3,16,6),
 (4,16,6),
 (6,16,6),
 (7,16,6),
 (8,16,6),
 (8,17,8),
 (8,18,9),
 (8,19,7),
 (9,16,6),
 (9,17,8),
 (9,18,9),
 (9,19,7),
 (10,16,9),
 (11,1,3),
 (11,5,6),
 (11,6,6),
 (11,7,7),
 (11,12,4),
 (11,15,4),
 (11,16,5),
 (11,17,4),
 (12,1,3),
 (12,2,3),
 (12,3,5),
 (12,20,3),
 (12,21,4),
 (13,1,3),
 (13,2,4),
 (13,16,3),
 (13,17,4),
 (13,20,3),
 (13,22,4),
 (13,23,4),
 (14,5,2),
 (14,6,3),
 (14,15,4),
 (14,16,6),
 (14,17,4),
 (27,16,1),
 (27,17,3),
 (27,18,3),
 (27,19,6),
 (28,1,4),
 (28,6,36),
 (29,1,4),
 (31,16,3),
 (32,16,3),
 (32,22,4),
 (33,1,2),
 (33,2,8),
 (33,10,2),
 (34,16,4),
 (34,17,5),
 (35,1,5),
 (35,5,7),
 (35,6,6),
 (35,10,4),
 (35,16,6),
 (35,17,7),
 (36,1,8),
 (36,6,7),
 (36,11,8),
 (36,15,7),
 (36,16,9),
 (36,20,8),
 (36,22,8),
 (36,23,5),
 (37,1,2),
 (37,15,4),
 (37,16,18),
 (37,21,3),
 (37,22,4),
 (37,23,6),
 (38,1,5),
 (39,1,5),
 (39,7,5),
 (39,9,4),
 (39,10,3),
 (39,16,5),
 (39,19,4),
 (39,22,4),
 (39,23,5);
/*!40000 ALTER TABLE `lineas_facturas` ENABLE KEYS */;


--
-- Definition of table `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `cod_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `precio` float NOT NULL,
  `categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos`
--

/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`cod_producto`,`nombre`,`precio`,`categoria`) VALUES 
 (1,'ANCHOAS',4.3,'MONTADITOS'),
 (2,'BACALAO',5.6,'MONTADITOS'),
 (3,'CHORIZO',3.5,'MONTADITOS'),
 (4,'JAMON SERRANO Y QUESO',4.5,'MONTADITOS'),
 (5,'JAMON SERRANO Y TOMATE',2.8,'MONTADITOS'),
 (6,'JAMON SERRANO, TOMATE Y QUESO',3,'MONTADITOS'),
 (7,'JAMON SERRANO',2,'MONTADITOS'),
 (8,'LOMO CON TOMATE',5.5,'MONTADITOS'),
 (9,'LOMO FRESCO',2.5,'MONTADITOS'),
 (10,'LOMO, TOMATE Y QUESO',5.5,'MONTADITOS'),
 (11,'MOJAMA',5.2,'MONTADITOS'),
 (12,'MORCILLA',4.5,'MONTADITOS'),
 (13,'QUESO CON TOMATE',1.2,'MONTADITOS'),
 (14,'SALCHICHAS',2,'MONTADITOS'),
 (15,'SALMON',4,'MONTADITOS'),
 (16,'BARRIL CERVEZA',20,'CERVEZAS'),
 (17,'CAÑA',1.1,'CERVEZAS'),
 (18,'CLARA',1.2,'CERVEZAS'),
 (19,'CORONITA',1.5,'CERVEZAS'),
 (20,'JARRA CERVEZA 1L.',1.7,'CERVEZAS'),
 (21,'JARRA SANGRIA 1L.',2.7,'CERVEZAS'),
 (22,'SANDY',0.9,'CERVEZAS'),
 (23,'SIN ALCOHOL',1.25,'CERVEZAS');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;


--
-- Definition of function `nuevafactura`
--

DROP FUNCTION IF EXISTS `nuevafactura`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` FUNCTION `nuevafactura`(cam int) RETURNS int(11)
BEGIN
    declare respuesta int;

select max(num_factura)+1 into respuesta FROM facturas;
insert into facturas(num_factura,fecha,cod_camarero)
values (respuesta, now(),cam);

    return respuesta;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of function `total_camarero_hoy`
--

DROP FUNCTION IF EXISTS `total_camarero_hoy`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` FUNCTION `total_camarero_hoy`(cam int) RETURNS float
BEGIN
     declare respuesta float;
      select sum(productos.precio*lineas_facturas.cantidad) into respuesta
from productos,lineas_facturas,facturas,camareros
where productos.cod_producto=lineas_facturas.cod_producto
and facturas.num_factura=lineas_facturas.num_factura
and camareros.cod_camarero=facturas.cod_camarero
and date(facturas.fecha)=date(now())
and camareros.cod_camarero=cam;

 if (respuesta is null) then
 select 0 into respuesta;
 end if;

return respuesta;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of function `total_hoy`
--

DROP FUNCTION IF EXISTS `total_hoy`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` FUNCTION `total_hoy`() RETURNS float
BEGIN
  declare respuesta float;

  select sum(productos.precio*lineas_facturas.cantidad) into respuesta
from productos,lineas_facturas,facturas
where productos.cod_producto=lineas_facturas.cod_producto and facturas.num_factura=lineas_facturas.num_factura
and date(facturas.fecha)=date(now());
 if (respuesta is null) then
 select 0 into respuesta;
 end if;

return respuesta;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `total_productos_hoy`
--

DROP PROCEDURE IF EXISTS `total_productos_hoy`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `total_productos_hoy`()
BEGIN
     select productos.nombre,sum(lineas_facturas.cantidad)as 'Unidades Vendidas',productos.precio
from productos,lineas_facturas,facturas
where productos.cod_producto=lineas_facturas.cod_producto
and facturas.num_factura=lineas_facturas.num_factura
and date(facturas.fecha)=date(now())
group by productos.nombre;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
