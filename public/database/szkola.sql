-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 26 Lis 2018, 01:05
-- Wersja serwera: 5.7.24-0ubuntu0.18.04.1
-- Wersja PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `szkola`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE `klasa` (
  `id_klasy` int(20) NOT NULL,
  `nazwa_klasy` varchar(225) DEFAULT NULL,
  `przedmiot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `klasa`
--

INSERT INTO `klasa` (`id_klasy`, `nazwa_klasy`, `przedmiot`) VALUES
(1, '4TI gr1', 'Administracja Baz Danych'),
(2, '4TI gr2', 'Administracja Baz Danych'),
(3, '4TI gr1', 'PAI'),
(4, '4TI gr2', 'PAI'),
(5, '4TI gr1', 'Systemy Baz Danych'),
(6, '4TI gr2', 'Systemy Baz Danych'),
(7, '4TI gr1', 'WIAI'),
(8, '4TI gr2', 'WIAI'),
(9, '2TI gr1', 'SO'),
(10, '2TI gr2', 'SO'),
(11, '2TI gr1', 'WIAI'),
(12, '2TI gr2', 'WIAI'),
(13, '2TI gr1', 'SK'),
(14, '2TI gr2', 'SK'),
(15, '2TI gr1', 'UTK'),
(16, '2TI gr2', 'UTK');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `punkty`
--

CREATE TABLE `punkty` (
  `id_punkt` int(11) NOT NULL,
  `id_użytkownika` int(20) DEFAULT NULL,
  `ile` int(20) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id` int(20) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `rodzaj` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(30) NOT NULL,
  `id_klasy` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `imie`, `nazwisko`, `rodzaj`, `login`, `haslo`, `id_klasy`) VALUES
(1, 'Szymon', 'Opiela', 'uczen', 'opielka123', 'opielka123', 1),
(2, 'Karol', 'Noob', 'uczen', 'noob123', 'noob123', 2),
(3, 'Marcin', 'Dymek', 'nauczyciel', 'mardym123', 'mardym123', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id_klasy`);

--
-- Indexes for table `punkty`
--
ALTER TABLE `punkty`
  ADD PRIMARY KEY (`id_punkt`);

--
-- Indexes for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klasa`
--
ALTER TABLE `klasa`
  MODIFY `id_klasy` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
