-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2017 at 05:42 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone_arena_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `IdAuthorPicture` int(11) NOT NULL,
  `AuthorPicturePath` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Alt` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `AboutAuthor` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`IdAuthorPicture`, `AuthorPicturePath`, `Alt`, `AboutAuthor`) VALUES
(1, 'imgs/author/308GTi.jpg', 'uros markov', 'Uros Markov is a student at "ICT college of Vocational Studies", of Belgrade university.He is currently studying in order to become a Web developer.This is his second year, and he is amazed by the things he has learned so far.He is very friendly and a team player.He would like to pursue a master''s degree in Web development, thus increasing his knowledge and experience on the subject.Well thats it for now, can''t think of anything else at this moment.');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `IdCity` int(11) NOT NULL,
  `City` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`IdCity`, `City`) VALUES
(1, 'Beograd'),
(2, 'Novi Sad'),
(3, 'Niš'),
(4, 'Kragujevac'),
(5, 'Valjevo');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `IdGallery` int(10) NOT NULL,
  `GalleryName` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`IdGallery`, `GalleryName`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'Sony'),
(4, 'LG'),
(5, 'Huawei');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `IdManufacturer` int(11) NOT NULL,
  `Name` varchar(24) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`IdManufacturer`, `Name`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'Sony'),
(4, 'LG'),
(5, 'Huawei'),
(6, 'Xiaomi'),
(7, 'HTC');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `IdLink` int(5) NOT NULL,
  `Path` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `ParentId` int(5) NOT NULL,
  `Text` varchar(24) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`IdLink`, `Path`, `ParentId`, `Text`) VALUES
(1, '#', 0, 'Menu'),
(2, 'slider', 1, 'Home page'),
(3, 'shop', 1, 'Smartphones'),
(4, 'gallery', 1, 'Gallery'),
(5, 'author', 1, 'Author'),
(6, '#', 0, 'Users'),
(7, 'login', 6, 'Log in'),
(8, 'signup', 6, 'Sign up'),
(9, 'logout', 6, 'Log out');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `IdPicture` int(10) NOT NULL,
  `IdGallery` int(10) NOT NULL,
  `Picture` varchar(48) COLLATE utf8_unicode_ci NOT NULL,
  `AltTag` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`IdPicture`, `IdGallery`, `Picture`, `AltTag`) VALUES
(1, 1, 'imgs/thumb/note4T.jpg', 'Galaxy Note 4'),
(2, 2, 'imgs/thumb/iphone6sT.jpg', 'iPhone 6s'),
(3, 1, 'imgs/thumb/s7T.jpg', 'Samsung Galaxy S7'),
(4, 1, 'imgs/thumb/samsung7.jpg', 'Samsung Galaxy S7 and iPhone 6s+'),
(5, 3, 'imgs/thumb/xperiaZ3.jpg', 'Sony Xperia Z3'),
(6, 3, 'imgs/thumb/z5T.jpg', 'Sony Xperia Z5'),
(7, 1, 'imgs/thumb/galaxyA5.jpg', 'Samsung Galaxy A5(2016)'),
(8, 1, 'imgs/thumb/galaxyA7.jpg', 'Samsung Galaxy A7(2017)'),
(9, 2, 'imgs/thumb/iphone5s6.jpg', 'iPhone 5s and iPhone 6'),
(10, 4, 'imgs/thumb/p9T.jpg', 'Huawei P9');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `IdQuestion` int(5) NOT NULL,
  `Question` text COLLATE utf8_unicode_ci NOT NULL,
  `Active` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`IdQuestion`, `Question`, `Active`) VALUES
(1, 'How would you rate my site ?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartphones`
--

