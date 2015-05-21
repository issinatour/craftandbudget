-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2015 a las 10:01:03
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `craftandbudget`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attribute`
--

CREATE TABLE IF NOT EXISTS `attribute` (
`id_attribute` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `attribute`
--

INSERT INTO `attribute` (`id_attribute`, `name`, `id_group`) VALUES
(1, 'rojo', 1),
(2, 'verde', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attribute_group`
--

CREATE TABLE IF NOT EXISTS `attribute_group` (
`id_attribute_group` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_color` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `attribute_group`
--

INSERT INTO `attribute_group` (`id_attribute_group`, `name`, `is_color`) VALUES
(1, 'color', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id_category` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_user`
--

CREATE TABLE IF NOT EXISTS `category_user` (
`id_category` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combination`
--

CREATE TABLE IF NOT EXISTS `combination` (
`id_combination` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `is_default` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `combination`
--

INSERT INTO `combination` (`id_combination`, `id_product`, `price`, `stock`, `is_default`) VALUES
(1, 1, 35, 2, 1),
(2, 2, 123, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combination_attribute`
--

CREATE TABLE IF NOT EXISTS `combination_attribute` (
  `id_combination` int(11) NOT NULL,
  `id_attribute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `combination_attribute`
--

INSERT INTO `combination_attribute` (`id_combination`, `id_attribute`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
`id_lang` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `iso_code` varchar(20) NOT NULL,
  `lang_code` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lang`
--

INSERT INTO `lang` (`id_lang`, `name`, `iso_code`, `lang_code`) VALUES
(1, 'espa?ol', 'es-es', 'spa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lang_users`
--

CREATE TABLE IF NOT EXISTS `lang_users` (
`id_lang_user` int(11) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `id_lang` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE IF NOT EXISTS `material` (
`id_material` int(10) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `id_category` int(10) NOT NULL,
  `id_measurement` int(10) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_combination`
--

CREATE TABLE IF NOT EXISTS `material_combination` (
  `id_material` int(11) NOT NULL,
  `id_combination` int(11) NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_supplier`
--

CREATE TABLE IF NOT EXISTS `material_supplier` (
`id_material_supplier` int(10) NOT NULL,
  `id_material` int(10) DEFAULT NULL,
  `id_supplier` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `measurement`
--

CREATE TABLE IF NOT EXISTS `measurement` (
`id_measurement` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id_product` int(11) NOT NULL,
  `id_product_prestashop` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id_product`, `id_product_prestashop`, `id_user`) VALUES
(1, 22, 2),
(2, 12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_language`
--

CREATE TABLE IF NOT EXISTS `product_language` (
  `id_product` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_language_ps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_language`
--

INSERT INTO `product_language` (`id_product`, `id_lang`, `description`, `name`, `id_language_ps`) VALUES
(1, 1, 'collar para perro morado para galgos', 'collar para perro', 23),
(2, 1, 'asfasfsaf', 'asfsafasfa', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_media`
--

CREATE TABLE IF NOT EXISTS `product_media` (
`id_media` int(11) NOT NULL,
  `is_default` int(1) DEFAULT NULL,
  `file` varchar(140) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_media`
--

INSERT INTO `product_media` (`id_media`, `is_default`, `file`) VALUES
(1, 0, 'mifile.png'),
(2, 2, 'asfas.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_media_product`
--

CREATE TABLE IF NOT EXISTS `product_media_product` (
`id_product_media_product` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_media` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_media_product`
--

INSERT INTO `product_media_product` (`id_product_media_product`, `id_product`, `id_media`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_material`
--

CREATE TABLE IF NOT EXISTS `stock_material` (
`id_stock_material` int(10) NOT NULL,
  `id_material` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id_supplier` int(10) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `street` varchar(70) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `country` varchar(70) DEFAULT NULL,
  `telephone` varchar(70) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `name`, `street`, `city`, `country`, `telephone`) VALUES
(1, 'Telas Ben?tez', 'Al lado de casa', 'madrid', 'spain', '912423311'),
(2, 'Cojines Cojones', 'Almendra', 'Alcobedas', 'spain', '919123344'),
(3, 'Maderas madeira', 'Severo Ochoa 29', 'Alcobedas', 'spain', '91112233');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `register_date` datetime NOT NULL,
  `shop_name` varchar(60) DEFAULT NULL,
  `id_shop` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `name`, `password`, `email`, `register_date`, `shop_name`, `id_shop`) VALUES
(1, 'asdsafasf', 'issam', 'issamnatour90@gmail.com', '2015-05-14 00:00:00', 'BuhoPlace', 21),
(2, 'Nicolas Alphonse', 'nicolas', 'nicoalphose@gmail.com', '2015-05-14 00:00:00', 'Supreme', 23),
(3, 'issam', 'ed311374b13fdedb3d2b206127180e35', 'issam@issam.com', '0000-00-00 00:00:00', NULL, NULL),
(4, 'ineta', 'a11c583b739dc50053379ad2a7e99f64', 'ineta@ineta.com', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_supplier`
--

CREATE TABLE IF NOT EXISTS `user_supplier` (
  `id_user` int(10) NOT NULL DEFAULT '0',
  `id_supplier` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_supplier`
--

INSERT INTO `user_supplier` (`id_user`, `id_supplier`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `attribute`
--
ALTER TABLE `attribute`
 ADD PRIMARY KEY (`id_attribute`), ADD KEY `fk_group` (`id_group`);

--
-- Indices de la tabla `attribute_group`
--
ALTER TABLE `attribute_group`
 ADD PRIMARY KEY (`id_attribute_group`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `category_user`
--
ALTER TABLE `category_user`
 ADD PRIMARY KEY (`id_category`,`id_user`), ADD KEY `fk_id_user_caegory` (`id_user`);

--
-- Indices de la tabla `combination`
--
ALTER TABLE `combination`
 ADD PRIMARY KEY (`id_combination`), ADD KEY `fk_product_combination` (`id_product`);

--
-- Indices de la tabla `combination_attribute`
--
ALTER TABLE `combination_attribute`
 ADD PRIMARY KEY (`id_combination`,`id_attribute`), ADD KEY `attribute` (`id_attribute`);

--
-- Indices de la tabla `lang`
--
ALTER TABLE `lang`
 ADD PRIMARY KEY (`id_lang`);

--
-- Indices de la tabla `lang_users`
--
ALTER TABLE `lang_users`
 ADD PRIMARY KEY (`id_lang_user`), ADD KEY `fk_id_user_users` (`id_user`), ADD KEY `fk_id_lang_lang` (`id_lang`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
 ADD PRIMARY KEY (`id_material`), ADD KEY `fk_id_user_user` (`id_user`), ADD KEY `fk_id_measurement_material` (`id_measurement`), ADD KEY `fk_id_category_material` (`id_category`);

--
-- Indices de la tabla `material_combination`
--
ALTER TABLE `material_combination`
 ADD PRIMARY KEY (`id_combination`,`id_material`), ADD KEY `fk_to_material` (`id_material`);

--
-- Indices de la tabla `material_supplier`
--
ALTER TABLE `material_supplier`
 ADD PRIMARY KEY (`id_material_supplier`), ADD KEY `fk_id_material_material_supplier` (`id_material`), ADD KEY `fk_id_supplier_material_supplier` (`id_supplier`);

--
-- Indices de la tabla `measurement`
--
ALTER TABLE `measurement`
 ADD PRIMARY KEY (`id_measurement`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id_product`), ADD KEY `fk_user` (`id_user`);

--
-- Indices de la tabla `product_language`
--
ALTER TABLE `product_language`
 ADD PRIMARY KEY (`id_product`,`id_lang`), ADD KEY `fk_lang` (`id_lang`);

--
-- Indices de la tabla `product_media`
--
ALTER TABLE `product_media`
 ADD PRIMARY KEY (`id_media`);

--
-- Indices de la tabla `product_media_product`
--
ALTER TABLE `product_media_product`
 ADD PRIMARY KEY (`id_product_media_product`), ADD KEY `fk_id_product_media` (`id_product`), ADD KEY `fk_id_media_media` (`id_media`);

--
-- Indices de la tabla `stock_material`
--
ALTER TABLE `stock_material`
 ADD PRIMARY KEY (`id_stock_material`), ADD KEY `fk_id_material_stock_material` (`id_material`);

--
-- Indices de la tabla `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id_supplier`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `user_supplier`
--
ALTER TABLE `user_supplier`
 ADD PRIMARY KEY (`id_user`,`id_supplier`), ADD KEY `fk_id_supplier_user_supplier` (`id_supplier`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `attribute`
--
ALTER TABLE `attribute`
MODIFY `id_attribute` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `attribute_group`
--
ALTER TABLE `attribute_group`
MODIFY `id_attribute_group` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
MODIFY `id_category` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `category_user`
--
ALTER TABLE `category_user`
MODIFY `id_category` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `combination`
--
ALTER TABLE `combination`
MODIFY `id_combination` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `lang`
--
ALTER TABLE `lang`
MODIFY `id_lang` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `lang_users`
--
ALTER TABLE `lang_users`
MODIFY `id_lang_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
MODIFY `id_material` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `material_supplier`
--
ALTER TABLE `material_supplier`
MODIFY `id_material_supplier` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `measurement`
--
ALTER TABLE `measurement`
MODIFY `id_measurement` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `product_media`
--
ALTER TABLE `product_media`
MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `product_media_product`
--
ALTER TABLE `product_media_product`
MODIFY `id_product_media_product` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `stock_material`
--
ALTER TABLE `stock_material`
MODIFY `id_stock_material` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `supplier`
--
ALTER TABLE `supplier`
MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `attribute`
--
ALTER TABLE `attribute`
ADD CONSTRAINT `fk_group` FOREIGN KEY (`id_group`) REFERENCES `attribute_group` (`id_attribute_group`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `category_user`
--
ALTER TABLE `category_user`
ADD CONSTRAINT `fk_id_categoryuser_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_id_user_caegory` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `combination`
--
ALTER TABLE `combination`
ADD CONSTRAINT `fk_product_combination` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `combination_attribute`
--
ALTER TABLE `combination_attribute`
ADD CONSTRAINT `attribute` FOREIGN KEY (`id_attribute`) REFERENCES `attribute` (`id_attribute`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_combination` FOREIGN KEY (`id_combination`) REFERENCES `combination` (`id_combination`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lang_users`
--
ALTER TABLE `lang_users`
ADD CONSTRAINT `fk_id_lang_lang` FOREIGN KEY (`id_lang`) REFERENCES `lang` (`id_lang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_id_user_users` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
ADD CONSTRAINT `fk_id_category_material` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_id_measurement_material` FOREIGN KEY (`id_measurement`) REFERENCES `measurement` (`id_measurement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_id_user_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `material_combination`
--
ALTER TABLE `material_combination`
ADD CONSTRAINT `fk_to_combination` FOREIGN KEY (`id_combination`) REFERENCES `combination` (`id_combination`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_to_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `material_supplier`
--
ALTER TABLE `material_supplier`
ADD CONSTRAINT `fk_id_material_material_supplier` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_id_supplier_material_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_language`
--
ALTER TABLE `product_language`
ADD CONSTRAINT `fk_lang` FOREIGN KEY (`id_lang`) REFERENCES `lang` (`id_lang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_media_product`
--
ALTER TABLE `product_media_product`
ADD CONSTRAINT `fk_id_media_media` FOREIGN KEY (`id_media`) REFERENCES `product_media` (`id_media`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_id_product_media` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock_material`
--
ALTER TABLE `stock_material`
ADD CONSTRAINT `fk_id_material_stock_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user_supplier`
--
ALTER TABLE `user_supplier`
ADD CONSTRAINT `fk_id_supplier_user_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_id_user_user_supplier` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
