-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 04:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carriders`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `VehicleId` int(11) NOT NULL,
  `FromDate` varchar(20) NOT NULL,
  `ToDate` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Id`, `UserEmail`, `VehicleId`, `FromDate`, `ToDate`, `Status`, `PostingDate`) VALUES
(1, '08sandysk@gmail.com', 1, '24/05/2019', '26/05/2019', 1, '2019-05-19 23:44:48'),
(2, '08sandysk@gmail.com', 2, '24/05/2019', '26/05/2019', 2, '2019-05-19 23:47:45'),
(3, '08sandysk@gmail.com', 4, '24/05/2019', '26/05/2019', 1, '2019-05-19 23:48:15'),
(4, '08sandysk@gmail.com', 2, '24/05/2019', '26/05/2019', 2, '2019-05-20 02:06:10'),
(5, '08sandysk@gmail.com', 1, '24/05/2019', '26/05/2019', 1, '2019-05-20 07:24:05'),
(6, 'sonamlama@gmail.com', 2, '01/06/2019', '02/06/2019', 1, '2019-05-20 08:39:58'),
(7, 'sonamlama@gmail.com', 1, '21/06/2019', '29/06/2019', 2, '2019-05-20 08:40:40'),
(8, 'sonamlama@gmail.com', 7, '11/07/2019', '19/07/2019', 1, '2019-05-20 08:41:09'),
(9, 'sylvesterlepcha@gmail.com', 3, '05/08/2019', '15/08/2019', 2, '2019-05-20 08:42:33'),
(10, 'sylvesterlepcha@gmail.com', 8, '19/09/2019', '29/09/2019', 1, '2019-05-20 08:42:56'),
(11, 'sylvesterlepcha@gmail.com', 4, '16/10/2019', '26/10/2019', 1, '2019-05-20 08:43:25'),
(12, 'sagarroy@gmail.com', 2, '31/05/2019', '31/06/2019', 2, '2019-05-20 08:44:43'),
(13, 'sagarroy@gmail.com', 6, '31/08/2019', '15/08/2019', 1, '2019-05-20 08:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `Id` int(25) NOT NULL,
  `BrandName` varchar(225) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`Id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(11, 'Lamborghini', '2019-05-11 06:14:33', '2019-05-20 07:35:47'),
(12, 'Ford', '2019-05-11 06:14:46', NULL),
(13, 'Maruti Suzuki', '2019-05-11 06:14:57', '2019-05-20 07:36:10'),
(14, 'BMW', '2019-05-16 20:31:27', '2019-05-20 07:36:50'),
(15, 'TATA Motors', '2019-05-17 14:48:12', '2019-05-20 07:36:32'),
(17, 'HONDA', '2019-05-17 23:13:11', '2019-05-20 07:37:10'),
(18, 'Mercedes', '2019-05-20 07:37:55', NULL),
(19, 'Renault', '2019-05-20 07:38:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(120) NOT NULL,
  `EmailId` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ContactNo` char(11) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FullName`, `EmailId`, `password`, `ContactNo`, `Dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'SandyUndefined', '08sandysk@gmail.com', '1234', '7318724249', '19/09/1996', 'Shivmandir', 'Siliguri', 'India', '2019-05-19 20:01:11', '2019-05-20 20:01:47'),
(2, 'Sylvester Lepcha', 'sylvesterlepcha@gmail.com', '1234', '+9173187242', '27/11/1995', 'Salbari', 'siliguri', 'India', '2019-05-20 08:35:38', '2019-05-20 09:16:28'),
(3, 'Sagar Roy', 'sagarroy@gmail.com', '123', '+9173187242', '13/11/1994', 'Kalimpong, Darjeeling', 'siliguri', 'India', '2019-05-20 08:36:25', '2019-05-20 20:39:35'),
(4, 'Shrawan Chhetri', 'savey@gmail.com', '1234', '+9173187242', '14/12/1995', 'Kalimpopng, Darjeeling', 'siliguri', 'India', '2019-05-20 08:36:57', '2019-05-20 09:17:48'),
(5, 'Sonam Tamang', 'sonamlama@gmail.com', '1234', '8016891406', '26/06/1990', 'Methibari, Salbari', 'Siliguri', 'India', '2019-05-20 08:37:23', '2019-05-20 09:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `Id` int(11) NOT NULL,
  `VehicleTitle` varchar(150) NOT NULL,
  `VehicleBrand` int(11) NOT NULL,
  `VehicleOverview` longtext NOT NULL,
  `PricePerDay` int(11) NOT NULL,
  `FuelType` varchar(100) NOT NULL,
  `ModelYear` int(6) NOT NULL,
  `SeatingCapacity` int(11) NOT NULL,
  `Vehicleimage` varchar(120) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`Id`, `VehicleTitle`, `VehicleBrand`, `VehicleOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vehicleimage`, `RegDate`, `UpdationDate`) VALUES
