-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 07:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18604866_sajtphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id` int(10) NOT NULL,
  `ime_prezime` varchar(250) NOT NULL,
  `datum` varchar(255) NOT NULL,
  `opis` varchar(1000) NOT NULL,
  `index` varchar(50) NOT NULL,
  `mesto` varchar(250) NOT NULL,
  `slika` varchar(250) NOT NULL,
  `id_a` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id`, `ime_prezime`, `datum`, `opis`, `index`, `mesto`, `slika`, `id_a`) VALUES
(1, 'Igor Jovanovic', '29.10.1998', 'Ovaj sajt je napravljen za potrebe predmeta praktikum iz php-a.Nadam se da vam se svideo.', '127/18', 'Beograd', 'slike/author.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_uloga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `name`, `lName`, `username`, `password`, `email`, `id_uloga`) VALUES
(2, 'Milos', ' 123', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'milosmiki@gmail.com', 2),
(7, 'pera', 'Peric', 'pekili', '12a3f1820abd47e1c0ac53c5c2450a10', 'pera@gmai.com', 1),
(11, 'Pera', 'Peric', 'Peric', 'a541ace3bec0604b356dd48b10486ed5', 'milosd11@gmail.com', 1),
(15, 'kor321', 'kk321', 'kor31', '3347a705e7ab944a2c5fad5fd68a2eca', 'korisnik123@gmail.com@gmail.com', 1),
(17, 'Sddd', 'Dsss', 'Sddd', '1ff5950a2ff4c4114d91cefc0c65b5ff', 'aasfdsds@gmail.com', 1),
(18, 'Sddd', 'Dsss', 'crnimc', '3347a705e7ab944a2c5fad5fd68a2eca', 'aasfdsdss@gmail.com', 1),
(36, 'Marko', 'Markovic', 'MMarko', '3347a705e7ab944a2c5fad5fd68a2eca', 'mmc@gmail.com', 1),
(49, 'Test', 'Test', 'test123', '2d9abb02a761a5c593726bb59c28b8db', 'test@test.com', 1),
(51, 'Igor', 'Jvnvc', 'IgorJ', '1a2a93c5ded62b40b0d63d5b35bcff29', 'igorjvnvc6@gmail.com', 2),
(55, 'Obrisati', 'Obrisati', 'Obrisati', 'Obrisati123!', 'obrisati@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `id_korpa` int(50) NOT NULL,
  `kolicina` int(250) NOT NULL,
  `id_telefon` int(250) NOT NULL,
  `id_korisnik` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`id_korpa`, `kolicina`, `id_telefon`, `id_korisnik`) VALUES
(31, 1, 16, 36),
(61, 1, 16, 15),
(62, 4, 20, 2),
(63, 1, 32, 2),
(64, 5, 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE `marka` (
  `id_marka` int(20) NOT NULL,
  `naziv_m` varchar(100) NOT NULL,
  `slika_m` varchar(255) NOT NULL,
  `opis_m` varchar(500) NOT NULL,
  `link` varchar(255) NOT NULL,
  `osnovan` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`id_marka`, `naziv_m`, `slika_m`, `opis_m`, `link`, `osnovan`) VALUES
(1, 'Samsung', 'slike/samsung.jpg', 'Samsung Grupa  je južnokorejska multinacionalna kompanija konglomerat sa sedištem u gradu Samsung Taun, Seul. Obuhvata brojne filijale i zavisne kompanije, ujedinjene pod najvećim južnokorejskim brendom Samsung.Poznate industrijske filijale ove grupe su Samsung Elektronika (engl. Samsung Electronics), druga kompanija u svetu u oblasti informacionih tehnologija po prihodima u 2011. godini.', 'https://www.samsung.com/rs/', 1938),
(2, 'Huawei', 'slike/huawei.jpg', 'Kompanija Huawei je vodeći svetski dobavljač infrastrukturnih i pametnih uređaja u oblasti informacione i komunikacione tehnologije (ICT). S integrisanim rešenjima u četiri ključna domena - telekomunikacione mreže, IT, pametni uređaji i usluge u oblaku - čvrsti smo u nameri da digitalni svet donesemo svakoj osobi, u svaki dom i organizaciju za potpuno povezan, inteligentan svet.Kao jedna od tri Huawei biznis grupacije, Huawei Consumer BG predstavlja vodeću grupaciju u svim AI scenarijima života.', 'https://huaweishop.rs/', 1987),
(3, 'Apple', 'slike/apple.jpg', 'Kao jedna od tri Huawei biznis grupacije, Huawei Consumer BG predstavlja vodeću grupaciju u svim AI scenarijima života, obuhvatajući pametne telefone, PC i tablete, nosive uređaje, mobilne širokopojasne uređaje, porodične uređaje i cloud usluge za uređaje.1975 pre nego što je osnovao kompaniju Apple, Steve Wozniak je bio stručnjak za elektroniku i radio za firmu HP Hewlett-Packard. U slobodno vreme pomagao je prijatelju a kasnije i kolegi Steve-u Jobsu koji je u to vreme dizajnirao video igre.', 'https://www.apple.com/', 1976),
(4, 'Xiaomi', 'slike/xiaomi.jpg', 'Xiaomi je kompanija za čiji naziv verovatno ne znate kako se izgovara. Međutim, to je samo sitnica u odnosu na ostale zanimljivosti koje se odnose na Xiaomi kompaniju.Komapnija Xiaomi nema preterano dugu istoriju. Naime, sve je krenulo od startup-a koji je doveo do toga da je Xiaomi krajem 2010 godine postao popularan u celom svetu. Naravno, Xiaomi je znatno popularniji u Kini nego u bilo kojoj drugoj državi.', 'https://mi-srbija.rs/', 2010),
(5, 'Honor', 'slike/honor.jpg', 'Ono što Honor nudi u odnosu na konkurenciju su telefoni vrlo dobre specifikacije, čija je cena prihvatljiva najvećem broju korisnika. Ipak, Honor je inovativna kompanija, koja ulaže u istraživanje i razvoj. Jedan od telefona koji mnogi konkurenti još uvek nisu u stanju da ponude  je Honor Magic, koji je ponuđen samo na nekoliko tržišta, kao eksperiment, a prošao je odlično i značajno ohrabrio kompaniju da nastavi u istom smeru razvoja i ulaganja u budućnosti. ', 'https://www.hihonor.com/rs/', 2013);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `id_putanja` int(50) NOT NULL,
  `putanja` varchar(250) NOT NULL,
  `Naziv` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `pollid` double NOT NULL,
  `question` text DEFAULT NULL,
  `poll_date` double DEFAULT NULL,
  `options` varchar(250) DEFAULT NULL,
  `votes` varchar(250) DEFAULT NULL,
  `close` tinyint(1) DEFAULT NULL,
  `number_options` tinyint(3) DEFAULT NULL,
  `poll_timeout` double DEFAULT NULL,
  `voters` int(11) DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `last_vote_date` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`pollid`, `question`, `poll_date`, `options`, `votes`, `close`, `number_options`, `poll_timeout`, `voters`, `public`, `last_vote_date`) VALUES
(1, 'Koji telefon vi imate?', 1524829888, 'Samsung||||Apple||||Huawei||||Drugo', '26||||13||||15||||15||||1||||||||1', 0, 4, 0, 71, 0, 1524836731);

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE `poruke` (
  `id` int(100) NOT NULL,
  `poruka_ime` varchar(250) NOT NULL,
  `poruka_email` varchar(250) NOT NULL,
  `poruka_sub` varchar(250) NOT NULL,
  `poruka_p` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poruke`
--

INSERT INTO `poruke` (`id`, `poruka_ime`, `poruka_email`, `poruka_sub`, `poruka_p`) VALUES
(1, 'milos', 'milos@gmail.com', 'Kako ste', 'Koji telefon je najbolji ?'),
(4, 'Petar', 'pera@p.com', 'pera', 'Da li imate iphone 13 pro?'),
(6, 'mica', 'mica@m.com', 'M', 'Da li je bolji s20+ ili s20fe?'),
(7, 'Kole', 'ko@le.com', 'le', 'Do kada radite u nedelju ? '),
(9, 'Petar', 'koje@g.com', 'jasam', 'Koliko kosta honor 50?'),
(13, 'milos', 'aasfd90212@gmail.com', 'Da', 'Da li imate s22 ultra?'),
(17, 'milos', 'miloscrnogorac97@gmail.com', 'Da', 'ne'),
(20, 'KorisnikK', 'korisnik@gmail.com', '123', 'Ovo je pitanje');

-- --------------------------------------------------------

--
-- Table structure for table `sistem`
--

CREATE TABLE `sistem` (
  `id_os` int(10) NOT NULL,
  `naziv_os` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sistem`
--

INSERT INTO `sistem` (`id_os`, `naziv_os`) VALUES
(1, 'Android'),
(2, 'IOS'),
(3, 'Windows');

-- --------------------------------------------------------

--
-- Table structure for table `telefon`
--

CREATE TABLE `telefon` (
  `id` int(255) NOT NULL,
  `opis` varchar(500) NOT NULL,
  `cena` float NOT NULL,
  `id_marka` int(20) NOT NULL,
  `id_os` int(20) NOT NULL,
  `slika` varchar(255) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `mala_slika` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `telefon`
--

INSERT INTO `telefon` (`id`, `opis`, `cena`, `id_marka`, `id_os`, `slika`, `naziv`, `mala_slika`) VALUES
(1, ' Najnoviji samsung telefon sa 108mgp kamerom i najnovijim exynos 2200 cipom i tako                                                                                                          ', 1200, 1, 2, 'slike/07GmIupznWhAzDQ3Z7li99a-1..v1632849626.jpg', 'Galaxy S22      ', 'slike/mala/07GmIupznWhAzDQ3Z7li99a-1..v1632849626.jpg'),
(10, 'Najnovi iphone telefon koji nema granica        ', 1700, 3, 2, 'slike/iphone13Pro.jpg', 'Iphone 13 pro             ', 'slike/mala/iphone13Pro.jpg'),
(15, 'Pristupacan telefon sa sjajnim karakteristikama      ', 254, 1, 1, 'slike/a52s.jpg', 'Galaxy A52s      ', 'slike/mala/a52s.jpg'),
(16, 'Telefon namenjen za fanove samsunga     ', 652, 1, 1, 'slike/s20fe.jpg', 'Galaxy S20FE     ', 'slike/mala/s20fe.jpg'),
(19, 'Honor se vratio na najbolji nacin      ', 450, 5, 1, 'slike/Honor50.png', 'Honor 50      ', 'slike/mala/Honor50.png'),
(20, 'Isti honor 50 samo nemamo google       ', 411, 2, 1, 'slike/gsmarena_008.jpg', 'Nova 9       ', 'slike/mala/gsmarena_008.jpg'),
(23, 'Iphone za sirotinju     ', 556, 3, 2, 'slike/ise.jpg', 'Iphone SE     ', 'slike/mala/ise.jpg'),
(24, 'Snapdragon 888, 108MP kamera sta vise pozeleti    ', 425, 4, 1, 'slike/xiaomiMi11.jpg', 'Mi 11    ', 'slike/mala/xiaomiMi11.jpg'),
(27, 'Savrsen odnos cene i kvaliteta   ', 320, 4, 1, 'slike/poco.jpg', 'Poco X3   ', 'slike/mala/poco.jpg'),
(28, 'Vrlo kvalitetan i pristupacan telefon   ', 270, 2, 1, 'slike/p2021smart.jpg', 'P Smart 2021   ', 'slike/mala/p2021smart.jpg'),
(29, 'Uzmi saomi brate veruj mi    ', 280, 4, 1, 'slike/noteredmi10.jpg', 'Redmi Note 10    ', 'slike/mala/noteredmi10.jpg'),
(32, 'Buducnost je stigla   ', 1500, 1, 1, 'slike/GalaxyZfold.png', 'Galaxy Z Fold   ', 'slike/GalaxyZfold.png'),
(33, 'Zlatna sredina u izboru samsug telefona          ', 701, 1, 1, 'slike/cwelch_220204_5008_0004.jpg', 'Galaxy S22 plus          ', 'slike/mala/cwelch_220204_5008_0004.jpg'),
(34, 'Kamera koju morate probati                                        ', 326, 4, 1, 'slike/images.jpg', '11 T Pro                                     ', 'slike/mala/images.jpg'),
(35, 'Malo stariji ali i dalje savrseno radi    ', 790, 3, 2, 'slike/p1022463-scaled.jpg', 'Iphone 12    ', 'slike/mala/p1022463-scaled.jpg'),
(36, 'Malo stariji ali i dalje ga zele    ', 600, 3, 2, 'slike/07GmIupznWhAzDQ3Z7li99a-1..v1632849626.jpg', 'Iphone 11     ', 'slike/mala/07GmIupznWhAzDQ3Z7li99a-1..v1632849626.jpg'),
(37, 'Savrsen telefon koji staje u svaki dzep(koj ce predhodno da isprazni)   ', 700, 2, 1, 'slike/Huaweis-P50-Pro-P50-Pocket-get-wider-release-with-glaring.jpg', 'P50 Pocket   ', 'slike/mala/Huaweis-P50-Pro-P50-Pocket-get-wider-release-with-glaring.jpg'),
(38, 'Za sve ljubitelje savrsenih slika   ', 999, 2, 1, 'slike/преузимање.jpg', 'P50 Pro   ', 'slike/mala/преузимање.jpg'),
(92, 'Ubacen telefon', 1201, 1, 1, 'slike/160497-phones-review-hands-on-honor-magic-4-pro-image1-wbxjkkfsqh.jpg', 'Ubacen 1  ', 'slike/mala/160497-phones-review-hands-on-honor-magic-4-pro-image1-wbxjkkfsqh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id_uloga` int(10) NOT NULL,
  `uloga` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_uloga`, `uloga`) VALUES
(1, 'korisnik'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_a`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_uloga` (`id_uloga`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`id_korpa`),
  ADD KEY `id_telefon` (`id_telefon`),
  ADD KEY `id_korisnik` (`id_korisnik`);

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id_marka`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id_putanja`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`pollid`);

--
-- Indexes for table `poruke`
--
ALTER TABLE `poruke`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `poruka_email` (`poruka_email`);

--
-- Indexes for table `sistem`
--
ALTER TABLE `sistem`
  ADD PRIMARY KEY (`id_os`);

--
-- Indexes for table `telefon`
--
ALTER TABLE `telefon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_marka` (`id_marka`),
  ADD KEY `id_os` (`id_os`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id_uloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id_a` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `id_korpa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id_putanja` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `pollid` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `telefon`
--
ALTER TABLE `telefon`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id_uloga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`id_uloga`) REFERENCES `uloga` (`id_uloga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `korpa`
--
ALTER TABLE `korpa`
  ADD CONSTRAINT `korpa_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `korpa_ibfk_2` FOREIGN KEY (`id_telefon`) REFERENCES `telefon` (`id`);

--
-- Constraints for table `telefon`
--
ALTER TABLE `telefon`
  ADD CONSTRAINT `telefon_ibfk_2` FOREIGN KEY (`id_os`) REFERENCES `sistem` (`id_os`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `telefon_ibfk_3` FOREIGN KEY (`id_marka`) REFERENCES `marka` (`id_marka`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
