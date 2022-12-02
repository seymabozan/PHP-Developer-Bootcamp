-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 01 Ara 2022, 18:15:47
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bootcamp_proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `admin`, `sifre`) VALUES
(1, 'seyma', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `url`
--

DROP TABLE IF EXISTS `url`;
CREATE TABLE IF NOT EXISTS `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uzun_url` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kisa_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kisa_url` (`kisa_url`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `url`
--

INSERT INTO `url` (`id`, `uzun_url`, `kisa_url`) VALUES
(93, 'https://www.linkedin.com/company/flo-ma%C4%9Fazac%C4%B1l%C4%B1k/', 'http://b01b8'),
(92, 'https://www.kariyer.net/firma-profil/flo-magazacilik-6024-37383', 'http://a71a7'),
(91, 'https://www.youtube.com/watch?v=fJLpxo1i6BU&list=PLKnjBHu2xXNNiJdlhiEl_RMkK0PbJ1_DB&index=5', 'http://7831f'),
(90, 'https://www.youtube.com/watch?v=40Ip2UkpJDc&list=PLKnjBHu2xXNNiJdlhiEl_RMkK0PbJ1_DB', 'http://55f81'),
(89, 'https://www.idrlabs.com/tr/acik-enneagram/testi.php', 'http://24b71');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
