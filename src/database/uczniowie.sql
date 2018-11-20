-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Paź 2018, 12:08
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
-- Baza danych: `uczniowie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE `klasa` (
  `id_klasy` int(11) NOT NULL,
  `nazwa_klasy` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `przedmiot` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klasa`
--

INSERT INTO `klasa` (`id_klasy`, `nazwa_klasy`, `przedmiot`) VALUES
(1, '4TIgr1', 'Administracja Baz Danych'),
(2, '4TIgr2', 'Administracja Baz Danych'),
(3, '4TIgr1', 'PAI'),
(4, '4TIgr2', 'PAI'),
(5, '4TIgr1', 'Systemy baz danych'),
(6, '4TIgr2', 'Systemy baz danych'),
(7, '4TIgr2', 'WIAI'),
(8, '4TIgr1', 'WIAI'),
(9, '3TI', 'ABD'),
(10, '3TI', 'PIMLSK'),
(11, '3TI', 'WIAI'),
(12, '3TI', 'PAI'),
(13, '2TI', 'UTK'),
(14, '2TI', 'SK'),
(15, '2TI', 'WIAI'),
(16, '2TI', 'SO'),
(17, '1TI', 'SO'),
(18, '1TI', 'DINUK'),
(19, '1TI', 'UTK');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `punkt`
--

CREATE TABLE `punkt` (
  `id_punktu` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `ilosc` int(11) DEFAULT NULL,
  `kiedy` date DEFAULT NULL,
  `id_klasy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `punkt`
--

INSERT INTO `punkt` (`id_punktu`, `id_uzytkownika`, `ilosc`, `kiedy`, `id_klasy`) VALUES
(1, 22, 4, '2018-10-18', 15),
(2, 23, 44, '2018-10-17', 15),
(3, 24, 1, '2018-10-09', 15),
(4, 25, 4, '2018-10-21', 15),
(5, 26, 2, '2018-10-22', 15),
(6, 22, 3, '2018-10-19', 15),
(7, 26, 3, '2018-10-19', 15),
(8, 29, 1, '2018-10-19', 15),
(9, 30, 2, '2018-09-19', 15),
(10, 31, 3, '2018-09-19', 15),
(11, 32, 4, '2018-09-15', 15),
(12, 43, 2, '2018-09-15', 0),
(13, 55, 5, '2018-11-15', 0),
(14, 15, 2, '2018-09-22', 15),
(15, 26, 5, '2018-09-19', 15),
(16, 29, 2, '2018-10-15', 15),
(17, 28, 2, '2018-09-11', 15),
(18, 38, 1, '2018-11-11', 0),
(19, 55, 1, '2018-09-12', 0),
(20, 29, 2, '2018-09-14', 15),
(21, 39, 4, '2018-10-15', 0),
(22, 35, 2, '2018-09-11', 15),
(23, 29, 1, '2018-11-11', 15),
(25, 35, 2, '2018-09-14', 15),
(26, 5, 4, '2018-10-15', 15),
(27, 15, 2, '2018-09-12', 15),
(28, 22, 1, '2018-11-11', 15),
(29, 25, 1, '2018-09-15', 15),
(30, 45, 2, '2018-09-11', 0),
(31, 36, 1, '2018-10-12', 10),
(32, 36, 4, '2018-10-24', 15),
(33, NULL, NULL, NULL, 0),
(34, 33, 3, '2018-10-23', 16);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id_uzytkownika` int(11) NOT NULL,
  `rodzaj` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `haslo` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `imie` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `id_klasy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id_uzytkownika`, `rodzaj`, `login`, `haslo`, `imie`, `nazwisko`, `id_klasy`) VALUES
