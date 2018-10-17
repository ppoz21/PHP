-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Paź 2018, 13:38
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykuly`
--

CREATE TABLE `artykuly` (
  `IDArtykuly` int(10) UNSIGNED NOT NULL,
  `ProducenciID` int(10) UNSIGNED NOT NULL,
  `Model` text,
  `Typ` text,
  `Cena` double DEFAULT NULL,
  `CenaPromocja` double DEFAULT NULL,
  `Opis` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `artykuly`
--

INSERT INTO `artykuly` (`IDArtykuly`, `ProducenciID`, `Model`, `Typ`, `Cena`, `CenaPromocja`, `Opis`) VALUES
(1, 1, 'K551LB-XX180D', 'Notebook', 2500, 2400, 'Procesor i7, 4GB RAM'),
(2, 1, 'X551CARF-HCL1201L', 'Notebook', 1000, 980, 'Procesor Intel Celeron 1007U, 4GB RAM'),
(3, 2, 'PORTEGE R30-A-17K', 'Notebook', 4200, 3900, 'Procesor i5, 4GB RAM'),
(4, 2, 'Partner 1TB', 'HDD USB', 250, 240, 'USB 3.0, 1TB');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazyn`
--

CREATE TABLE `magazyn` (
  `IDMagazyn` int(10) UNSIGNED NOT NULL,
  `Ilosc` int(10) UNSIGNED DEFAULT NULL,
  `CzyZamowic` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `magazyn`
--

INSERT INTO `magazyn` (`IDMagazyn`, `Ilosc`, `CzyZamowic`) VALUES
(1, 4, 0),
(2, 8, 0),
(3, 0, 1),
(4, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producenci`
--

CREATE TABLE `producenci` (
  `IDProducenci` int(10) UNSIGNED NOT NULL,
  `Nazwa` text,
  `URL` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `producenci`
--

INSERT INTO `producenci` (`IDProducenci`, `Nazwa`, `URL`) VALUES
(1, 'Asus', 'asus.pl'),
(2, 'Toshiba', 'toshiba.pl'),
(3, 'Samsung', 'sumasung.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `artykuly`
--
ALTER TABLE `artykuly`
  ADD PRIMARY KEY (`IDArtykuly`);

--
-- Indeksy dla tabeli `magazyn`
--
ALTER TABLE `magazyn`
  ADD PRIMARY KEY (`IDMagazyn`);

--
-- Indeksy dla tabeli `producenci`
--
ALTER TABLE `producenci`
  ADD PRIMARY KEY (`IDProducenci`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `artykuly`
--
ALTER TABLE `artykuly`
  MODIFY `IDArtykuly` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `magazyn`
--
ALTER TABLE `magazyn`
  MODIFY `IDMagazyn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `producenci`
--
ALTER TABLE `producenci`
  MODIFY `IDProducenci` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
