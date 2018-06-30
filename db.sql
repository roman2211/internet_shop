-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               5.7.18-15 - Percona Server (GPL), Release '15', Revision 'bff2cd9'
-- Операционная система:         debian-linux-gnu
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных geekunivercity_db
CREATE DATABASE IF NOT EXISTS `geekunivercity_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `geekunivercity_db`;

-- Дамп структуры для таблица geekunivercity_db.basket
CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `delivery` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `product_size` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы geekunivercity_db.basket: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
INSERT INTO `basket` (`id`, `id_order`, `id_user`, `id_product`, `delivery`, `color`, `product_size`, `quantity`, `date_time`) VALUES
	(1, 1, 1, 1, 'FREE', 'Red', 'XXL', 2, '2017-07-03 21:22:47'),
	(2, 1, 1, 2, 'FREE', 'Green', 'XL', 2, '2017-07-03 21:22:55'),
	(4, NULL, 1, 2, 'FREE', 'Black', 'S', 2, '2017-07-03 21:26:31'),
	(6, NULL, 1, 1, 'FREE', 'Yellow', 'M', 2, '2017-07-27 15:02:54'),
	(7, NULL, 1, 3, 'FREE', 'Black', 'XXL', 2, '2017-07-03 21:26:35');
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;

-- Дамп структуры для таблица geekunivercity_db.basket_copy
CREATE TABLE IF NOT EXISTS `basket_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `delivery` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `product_size` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы geekunivercity_db.basket_copy: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `basket_copy` DISABLE KEYS */;
INSERT INTO `basket_copy` (`id`, `id_order`, `id_user`, `id_product`, `delivery`, `color`, `product_size`, `quantity`, `date_time`) VALUES
	(1, 1, 1, 1, 'FREE', 'Red', 'XXL', 2, '2017-07-03 21:22:47'),
	(2, 1, 1, 2, 'FREE', 'Green', 'XL', 2, '2017-07-03 21:22:55'),
	(4, NULL, 1, 2, 'FREE', 'Black', 'S', 2, '2017-07-03 21:26:31'),
	(6, NULL, 1, 1, 'FREE', 'Yellow', 'M', 2, '2017-07-27 15:02:54'),
	(7, NULL, 1, 3, 'FREE', 'Black', 'XXL', 2, '2017-07-03 21:26:35');
/*!40000 ALTER TABLE `basket_copy` ENABLE KEYS */;

-- Дамп структуры для таблица geekunivercity_db.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL DEFAULT '0',
  `id_parent_category` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_parent_category` (`id_parent_category`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы geekunivercity_db.categories: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `category_name`, `id_parent_category`) VALUES
	(1, 'Каталог продуктов', 0),
	(2, 'Обувь', 1),
	(3, 'Одежда', 1),
	(4, 'Аксессуары', 1),
	(5, 'Ботинки мужские', 2),
	(6, 'Ботинки женские', 2);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица geekunivercity_db.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `datetime_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datetime_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `amount` double NOT NULL DEFAULT '0',
  `id_order_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы geekunivercity_db.orders: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `id_user`, `datetime_create`, `datetime_update`, `amount`, `id_order_status`) VALUES
	(1, 1, '2017-07-03 21:23:20', '2017-07-03 21:24:13', 500, 1),
	(2, 1, '2017-08-05 18:33:44', '2017-08-05 20:40:35', 300, 1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Дамп структуры для таблица geekunivercity_db.order_statuses
CREATE TABLE IF NOT EXISTS `order_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы geekunivercity_db.order_statuses: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `order_statuses` DISABLE KEYS */;
INSERT INTO `order_statuses` (`id`, `status_name`) VALUES
	(1, 'New'),
	(2, 'Registered'),
	(3, 'Paid'),
	(4, 'Delivered');
/*!40000 ALTER TABLE `order_statuses` ENABLE KEYS */;

-- Дамп структуры для таблица geekunivercity_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `product_sku` int(11) DEFAULT NULL,
  `id_parent_product` int(11) DEFAULT NULL,
  `price` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы geekunivercity_db.products: ~16 rows (приблизительно)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `title`, `product_sku`, `id_parent_product`, `price`) VALUES
	(1, 'product1', 100000000, NULL, 100),
	(2, 'product2', 100012000, NULL, 52),
	(3, 'product3', 100034000, NULL, 250),
	(4, 'product4', 230000000, NULL, 320),
	(5, 'product5', 340000000, NULL, 400),
	(6, 'product6', 300002000, NULL, 34),
	(7, 'product7', 100002300, NULL, 530),
	(8, 'product8', 400002300, NULL, 20),
	(9, 'product9', 400002100, NULL, 50),
	(10, 'product10', 400002220, NULL, 75),
	(11, 'product11', 330002100, NULL, 540),
	(12, 'product12', 200002350, NULL, 1230),
	(13, 'product13', 110000000, NULL, 40),
	(14, 'product14', 400002500, NULL, 120),
	(15, 'product15', 232341940, NULL, 200),
	(16, 'product16', 147483647, NULL, 43);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Дамп структуры для таблица geekunivercity_db.products_copy
