/*
MySQL Backup
Source Host:           localhost
Source Server Version: 5.5.5-10.3.16-MariaDB
Source Database:       db_nuvola
Date:                  2021/06/18 17:10:15
*/

SET FOREIGN_KEY_CHECKS=0;
use db_nuvola;
#----------------------------
# Table structure for cliente
#----------------------------
CREATE TABLE `cliente` (
  `email` varchar(200) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `foto` blob NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
#----------------------------
# Records for table cliente
#----------------------------


insert  into cliente values 
('anamariaperez@gmail.com', '32558745', 'Ana', 'Perez Gomez', 'Calle 84', 0x696D616765732F666F746F732F616E616D61726961706572657A40676D61696C2E636F6D2E706E67, null, '2021-06-18 18:23:42', '2021-06-18 18:19:01', null);
#----------------------------
# Table structure for lista_viajes
#----------------------------
CREATE TABLE `lista_viajes` (
  `id_lista_viajes` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_viaje` datetime NOT NULL,
  `pais` varchar(200) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_lista_viajes`),
  KEY `LISTA_VIAJES_CLIENTE` (`email`),
  CONSTRAINT `FK_LISTA_VIAJES_CLIENTE` FOREIGN KEY (`email`) REFERENCES `cliente` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
#----------------------------
# Records for table lista_viajes
#----------------------------


insert  into lista_viajes values 
(2, '2021-01-01 08:00:00', 'Colombia', 'Barranquilla', 'anamariaperez@gmail.com', '2021-06-18 18:27:34', null, '2021-06-18 18:27:34'), 
(3, '2021-06-01 09:00:00', 'Estados Unidos', 'Nueva York', 'anamariaperez@gmail.com', '2021-06-18 18:27:34', null, '2021-06-18 18:27:34');

