-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 13, 2023 at 10:30 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `obraz` varchar(255) NOT NULL,
  `cena` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `id_tp`, `nazwa`, `opis`, `obraz`, `cena`) VALUES
(1, 1, 'Brelok \"Diabelski Rdzeń\"', 'Teraz z prawdziwym plutonem! Porrrażające akcesorium dla najbardziej zapalonych entuzjastów!\r\n\r\nMateriały: pluton, węglik wolframu', 'dcorekeychain.jpg', 29.99),
(2, 3, 'Neco Gangster Arc T-shirt', 'Wspaniały element garderoby hustlera, idealny do zarabiania pengi. \r\nGurenyuu~\r\n\r\nMateriały: bawełna, poliester', 'necogangsterarc.jpg', 89.99),
(3, 4, 'Fajerwerki \"Strefa Gazy\"', 'Bateria sztucznych ogni z prawdziwym białym fosforem! \r\n\r\nNie używać jako broni, nie używać pod wpływem substancji odurzających, nie dawać dzieciom.', 'ussbombs.jpg', 149.99),
(4, 3, 'Sneaker Mike R Max (pojedynczy, nieznacznie większy)', 'Idealny dla brzuchonogów! Zdominuj boisko do kosza przy pomocy tych [[[ORYGINALNYCH TRAMPEK]]]', 'mikermax.jpg', 109.99),
(5, 4, 'Benzyna o smaku morwy białej (0,5L)', 'Nie wiem czemu ktoś miałby to pić no ale hej, pół litra w przystępnej cenie! Cóż za okazja!', 'gasoline.jpg', 15.99),
(6, 1, 'Przycisk do papieru \"Trójkąt Penrose\'a\"', 'Trójkąt o nieprawdopodobnej geometrii! Teraz wyszedł ze sfery myślokształtu i leży na twoim biurku...\r\nNie, to nie chwyt reklamowy. NAPRAWDĘ LEŻY NA TWOIM BIURKU NA TWOIM BIURKU NA TWOIM BIURKU UCIEKAJ UCIEKAJ UCIEKAJ\r\n\r\nMateriał: Czarny kamień z 𒈔𒂂𒄱', 'penrosepaperweight.jpg', 39.99),
(7, 4, 'Garnax', 'Superpotężny, kuloodporny garnek! Czego chcieć więcej!\r\n\r\nUwaga: Nie przewodzi prądu ani ciepła.\r\n\r\nMateriał: Niedozdobywalium', 'heatproof.jpg', 99.99);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typy_produktow`
--

CREATE TABLE `typy_produktow` (
  `id_typu_produktu` int(11) NOT NULL,
  `typ_produktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typy_produktow`
--

INSERT INTO `typy_produktow` (`id_typu_produktu`, `typ_produktu`) VALUES
(1, 'Gadżet'),
(2, 'Posążek/figurka'),
(3, 'Garment'),
(4, 'Sprzęt/przedmiot użytkowy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `email`, `haslo`) VALUES
(1, 'lorem', 'ipsum', '$2y$10$Eq5tNf8yfXJQG/xhUlJgM.OsrGwMMfgqEOTtjeJdnZF1v7PvDnZWO');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `id_zu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowieniewp`
--

CREATE TABLE `zamowieniewp` (
  `id_zawartoscizamowienia` int(11) NOT NULL,
  `ilosc_produktow` int(11) NOT NULL,
  `id_produktow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`),
  ADD KEY `FK_prod_idtp` (`id_tp`);

--
-- Indeksy dla tabeli `typy_produktow`
--
ALTER TABLE `typy_produktow`
  ADD PRIMARY KEY (`id_typu_produktu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `FK_zam_idzu` (`id_zu`);

--
-- Indeksy dla tabeli `zamowieniewp`
--
ALTER TABLE `zamowieniewp`
  ADD PRIMARY KEY (`id_zawartoscizamowienia`),
  ADD KEY `FK_zamwp_idpz` (`id_produktow`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `typy_produktow`
--
ALTER TABLE `typy_produktow`
  MODIFY `id_typu_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zamowieniewp`
--
ALTER TABLE `zamowieniewp`
  MODIFY `id_zawartoscizamowienia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `FK_prod_idtp` FOREIGN KEY (`id_tp`) REFERENCES `typy_produktow` (`id_typu_produktu`);

--
-- Constraints for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `FK_zam_idzu` FOREIGN KEY (`id_zu`) REFERENCES `uzytkownicy` (`id`);

--
-- Constraints for table `zamowieniewp`
--
ALTER TABLE `zamowieniewp`
  ADD CONSTRAINT `FK_zamwp_idpz` FOREIGN KEY (`id_produktow`) REFERENCES `produkty` (`id_produktu`),
  ADD CONSTRAINT `FK_zamwp_idzz` FOREIGN KEY (`id_zawartoscizamowienia`) REFERENCES `zamowienia` (`id_zamowienia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
