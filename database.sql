CREATE TABLE IF NOT EXISTS user (
id_user int NOT NULL AUTO_INCREMENT,
name varchar(60) NOT NULL,
password varchar(255) NOT NULL,
email varchar(60) NOT NULL,
register_date datetime NOT NULL,
shop_name varchar(60),
id_shop int(10) ,
PRIMARY KEY (id_user)
)ENGINE=InnoDB ;


CREATE TABLE IF NOT EXISTS lang(
id_lang int(10) NOT NULL AUTO_INCREMENT,
name varchar(40) NOT NULL ,
iso_code varchar(20) NOT NULL ,
lang_code varchar(20) NOT NULL ,
PRIMARY KEY (id_lang)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS lang_users(
id_lang_user int NOT NULL AUTO_INCREMENT,
id_user int(10),
id_lang int(10),
PRIMARY KEY (id_lang_user),
CONSTRAINT `fk_id_user_users` FOREIGN KEY (id_user) REFERENCES user (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_id_lang_lang` FOREIGN KEY (id_lang) REFERENCES `lang` (`id_lang`) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS supplier(
id_supplier int(10) NOT NULL AUTO_INCREMENT,
name varchar(60),
street varchar(70),
city varchar(70),
country varchar(70),
telephone varchar(70),
PRIMARY KEY (id_supplier)
)ENGINE=InnoDB;

CREATE TABLE measurement(
id_measurement int(10) NOT NULL AUTO_INCREMENT,
name varchar(50),
PRIMARY KEY (id_measurement)
);

CREATE TABLE IF NOT EXISTS material (
id_material int(10) NOT NULL AUTO_INCREMENT,
id_user int(10),
name varchar(50),
category varchar(50),
id_measurement int(10),
price float(30),
PRIMARY KEY (id_material),
CONSTRAINT `fk_id_user_user` FOREIGN KEY (id_user) REFERENCES user (id_user) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_id_measurement_user_supplier` FOREIGN KEY (id_measurement) REFERENCES measurement (id_measurement) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS stock_material(
id_stock_material int(10) NOT NULL AUTO_INCREMENT,
id_material int(10),
PRIMARY KEY (id_stock_material),
CONSTRAINT `fk_id_material_stock_material` FOREIGN KEY (id_material) REFERENCES material (id_material) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS material_supplier(
id_material_supplier int(10) NOT NULL AUTO_INCREMENT,
id_material int(10),
id_supplier int(10),
PRIMARY KEY (id_material_supplier),
CONSTRAINT `fk_id_material_material_supplier` FOREIGN KEY (id_material) REFERENCES material (id_material) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_id_supplier_material_supplier` FOREIGN KEY (id_supplier) REFERENCES supplier (id_supplier) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS user_supplier(
id_user int(10),
id_supplier int(10),
PRIMARY KEY (id_user,id_supplier),
CONSTRAINT `fk_id_user_user_supplier` FOREIGN KEY (id_user) REFERENCES user (id_user) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_id_supplier_user_supplier` FOREIGN KEY (id_supplier) REFERENCES supplier (id_supplier) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_product_prestashop` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_product`),
  CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE IF NOT EXISTS `product_language` (
  `id_product` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_language_ps` int(11) NOT NULL,
  CONSTRAINT `fk_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lang` FOREIGN KEY (`id_lang`) REFERENCES `lang` (`id_lang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  PRIMARY KEY (`id_product`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE IF NOT EXISTS `combination` (
  `id_combination` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id_combination`),
  CONSTRAINT `fk_product_combination` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE IF NOT EXISTS `attribute_group` (
  `id_attribute_group` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_color` int(1) NOT NULL,
  PRIMARY KEY (`id_attribute_group`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE IF NOT EXISTS `attribute` (
  `id_attribute` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_group` int(11) NOT NULL,
  PRIMARY KEY (`id_attribute`),
  CONSTRAINT `fk_group` FOREIGN KEY (`id_group`) REFERENCES `attribute_group` (`id_attribute_group`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE IF NOT EXISTS `combination_attribute` (
  `id_combination` int(11) NOT NULL,
  `id_attribute` int(11) NOT NULL,
  CONSTRAINT `fk_combination` FOREIGN KEY (`id_combination`) REFERENCES `combination` (`id_combination`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `attribute` FOREIGN KEY (`id_attribute`) REFERENCES `attribute` (`id_attribute`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  PRIMARY KEY (`id_combination`,`id_attribute`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE IF NOT EXISTS `material_combination` (
  `id_material` int(11) NOT NULL,
  `id_combination` int(11) NOT NULL,
  CONSTRAINT `fk_to_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_to_combination` FOREIGN KEY (`id_combination`) REFERENCES `combination` (`id_combination`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  PRIMARY KEY (`id_combination`,`id_material`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `craftandbudget`.`user` (`id_user`, `name`, `password`, `email`, `register_date`, `shop_name`, `id_shop`) VALUES (NULL, 'Issam Natour', 'issam', 'issamnatour90@gmail.com', '2015-05-14 00:00:00', 'BuhoPlace', '21');
INSERT INTO `craftandbudget`.`user` (`id_user`, `name`, `password`, `email`, `register_date`, `shop_name`, `id_shop`) VALUES (NULL, 'Nicolas Alphonse', 'nicolas', 'nicoalphose@gmail.com', '2015-05-14 00:00:00', 'Supreme', '23');

INSERT INTO `craftandbudget`.`supplier` (`id_supplier`, `name`, `street`, `city`, `country`, `telephone`) VALUES (NULL, 'Telas Benítez', 'Al lado de casa', 'madrid', 'spain', '912423311');
INSERT INTO `craftandbudget`.`supplier` (`id_supplier`, `name`, `street`, `city`, `country`, `telephone`) VALUES (NULL, 'Cojines Cojones', 'Almendra', 'Alcobedas', 'spain', '919123344');
INSERT INTO `craftandbudget`.`supplier` (`id_supplier`, `name`, `street`, `city`, `country`, `telephone`) VALUES (NULL, 'Maderas madeira', 'Severo Ochoa 29', 'Alcobedas', 'spain', '91112233');

INSERT INTO `craftandbudget`.`user_supplier` (`id_user`, `id_supplier`) VALUES ('1', '2'), ('1', '1');
INSERT INTO `craftandbudget`.`user_supplier` (`id_user`, `id_supplier`) VALUES ('2', '2'), ('2', '3');

INSERT INTO `craftandbudget`.`product` (`id_product`, `id_product_prestashop`, `id_user`) VALUES (NULL, '22', '2'),(NULL, '12', '1');
