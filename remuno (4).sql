-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 06:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `remuno`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `UserId` int(11) NOT NULL,
  `SongId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `belong`
--

CREATE TABLE `belong` (
  `playlistid` int(11) NOT NULL,
  `songid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `belong`
--

INSERT INTO `belong` (`playlistid`, `songid`) VALUES
(4, 3),
(4, 4),
(5, 5),
(6, 5),
(6, 6),
(6, 8),
(8, 9),
(8, 10),
(8, 11),
(9, 15),
(9, 16),
(10, 12),
(10, 13),
(10, 14);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `playlistid` int(11) NOT NULL,
  `playlistname` varchar(100) NOT NULL,
  `global` tinyint(1) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`playlistid`, `playlistname`, `global`, `userid`, `image`) VALUES
(4, 'blackpink', NULL, 1, 'playlist/44753.jpg'),
(5, ' vjemren', NULL, 1, 'playlist/44753.jpg'),
(6, ' vbery', NULL, 1, 'playlist/12325.jpg'),
(8, 'Animal', NULL, 1, 'playlist/animal.jpeg'),
(9, 'Fighter', NULL, 1, 'playlist/Sher-Khul-Gaye-From-Fighter-Hindi-2023-20231215112738-500x500.jpg'),
(10, 'Alta makhi', NULL, 1, 'playlist/alta makhi.jpg'),
(11, 'kalastar', NULL, 1, 'playlist/kalastar.jpg'),
(13, 'bornpink', NULL, 1, 'playlist/blackpink.webp'),
(14, 'kho geye hum tum', NULL, 1, 'playlist/kho geye hum tum.jpg'),
(15, 'Charlie puth', NULL, 1, 'playlist/charlie puth.jpg'),
(16, 'Best of Justin Bieber', NULL, 1, 'playlist/best of justine bieber.jpeg'),
(17, 'hindi top song', NULL, 1, 'playlist/hindiop100.webp');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `songid` int(11) NOT NULL,
  `sname` varchar(80) NOT NULL,
  `sartist` varchar(80) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`songid`, `sname`, `sartist`, `path`) VALUES
(3, 'Remuno', 'ajae', 'songs/Bet You Wanna (feat. Cardi B) - BLACKPINK, Cardi B.mp3'),
(4, 'mamgna', 'agnkr', 'songs/Cheshire - ITZY.mp3'),
(5, 'mamnjv', 'agnk', 'songs/DDU-DU DDU-DU - BLACKPINK.mp3'),
(6, 'mamnjv nkjkj', 'agnkjk', 'songs/Fitoor - Mithoon, Arijit Singh, Neeti Mohan, Karan Malhotra.mp3'),
(8, 'mamnjv n', 'agnkjk', 'songs/BOOMBAYAH - BLACKPINK.mp3'),
(9, 'Satranga', 'Arijit Singh', 'songs/Satranga_From__ANIMAL__Arijit_Singh,_Shreyas_Puranik,_Siddharth.mp3'),
(10, 'Pehle Bhi Main', 'Raj Shekhar', 'songs/Pehle Bhi Main - Vishal Mishra, Raj Shekhar.mp3'),
(11, 'Saari Duniya Jalaa Denge', 'jaani', 'songs/Saari_Duniya_Jalaa_Denge_From__ANIMAL__Jaani,_B_Praak.mp3'),
(12, 'Mor bela 2.0', 'Bijay Ananda Sahu', 'songs/Mor Bela 2.0 Sambalpuri Song Full Album Video Bijay Anand Pratham kumbhar [TubeRipper.com].mp3'),
(13, 'Alta makhi', 'Bijay Ananda Sahu', 'songs/Alta Makhi Official Sambalpuri Song Full Video Bijay Anand Sahu Pratham Pankaj Kiran Dash [TubeRipper.com].mp3'),
(14, 'Dulhan banami', 'Achurjya Borpatra', 'songs/Dulhan Banami (Sambalpuri Music Video) - Achurjya Borpatra Bijay Anand Sahu Kiran D Pratham K [TubeRipper.com].mp3'),
(15, 'Sher Khul geye', 'Vishal-Sheykhar', 'songs/FIGHTER Sher Khul Gaye Song Hrithik Deepika Vishal-Sheykhar Benny Shilpa Kumaar Bosco-Caesar [TubeRipper.com].mp3'),
(16, 'Ishq Jaisa Kuch', 'Vishal-Sheykhar', 'songs/FIGHTER Ishq Jaisa Kuch Song Hrithik Deepika Vishal-Sheykhar Shilpa Kumaar Bosco-Caesar [TubeRipper.com].mp3');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `SongId` int(11) NOT NULL,
  `Genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `email`, `password`) VALUES
(2, 'Manas Ranjan Bariha', 'manasbariha779@gmail.com', 'manasbariha'),
(4, 'Shubha', 'shubha@gmail.com', 'shubha123'),
(5, 'Rhitam Bhattacharyya', 'rhitam@remuno.com', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD UNIQUE KEY `SongId` (`UserId`,`SongId`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playlistid`),
  ADD UNIQUE KEY `Favourites` (`playlistname`,`userid`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`songid`),
  ADD UNIQUE KEY `SName` (`sname`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD UNIQUE KEY `SongId` (`SongId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `playlistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `songid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
