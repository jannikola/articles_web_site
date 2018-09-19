-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2018 at 12:09 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vijesti`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

DROP TABLE IF EXISTS `kategorija`;
CREATE TABLE IF NOT EXISTS `kategorija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opis` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id`, `naziv`, `opis`) VALUES
(1, 'Pocetna ', 'Pocetna'),
(2, 'Fudbal', 'Fudbal'),
(3, 'Kosarka', 'Kosarka'),
(4, 'Tenis', 'Tenis'),
(5, 'Odbojka', 'Odbojka');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '123', 3),
(2, 'peter', '234', 1),
(3, 'sally', '345', 2),
(4, 'alex', '12345', 1),
(5, 'rrrr', '2344', 1),
(6, 'kakav sam ja doktor', 'nisi ni ti los', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

DROP TABLE IF EXISTS `vijest`;
CREATE TABLE IF NOT EXISTS `vijest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tekst` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kategorija` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `naziv`, `slika`, `tekst`, `kategorija`) VALUES
(1, 'Druga pobjeda u nizu', 'druga_pobjeda_u_nizu.jpg', 'Fudbaleri Spartak Zdrepceve krvi ostvarili su dugu pobedu u nizu. Nakon Radnickog u Nisu savladali su Rad golovima na pocetku i na samom kraju utakmice.  Djuricin je mrezu pogodio u 2. minutu a Shimura u sudijskoj nadoknadi u 92 minutu.', 2),
(2, 'Finis koban po velikana', 'finis_koban_po_velikana.jpg', 'Borac je porazen (0:2) u Doboju kod Kaknja od Mladosti u utakmici 24. kola Lige za opstanak, bio je ovo duel trenutno dve prvoplasirane ekipe u mini-ligi, a debi na klupi kao sef strucnog staba, doduse u zvanicni zapisnik prijavljen kao sluzbeni predstavnik, imao je mladi srucnjak Marko Maksimovic. Bivsi fudbaler Banjalucana i mladi reprezentativac BiH.', 2),
(3, 'Porodila se Ana Ivanovic', 'ana_ivanovic.jpg', 'Ana i njen suprug bivsi njemacki reprezentativac Bastijan Svajnstajger sinu su dali ime Luka, prenose svjetski mediji. Beba i mama odlicno se osjecaju, a u Cikago su stigli svi clanovi porodice Svajnstajger-Ivanovic.Ana i Bastijan vjencali su se u julu 2016. godine u Veneciji', 4),
(4, 'Igokea sigurno protiv Sirokog', 'igokea_siroki.jpg', 'Kosarkasi Igokee pobjedom su otvorili Ligu za prvaka Bosne i Hercegovine. Aleksandrovcani su na svom terenu savladali Siroki, rezultatom 91-63.Igokeu je do pobjede predvodio Ponjavic sa 14 poena dok su Jevtovic i Ljubicic dodali po 13. Najefikasniji u redovima Sirokog bio je Makon sa 18 poena.', 3),
(5, 'Krece plej of za odbojkasice', 'plej_of_za_odbojkasice.jpg', 'Posle odigranog zavrsnog finalnog turnira Kupa BiH pred nama su nova odbojkaska uzbudjenja. U petak i subotu prvim cetvrtfinalnim mecevima plej ofa nastavlja se doigravanje za prvaka BiH.\r\n	Igra se do dvije pobjede, a eventualno u trecoj odlucujucoj utakmici prednost domaceg terena bice na strani boljeplasiranog sa premijerligaske tabele.\r\n	Titulu brani Zok \"Bimal jedinstvo\" iz Brckog.', 5),
(6, 'Japanac izbacio Novaka', 'novak_djokovic.jpg', 'Srpski teniser Novak Djokovic nije uspeo da se plasira u trece kolo mastersa u Indijan Velsu, posto je izgubio od Japanca Tara Danijela sa 6:7, 6:4, 1:6.Djokovic je u sestom gemu duplom servis greskom poklonio novi brejk Danijelu, a japanski teniser je u narednom gemu potvrdio svoj najveci trijumf u karijeri.', 4),
(7, 'Federer nakon pet setova do dvadesete GS titule', 'federer.jpg', 'Svajcarac Rodzer Federer pobjedom nad marinom Cilicem iz Hrvatske sa 3:2 (6:2, 6:7, 6:3, 3:6, 6:1) odbranio je titulu na Australijan openu i tako stigao do dvadeste grend slem titule.Pobjednik je rijesen brejkom Rodzera u sestom gemu, treceg seta.Imao je Cilic i dvije sanse za brejk na samom startu petog seta, ali to mu nije uspjelo i vjerovatno ga i kostalo trofeja. Federer se vratio u ritam, prije svega psihicki i sa laganih 6:1 u trecem setu stigao do seste titule u Melburnu, a dvadesete na Grend slem turnirima.', 4),
(8, 'Euroliga: Zvezda sigurna protiv Valensije', 'zvezda_valensija.jpg', 'Kosarkasi Crvene zvezde upisali su 11. pobjedu u Eveoligi. Crveno-beli su veceras slavili u Beogradu protiv Valensije, rezultatom 106-88.Zvezdu je do pobjede predvodio Feldin sa 30 poena, dok je Rafa Martinez imao 22 poena i bio najbolji kod gostiju.', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