CREATE TABLE IF NOT EXISTS `products_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `product_sku` int(11) DEFAULT NULL,
  `id_parent_product` int(11) DEFAULT NULL,
  `price` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы geekunivercity_db.products_copy: ~16 rows (приблизительно)
/*!40000 ALTER TABLE `products_copy` DISABLE KEYS */;
INSERT INTO `products_copy` (`id`, `title`, `product_sku`, `id_parent_product`, `price`) VALUES
	(1, 'product1', 100000000, NULL, 100),
	(2, 'product2', 100012000, NULL, 52),
	(3, 'product3', 100034000, NULL, 250),
	(4, 'product4', 230000000, NULL, 320),
	(5, 'product5', 340000000, NULL, 400),
	(6, 'product6', 300002000, NULL, 34),
	(7, 'product7', 100002300, NULL, 530),
	(8, 'product8', 400002300, NULL, 20),
	(9, 'product9', 400002100, NULL, 50),
	(10, 'product10', 400002220, NULL, 75),
	(11, 'product11', 330002100, NULL, 540),
	(12, 'product12', 200002350, NULL, 1230),
	(13, 'product13', 110000000, NULL, 40),
	(14, 'product14', 400002500, NULL, 120),
	(15, 'product15', 232341940, NULL, 200),
	(16, 'product16', 147483647, NULL, 43);
/*!40000 ALTER TABLE `products_copy` ENABLE KEYS */;

-- Дамп структуры для таблица geekunivercity_db.product_properties
CREATE TABLE IF NOT EXISTS `product_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_property_name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы geekunivercity_db.product_properties: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `product_properties` DISABLE KEYS */;
INSERT INTO `product_properties` (`id`, `product_property_name`) VALUES
	(1, 'smallphoto'),
	(2, 'bigphoto'),
	(3, 'size'),
	(4, 'color'),
	(5, 'category'),
	(6, 'description'),
	(7, 'material'),
	(8, 'designer');
/*!40000 ALTER TABLE `product_properties` ENABLE KEYS */;

