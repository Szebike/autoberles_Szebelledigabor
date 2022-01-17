-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2022. Jan 16. 22:47
-- Kiszolgáló verziója: 5.7.31
-- PHP verzió: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `autoberles`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `autok`
--

DROP TABLE IF EXISTS `autok`;
CREATE TABLE IF NOT EXISTS `autok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rendszam` varchar(6) NOT NULL,
  `tipus` varchar(100) NOT NULL,
  `evjarat` int(4) UNSIGNED DEFAULT NULL,
  `szin` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rendszam_UNIQUE` (`rendszam`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `autok`
--

INSERT INTO `autok` (`id`, `rendszam`, `tipus`, `evjarat`, `szin`) VALUES
(1, 'ABC456', 'Ford Ka', 2003, 'Pink'),
(2, 'ABC123', 'Volkswagen Golf', 2011, 'Fehér'),
(3, 'ABC157', 'Ford Mondeo', 2015, 'Fekete'),
(4, 'ABC448', 'Volkswagen Golf', 2012, 'Kék'),
(5, 'RGB321', 'Toyota Avensis', 2011, 'Kék'),
(6, 'SOS221', 'BMW X5', 2022, 'Fekete'),
(7, 'XAS678', 'Toyota Yaris', 2021, 'Piros'),
(8, 'TRS839', 'Ford Ka', 2010, 'Zöld');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `berlok`
--

DROP TABLE IF EXISTS `berlok`;
CREATE TABLE IF NOT EXISTS `berlok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(100) NOT NULL,
  `jogositvany` varchar(15) NOT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `berlok`
--

INSERT INTO `berlok` (`id`, `nev`, `jogositvany`, `telefon`) VALUES
(1, 'Kandúr Károly', 'LR337157', '06-41-334112'),
(2, 'Gipsz Jakab', 'VE445112', '06-41-555223'),
(3, 'Nagy Zoltán', 'EF551245', '06-90-444758');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kolcsonzes`
--

DROP TABLE IF EXISTS `kolcsonzes`;
CREATE TABLE IF NOT EXISTS `kolcsonzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `berloid` int(11) NOT NULL,
  `autoid` int(11) NOT NULL,
  `berletkezdete` date NOT NULL,
  `napokszama` int(11) DEFAULT NULL,
  `napidij` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kolcsonzes_berlo_idx` (`berloid`),
  KEY `kolcsonzes_autok_idx` (`autoid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `kolcsonzes`
--

INSERT INTO `kolcsonzes` (`id`, `berloid`, `autoid`, `berletkezdete`, `napokszama`, `napidij`) VALUES
(1, 1, 3, '2017-04-23', 6, 12500),
(2, 2, 2, '2017-04-25', NULL, 9999),
(3, 2, 3, '2021-10-21', 4, 5000),
(5, 1, 1, '2021-11-01', 1, 3000),
(6, 2, 2, '2021-11-10', 2, 2000),
(7, 1, 2, '2022-01-08', 10, 3000);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `kolcsonzes`
--
ALTER TABLE `kolcsonzes`
  ADD CONSTRAINT `kolcsonzes_autok` FOREIGN KEY (`autoid`) REFERENCES `autok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kolcsonzes_berlo` FOREIGN KEY (`berloid`) REFERENCES `berlok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
