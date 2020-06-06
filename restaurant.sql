-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.37-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para sisteme
CREATE DATABASE IF NOT EXISTS `sisteme` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sisteme`;

-- Volcando estructura para tabla sisteme.camarero
CREATE TABLE IF NOT EXISTS `camarero` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(14) DEFAULT NULL,
  `apellido1` varchar(14) DEFAULT NULL,
  `apellido2` varchar(14) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sisteme.camarero: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `camarero` DISABLE KEYS */;
INSERT INTO `camarero` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`) VALUES
	(2, 'PEPE', 'ro', 'PEPE', '43636635'),
	(3, 'PEPE', 'ro', 'PEPE', '43636635'),
	(4, 'PEPE', 'ro', 'PEPE', '43636635');
/*!40000 ALTER TABLE `camarero` ENABLE KEYS */;

-- Volcando estructura para tabla sisteme.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(14) DEFAULT NULL,
  `apellido1` varchar(14) DEFAULT NULL,
  `apellido2` varchar(14) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sisteme.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`) VALUES
	(5, 'PEPE', 'PEPE', 'PEPE', '43636635'),
	(6, 'PEPE', 'ro', 'yu', '325245'),
	(7, 'PEPE', 'ro', 'yu', '325245'),
	(8, 'PEPE', 'ro', 'yu', '325245'),
	(10, 'Pupi', 'ro', 'PEPE', '43636635'),
	(11, 'Pupi', 'PEPE', 'yu', '43636635');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla sisteme.cosinero
CREATE TABLE IF NOT EXISTS `cosinero` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(14) DEFAULT NULL,
  `apellido1` varchar(14) DEFAULT NULL,
  `apellido2` varchar(14) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sisteme.cosinero: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cosinero` DISABLE KEYS */;
INSERT INTO `cosinero` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`) VALUES
	(1, 'Pupi', 'PEPE', 'yu', '43636635');
/*!40000 ALTER TABLE `cosinero` ENABLE KEYS */;

-- Volcando estructura para tabla sisteme.detallefactura
CREATE TABLE IF NOT EXISTS `detallefactura` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `idfactura` int(4) DEFAULT NULL,
  `idcosinero` int(4) DEFAULT NULL,
  `plato` varchar(14) DEFAULT NULL,
  `importe` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idfactura` (`idfactura`),
  KEY `idcosinero` (`idcosinero`),
  CONSTRAINT `detallefactura_ibfk_1` FOREIGN KEY (`idfactura`) REFERENCES `factura` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detallefactura_ibfk_2` FOREIGN KEY (`idcosinero`) REFERENCES `cosinero` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sisteme.detallefactura: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detallefactura` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallefactura` ENABLE KEYS */;

-- Volcando estructura para tabla sisteme.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `idcliente` int(4) DEFAULT NULL,
  `idcamarero` int(4) DEFAULT NULL,
  `idmesa` int(4) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idcliente` (`idcliente`),
  KEY `idcamarero` (`idcamarero`),
  KEY `idmesa` (`idmesa`),
  CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE,
  CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idcamarero`) REFERENCES `camarero` (`id`) ON DELETE CASCADE,
  CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`idmesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sisteme.factura: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` (`id`, `idcliente`, `idcamarero`, `idmesa`, `fecha`) VALUES
	(2, 6, 3, 2, '2000-11-14'),
	(7, 5, 3, 2, '2019-12-27');
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;

-- Volcando estructura para tabla sisteme.mesa
CREATE TABLE IF NOT EXISTS `mesa` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `numMaxComensale` int(3) DEFAULT NULL,
  `ubicacion` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sisteme.mesa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
INSERT INTO `mesa` (`id`, `numMaxComensale`, `ubicacion`) VALUES
	(1, 12, 'centro'),
	(2, 4, 'centro');
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;

-- Volcando estructura para tabla sisteme.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(14) DEFAULT NULL,
  `password` varchar(14) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sisteme.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nombre`, `password`, `dni`) VALUES
	(1, 'PEPE', 'op', '325245'),
	(2, 'PEPE', 'po', '43636635');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