(1, 'CENTENARIO', 11, ' A performance driven model, this one-off open-top model is built on a carbon fiber monocoque frame with bodywork also in carbon fiber. The highly responsive V12 engine delivers 770 hp (566 kW) with maximum engine revs increased from 8.350 to 8.600 rpm. Accelerating from 0-100 km/h in just 2.9 seconds the Centenario Roadsterâ€™s top speed is more than 350 km/h. Braking distance is equally impressive: from 100-0 km/h in just 31 m.', 7000, 'CNG', 2017, 2, 'CENTENARIO.jpg', '2019-05-17 23:10:38', '2019-05-20 08:26:51'),
(2, 'EcoSport', 12, 'Every inch of the Ford EcoSport is designed to help you do more, get anywhere and make the most of your city life. With a bold new design, the EcoSport always looks like itâ€™s ready for action, because it is.', 2500, 'Diesel', 2013, 5, 'ford.jpg', '2019-05-18 16:26:59', '2019-05-20 08:28:27'),
(3, 'Baleno', 13, 'The bold always makes the first move. Presenting, first time in its segment, an engine that delivers exceptional performance with efficient combustion, which leads to increased fuel efficiency and lesser emissions. It takes your driving performance to a whole new level.', 3000, 'Petrol', 2012, 4, 'baleno.jpg', '2019-05-18 16:28:05', '2019-05-20 08:30:14'),
(4, 'New 3 Series', 14, 'BMW took wraps off the new-gen 3 Series at the 2018 Paris Motor Show. The G20 3 Series takes its inspiration from the resurrected 8 and comes with many modern day features while retaining its characteristic driving dynamics. And the new 3 Series is a lot better looking compared to the F30 model it replaces.', 8000, 'Diesel', 2018, 4, 'bmw.jpg', '2019-05-19 11:47:03', '2019-05-20 08:32:27'),
(5, 'Nexon', 15, 'Powered by 110PS Turbocharged engines, 6 speed transmission and three drive modes â€“ ECO, CITY & SPORT, the NEXON provides a drive experience like no other.', 5000, 'Petrol', 2018, 4, 'nexon.jpg', '2019-05-20 08:06:00', NULL),
(6, 'CITY', 17, 'The classic Honda City contour is unmistakable but the surprises will thrill you too. It is a design vision that echoes the Cityâ€™s blue blooded sedan charm. A look that adds panache and exhilaration to the game. It is an overpowering presence that meets a brand new attitude.', 5500, 'Diesel', 2013, 4, 'city.jpg', '2019-05-20 08:09:24', NULL),
(7, 'AMG C 43 4MATIC CoupÃ©', 18, 'Demonstrate your personality directly on the asphalt. The distinctive lines of the Mercedes-AMG C 43 4MATIC CoupÃ© differentiate it clearly from the Mercedes-Benz models. A vehicle as dynamic as this deserves a powerful rear end: double round twin tailpipes and the spoiler lip painted in vehicle color. ', 8000, 'Petrol', 2016, 4, 'mercedes.jpeg', '2019-05-20 08:13:18', NULL),
(8, 'DUSTER', 19, 'The Renault DUSTER is the True SUV that gives you the license to go across city boundaries in India and beyond. An escape from the everyday\r\nroutine, an invitation to meet the great outdoors face to face.', 3000, 'Diesel', 2015, 7, 'DUSTER.jpg', '2019-05-20 08:16:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
