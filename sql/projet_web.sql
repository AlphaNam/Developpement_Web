-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 14 juil. 2019 à 17:32
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `product_code`, `product_name`, `product_desc`, `price`, `units`, `total`, `date`, `email`) VALUES
(12, 'product1', 'Sports Shoes', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 5000, 1, 5000, '2019-07-13 15:18:17', 'paul@gmail.com'),
(13, 'product2', 'Casquette NY', 'La celebre equipe de New York, les yankees ou yanks sont surnommes \"les bombardiers du bronx\". Les New York Yankees sont les plus primes de la ligue majeure de baseball avec 27 titres. Leur logo NY est devenu mythique. En vente exclusive chez nous !', 25, 1, 25, '2019-07-14 04:35:27', 'kevin@gmail.com'),
(14, 'product2', 'Casquette NY', 'La celebre equipe de New York, les yankees ou yanks sont surnommes \"les bombardiers du bronx\". Les New York Yankees sont les plus primes de la ligue majeure de baseball avec 27 titres. Leur logo NY est devenu mythique. En vente exclusive chez nous !', 25, 1, 25, '2019-07-14 04:35:42', 'kevin@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'product1', 'adidas Yeezy Boost 350 ', 'The Yeezy Beluga 2.0 takes Kanye West\'s famous adidas sneakers full circle by returning to the colors of the first adidas Yeezy Boost 350 V2. The Adidas Yeezy 750 Boot was also part of this collection and it was released in four different colorways.', 'sports_shoes.jpg', 80, '99.99'),
(2, 'product2', 'Casquette NY', 'La celebre equipe de New York, les yankees ou yanks sont surnommes \"les bombardiers du bronx\". Les New York Yankees sont les plus primes de la ligue majeure de baseball avec 27 titres. Leur logo NY est devenu mythique. En vente exclusive chez nous !', 'cap.jpg', 25, '24.99'),
(3, 'product3', 'Apple Watch', 'Apple Watch is a line of smartwatches designed, developed, and marketed by Apple Inc. It incorporates fitness tracking and health-oriented capabilities with integration with iOS and other Apple products and services.', 'sports_band.jpg', 34, '240.00'),
(4, 'product4', 'Swimming short', 'Rock the beach with our new short and its selected fabrics to better swim. You no longer need your arms to swim, our short swims for you !', 'short.jpg', 5, '9.99'),
(5, 'product5', 'Nike Claquettes', 'You can show off during the summer with these Nike Benassi tap dance for men. With a unique synthetic lined strap for greater comfort and easy donning. The midsole is made of Phylon for more cushioning, while keeping its lightness. You can easily run.', 'claquette.jpg', 20, '25.00'),
(6, 'product6', 'Planche de surf', 'Developed by our team for the experienced surfer to take as many waves as possible in the shorebreak without the risk of getting hurt with his board.', 'planche.jpg', 5, '149.99'),
(7, 'product7', 'T-shirt Adidas', 'A T-shirt is an undershirt that owes its name to its \"T\" shape, without collar and initially with short sleeves but eventually with long sleeves, hood or turtleneck.', 't_shirt.jpg', 5, '15.00'),
(8, 'product8', 'Scuba mask', 'SourceWithout our scuba masks, we would be little more than blind explorers in the underwater world. A mask allows us to see all the magic of the reefs, wrecks, kelp forests, and creatures we are privileged to visit.', 'snork.jpg', 24, '24.00'),
(9, 'product9', 'Adidas tracksuit', 'A tracksuit is an article of clothing consisting of two parts: trousers and a jacket usually with front zipper.', 'jogging.jpg', 5, '30.00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pin`, `email`, `password`, `type`) VALUES
(1, 'Agilan', 'Colbert', 'Avenue Republique', 'Saint Denis', 95014, 'agilan@gmail.com', 'agilan', 'admin'),
(2, 'Kevin', 'Rattinam', 'Rue Conte', 'Paris', 75001, 'kevin@gmail.com', 'kevin', 'admin'),
(3, 'Paul', 'Pierre', 'Rue Grand Air', 'Villemomble', 93001, 'paul@gmail.com', 'paul', 'user'),
(4, 'Test', 'test', 'test', 'test', 98777, 'test@test.com', 'test', 'user'),
(5, 'aaa', 'aaaa', 'aaa', 'aaa', 99, 'aa@gg.com', 'aa', 'user'),
(6, 'bb', 'bb', 'bb', 'bb', 8899, 'bb@gmail.com', 'bb', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
