-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Gen 27, 2024 alle 14:38
-- Versione del server: 8.0.35-0ubuntu0.22.04.1
-- Versione PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zero_carbon`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `icons`
--

CREATE TABLE `icons` (
  `Icon` enum('facebook','instagram','xtwitter','noicon') CHARACTER SET utf8mb4 NOT NULL,
  `altText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `icons`
--

INSERT INTO `icons` (`Icon`, `altText`) VALUES
('facebook', 'Facebook icon'),
('instagram', 'Instagram icon'),
('xtwitter', 'X (old Twitter) icon'),
('noicon', 'No icon');

-- --------------------------------------------------------

--
-- Struttura della tabella `socialNews`
--

CREATE TABLE `socialNews` (
  `Id` int NOT NULL,
  `Date` datetime NOT NULL,
  `Title` varchar(75) CHARACTER SET utf8mb4  NOT NULL,
  `Description` varchar(500) CHARACTER SET utf8mb4  NOT NULL,
  `Icon` enum('facebook','instagram','xtwitter','noicon') CHARACTER SET utf8mb4  NOT NULL,
  `Link` varchar(2083) CHARACTER SET utf8mb4  NOT NULL,
  `Author` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dump dei dati per la tabella `socialNews`
--

INSERT INTO `socialNews` (`Id`, `Date`, `Title`, `Description`, `Icon`, `Link`, `Author`) VALUES
(1, '2024-01-25 11:40:00', 'City Life, Dubai', 'Amidst towering skyscrapers, the city pulses with energy. Neon lights paint the streets, while hidden gems like street art and cozy cafes offer respites. The urban symphony of car horns and conversations creates a vibrant tapestry, each corner telling a unique tale. In this concrete jungle, anonymity meets connection, weaving a diverse narrative. The scent of street food beckons, promising exploration. Urban life, with its contrasts, is a canvas of experiences waiting to be embraced. #CityLife', 'noicon', '', 'ombretta'),
(2, '2024-01-25 11:40:00', 'Skyscrapers', 'In the heart of a bustling city, skyscrapers scrape the sky. Neon lights illuminate the streets, casting a kaleidoscope of colors. Amidst the hustle, hidden gems like street art and quaint cafes offer respites of tranquility. The scent of street food tantalizes the senses, inviting exploration. Urban life, with its contrasts and vibrancy, paints a canvas of experiences waiting to be embraced.', 'xtwitter', 'https://twitter.com/', 'luca'),
(3, '2024-01-25 11:43:00', 'Green Energy!', 'Embracing the power of green energy! 🌿💡 Taking steps towards a sustainable future. Solar panels soaking up the sun, wind turbines harnessing the breeze – each step counts. Let\'s weave a greener tomorrow together! 🌍💚 #GreenEnergy #Sustainability #CleanFuture', 'noicon', '', 'ombretta'),
(4, '2024-01-25 11:45:00', 'Wind Power', 'Embracing the power of the wind! 🌬️💨 Harnessing clean and renewable energy with wind turbines. Let\'s spin the wheels of change towards a sustainable future. Every gust propels us closer to a world powered by nature. 🌍💚 #WindPower #SustainableFuture #CleanEnergy', 'noicon', '', 'ombretta'),
(5, '2024-01-25 11:46:00', 'Meeting TODAY!', 'Fantastic meeting event today! 🌟 Engaging discussions, innovative ideas, and a room full of inspired minds. Connecting and collaborating at its best. Can&#039;t wait to see these plans come to life! 🤝✨ #MeetingEvent #Collaboration #InnovationStation', 'noicon', '', 'ombretta'),
(6, '2024-01-25 14:36:00', 'Meeting TODAY! Meeting TODAY! Meeting TODAY! Meeting TODAY!', 'Fantastic meeting event today! 🌟 Engaging discussions, innovative ideas, and a room full of inspired minds. Connecting and collaborating at its best. Can&#039;t wait to see these plans come to life! 🤝✨ #MeetingEvent #Collaboration #InnovationStation', 'noicon', '', 'luca'),
(7, '2024-01-25 15:09:00', 'Green Energy! Green Energy!', 'Embracing the power of green energy! 🌿💡 Taking steps towards a sustainable future. Solar panels soaking up the sun, wind turbines harnessing the breeze – each step counts. Let\'s weave a greener tomorrow together! 🌍💚 #GreenEnergy #Sustainability #CleanFuture', 'facebook', '', 'ombretta'),
(8, '2018-01-17 16:42:00', 'No author', 'Author not found!', 'noicon', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `userCount` int NOT NULL,
  `userID` char(5) NOT NULL,
  `Username` varchar(15) CHARACTER SET utf8mb4  NOT NULL,
  `Password` char(5) NOT NULL,
  `Role` enum('Social Media Manager','Projects Manager','Tester','Not assigned') CHARACTER SET utf8mb4  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`userCount`, `userID`, `Username`, `Password`, `Role`) VALUES
(1, 'admin', 'ombretta', 'admin', 'Social Media Manager'),
(2, 'luca', 'luca', 'luca', 'Tester');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`Icon`);

--
-- Indici per le tabelle `socialNews`
--
ALTER TABLE `socialNews`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_icon` (`Icon`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `counter` (`userCount`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `socialNews`
--
ALTER TABLE `socialNews`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `userCount` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `socialNews`
--
ALTER TABLE `socialNews`
  ADD CONSTRAINT `fk_icon` FOREIGN KEY (`Icon`) REFERENCES `icons` (`Icon`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
