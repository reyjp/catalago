-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ejemplos
CREATE DATABASE IF NOT EXISTS `ejemplos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ejemplos`;

-- Volcando estructura para tabla ejemplos.catalagon
CREATE TABLE IF NOT EXISTS `catalagon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `acronimo` varchar(50) NOT NULL,
  `creador` varchar(50) NOT NULL,
  `fechac` varchar(50) NOT NULL,
  `usuariom` varchar(50) NOT NULL,
  `fechaum` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ejemplos.catalagon: ~0 rows (aproximadamente)
DELETE FROM `catalagon`;
/*!40000 ALTER TABLE `catalagon` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalagon` ENABLE KEYS */;

-- Volcando estructura para tabla ejemplos.configuracion
CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(30) NOT NULL DEFAULT '0',
  `abreviatura` varchar(10) NOT NULL DEFAULT '0',
  `logo` binary(50) NOT NULL DEFAULT '0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `url` varchar(50) NOT NULL DEFAULT '0',
  `linkf` varchar(20) NOT NULL DEFAULT '0',
  `linkg` varchar(20) NOT NULL DEFAULT '0',
  `linkl` varchar(20) NOT NULL DEFAULT '0',
  `linkt` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ejemplos.configuracion: ~0 rows (aproximadamente)
DELETE FROM `configuracion`;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;

-- Volcando estructura para tabla ejemplos.menu_sistema
CREATE TABLE IF NOT EXISTS `menu_sistema` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) NOT NULL,
  `IMAGEN` varchar(50) NOT NULL DEFAULT 'imagenes/not_found.png',
  `URL` varchar(50) DEFAULT NULL,
  `ORDENAMIENTO` int(11) NOT NULL DEFAULT '0',
  `ESTATUS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ejemplos.menu_sistema: ~5 rows (aproximadamente)
DELETE FROM `menu_sistema`;
/*!40000 ALTER TABLE `menu_sistema` DISABLE KEYS */;
INSERT INTO `menu_sistema` (`ID`, `DESCRIPCION`, `IMAGEN`, `URL`, `ORDENAMIENTO`, `ESTATUS`) VALUES
	(1, 'Inicio', 'imagenes/Customer.png', '#', 1, 0),
	(2, 'Agregar Usuarios', 'imagenes/Proveedores.png', '/usuarios/nuevo', 3, 0),
	(3, 'Listar Usuarios', 'imagenes/Product.png', '/usuarios', 2, 0),
	(4, 'Agregar Catalago', 'imagenes/Proveedores.png', '/catalago/catalagon', 4, 0),
	(5, 'Listar Catalago', 'imagenes/not_found.png', '/catalago', 5, 0);
/*!40000 ALTER TABLE `menu_sistema` ENABLE KEYS */;

-- Volcando estructura para tabla ejemplos.permisosmenu
CREATE TABLE IF NOT EXISTS `permisosmenu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ejemplos.permisosmenu: ~8 rows (aproximadamente)
DELETE FROM `permisosmenu`;
/*!40000 ALTER TABLE `permisosmenu` DISABLE KEYS */;
INSERT INTO `permisosmenu` (`ID`, `ID_USUARIO`, `ID_MENU`, `ESTATUS`) VALUES
	(1, 1, 1, 0),
	(2, 1, 2, 0),
	(3, 1, 3, 0),
	(5, 2, 1, 0),
	(6, 2, 3, 0),
	(7, 2, 2, 1),
	(8, 1, 4, 0),
	(9, 1, 5, 0);
/*!40000 ALTER TABLE `permisosmenu` ENABLE KEYS */;

-- Volcando estructura para tabla ejemplos.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `FECHA_REGISTRO` varchar(20) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT '0',
  `TIPO` varchar(20) NOT NULL DEFAULT 'Invitado',
  `PASSWORD` varchar(50) DEFAULT '123',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ejemplos.usuarios: ~2 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`ID`, `NOMBRE`, `APELLIDOS`, `EMAIL`, `FECHA_REGISTRO`, `ESTATUS`, `TIPO`, `PASSWORD`) VALUES
	(1, 'Rainier', 'Peña', 'rainier86@gmail.com', '2017-07-30 14:39:06', 0, 'Administrador', '81dc9bdb52d04dc20036dbd8313ed055'),
	(2, 'Juan ', 'Abreu', 'juanabreu26@gmail.com', '2017-07-30 14:39:06', 0, 'Invitado', '81dc9bdb52d04dc20036dbd8313ed055'),
	(3, 'jose', 'hernandez', 'jose@gmail.com', '2018-06-15 19:14:24', 0, 'Invitado', '123');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
