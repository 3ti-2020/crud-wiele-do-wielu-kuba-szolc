-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 27 Paź 2020, 13:11
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autorzy`
--

CREATE TABLE `autorzy` (
  `id_autor` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `autorzy`
--

INSERT INTO `autorzy` (`id_autor`, `imie`, `nazwisko`) VALUES
(1, 'Adam', 'Mickiewicz'),
(2, 'J.R.R.', 'Tolkien');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id_book` int(11) NOT NULL,
  `id_tytul` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id_book`, `id_tytul`, `id_autor`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `pozycje`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `pozycje` (
`id_book` int(11)
,`nazwisko` varchar(30)
,`tytul` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tytuly`
--

CREATE TABLE `tytuly` (
  `id_tytul` int(11) NOT NULL,
  `tytul` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tytuly`
--

INSERT INTO `tytuly` (`id_tytul`, `tytul`) VALUES
(1, 'Dziady'),
(2, 'Hobbit');

-- --------------------------------------------------------

--
-- Struktura widoku `pozycje`
--
DROP TABLE IF EXISTS `pozycje`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pozycje`  AS  select `books`.`id_book` AS `id_book`,`autorzy`.`nazwisko` AS `nazwisko`,`tytuly`.`tytul` AS `tytul` from ((`books` join `tytuly`) join `autorzy`) where `tytuly`.`id_tytul` = `books`.`id_tytul` and `autorzy`.`id_autor` = `books`.`id_autor` ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `obcy_tytul` (`id_tytul`),
  ADD KEY `obcy_autor` (`id_autor`);

--
-- Indeksy dla tabeli `tytuly`
--
ALTER TABLE `tytuly`
  ADD PRIMARY KEY (`id_tytul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `tytuly`
--
ALTER TABLE `tytuly`
  MODIFY `id_tytul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `obcy_autor` FOREIGN KEY (`id_autor`) REFERENCES `autorzy` (`id_autor`),
  ADD CONSTRAINT `obcy_tytul` FOREIGN KEY (`id_tytul`) REFERENCES `tytuly` (`id_tytul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
