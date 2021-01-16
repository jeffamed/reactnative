-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.37-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para reactnative
CREATE DATABASE IF NOT EXISTS `reactnative` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `reactnative`;

-- Volcando estructura para tabla reactnative.clientes
CREATE TABLE IF NOT EXISTS `pelicula` (
  `idpelicula` int(11) NOT NULL AUTO_INCREMENT,
  `idDirector` int(11) NOT NULL DEFAULT '0',
  `Nombre` varchar(100) NOT NULL DEFAULT '0',
  `Descripcion` varchar(1000) NOT NULL DEFAULT '0',
  `Duracion` varchar(250) NOT NULL DEFAULT '0',
  `Genero` varchar(500) NOT NULL DEFAULT '0',
  `Estado` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idDirector`),
  KEY `fk_ClienteVend` (`idDirector`),
  CONSTRAINT `fk_PeliculaDirector` FOREIGN KEY (`idDirector`) REFERENCES `Director` (`idDirector`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


-- Volcando estructura para tabla reactnative.vendedores
CREATE TABLE IF NOT EXISTS `director` (
  `idDirector` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(250) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Estado` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idVendedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla reactnative.vendedores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
REPLACE INTO `director` (`idDirector`, `Nombre`, `Telefono`, `Estado`, `created_at`, `update_at`) VALUES
	(1, 'Yefry Moraga', '77216123', 'Activo', '2021-01-15 21:00:32', '2021-01-15 21:00:33');
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
