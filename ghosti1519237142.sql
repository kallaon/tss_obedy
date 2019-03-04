-- phpMyAdmin SQL Dump
-- version 4.4.4
-- http://www.phpmyadmin.net
--
-- Počítač: sql.endora.cz:3311
-- Vytvořeno: Pon 04. bře 2019, 19:02
-- Verze serveru: 5.6.41-84.1
-- Verze PHP: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `ghosti1519237142`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `academus`
--

CREATE TABLE IF NOT EXISTS `academus` (
  `id` int(11) NOT NULL,
  `food` varchar(150) COLLATE utf8_slovak_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Vypisuji data pro tabulku `academus`
--

INSERT INTO `academus` (`id`, `food`, `created_at`) VALUES
(1, 'Kulajda, chlieb', '2019-03-04 08:00:11'),
(2, 'Kuracie soté v zemiakovej placke. 1/2 ryža, zelenina', '2019-03-04 08:00:11'),
(3, 'Špagety &quot;Bolognese&quot; so syrom', '2019-03-04 08:00:11'),
(4, 'Zeleninový šalát so sušenými rajčinami, mozzarellou a bazalkovým pestom, pečivo', '2019-03-04 08:00:11'),
(5, 'Vyberte si pizzu podľa svojej chuti od 1 do 30, v cene obedového menu', '2019-03-04 08:00:11');

-- --------------------------------------------------------

--
-- Struktura tabulky `bistro`
--

CREATE TABLE IF NOT EXISTS `bistro` (
  `id` int(11) NOT NULL,
  `food` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `bistro`
--

INSERT INTO `bistro` (`id`, `food`, `created_at`) VALUES
(1, 'Br. Prírodný rezeň so slaninkou a vol. okom , ½ ryža , ½ steakové hranolky , mie. šalát', '2019-03-04 08:00:11'),
(2, 'Kuracie mäso na bratislavský spôsob , kolienka ', '2019-03-04 08:00:11'),
(3, 'Granadír , kyslá uhorka , 0,2l džús ', '2019-03-04 08:00:11'),
(4, 'Zele. šalát s tuniakom , var. vajíčkom a čer. cibuľkou , dressing , hrianka', '2019-03-04 08:00:11'),
(5, 'Grilované kura ¼ ( stehno , alebo krídlo ) , ryža , kompót ', '2019-03-04 08:00:11'),
(6, 'Vyprážaný syr , hranolky , tat. omáčka ', '2019-03-04 08:00:11'),
(7, 'XL Vyprážaný bravčový rezeň ,var. zemiaky , šalát podľa dennej ponuky', '2019-03-04 08:00:11');

-- --------------------------------------------------------

--
-- Struktura tabulky `fanusik`
--

CREATE TABLE IF NOT EXISTS `fanusik` (
  `id` int(11) NOT NULL,
  `food` varchar(150) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Vypisuji data pro tabulku `fanusik`
--

INSERT INTO `fanusik` (`id`, `food`, `created_at`) VALUES
(1, '1. 150G KURACIE PRSIA S VOLSKYM OKOM', '2019-03-04 08:00:11'),
(2, '2. 150G GRILOVANÁ BRAV?OVÁ KRKOVI?KA NA CIBU?KOVEJ OMÁ?KE DOCHUTENEJ HOR?ICOU', '2019-03-04 08:00:11'),
(3, '3. 350G TAGLIATELLE S KURACÍM MÄSKOM V SMOTANOVEJ OMÁ?KE', '2019-03-04 08:00:11'),
(4, '4. 150G KURACIE SOTÉ SO SMOTANOU (KÁPIA, HRÁŠOK, KUKURICA)', '2019-03-04 08:00:11'),
(5, '5. 150G VYPRÁŽANÝ ÚDENÝ SYR', '2019-03-04 08:00:11'),
(6, '6. 330G ZELENINOVÝ ŠALÁT', '2019-03-04 08:00:11');

-- --------------------------------------------------------

--
-- Struktura tabulky `koleno`
--

CREATE TABLE IF NOT EXISTS `koleno` (
  `id` int(11) NOT NULL,
  `food` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `koleno`
--

INSERT INTO `koleno` (`id`, `food`, `created_at`) VALUES
(1, 'Kurací plátok zapečený, slanina, údený syr, pečene zemiaky, caciky ( A-1,3,4,7) ', '2019-03-04 08:00:11'),
(2, 'Kurací perkelt, domáce halušky, kyslá uhorka (A-1,3,4,7)', '2019-03-04 08:00:11'),
(3, 'Grilovaný Encián, baklažán, cuketa, syrovo-cesnaková omáčka, americké zemiaky(A-1,3,7) ', '2019-03-04 08:00:11'),
(4, 'Pizza 1-20 (A-1,3,4,7) ', '2019-03-04 08:00:11'),
(5, 'Vyprážaný syr, hranolky, Tatárska omáčka (A-1,3,7) ', '2019-03-04 08:00:11'),
(6, 'Vyprážaný kurací rezeň, americké zemiaky (A-1,3,7) ', '2019-03-04 08:00:11');

-- --------------------------------------------------------

--
-- Struktura tabulky `portofino`
--

CREATE TABLE IF NOT EXISTS `portofino` (
  `id` int(11) NOT NULL,
  `food` varchar(150) COLLATE utf8_slovak_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Vypisuji data pro tabulku `portofino`
--

INSERT INTO `portofino` (`id`, `food`, `created_at`) VALUES
(1, ' Šošovicová na kyslo / Francúzska', '2019-03-04 08:00:11'),
(2, ' 0 &ndash; Zel. šalát s&nbsp;vajíčkom, dressing, toast&nbsp; 4,00', '2019-03-04 08:00:11'),
(3, ' 1 &ndash; Bravčový rezeň obrátený, varené zemiaky 4,00', '2019-03-04 08:00:11'),
(4, ' 2 &ndash; Kuracie na prírodno s&nbsp;volským okom a kapiou, ryža&nbsp; 4,00', '2019-03-04 08:00:11'),
(5, ' 3 &ndash; Zapekaná cestovina s&nbsp;mletým mäskom 4,00', '2019-03-04 08:00:11');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `academus`
--
ALTER TABLE `academus`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `bistro`
--
ALTER TABLE `bistro`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `fanusik`
--
ALTER TABLE `fanusik`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `koleno`
--
ALTER TABLE `koleno`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `portofino`
--
ALTER TABLE `portofino`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `academus`
--
ALTER TABLE `academus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pro tabulku `bistro`
--
ALTER TABLE `bistro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pro tabulku `fanusik`
--
ALTER TABLE `fanusik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pro tabulku `koleno`
--
ALTER TABLE `koleno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pro tabulku `portofino`
--
ALTER TABLE `portofino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