-- Дамп структуры для таблица geekunivercity_db.product_properties_values
CREATE TABLE IF NOT EXISTS `product_properties_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL DEFAULT '0',
  `id_property` int(11) NOT NULL DEFAULT '0',
  `property_value` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  KEY `id_property` (`id_property`),
  KEY `property_value` (`property_value`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы geekunivercity_db.product_properties_values: ~49 rows (приблизительно)
/*!40000 ALTER TABLE `product_properties_values` DISABLE KEYS */;
INSERT INTO `product_properties_values` (`id`, `id_product`, `id_property`, `property_value`) VALUES
	(1, 1, 1, '/images/photos/item1.jpg'),
	(2, 1, 3, 'XL'),
	(3, 1, 3, 'L'),
	(4, 1, 3, 'M'),
	(5, 1, 4, 'Green'),
	(6, 1, 4, 'Red'),
	(7, 1, 4, 'Black'),
	(8, 2, 1, '/images/photos/item2.jpg'),
	(9, 3, 1, '/images/photos/item3.jpg'),
	(10, 4, 1, '/images/photos/item4.jpg'),
	(11, 5, 1, '/images/photos/item5.jpg'),
	(12, 6, 1, '/images/photos/item6.jpg'),
	(13, 7, 1, '/images/photos/item7.jpg'),
	(14, 8, 1, '/images/photos/item8.jpg'),
	(15, 9, 1, '/images/photos/item9.jpg'),
	(16, 1, 2, '/images/singlepage/itemfoto1.jpg'),
	(17, 1, 5, 'women'),
	(18, 1, 6, 'description1'),
	(19, 1, 7, 'cotton'),
	(20, 1, 8, 'binburhan'),
	(21, 2, 2, '/images/singlepage/itemfoto2.jpg'),
	(23, 2, 3, 'S'),
	(24, 2, 3, 'L'),
	(25, 2, 3, 'M'),
	(26, 2, 4, 'Yellow'),
	(27, 2, 4, 'Orange'),
	(28, 2, 4, 'White'),
	(29, 2, 5, 'men'),
	(30, 2, 6, 'description2'),
	(31, 2, 7, 'silk'),
	(32, 2, 8, 'designer2'),
	(33, 3, 2, '/images/singlepage/itemfoto3.jpg'),
	(34, 3, 3, 'XS'),
	(35, 3, 3, 'XL'),
	(36, 3, 3, 'XXX'),
	(37, 3, 4, 'Pink'),
	(38, 3, 4, 'Blue'),
	(39, 3, 4, 'Black'),
	(40, 3, 5, 'kids'),
	(42, 3, 6, 'description3'),
	(43, 3, 7, 'material3'),
	(44, 3, 8, 'designer3'),
	(46, 10, 1, '/images/photos/item10.jpg'),
	(47, 11, 1, '/images/photos/item11.jpg'),
	(48, 12, 1, '/images/photos/item12.jpg'),
	(49, 13, 1, '/images/photos/item13.jpg'),
	(50, 14, 1, '/images/photos/item14.jpg'),
	(51, 15, 1, '/images/photos/item15.jpg'),
	(52, 16, 1, '/images/photos/item16.jpg');
/*!40000 ALTER TABLE `product_properties_values` ENABLE KEYS */;

-- Дамп структуры для таблица geekunivercity_db.product_properties_values_copy
CREATE TABLE IF NOT EXISTS `product_properties_values_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL DEFAULT '0',
  `id_property` int(11) NOT NULL DEFAULT '0',
  `property_value` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  KEY `id_property` (`id_property`),
  KEY `property_value` (`property_value`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы geekunivercity_db.product_properties_values_copy: ~49 rows (приблизительно)
/*!40000 ALTER TABLE `product_properties_values_copy` DISABLE KEYS */;
INSERT INTO `product_properties_values_copy` (`id`, `id_product`, `id_property`, `property_value`) VALUES
	(1, 1, 1, '/images/photos/item1.jpg'),
	(2, 1, 3, 'XL'),
	(3, 1, 3, 'L'),
	(4, 1, 3, 'M'),
	(5, 1, 4, 'Green'),
	(6, 1, 4, 'Red'),
	(7, 1, 4, 'Black'),
	(8, 2, 1, '/images/photos/item2.jpg'),
	(9, 3, 1, '/images/photos/item3.jpg'),
	(10, 4, 1, '/images/photos/item4.jpg'),
	(11, 5, 1, '/images/photos/item5.jpg'),
	(12, 6, 1, '/images/photos/item6.jpg'),
	(13, 7, 1, '/images/photos/item7.jpg'),
	(14, 8, 1, '/images/photos/item8.jpg'),
	(15, 9, 1, '/images/photos/item9.jpg'),
	(16, 1, 2, '/images/singlepage/itemfoto1.jpg'),
	(17, 1, 5, 'women'),
	(18, 1, 6, 'description1'),
	(19, 1, 7, 'cotton'),
	(20, 1, 8, 'binburhan'),
	(21, 2, 2, '/images/singlepage/itemfoto2.jpg'),
	(23, 2, 3, 'S'),
	(24, 2, 3, 'L'),
	(25, 2, 3, 'M'),
	(26, 2, 4, 'Yellow'),
	(27, 2, 4, 'Orange'),
	(28, 2, 4, 'White'),
	(29, 2, 5, 'men'),
	(30, 2, 6, 'description2'),
	(31, 2, 7, 'silk'),
	(32, 2, 8, 'designer2'),
	(33, 3, 2, '/images/singlepage/itemfoto3.jpg'),
	(34, 3, 3, 'XS'),
	(35, 3, 3, 'XL'),
	(36, 3, 3, 'XXX'),
	(37, 3, 4, 'Pink'),
	(38, 3, 4, 'Blue'),
	(39, 3, 4, 'Black'),
	(40, 3, 5, 'kids'),
	(42, 3, 6, 'description3'),
	(43, 3, 7, 'material3'),
	(44, 3, 8, 'designer3'),
	(46, 10, 1, '/images/photos/item10.jpg'),
	(47, 11, 1, '/images/photos/item11.jpg'),
	(48, 12, 1, '/images/photos/item12.jpg'),
	(49, 13, 1, '/images/photos/item13.jpg'),
	(50, 14, 1, '/images/photos/item14.jpg'),
	(51, 15, 1, '/images/photos/item15.jpg'),
	(52, 16, 1, '/images/photos/item16.jpg');
/*!40000 ALTER TABLE `product_properties_values_copy` ENABLE KEYS */;

-- Дамп структуры для таблица geekunivercity_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `hash_pass` varchar(50) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы geekunivercity_db.users: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `middlename`, `email`, `hash_pass`, `is_admin`) VALUES
	(1, 'User', 'User', NULL, 'user@gb.local', '202cb962ac59075b964b07152d234b70', 0),
	(2, 'Admin', 'Admin', NULL, 'admin@gb.local', '81dc9bdb52d04dc20036dbd8313ed055', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
