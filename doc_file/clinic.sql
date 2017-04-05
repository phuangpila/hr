-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 07:54 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL,
  `create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `name`, `detail`, `question_id`, `create`) VALUES
(32, 'admin', 's', 11, '2017-03-25 00:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `charge`
--

CREATE TABLE `charge` (
  `id_auto` int(11) NOT NULL,
  `create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `charge`
--

INSERT INTO `charge` (`id_auto`, `create`, `status`) VALUES
(6, '2017-03-25 23:27:31', 1),
(7, '2017-03-26 12:39:24', 1),
(8, '2017-03-26 12:45:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `charge_detail`
--

CREATE TABLE `charge_detail` (
  `id_auto` int(11) NOT NULL,
  `id_charge` int(11) NOT NULL,
  `drug` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `charge_detail`
--

INSERT INTO `charge_detail` (`id_auto`, `id_charge`, `drug`, `price`, `create`) VALUES
(9, 6, 'sss', 22, '2017-03-25 23:27:31'),
(10, 7, 'ยาดม', 100, '2017-03-26 12:39:25'),
(11, 8, 'ยาดม', 900, '2017-03-26 12:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(4) NOT NULL,
  `reply` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `topic`, `detail`, `name`, `created`, `view`, `reply`) VALUES
(13, 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '', 'admin', '2017-03-25 00:23:11', 3, 0),
(12, 'sss', 'sss', 'admin', '2017-03-25 00:13:12', 2, 0),
(11, 'ลอง', 'ssss', 'admin', '2017-03-25 00:05:55', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `charge_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lose_d` text COLLATE utf8_unicode_ci NOT NULL,
  `sick` text COLLATE utf8_unicode_ci NOT NULL,
  `date_appoint` date NOT NULL,
  `status_sick` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `rank` int(3) NOT NULL,
  `date_treat` datetime NOT NULL,
  `create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_app` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `type_id`, `charge_id`, `id_user`, `lose_d`, `sick`, `date_appoint`, `status_sick`, `rank`, `date_treat`, `create`, `date_app`) VALUES
(1, 3, 6, 3, 'gg', 'gg', '2017-03-25', '0', 1, '2017-03-25 16:18:27', '2017-03-25 22:18:23', '0000-00-00 00:00:00'),
(11, 3, 0, 3, 'gg', 'gg', '0000-00-00', '1', 2, '2017-03-26 07:52:37', '2017-03-26 12:51:20', '2017-03-30 10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `type_treatment`
--

CREATE TABLE `type_treatment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_treatment`
--

INSERT INTO `type_treatment` (`id`, `name`, `create`) VALUES
(2, 'คูดหินปูน', '2017-03-25 22:18:03'),
(3, 'อุดฟัน', '2017-03-25 22:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pass_word` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tel` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `num_card` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `status_out` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `pass_word`, `address`, `create`, `tel`, `sex`, `status`, `num_card`, `age`, `status_out`) VALUES
(1, 'user', 'user', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '0000-00-00 00:00:00', '', '', '2', '', 0, ''),
(2, 'admin', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '2017-03-24 23:11:57', '', '', '1', '', 0, ''),
(3, 'user2', 'user2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '2017-03-24 23:12:31', '', '', '3', '', 0, ''),
(4, 'mm mm', 'user4', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'sssssssssssssssssssssssssssssssssssssss', '2017-03-25 01:13:48', '2323', 'F', '2', '123', 11, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charge`
--
ALTER TABLE `charge`
  ADD PRIMARY KEY (`id_auto`);

--
-- Indexes for table `charge_detail`
--
ALTER TABLE `charge_detail`
  ADD PRIMARY KEY (`id_auto`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_treatment`
--
ALTER TABLE `type_treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `charge`
--
ALTER TABLE `charge`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `charge_detail`
--
ALTER TABLE `charge_detail`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `type_treatment`
--
ALTER TABLE `type_treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
