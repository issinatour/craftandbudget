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



CREATE TABLE IF NOT EXISTS user_rol(
    id_rol int not null auto_increment,
    name varchar(70),
    type int,
    PRIMARY KEY(id_rol)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS shop (
id_shop int not null auto_increment,
name varchar(80),
image varchar(120),
type  varchar(100),
id_shop_ps int,
PRIMARY KEY (id_shop)

)ENGINE=InnoDB;







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

CREATE TABLE IF NOT EXISTS measurement(
id_measurement int(10) NOT NULL AUTO_INCREMENT,
name varchar(50),
PRIMARY KEY (id_measurement)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS category(
id_category int(10) NOT NULL AUTO_INCREMENT,
name varchar(50) NOT NULL,
PRIMARY KEY(id_category)
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS category_user (
id_category int(10) NOT NULL AUTO_INCREMENT,
id_user int(10) NOT NULL,
name varchar(50) NOT NULL,
CONSTRAINT `fk_id_user_caegory` FOREIGN KEY (id_user) REFERENCES user (id_user) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_id_categoryuser_category` FOREIGN KEY (id_category) REFERENCES category (id_category) ON DELETE NO ACTION ON UPDATE NO ACTION,
PRIMARY KEY(id_category, id_user)
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS craftshop(
    id_craftshop int not null auto_increment,
    name varchar(70),
    description varchar(255),
    PRIMARY KEY(id_craftshop)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS shop_craftshop(
id_shop_user int not null auto_increment,
id_shop int,
id_craftshop int,
key_api_shop VARCHAR(240),
url_shop VARCHAR (240),
PRIMARY KEY (id_shop_user),
 CONSTRAINT `fk_id_shop_user` FOREIGN KEY (`id_shop`) REFERENCES `shop` (`id_shop`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 CONSTRAINT `fk_id_user_shop_user` FOREIGN KEY (`id_craftshop`) REFERENCES `craftshop` (`id_craftshop`) ON DELETE NO ACTION ON UPDATE NO ACTION

)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS craftshop_users(
    id_craftshop_users int not null auto_increment,
    id_user int(11),
    id_craftshop int(11) ,
    id_rol int(11),
    PRIMARY KEY(id_craftshop_users),
 CONSTRAINT `fk_id_user_craftshopuser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 CONSTRAINT `fk_id_craftsho_craftshopuser` FOREIGN KEY (`id_craftshop`) REFERENCES `craftshop` (`id_craftshop`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 CONSTRAINT `fk_id_rol_craftshopuser` FOREIGN KEY (`id_rol`) REFERENCES `user_rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION

)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS material (
id_material int(10) NOT NULL AUTO_INCREMENT,
id_craftshop int(10),
name varchar(50),
id_category int(10) NOT NULL,
id_measurement int(10),
price float(30),
PRIMARY KEY (id_material),
CONSTRAINT `fk_id_craftshopmaterial` FOREIGN KEY (id_craftshop) REFERENCES craftshop (id_craftshop) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_id_measurement_material` FOREIGN KEY (id_measurement) REFERENCES measurement (id_measurement) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `fk_id_category_material` FOREIGN KEY (id_category) REFERENCES category (id_category) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE=InnoDB;



CREATE TABLE IF NOT EXISTS stock_material(
id_stock_material int(10) NOT NULL AUTO_INCREMENT,
id_material int(10),
quantity double,
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
  `id_craftshop` int(11) NOT NULL,
  price float,
  PRIMARY KEY (`id_product`),
  CONSTRAINT `fk_craftshop_product` FOREIGN KEY (`id_craftshop`) REFERENCES `craftshop` (`id_craftshop`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS types(
id_type int NOT NULL AUTO_INCREMENT,
name VARCHAR(120),
PRIMARY KEY (id_type)
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS product_types(
id_product_type int NOT NULL AUTO_INCREMENT,
id_type int,
id_product int,
PRIMARY KEY (id_product_type),
  CONSTRAINT `fk_product_type_` FOREIGN KEY (`id_product`) REFERENCES product (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_type_type` FOREIGN KEY (`id_type`) REFERENCES `types` (`id_type`) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `product_media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  is_default int(1),
  file VARCHAR (140),
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `product_media_product` (
  `id_product_media_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_media` int(11) NOT NULL,
  CONSTRAINT `fk_id_product_media` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_media_media` FOREIGN KEY (`id_media`) REFERENCES `product_media` (`id_media`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  PRIMARY KEY (`id_product_media_product`)
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
  is_default int,
  PRIMARY KEY (`id_combination`),
  CONSTRAINT `fk_product_combination` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE IF NOT EXISTS `attribute_group` (
  `id_attribute_group` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_color` int(1) NOT NULL,
  PRIMARY KEY (`id_attribute_group`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE IF NOT EXISTS `attribute` (
  `id_attribute` int(11) NOT NULL AUTO_INCREMENT,
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
  `quantity` float NOT NULL,
  CONSTRAINT `fk_to_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_to_combination` FOREIGN KEY (`id_combination`) REFERENCES `combination` (`id_combination`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  PRIMARY KEY (`id_combination`,`id_material`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS material_product (
  id_material_product int NOT NULL AUTO_INCREMENT,
  `id_material` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` float NOT NULL,
  CONSTRAINT `fk_to_material_combp` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_to_product_combp` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  PRIMARY KEY (`id_material_product`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_rol` (`id_rol`, `name`, `type`) VALUES
(1, 'user', 1);


INSERT INTO `types` (`id_type`, `name`) VALUES
(1, 'prestashop'),
(2, 'craftandbudget');

INSERT INTO `measurement` (`id_measurement`, `name`) VALUES
(1, 'metro'),
(2, 'kilo');

INSERT INTO `lang` (`id_lang`, `name`, `iso_code`, `lang_code`) VALUES
(1, 'es', 'es', 'es');