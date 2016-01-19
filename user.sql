-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2016 at 04:56 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `clienteID` int(40) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`clienteID`, `nombre`) VALUES
(1, 'Juan'),
(2, 'Pepe'),
(3, 'Maria'),
(4, 'Jose'),
(5, 'David'),
(6, 'Jaime'),
(7, 'Diana'),
(8, 'Ivan'),
(9, 'Cata');

-- --------------------------------------------------------

--
-- Table structure for table `datos`
--

CREATE TABLE `datos` (
  `variable` text NOT NULL,
  `valor` text NOT NULL,
  `clienteID` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos`
--

INSERT INTO `datos` (`variable`, `valor`, `clienteID`) VALUES
('Genero', 'M', 1),
('Genero', 'M', 2),
('Genero', 'F', 3),
('Genero', 'M', 4),
('Genero', 'M', 5),
('Genero', 'M', 6),
('Genero', 'F', 7),
('Genero', 'M', 8),
('Genero', 'F', 9),
('Ciudad', 'Bogota', 1),
('Ciudad', 'Cali', 2),
('Ciudad', 'Bogota', 3),
('Ciudad', 'Medellin', 4),
('Ciudad', 'Medellin', 5),
('Ciudad', 'Barranquilla', 6),
('Ciudad', 'Cali', 7),
('Ciudad', 'Bogota', 8),
('Ciudad', 'Medellin', 9),
('Mascota', 'Si', 1),
('Mascota', 'Si', 2),
('Mascota', 'Si', 3),
('Mascota', 'No', 4),
('Mascota', 'Si', 5),
('Mascota', 'No', 6),
('Mascota', 'No', 7),
('Mascota', 'No', 8),
('Mascota', 'Si', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clienteID`),
  ADD KEY `clienteID` (`clienteID`);

--
-- Indexes for table `datos`
--
ALTER TABLE `datos`
  ADD KEY `clienteID` (`clienteID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clienteID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`clienteID`) REFERENCES `clientes` (`clienteID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
