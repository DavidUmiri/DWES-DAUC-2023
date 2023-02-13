drop database if exists tienda;
create database tienda;
use tienda;

CREATE TABLE IF NOT EXISTS `tienda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ropa` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` enum('disponible','agotado') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'disponible',
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

