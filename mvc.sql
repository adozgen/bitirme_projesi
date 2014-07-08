-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 08 Tem 2014, 15:40:02
-- Sunucu sürümü: 5.6.12-log
-- PHP Sürümü: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `mvc`
--
CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mvc`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersler`
--

CREATE TABLE IF NOT EXISTS `dersler` (
  `dersid` int(11) NOT NULL AUTO_INCREMENT,
  `drskodu` varchar(20) DEFAULT NULL,
  `dersadi` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`dersid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Tablo döküm verisi `dersler`
--

INSERT INTO `dersler` (`dersid`, `drskodu`, `dersadi`) VALUES
(28, 'bil101', 'FİZİK I'),
(29, 'bil102', 'FİZİK II'),
(30, 'bil103', 'MATEMATİK');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `d_cevapanahtari`
--

CREATE TABLE IF NOT EXISTS `d_cevapanahtari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stipi` varchar(20) DEFAULT NULL,
  `ders` varchar(20) DEFAULT NULL,
  `kturu` varchar(1) DEFAULT NULL,
  `cevapnum` int(1) DEFAULT '0',
  `A` int(1) DEFAULT '0',
  `B` int(1) DEFAULT '0',
  `C` int(1) DEFAULT '0',
  `D` int(1) DEFAULT '0',
  `utime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `d_cevapanahtari`
--

INSERT INTO `d_cevapanahtari` (`id`, `stipi`, `ders`, `kturu`, `cevapnum`, `A`, `B`, `C`, `D`, `utime`) VALUES
(1, 'VİZE', 'FİZİK I', 'B', 1, 1, 0, 0, 0, '2014-06-08'),
(2, 'VİZE', 'FİZİK I', 'B', 2, 1, 0, 0, 0, '2014-06-08'),
(3, 'VİZE', 'FİZİK I', 'B', 3, 1, 0, 0, 0, '2014-06-08'),
(4, 'VİZE', 'FİZİK I', 'B', 4, 1, 0, 0, 0, '2014-06-08'),
(5, 'VİZE', 'FİZİK I', 'B', 5, 1, 0, 0, 0, '2014-06-08'),
(6, 'VİZE', 'FİZİK I', 'B', 6, 1, 0, 0, 0, '2014-06-08'),
(7, 'VİZE', 'FİZİK I', 'B', 7, 1, 0, 0, 0, '2014-06-08'),
(8, 'VİZE', 'FİZİK I', 'B', 8, 0, 1, 0, 0, '2014-06-08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `d_cevaplar`
--

CREATE TABLE IF NOT EXISTS `d_cevaplar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrnum` int(5) DEFAULT '0',
  `ders` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kitap` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `cevapnum` int(1) DEFAULT '0',
  `A` int(1) DEFAULT '0',
  `B` int(1) DEFAULT '0',
  `C` int(1) DEFAULT '0',
  `D` int(1) DEFAULT '0',
  `utime` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Tablo döküm verisi `d_cevaplar`
--

INSERT INTO `d_cevaplar` (`id`, `ogrnum`, `ders`, `kitap`, `cevapnum`, `A`, `B`, `C`, `D`, `utime`) VALUES
(1, 1283, 'FİZİK I', 'B', 1, 0, 0, 1, 0, '2014-06-08'),
(2, 1283, 'FİZİK I', 'B', 2, 0, 0, 1, 0, '2014-06-08'),
(3, 1283, 'FİZİK I', 'B', 3, 0, 0, 1, 0, '2014-06-08'),
(4, 1283, 'FİZİK I', 'B', 4, 0, 1, 0, 0, '2014-06-08'),
(5, 1283, 'FİZİK I', 'B', 5, 0, 1, 0, 1, '2014-06-08'),
(6, 1283, 'FİZİK I', 'B', 6, 1, 0, 0, 0, '2014-06-08'),
(7, 1283, 'FİZİK I', 'B', 7, 0, 0, 0, 0, '2014-06-08'),
(8, 1283, 'FİZİK I', 'B', 8, 0, 0, 0, 0, '2014-06-08'),
(9, 1283, 'FİZİK I', 'B', 9, 0, 0, 0, 1, '2014-06-08'),
(10, 1283, 'FİZİK I', 'B', 10, 0, 0, 0, 0, '2014-06-08'),
(11, 1283, 'FİZİK I', 'B', 11, 0, 0, 0, 0, '2014-06-08'),
(12, 1283, 'FİZİK I', 'B', 12, 0, 0, 0, 1, '2014-06-08'),
(13, 1283, 'FİZİK I', 'B', 13, 0, 0, 0, 0, '2014-06-08'),
(14, 1283, 'FİZİK I', 'B', 14, 0, 0, 1, 0, '2014-06-08'),
(15, 1283, 'FİZİK I', 'B', 15, 0, 0, 1, 0, '2014-06-08'),
(16, 1283, 'FİZİK I', 'B', 16, 0, 0, 0, 1, '2014-06-08'),
(17, 1283, 'FİZİK I', 'B', 17, 0, 0, 0, 1, '2014-06-08'),
(18, 1283, 'FİZİK I', 'B', 18, 1, 0, 0, 0, '2014-06-08'),
(19, 1283, 'FİZİK I', 'B', 19, 0, 0, 0, 0, '2014-06-08'),
(20, 1283, 'FİZİK I', 'B', 20, 1, 0, 0, 0, '2014-06-08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `d_ogrenciler`
--

CREATE TABLE IF NOT EXISTS `d_ogrenciler` (
  `num` int(11) NOT NULL,
  `ad` varchar(200) CHARACTER SET latin1 NOT NULL,
  `soyad` varchar(200) CHARACTER SET latin1 NOT NULL,
  `sinif` int(1) NOT NULL,
  `sube` varchar(1) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `d_ogrenciler`
--

INSERT INTO `d_ogrenciler` (`num`, `ad`, `soyad`, `sinif`, `sube`, `email`) VALUES
(1283, 'adem', 'ozgen', 4, 'b', 'adem.ozgen@bil.omu.edu.tr'),
(1283, 'naim', 'ak?n', 4, 'b', 'nakn@bil.omu.edu.tr'),
(1283, 'selim', 'bayik', 4, 'b', 'selim.bayik@bil.omu.edu.tr'),
(1283, 'adem', 'ozgen', 2, 'b', 'ozgen_19@hotmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `d_rapor`
--

CREATE TABLE IF NOT EXISTS `d_rapor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ogrnum` int(5) DEFAULT '0',
  `ders` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sinif` int(1) DEFAULT '0',
  `sube` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `dogru` float DEFAULT '0',
  `yanlis` float DEFAULT '0',
  `bos` float DEFAULT '0',
  `net` float DEFAULT '0',
  `basari` float DEFAULT '0',
  `utime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `d_rapor`
--

INSERT INTO `d_rapor` (`id`, `ogrnum`, `ders`, `sinif`, `sube`, `dogru`, `yanlis`, `bos`, `net`, `basari`, `utime`) VALUES
(1, 1283, 'FİZİK I', 4, 'b', 1, 5, 2, -0.666667, 10, '2014-06-08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `d_reader`
--

CREATE TABLE IF NOT EXISTS `d_reader` (
  `num` int(11) NOT NULL,
  `file` varchar(255) CHARACTER SET latin1 NOT NULL,
  `puan` double NOT NULL DEFAULT '0',
  `utime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `d_reader`
--

INSERT INTO `d_reader` (`num`, `file`, `puan`, `utime`) VALUES
(1283, 'SBS_001.jpg', 10, '2014-06-08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ip_sayaci`
--

CREATE TABLE IF NOT EXISTS `ip_sayaci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarih` date NOT NULL,
  `tiklama` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `ip_sayaci`
--

INSERT INTO `ip_sayaci` (`id`, `tarih`, `tiklama`, `ip`) VALUES
(1, '2014-05-11', 7, '::1'),
(2, '2014-05-12', 5, '::1'),
(3, '2014-05-17', 1, '::1'),
(4, '2014-05-21', 1, '::1'),
(5, '2014-05-24', 1, '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konular`
--

CREATE TABLE IF NOT EXISTS `konular` (
  `konuid` int(11) NOT NULL AUTO_INCREMENT,
  `mdladi` varchar(50) DEFAULT NULL,
  `konuadi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`konuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Tablo döküm verisi `konular`
--

INSERT INTO `konular` (`konuid`, `mdladi`, `konuadi`) VALUES
(8, 'ELEKTRİK AKIMI', 'LAMBALAR'),
(9, 'ELEKTRİK AKIMI', 'DEVRELER'),
(10, 'ELEKTRİK AKIMI', 'DİRENÇLER'),
(11, 'DOĞRUSAL HAREKET', 'BAĞIL HAREKET'),
(12, 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET'),
(13, 'DOĞRUSAL HAREKET', 'DÜZGÜN HIZLANAN HAREKET'),
(14, 'KALDIRMA KUVVETİ', 'SIVILARIN K. KUVVETİ'),
(15, 'KALDIRMA KUVVETİ', 'GAZLARIN K. KUVVETİ'),
(16, 'DİNAMİK', 'SÜRTÜNME KUVVETİ'),
(17, 'DİNAMİK', 'EĞİK DÜZLEM'),
(18, 'ISI VE SICAKLIK', 'GENLEŞME'),
(19, 'ISI VE SICAKLIK', 'ERİME ve DONMA'),
(20, 'TÜREV', 'Üstel Fonksiyonun Türevi'),
(21, 'TÜREV', 'Tam Değer Fonksiyonunun Türevi'),
(22, 'İNTEGRAL', 'İntegral alma yöntemleri'),
(23, 'İNTEGRAL', 'Basit fonksiyonların integralleri');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kadi` varchar(255) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kadi`, `parola`, `tel`) VALUES
(1, 'adem', '123', ''),
(2, 'adem', '23', ''),
(3, 'a', 'a', ''),
(4, 'aa', 'aa', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `moduller`
--

CREATE TABLE IF NOT EXISTS `moduller` (
  `mdlid` int(11) NOT NULL AUTO_INCREMENT,
  `dersadi` varchar(20) DEFAULT NULL,
  `mdladi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mdlid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Tablo döküm verisi `moduller`
--

INSERT INTO `moduller` (`mdlid`, `dersadi`, `mdladi`) VALUES
(39, 'FİZİK I', 'ELEKTRİK AKIMI'),
(40, 'FİZİK I', 'DOĞRUSAL HAREKET'),
(41, 'FİZİK I', 'KALDIRMA KUVVETİ'),
(42, 'FİZİK II', 'DİNAMİK'),
(43, 'FİZİK II', 'ISI VE SICAKLIK'),
(44, 'MATEMATİK', 'TÜREV'),
(45, 'MATEMATİK', 'İNTEGRAL');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `okutman`
--

CREATE TABLE IF NOT EXISTS `okutman` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `dersadi` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `parola` varchar(20) DEFAULT NULL,
  `ounvan` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Tablo döküm verisi `okutman`
--

INSERT INTO `okutman` (`oid`, `dersadi`, `username`, `parola`, `ounvan`, `email`) VALUES
(15, 'fizik', 'benn', 'ozgen', 'gmail', 'adem.ozgen@bil.omu.edu.tr'),
(16, 'Bimsel HESAPLAMA', 'Bünyamin KARABULUT', 'aaaaa', 'Prof. Dr.', 'ozgen_19@hotmail.com'),
(17, 'sdf', 'sdf', 'sdf', 'sdf', 'nakn@bil.omu.edu.tr'),
(18, 'fizikk', 'selim', '456', 'doc', 'selim.bayik@bil.omu.edu.tr');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `online_ziyaretci`
--

CREATE TABLE IF NOT EXISTS `online_ziyaretci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `tarih` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE IF NOT EXISTS `sorular` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dersadi` varchar(50) NOT NULL,
  `mdladi` varchar(50) NOT NULL,
  `konuadi` varchar(50) NOT NULL,
  `kadi` varchar(50) NOT NULL,
  `zder` varchar(10) NOT NULL,
  `dcev` char(1) NOT NULL,
  `soru` text,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`sid`, `dersadi`, `mdladi`, `konuadi`, `kadi`, `zder`, `dcev`, `soru`) VALUES
(77, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sorular-dairesel-hareket-sor12-1294415767.jpg" /></p>\r\n'),
(78, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sorular-dairesel-hareket-sor10-1294415722.jpg" /></p>\r\n'),
(79, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-oss-hareket-ve-bagil-hareket-sor08-1295513446.jpg" /></p>\r\n'),
(80, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-yatayatissor5-1258017932.jpg" /></p>\r\n'),
(81, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-yatayatissor1-1258016944.jpg" /></p>\r\n'),
(82, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-yatayatissor2-1258016954.jpg" /></p>\r\n'),
(83, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET', 'bbulut', 'ORTA', 'A', '<p><img src="http://www.atomcuk.com/_rsm/icerik_dinamik-ornek-soru-cozumu-ii-fizikci54-1350140865.jpg" /></p>\r\n'),
(84, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET', 'bbulut', 'ORTA', 'A', '<p><img src="http://www.atomcuk.com/_rsm/icerik_dinamik-ornek-soru-cozumu-i-fizikci54-1350140729.jpg" /></p>\r\n'),
(85, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET', 'bbulut', 'ORTA', 'A', '<p><img src="http://testcoz.dersizlesene.com/images/test/18795.jpg" /></p>\r\n'),
(86, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET', 'bbulut', 'ZOR', 'D', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-hareketsor17-1222594040.jpg" /></p>\r\n'),
(87, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN DOĞRUSAL HAREKET', 'bbulut', 'ZOR', 'C', '<p><img src="http://www.onlinesunu.com/wp-content/uploads/9.SINIF-F%C4%B0Z%C4%B0K-KUVVET-VE-HAREKET-%C3%87%C3%96Z%C3%9CML%C3%9C-TEST%C4%B0-4.SORU-S%C3%9CRT%C3%9CNMES%C4%B0Z-YATAY-D%C3%9CZLEM.gif" /></p>\r\n'),
(88, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN HIZLANAN HAREKET', 'bbulut', 'ZOR', 'C', '<p><img src="http://www.onlinesunu.com/wp-content/uploads/9.SINIF-F%C4%B0Z%C4%B0K-KUVVET-VE-HAREKET-%C3%87%C3%96Z%C3%9CML%C3%9C-TEST%C4%B0-10.SORU-D%C3%9CZG%C3%9CN-YAVA%C5%9ELAYAN-D%C3%9CZG%C3%9CN-HIZLANAN-HAREKET.gif" /></p>\r\n'),
(89, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN HIZLANAN HAREKET', 'bbulut', 'ZOR', 'B', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-duseyatissor6-1255995053.jpg" /></p>\r\n'),
(90, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN HIZLANAN HAREKET', 'bbulut', 'ORTA', 'D', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-duseyatissor1-1258018011.jpg" /></p>\r\n'),
(91, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN HIZLANAN HAREKET', 'bbulut', 'KOLAY', 'B', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-duseyatissor4-1255995011.jpg" /></p>\r\n'),
(92, 'FİZİK I', 'DOĞRUSAL HAREKET', 'DÜZGÜN HIZLANAN HAREKET', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-duseyatissor1-1255994966.jpg" /></p>\r\n'),
(93, 'FİZİK I', 'DOĞRUSAL HAREKET', 'BAĞIL HAREKET', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.bilgicik.com/wp-content/uploads/2013/05/bagilhareketcozumlutest1002.jpg" /></p>\r\n'),
(94, 'FİZİK I', 'DOĞRUSAL HAREKET', 'BAĞIL HAREKET', 'bbulut', 'KOLAY', 'B', '<p><img src="http://www.lysmat.com/ossmat/fiz/dog_boy_hareket_bagil_har/coztest01/01.gif?psid=1" /></p>\r\n'),
(95, 'FİZİK I', 'DOĞRUSAL HAREKET', 'BAĞIL HAREKET', 'bbulut', 'ORTA', 'B', '<p><img src="http://www.bilgicik.com/wp-content/uploads/2013/05/bagilhareketcozumlutest1005.jpg" /></p>\r\n'),
(96, 'FİZİK I', 'DOĞRUSAL HAREKET', 'BAĞIL HAREKET', 'bbulut', 'ORTA', 'C', '<p><img src="http://www.lysmat.com/ossmat/fiz/dog_boy_hareket_bagil_har/coztest01/08.gif?psid=1" /></p>\r\n'),
(97, 'FİZİK I', 'DOĞRUSAL HAREKET', 'BAĞIL HAREKET', 'bbulut', 'ZOR', 'C', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-hareketsor16-1222594031.jpg" /></p>\r\n'),
(98, 'FİZİK I', 'DOĞRUSAL HAREKET', 'BAĞIL HAREKET', 'bbulut', 'ZOR', 'B', '<p><img src="http://www.lysmat.com/ossmat/fiz/dog_boy_hareket_bagil_har/coztest01/13.gif?psid=1" /></p>\r\n'),
(99, 'FİZİK I', 'ELEKTRİK AKIMI', 'DEVRELER', 'bbulut', 'ZOR', 'B', '<p><img src="http://hocacamide.com/wp-content/uploads/2013/02/Fiz_10_Ko_23_9.jpg" /></p>\r\n'),
(100, 'FİZİK I', 'ELEKTRİK AKIMI', 'DEVRELER', 'bbulut', 'ORTA', 'B', '<p><img src="http://dershocasi.net/wp-content/uploads/2013/02/Fiz_10_Ko_23_1.jpg" /></p>\r\n'),
(101, 'FİZİK I', 'ELEKTRİK AKIMI', 'DEVRELER', 'bbulut', 'KOLAY', 'B', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-oss-elektrik-ve-lambalar-cikmis-sor01-1294837055.jpg" /></p>\r\n'),
(102, 'FİZİK I', 'ELEKTRİK AKIMI', 'DİRENÇLER', 'bbulut', 'KOLAY', 'C', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-elektrik-akimi-2-sor05-1295005058.jpg" /></p>\r\n'),
(103, 'FİZİK I', 'ELEKTRİK AKIMI', 'DİRENÇLER', 'bbulut', 'ORTA', 'C', '<p><img src="http://yazarlikyazilimi.meb.gov.tr/Materyal/mersin/elektrikakimi/sorular/clip_image007.gif" /></p>\r\n'),
(104, 'FİZİK I', 'ELEKTRİK AKIMI', 'DİRENÇLER', 'bbulut', 'KOLAY', 'C', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-elektrik-akimi-2-sor01-1295005006.jpg" /></p>\r\n'),
(105, 'FİZİK I', 'ELEKTRİK AKIMI', 'DİRENÇLER', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-elektrik-akimi-2-sor03-1295005022.jpg" /></p>\r\n'),
(106, 'FİZİK I', 'KALDIRMA KUVVETİ', 'SIVILARIN K. KUVVETİ', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sivilarin-kaldirma-kuvveti-s03-1298528612.jpg" /></p>\r\n'),
(107, 'FİZİK I', 'KALDIRMA KUVVETİ', 'SIVILARIN K. KUVVETİ', 'bbulut', 'KOLAY', 'A', '<p><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRLcg4JSVPzOvxx7Sguiv911rva2vSBP6H52CFDgv76-XURZ7p8" /></p>\r\n'),
(108, 'FİZİK I', 'KALDIRMA KUVVETİ', 'SIVILARIN K. KUVVETİ', 'bbulut', 'ORTA', 'B', '<p><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQX250zCzspghWBUFlITIVjxkbxIvpxllsyL8r3_9cvR3iQfPWn" /></p>\r\n'),
(109, 'FİZİK I', 'KALDIRMA KUVVETİ', 'SIVILARIN K. KUVVETİ', 'bbulut', 'ORTA', 'B', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sivilarin-kaldirma-kuvveti-s01-1298528585.jpg" /></p>\r\n'),
(110, 'FİZİK I', 'KALDIRMA KUVVETİ', 'SIVILARIN K. KUVVETİ', 'bbulut', 'ZOR', 'D', '<p><img src="http://www.bilgicik.com/wp-content/uploads/2013/04/sivilarinkaldirmakuvveticozumlutest1001.jpg" /></p>\r\n'),
(111, 'FİZİK I', 'KALDIRMA KUVVETİ', 'GAZLARIN K. KUVVETİ', 'bbulut', 'ZOR', 'D', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sivilarin-kaldirma-kuvveti-s11-1298528786.jpg" /></p>\r\n'),
(112, 'FİZİK I', 'KALDIRMA KUVVETİ', 'GAZLARIN K. KUVVETİ', 'bbulut', 'ORTA', 'D', '<p><img src="http://www.lysmat.com/ossmat/fiz/sivi/coztest01/09.gif?psid=1" /></p>\r\n'),
(113, 'FİZİK I', 'KALDIRMA KUVVETİ', 'GAZLARIN K. KUVVETİ', 'bbulut', 'ORTA', 'C', '<p><img src="http://www.test-coz.com/wp-content/uploads/2011/10/118.png" /></p>\r\n'),
(114, 'FİZİK I', 'KALDIRMA KUVVETİ', 'GAZLARIN K. KUVVETİ', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sivilarin-kaldirma-kuvveti-s07-1298528709.jpg" /></p>\r\n'),
(115, 'FİZİK I', 'KALDIRMA KUVVETİ', 'GAZLARIN K. KUVVETİ', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.lysmat.com/ossmat/fiz/sivi/coztest01/05.gif?psid=1" /></p>\r\n'),
(116, 'FİZİK I', 'DİNAMİK', 'SÜRTÜNME KUVVETİ', 'bbulut', 'KOLAY', 'A', '<p><img src="http://fizikdunyasi.ucoz.com/dosyaresim/soruuu.JPG" /></p>\r\n'),
(117, 'FİZİK I', 'DİNAMİK', 'SÜRTÜNME KUVVETİ', 'bbulut', 'KOLAY', 'C', '<p><img src="http://www.onlinesunu.com/wp-content/uploads/9.SINIF-F%C4%B0Z%C4%B0K-ENERJ%C4%B0-%C3%87%C3%96Z%C3%9CML%C3%9C-TEST%C4%B0-8.SORU-S%C3%9CRT%C3%9CNME-KUVVET%C4%B0-HESAPLAMA.gif" /></p>\r\n'),
(118, 'FİZİK I', 'DİNAMİK', 'SÜRTÜNME KUVVETİ', 'bbulut', 'ORTA', 'C', '<p><img src="http://www.atomcuk.com/_rsm/icerik_dinamik-ornek-soru-cozumu-ii-fizikci54-1350140865.jpg" /></p>\r\n'),
(119, 'FİZİK I', 'DİNAMİK', 'SÜRTÜNME KUVVETİ', 'bbulut', 'ZOR', 'C', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-is-guc-enerjisor3-1227292824.jpg" /></p>\r\n'),
(120, 'FİZİK I', 'DİNAMİK', 'EĞİK DÜZLEM', 'bbulut', 'ZOR', 'C', '<p><img src="http://img338.imageshack.us/img338/551/2fiz4snav.jpg" /></p>\r\n'),
(121, 'FİZİK I', 'DİNAMİK', 'EĞİK DÜZLEM', 'bbulut', 'ORTA', 'B', '<p><img src="http://lh4.ggpht.com/-A_wk7R4pkdw/TgiCkk91rmI/AAAAAAAAAbI/5ttYdv3Aqhg/%25255BUNSET%25255D.jpg" /></p>\r\n'),
(122, 'FİZİK I', 'DİNAMİK', 'EĞİK DÜZLEM', 'bbulut', 'KOLAY', 'B', '<p><img src="http://www.onlinesunu.com/wp-content/uploads/9.SINIF-F%C4%B0Z%C4%B0K-KUVVET-VE-HAREKET-%C3%87%C3%96Z%C3%9CML%C3%9C-TEST%C4%B0-2.SORU-E%C4%9E%C4%B0K-D%C3%9CZLEMDE-%C4%B0VME-HESAPLAMA.gif" /></p>\r\n'),
(123, 'FİZİK I', 'DİNAMİK', 'EĞİK DÜZLEM', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.lysmat.com/ossmat/snv/konulara_gore/fiz/dinamik/02.gif?psid=1" /></p>\r\n'),
(124, 'FİZİK I', 'ISI VE SICAKLIK', 'GENLEŞME', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-isi-sicaklik-genlesme-s02-1298530689.jpg" /></p>\r\n'),
(125, 'FİZİK I', 'ISI VE SICAKLIK', 'GENLEŞME', 'bbulut', 'KOLAY', 'A', '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-isi-sicaklik-genlesme-s15-1298531295.jpg" /></p>\r\n'),
(126, 'FİZİK I', 'ISI VE SICAKLIK', 'GENLEŞME', 'bbulut', 'ORTA', 'C', '<p><img src="http://www.lysmat.com/ossmat/snv/konulara_gore/fiz/isi_sicaklik_genlesme/03.gif?psid=1" /></p>\r\n'),
(127, 'FİZİK I', 'ISI VE SICAKLIK', 'GENLEŞME', 'bbulut', 'ZOR', 'C', '<p><img src="http://www.lysmat.com/ossmat/fiz/isi_sic_genlsme/coztest02/04.gif?psid=1" /></p>\r\n'),
(128, 'FİZİK I', 'ISI VE SICAKLIK', 'ERİME ve DONMA', 'bbulut', 'ZOR', 'C', '<p><img src="http://www.osskimya.com/wp-content/uploads/2008/10/20045-68.JPG" /></p>\r\n'),
(129, 'FİZİK I', 'ISI VE SICAKLIK', 'ERİME ve DONMA', 'bbulut', 'ORTA', 'B', '<p><img src="http://www.osskimya.com/wp-content/uploads/2008/10/2004-69.JPG" /></p>\r\n'),
(130, 'FİZİK I', 'ISI VE SICAKLIK', 'ERİME ve DONMA', 'bbulut', 'KOLAY', 'B', '<p><img src="http://www.osskimya.com/wp-content/uploads/2008/10/2004-66.JPG" /></p>\r\n'),
(131, 'MATEMATİK', 'TÜREV', 'Üstel Fonksiyonun Türevi', 'bbulut', 'KOLAY', 'A', '<p><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUzNCczZB8Zxi2sCmFH6fxUGMahPmpaVK_81ff2LHgstlING0ypw" /></p>\r\n'),
(132, 'MATEMATİK', 'TÜREV', 'Üstel Fonksiyonun Türevi', 'bbulut', 'ORTA', 'C', '<p><img src="http://www.lysmat.com/ossmat/snv/konulara_gore/mat/logaritma/20.png?psid=1" /></p>\r\n'),
(133, 'MATEMATİK', 'TÜREV', 'Üstel Fonksiyonun Türevi', 'bbulut', 'ZOR', 'C', '<p><img src="http://www.lysmat.com/ossmat/snv/konulara_gore/mat/logaritma/4.png?psid=1" /></p>\r\n'),
(134, 'MATEMATİK', 'TÜREV', 'Tam Değer Fonksiyonunun Türevi', 'bbulut', 'ZOR', 'C', '<p><img src="http://www.lysmat.com/ossmat/mt_/l1/bag_fonk/coztest1/4.gif?psid=1" /></p>\r\n'),
(135, 'MATEMATİK', 'TÜREV', 'Tam Değer Fonksiyonunun Türevi', 'bbulut', 'ZOR', 'C', '<p><img src="http://www.lysmat.com/ossmat/mt_/l1/bag_fonk/coztest1/9.gif?psid=1" /></p>\r\n'),
(136, 'MATEMATİK', 'TÜREV', 'Tam Değer Fonksiyonunun Türevi', 'bbulut', 'ORTA', 'C', '<p><img src="http://data-ist.com/cs/fonksiyonlar/s13.jpg" /></p>\r\n'),
(137, 'MATEMATİK', 'TÜREV', 'Tam Değer Fonksiyonunun Türevi', 'bbulut', 'ORTA', 'C', '<p><img src="http://data-ist.com/cs/fonksiyonlar/s20.jpg" /></p>\r\n'),
(138, 'MATEMATİK', 'TÜREV', 'Tam Değer Fonksiyonunun Türevi', 'bbulut', 'KOLAY', 'C', '<p><img src="http://data-ist.com/cs/fonksiyonlar/s15.jpg" /></p>\r\n'),
(139, 'MATEMATİK', 'TÜREV', 'Tam Değer Fonksiyonunun Türevi', 'bbulut', 'KOLAY', 'C', '<p><img src="http://i1289.photobucket.com/albums/b504/emirhanerturk/ygs/2013/matematik/matemetik27_zpsa123b26d.jpg" /></p>\r\n'),
(140, 'MATEMATİK', 'İNTEGRAL', 'İntegral alma yöntemleri', 'bbulut', 'KOLAY', 'C', '<p><img src="http://www.lysmat.com/ossmat/snv/konulara_gore/mat/fonk1/01.gif?psid=1" /></p>\r\n'),
(141, 'MATEMATİK', 'İNTEGRAL', 'İntegral alma yöntemleri', 'bbulut', 'KOLAY', 'B', '<p><img src="http://www.lysmat.com/ossmat/snv/konulara_gore/mat/fonk1/07.gif?psid=1" /></p>\r\n'),
(142, 'MATEMATİK', 'İNTEGRAL', 'İntegral alma yöntemleri', 'bbulut', 'ORTA', 'B', '<p><img src="http://www.lysmat.com/ossmat/snv/konulara_gore/mat/fonk1/10.gif?psid=1" /></p>\r\n'),
(143, 'MATEMATİK', 'İNTEGRAL', 'İntegral alma yöntemleri', 'bbulut', 'ORTA', 'B', '<p><img src="http://www.lysmat.com/ossmat/mt_/l4/ozel_tan_fon/coztest2/7.gif?psid=1" /></p>\r\n'),
(144, 'MATEMATİK', 'İNTEGRAL', 'İntegral alma yöntemleri', 'bbulut', 'ZOR', 'B', '<p><img src="http://www.lysmat.com/ossmat/mt_/l4/ozel_tan_fon/coztest3/9.gif?psid=1" /></p>\r\n'),
(145, 'MATEMATİK', 'İNTEGRAL', 'İntegral alma yöntemleri', 'bbulut', 'ZOR', 'B', '<p><img src="http://www.lysmat.com/ossmat/mt_/l4/int/coztest21/6.gif?psid=1" /></p>\r\n'),
(146, 'MATEMATİK', 'İNTEGRAL', 'Basit fonksiyonların integralleri', 'bbulut', 'ZOR', 'B', '<p><img src="http://www.lysmat.com/ossmat/mt_/l1/bag_fonk/coztest1/4.gif?psid=1" /></p>\r\n'),
(147, 'MATEMATİK', 'İNTEGRAL', 'Basit fonksiyonların integralleri', 'bbulut', 'ORTA', 'D', '<p><img src="http://data-ist.com/cs/fonksiyonlar/s60.jpg" /></p>\r\n'),
(148, 'MATEMATİK', 'İNTEGRAL', 'Basit fonksiyonların integralleri', 'bbulut', 'KOLAY', 'B', '<p><img src="http://www.matematikpiri.com/forumportal/uploads/1347209266.jpg" /></p>\r\n'),
(149, 'MATEMATİK', 'TÜREV', 'Üstel Fonksiyonun Türevi', 'sedat', 'KOLAY', 'A', '<p><img src="http://img18.imageshack.us/img18/9141/otf5soru.jpg" /></p>\r\n'),
(151, 'FİZİK I', 'ELEKTRİK AKIMI', 'LAMBALAR', 'a', 'KOLAY', 'A', '<p><img src="http://www.lysmat.com/ossmat/snv/konulara_gore/fiz/fizigin_dogasi_birimler/01.gif?psid=1" /></p>\r\n\r\n<p>A: ADEM &nbsp;B: NAim &nbsp;C:Selim</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ssinavlar`
--

CREATE TABLE IF NOT EXISTS `ssinavlar` (
  `sinid` int(11) NOT NULL AUTO_INCREMENT,
  `dersadi` varchar(20) DEFAULT NULL,
  `stipi` varchar(20) NOT NULL,
  `starh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kturu` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`sinid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Tablo döküm verisi `ssinavlar`
--

INSERT INTO `ssinavlar` (`sinid`, `dersadi`, `stipi`, `starh`, `kturu`) VALUES
(19, 'FİZİK I', 'VİZE', '2014-06-04 21:00:00', 'B'),
(20, 'FİZİK I', 'VİZE', '2014-06-05 21:00:00', 'B'),
(21, 'FİZİK I', 'VİZE', '2014-06-07 21:00:00', 'B');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ssorular`
--

CREATE TABLE IF NOT EXISTS `ssorular` (
  `soruid` int(11) NOT NULL AUTO_INCREMENT,
  `sinid` int(11) NOT NULL,
  `ssoru` varchar(1000) NOT NULL,
  `scev` varchar(1) NOT NULL,
  PRIMARY KEY (`soruid`),
  KEY `sinid` (`sinid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- Tablo döküm verisi `ssorular`
--

INSERT INTO `ssorular` (`soruid`, `sinid`, `ssoru`, `scev`) VALUES
(80, 19, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-yatayatissor1-1258016944.jpg" /></p>\r\n', 'A'),
(81, 19, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-yatayatissor5-1258017932.jpg" /></p>\r\n', 'A'),
(82, 19, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sorular-dairesel-hareket-sor10-1294415722.jpg" /></p>\r\n', 'A'),
(83, 19, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-yatayatissor2-1258016954.jpg" /></p>\r\n', 'A'),
(84, 19, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sorular-dairesel-hareket-sor12-1294415767.jpg" /></p>\r\n', 'A'),
(85, 19, '<p><img src="http://www.atomcuk.com/_rsm/icerik_dinamik-ornek-soru-cozumu-ii-fizikci54-1350140865.jpg" /></p>\r\n', 'A'),
(86, 19, '<p><img src="http://testcoz.dersizlesene.com/images/test/18795.jpg" /></p>\r\n', 'A'),
(87, 19, '<p><img src="http://www.atomcuk.com/_rsm/icerik_dinamik-ornek-soru-cozumu-i-fizikci54-1350140729.jpg" /></p>\r\n', 'A'),
(88, 20, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-yatayatissor5-1258017932.jpg" /></p>\r\n', 'A'),
(89, 20, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sorular-dairesel-hareket-sor10-1294415722.jpg" /></p>\r\n', 'A'),
(90, 20, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sorular-dairesel-hareket-sor12-1294415767.jpg" /></p>\r\n', 'A'),
(91, 20, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-yatayatissor1-1258016944.jpg" /></p>\r\n', 'A'),
(92, 21, '<p><img src="http://www.lysmat.com/ossmat/snv/konulara_gore/fiz/fizigin_dogasi_birimler/01.gif?psid=1" /></p>\r\n\r\n<p>A: ADEM &nbsp;B: NAim &nbsp;C:Selim</p>\r\n', 'A'),
(93, 21, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-yatayatissor1-1258016944.jpg" /></p>\r\n', 'A'),
(94, 21, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-yatayatissor2-1258016954.jpg" /></p>\r\n', 'A'),
(95, 21, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sorular-dairesel-hareket-sor10-1294415722.jpg" /></p>\r\n', 'A'),
(96, 21, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-sorular-dairesel-hareket-sor12-1294415767.jpg" /></p>\r\n', 'A'),
(97, 21, '<p><img src="http://www.fizikciyiz.com/_rsm/sorular-yatayatissor5-1258017932.jpg" /></p>\r\n', 'A'),
(98, 21, '<p><img src="http://www.lysmat.com/ossmat/snv/konulara_gore/fiz/dinamik/02.gif?psid=1" /></p>\r\n', 'A'),
(99, 21, '<p><img src="http://www.onlinesunu.com/wp-content/uploads/9.SINIF-F%C4%B0Z%C4%B0K-KUVVET-VE-HAREKET-%C3%87%C3%96Z%C3%9CML%C3%9C-TEST%C4%B0-2.SORU-E%C4%9E%C4%B0K-D%C3%9CZLEMDE-%C4%B0VME-HESAPLAMA.gif" /></p>\r\n', 'B');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `toplam_sayac`
--

CREATE TABLE IF NOT EXISTS `toplam_sayac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toplam_tekil` int(11) NOT NULL,
  `toplam_cogul` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `toplam_sayac`
--

INSERT INTO `toplam_sayac` (`id`, `toplam_tekil`, `toplam_cogul`) VALUES
(1, 5, 15);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `ssorular`
--
ALTER TABLE `ssorular`
  ADD CONSTRAINT `ssorular_ibfk_1` FOREIGN KEY (`sinid`) REFERENCES `ssinavlar` (`sinid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
