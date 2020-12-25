-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 08, 2018 alle 13:10
-- Versione del server: 10.1.21-MariaDB
-- Versione PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garacinopusa`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `candidato`
--

CREATE TABLE `candidato` (
  `idCandidato` int(11) NOT NULL,
  `codGara` varchar(4) NOT NULL,
  `numeroChip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `candidato`
--

INSERT INTO `candidato` (`idCandidato`, `codGara`, `numeroChip`) VALUES
(9, 'g003', 'chip321');

-- --------------------------------------------------------

--
-- Struttura della tabella `cane`
--

CREATE TABLE `cane` (
  `numeroChip` varchar(15) NOT NULL,
  `codProprietario` varchar(16) NOT NULL,
  `codRazza` varchar(4) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `dataNasc` date NOT NULL,
  `peso` float NOT NULL,
  `altGarrese` float NOT NULL,
  `altCoscia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cane`
--

INSERT INTO `cane` (`numeroChip`, `codProprietario`, `codRazza`, `nome`, `dataNasc`, `peso`, `altGarrese`, `altCoscia`) VALUES
('chip321', 'fsafgsg', 'r003', 'Vinciguerra', '2003-02-11', 12.32, 11, 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `codCateg` varchar(4) NOT NULL,
  `categGara` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`codCateg`, `categGara`) VALUES
('c001', 'corsa'),
('g003', 'bellezza');

-- --------------------------------------------------------

--
-- Struttura della tabella `credenziali`
--

CREATE TABLE `credenziali` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tipoaccount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `credenziali`
--

INSERT INTO `credenziali` (`username`, `password`, `tipoaccount`) VALUES
('74055', 'piu', 1),
('fede', 'fede', 3),
('g2', 'g2', 2),
('g5', 'g5', 2),
('giudice', 'giudice', 2),
('pino', 'pino', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `gara`
--

CREATE TABLE `gara` (
  `codGara` varchar(4) NOT NULL,
  `codCateg` varchar(4) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `gara`
--

INSERT INTO `gara` (`codGara`, `codCateg`, `data`) VALUES
('g001', 'c001', '2018-01-30'),
('g003', 'g003', '2018-01-16');

-- --------------------------------------------------------

--
-- Struttura della tabella `giudice`
--

CREATE TABLE `giudice` (
  `idGiudice` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `giudice`
--

INSERT INTO `giudice` (`idGiudice`, `username`, `nome`, `cognome`) VALUES
('afsfafewsfa', 'g5', 'Mario', 'Cracco'),
('cacase', 'g2', 'Fabio', 'Gaglia'),
('casfasfwefafeswf', 'giudice', 'Salvo', 'Billi');

-- --------------------------------------------------------

--
-- Struttura della tabella `giudicegara`
--

CREATE TABLE `giudicegara` (
  `idGiudice` varchar(60) NOT NULL,
  `codGara` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `proprietario`
--

CREATE TABLE `proprietario` (
  `codFiscale` varchar(16) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `proprietario`
--

INSERT INTO `proprietario` (`codFiscale`, `username`, `nome`, `cognome`, `telefono`) VALUES
('DSRHEW432df32tfd', 'fede', 'Federico', 'Baselli', '1241241344'),
('fsafgsg', 'pino', 'Giuseppe', 'Casale', '3456523457');

-- --------------------------------------------------------

--
-- Struttura della tabella `razza`
--

CREATE TABLE `razza` (
  `codRazza` varchar(4) NOT NULL,
  `codCateg` varchar(4) NOT NULL,
  `nomeRazza` varchar(20) NOT NULL,
  `raPeso` float NOT NULL,
  `raAltGarrese` float NOT NULL,
  `raAltCoscia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `razza`
--

INSERT INTO `razza` (`codRazza`, `codCateg`, `nomeRazza`, `raPeso`, `raAltGarrese`, `raAltCoscia`) VALUES
('r001', 'c001', 'pastore tedesco', 20, 12.7, 10.23),
('r003', 'g003', 'barboncino', 5, 8, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `segretaria`
--

CREATE TABLE `segretaria` (
  `matricola` varchar(5) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `segretaria`
--

INSERT INTO `segretaria` (`matricola`, `nome`, `cognome`, `username`) VALUES
('12345', 'Laura', 'Britti', '74055');

-- --------------------------------------------------------

--
-- Struttura della tabella `votazioni`
--

CREATE TABLE `votazioni` (
  `idVotazioni` int(11) NOT NULL,
  `idGiudice` varchar(60) NOT NULL,
  `numeroChip` varchar(15) NOT NULL,
  `codGara` varchar(4) NOT NULL,
  `voto` int(11) NOT NULL,
  `commento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`idCandidato`),
  ADD KEY `numeroChip` (`numeroChip`),
  ADD KEY `codGara` (`codGara`);

--
-- Indici per le tabelle `cane`
--
ALTER TABLE `cane`
  ADD PRIMARY KEY (`numeroChip`),
  ADD KEY `codProprietario` (`codProprietario`),
  ADD KEY `codRazza` (`codRazza`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codCateg`);

--
-- Indici per le tabelle `credenziali`
--
ALTER TABLE `credenziali`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `gara`
--
ALTER TABLE `gara`
  ADD PRIMARY KEY (`codGara`),
  ADD KEY `codCateg` (`codCateg`);

--
-- Indici per le tabelle `giudice`
--
ALTER TABLE `giudice`
  ADD PRIMARY KEY (`idGiudice`),
  ADD KEY `username` (`username`);

--
-- Indici per le tabelle `giudicegara`
--
ALTER TABLE `giudicegara`
  ADD PRIMARY KEY (`idGiudice`),
  ADD KEY `codGara` (`codGara`);

--
-- Indici per le tabelle `proprietario`
--
ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`codFiscale`),
  ADD KEY `username` (`username`);

--
-- Indici per le tabelle `razza`
--
ALTER TABLE `razza`
  ADD PRIMARY KEY (`codRazza`),
  ADD KEY `codCateg` (`codCateg`);

--
-- Indici per le tabelle `segretaria`
--
ALTER TABLE `segretaria`
  ADD PRIMARY KEY (`matricola`),
  ADD KEY `username` (`username`);

--
-- Indici per le tabelle `votazioni`
--
ALTER TABLE `votazioni`
  ADD PRIMARY KEY (`idVotazioni`),
  ADD KEY `numeroChip` (`numeroChip`),
  ADD KEY `idGiudice` (`idGiudice`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `candidato`
--
ALTER TABLE `candidato`
  MODIFY `idCandidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT per la tabella `votazioni`
--
ALTER TABLE `votazioni`
  MODIFY `idVotazioni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `candidato`
--
ALTER TABLE `candidato`
  ADD CONSTRAINT `candidato_ibfk_6` FOREIGN KEY (`numeroChip`) REFERENCES `cane` (`numeroChip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candidato_ibfk_7` FOREIGN KEY (`codGara`) REFERENCES `gara` (`codGara`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `cane`
--
ALTER TABLE `cane`
  ADD CONSTRAINT `cane_ibfk_1` FOREIGN KEY (`codProprietario`) REFERENCES `proprietario` (`codFiscale`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cane_ibfk_2` FOREIGN KEY (`codRazza`) REFERENCES `razza` (`codRazza`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `gara`
--
ALTER TABLE `gara`
  ADD CONSTRAINT `gara_ibfk_1` FOREIGN KEY (`codCateg`) REFERENCES `categoria` (`codCateg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `giudice`
--
ALTER TABLE `giudice`
  ADD CONSTRAINT `giudice_ibfk_1` FOREIGN KEY (`username`) REFERENCES `credenziali` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `giudicegara`
--
ALTER TABLE `giudicegara`
  ADD CONSTRAINT `giudicegara_ibfk_1` FOREIGN KEY (`codGara`) REFERENCES `gara` (`codGara`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `proprietario`
--
ALTER TABLE `proprietario`
  ADD CONSTRAINT `proprietario_ibfk_1` FOREIGN KEY (`username`) REFERENCES `credenziali` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `razza`
--
ALTER TABLE `razza`
  ADD CONSTRAINT `razza_ibfk_1` FOREIGN KEY (`codCateg`) REFERENCES `categoria` (`codCateg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `segretaria`
--
ALTER TABLE `segretaria`
  ADD CONSTRAINT `segretaria_ibfk_1` FOREIGN KEY (`username`) REFERENCES `credenziali` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `votazioni`
--
ALTER TABLE `votazioni`
  ADD CONSTRAINT `votazioni_ibfk_3` FOREIGN KEY (`numeroChip`) REFERENCES `cane` (`numeroChip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votazioni_ibfk_4` FOREIGN KEY (`idGiudice`) REFERENCES `giudice` (`idGiudice`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