(10, 'nauczyciel', 'blazej2533', '473a788f296a3d3a68503111518dc2928f0536c0', 'Marian', 'Szczesny', NULL),
(15, 'uczen', 'blazi1', '473a788f296a3d3a68503111518dc2928f0536c0', 'Blazii', 'bla', 12),
(17, 'uczen', 'patryk9913', 'a1044cf24a459afc3d4c901fd33349b4e44b07fa', 'Patryk', 'Sikora', 12),
(18, 'uczen', 'Adammma', '0e18f44c1fec03ec4083422cb58ba6a09ac4fb2a', 'Patryk', 'Wolf', 12),
(25, 'uczen', 'blazej25333', '473a788f296a3d3a68503111518dc2928f0536c0', 'gdf', 'gdfgfdgd', 13),
(28, 'uczen', 'detinu121', '48f95adcdd2d1d9b1da95a0e676fea740d73adad', 'dasda', 'dsadsa', 13),
(30, 'uczen', 'ffdsf', '55bc82ea7aeaa8dc720252af1f0979a1e372c757', 'fsdfsd', 'fsdfds', 16),
(31, 'uczen', 'lukasz', '473a788f296a3d3a68503111518dc2928f0536c0', 'Łukasz', 'Szczesny', 15),
(32, 'uczen', 'Marcin', '473a788f296a3d3a68503111518dc2928f0536c0', 'Marcin', 'Alloha', 15),
(33, 'uczen', 'Marianna', '473a788f296a3d3a68503111518dc2928f0536c0', 'Marika', 'Dunst', 15),
(35, 'uczen', 'Chrapek123', '473a788f296a3d3a68503111518dc2928f0536c0', 'Paweł', 'Chrapkowski', 15),
(36, 'uczen', 'Adrian555', '473a788f296a3d3a68503111518dc2928f0536c0', 'Adran', 'Cybula', 15),
(37, 'uczen', 'Kamilekjestem', '473a788f296a3d3a68503111518dc2928f0536c0', 'Kamil', 'Kamilka', 15),
(38, 'uczen', 'kamil523', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janusz', 'Szok', 15),
(39, 'uczen', 'Marianpazdzioch', '473a788f296a3d3a68503111518dc2928f0536c0', 'Marian', 'Pazdzioch', 15),
(44, 'uczen', 'blazej25334', '473a788f296a3d3a68503111518dc2928f0536c0', 'Michał', 'Konkol', 15),
(46, 'uczen', 'blazej2533123', '473a788f296a3d3a68503111518dc2928f0536c0', 'Karolina', 'Zab', 12),
(47, 'uczen', 'janosik', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 13),
(48, 'uczen', 'janosik1', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 13),
(49, 'uczen', 'janosik2', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 14),
(51, 'uczen', 'janosik3', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 14),
(52, 'uczen', 'janosik4', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 14),
(53, 'uczen', 'janosik5', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 14),
(54, 'uczen', 'janosik6', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 14),
(55, 'uczen', 'janosik7', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 14),
(56, 'uczen', 'janosik8', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 14),
(57, 'uczen', 'janosik9', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 14),
(58, 'uczen', 'janosik10', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 14),
(59, 'uczen', 'janosik12', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 16),
(60, 'uczen', 'janosik13', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 16),
(61, 'uczen', 'janosik14', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 16),
(62, 'uczen', 'janosik15', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 16),
(63, 'uczen', 'janosik16', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 16),
(64, 'uczen', 'janosik17', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 16),
(65, 'uczen', 'janosik18', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 16),
(66, 'uczen', 'janosik19', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 16),
(67, 'uczen', 'janosik110', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 16),
(68, 'uczen', 'janosik111', '473a788f296a3d3a68503111518dc2928f0536c0', 'Janosik', 'Szczesny', 16),
(69, 'uczen', 'blazej253332', '473a788f296a3d3a68503111518dc2928f0536c0', 'Karolina', 'Zab', 17);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id_klasy`);

--
-- Indeksy dla tabeli `punkt`
--
ALTER TABLE `punkt`
  ADD PRIMARY KEY (`id_punktu`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klasa`
--
ALTER TABLE `klasa`
  MODIFY `id_klasy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `punkt`
--
ALTER TABLE `punkt`
  MODIFY `id_punktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