CREATE TABLE `smartphones` (
  `IdSmartphone` int(10) NOT NULL,
  `IdManufacturer` int(10) NOT NULL,
  `Model` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ReleaseDate` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `IdOS` int(2) NOT NULL,
  `ScreenSize` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DisplayResolution` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `DisplayType` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `CPU` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `GPU` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `RAM` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Camera` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `MicroSD` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Battery` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Picture` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `smartphones`
--

INSERT INTO `smartphones` (`IdSmartphone`, `IdManufacturer`, `Model`, `ReleaseDate`, `IdOS`, `ScreenSize`, `DisplayResolution`, `DisplayType`, `CPU`, `GPU`, `RAM`, `Camera`, `MicroSD`, `Battery`, `Picture`) VALUES
(1, 1, 'Galaxy Note 4', 'October, 2014', 1, '5.7 inches', 'Quad HD (1440x2560), 518ppi', 'SuperAMOLED, 16M', 'Octa core - Exynos 5433', 'Mali-T760 MP6 (Exynos 5433)', '3 GB RAM', '16 MP, f/2.2, 31mm, autofocus, LED flash', 'Yes, up to 256 GB', 'Removable Li-Ion 3220 mAh', 'imgs/thumb/note4T.jpg'),
(2, 3, 'Xperia Z5 Premium', 'October, 2015', 1, '5.2 inches', 'Full HD (1080x1920), 428ppi', 'IPS LCD, 16M', 'Qualcomm Snapdragon 810', 'Adreno 430', '3GB RAM', '3 MP, f/2.0, 24mm, LED flash', 'Yes, up to 256 GB', 'Non-Removable Li-Ion 2900 mAh', 'imgs/thumb/z5T.jpg'),
(3, 2, 'iPhone 6s', 'September, 2015', 2, '4.7 inches', 'HD ready (750x1334), 326ppi', 'LED-backlit IPS LCD', 'Dual-core 1.84 GHz Twister', 'PowerVR GT7600', '2GB RAM', '12 MP, f/2.2, 29mm, dual-LED flash', 'Not supported', 'Non-Removable Li-Ion 1715 mAh', 'imgs/thumb/iphone6sT.jpg'),
(4, 4, 'LG G5', 'April, 2016', 1, '5.3 inches', 'Quad HD (1440x2560), 554ppi', 'IPS LCD', 'Quad-core (2x2.15 GHz Kryo & 2x1.6 GHz Kryo)', 'Adreno 530', '4GB Ram', 'Dual 16 MP (29mm, f/1.8) + 8 MP (12mm, f/2.4)', 'Yes, up to 256GB', 'Removable Li-Ion 2800 mAh', 'imgs/thumb/g5T.jpg'),
(5, 1, 'Galaxy S7', 'March, 2016', 1, '5.1 inches', 'Quad HD (1440x2560), 557ppi', 'Super Amoled, 16M', 'Octa-core (4x2.3 GHz Mongoose & 4x1.6 GHz Cortex-A53)', 'Mali-T880 MP12', '4GB RAM', '12 MP, f/1.7, 26mm, OIS, LED flash', 'Yes, up to 256GB', 'Non-removable Li-Ion 3000 mAh', 'imgs/thumb/s7T.jpg'),
(6, 5, 'P9 Plus', 'May, 2016', 1, '5.5 inches', 'Full HD (1080x1920), 401ppi', 'Super AMOLED', 'Octa-core (4x2.5 GHz Cortex-A72 & 4x1.8 GHz Cortex-A53)', 'Mali-T880 MP4', '4GB RAM', 'Dual 12 MP, f/2.2, 27 mm, Leica optics, dual-LED flash', 'Yes, up to 256GB', 'Non-removable Li-Po 3400 mAh', 'imgs/thumb/p9T.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `IdSurvey` int(5) NOT NULL,
  `LabelSpan` text COLLATE utf8_unicode_ci NOT NULL,
  `IdQuestion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`IdSurvey`, `LabelSpan`, `IdQuestion`) VALUES
(1, 'I don''t like it :(', 1),
(2, 'You need more practice, but you''re doing great so far.', 1),
(3, 'Its not bad, I actually like it.', 1),
(4, 'Its pretty good, but I think i can make a better one.', 1),
(5, 'Its awesome, absolutely loved it!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `IdOS` int(11) NOT NULL,
  `Name` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`IdOS`, `Name`) VALUES
(1, 'Android'),
(2, 'iOS');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `IdUloga` int(2) NOT NULL,
  `NazivUloga` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`IdUloga`, `NazivUloga`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IdUser` int(16) NOT NULL,
  `FirstName` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `BirthDate` int(32) NOT NULL,
  `IdCity` int(11) NOT NULL,
  `Gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Avatar` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `IdUloga` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `FirstName`, `LastName`, `Email`, `Username`, `Password`, `BirthDate`, `IdCity`, `Gender`, `Avatar`, `IdUloga`) VALUES
(2, 'Uros', 'Markov', 'uros.markov.42.15@ict.edu.rs', 'Brometheus', '370a11a674d0e2489eda6cb101c55ef1', 797378400, 1, 'Male', 'avatars/IWillWin.jpg', 1),
(3, 'Pera', 'Peric', 'pera.peric@yahoo.com', 'Perica289', '370a11a674d0e2489eda6cb101c55ef1', 812242800, 1, 'Male', 'avatars/Koala.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`IdAuthorPicture`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`IdCity`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`IdGallery`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`IdManufacturer`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IdLink`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`IdPicture`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`IdQuestion`);

--
-- Indexes for table `smartphones`
--
ALTER TABLE `smartphones`
  ADD PRIMARY KEY (`IdSmartphone`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`IdSurvey`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`IdOS`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`IdUloga`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `IdAuthorPicture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `IdCity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `IdGallery` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `IdManufacturer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `IdLink` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `IdPicture` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `IdQuestion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `smartphones`
--
ALTER TABLE `smartphones`
  MODIFY `IdSmartphone` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `IdSurvey` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `IdOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `IdUloga` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
