-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 08:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpris_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `births`
--

CREATE TABLE `births` (
  `id` int(11) NOT NULL,
  `name_of_child` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `name_of_mother` varchar(255) NOT NULL,
  `name_of_father` varchar(255) NOT NULL,
  `birth_certificate_number` varchar(50) NOT NULL,
  `date_of_registration` date NOT NULL,
  `place_of_registration` varchar(255) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `receipt_number` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `birth_certificate_scan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `births`
--

INSERT INTO `births` (`id`, `name_of_child`, `date_of_birth`, `sex`, `place_of_birth`, `name_of_mother`, `name_of_father`, `birth_certificate_number`, `date_of_registration`, `place_of_registration`, `amount_paid`, `receipt_number`, `date_created`, `birth_certificate_scan`) VALUES
(1, 'Maleele Michelo', '2020-03-12', 'M', 'Livingstone', 'Nyawa Zulu', 'Brian Michelo', '01245', '2020-03-13', 'Livingstone', 250.00, 'GR2021', '2025-05-07 21:05:23', 'uploads/IMG-20250506-WA0026.jpg'),
(2, 'Ketura Hankaanga', '2021-05-23', 'F', 'Lusaka', 'Brenda Mutinta', 'Omiya Hankaanga', '12477', '2025-05-08', 'Lusaka', 600.00, '25478', '2025-05-07 23:57:22', 'uploads/images.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `deaths`
--

CREATE TABLE `deaths` (
  `id` int(11) NOT NULL,
  `name_of_deceased` varchar(100) NOT NULL,
  `name_of_informant` varchar(100) NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `age_of_deceased` int(11) NOT NULL,
  `date_of_death` date NOT NULL,
  `cause_of_death` varchar(255) NOT NULL,
  `place_of_death` varchar(255) NOT NULL,
  `burial_place` varchar(255) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `receipt_number` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `death_certificate_scan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deaths`
--

INSERT INTO `deaths` (`id`, `name_of_deceased`, `name_of_informant`, `sex`, `age_of_deceased`, `date_of_death`, `cause_of_death`, `place_of_death`, `burial_place`, `amount_paid`, `receipt_number`, `date_created`, `death_certificate_scan`) VALUES
(1, 'John Doe', 'Jane Doe', 'M', 26, '2025-05-06', 'RTA', 'Mongu CBD', 'Chisonga Burial Grounds', 200.00, 'MG0273121', '2025-05-06 14:28:46', NULL),
(2, 'Mulenga Lwaya', 'Jackson Kalyata', 'M', 28, '2025-05-02', 'Short Illness', 'Lewanika General Hospital', 'Chisonga Burial Grounds', 200.00, 'MG027312847', '2025-05-07 15:42:26', 'uploads/MMC Access to Devolution Tool.pdf'),
(3, 'Marcus', 'Aurelius', 'M', 90, '2025-04-04', 'Natural causes', 'Egypt', 'Egypt', 500.00, 'mg20115', '2025-05-07 17:05:52', 'uploads/WhatsApp Image 2025-05-05 at 15.08.21_2871a1c2.jpg'),
(4, 'Marcus', 'Aurelius', 'M', 90, '2025-04-04', 'Natural causes', 'Egypt', 'Egypt', 500.00, 'mg20115', '2025-05-07 17:08:18', 'uploads/WhatsApp Image 2025-05-05 at 15.08.21_2871a1c2.jpg'),
(5, 'Marcus', 'Aurelius', 'M', 90, '2025-04-04', 'Natural causes', 'Egypt', 'Egypt', 500.00, 'mg20115', '2025-05-07 17:09:21', 'uploads/WhatsApp Image 2025-05-05 at 15.08.21_2871a1c2.jpg'),
(6, 'Marcus', 'Aurelius', 'M', 90, '2025-04-04', 'Natural causes', 'Egypt', 'Egypt', 500.00, 'mg20115', '2025-05-07 17:09:50', 'uploads/WhatsApp Image 2025-05-05 at 15.08.21_2871a1c2.jpg'),
(7, 'Julius Ceaser', 'Jackson Langa', 'F', 28, '2025-05-09', 'snake bit', 'Lusaka', 'Mongu', 300.00, 'Mk223', '2025-05-07 17:11:53', 'uploads/IMG-20250506-WA0025.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `id` int(11) NOT NULL,
  `dog_name` varchar(100) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_contact` varchar(50) NOT NULL,
  `registration_date` date NOT NULL,
  `vaccination_certificate` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`id`, `dog_name`, `breed`, `age`, `owner_name`, `owner_contact`, `registration_date`, `vaccination_certificate`, `date_created`) VALUES
(1, 'Tiger', 'Mongrel', 5, 'Linda Mwale', '0977256862', '2025-05-10', 'uploads/Screenshot 2025-05-09 111358.png', '2025-05-10 22:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `land_records`
--

CREATE TABLE `land_records` (
  `id` int(11) NOT NULL,
  `plot_no` varchar(50) NOT NULL,
  `property_owner` varchar(255) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `area` varchar(100) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `council_documents` varchar(255) NOT NULL,
  `ministry_documents` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `land_records`
--

INSERT INTO `land_records` (`id`, `plot_no`, `property_owner`, `contact_number`, `area`, `zone`, `council_documents`, `ministry_documents`, `date_created`) VALUES
(1, '7084', 'Brian Michelo', '0977273121', 'Kasima Extension', 'Kasima', 'uploads/Screenshot 2025-05-09 111358.png', 'uploads/Screenshot 2025-05-09 111358.png', '2025-05-10 22:28:27'),
(2, '256', 'Muleya Hamangonze', '02775861', 'Imwko Extension', 'Imwiko', 'uploads/WhatsApp Image 2025-05-05 at 15.08.22_4e18580b.jpg', 'uploads/Screenshot 2025-05-09 111358.png', '2025-05-10 22:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `marriages`
--

CREATE TABLE `marriages` (
  `id` int(11) NOT NULL,
  `name_of_groom` varchar(255) NOT NULL,
  `name_of_bride` varchar(255) NOT NULL,
  `date_of_marriage` date NOT NULL,
  `place_of_marriage` varchar(255) NOT NULL,
  `marriage_certificate_number` varchar(50) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `receipt_number` varchar(50) NOT NULL,
  `marriage_certificate_scan` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marriages`
--

INSERT INTO `marriages` (`id`, `name_of_groom`, `name_of_bride`, `date_of_marriage`, `place_of_marriage`, `marriage_certificate_number`, `amount_paid`, `receipt_number`, `marriage_certificate_scan`, `date_created`) VALUES
(1, 'Douglous Holme', 'Enola Holmes', '2025-05-10', 'Lusak', '01125', 1500.00, 'mg409', 'uploads/images.jpeg', '2025-05-07 23:51:19'),
(2, 'Patrick Swayzi', 'Angelila Joli', '2025-05-22', 'Kaoma', '22548', 2000.00, 'l6525', 'uploads/images.jpeg', '2025-05-07 23:52:24'),
(3, 'Eugine Nyambe', 'Stella Banda', '2025-05-31', 'Chibelo', '2215', 1500.00, '1512', 'uploads/images.jpeg', '2025-05-07 23:54:09'),
(4, 'Andrew Musumba', 'Lisa Tembo', '2015-10-18', 'lusaka', '23012', 1000.00, 'GRZ0554', 'uploads/Screenshot 2025-05-09 111358.png', '2025-05-10 13:32:07'),
(5, 'Francis Malaika', 'Elizabeth Njobvu', '2025-05-10', 'Mongu', '09988', 1200.00, 'MG200024', 'uploads/5885130471925945_invoice.pdf', '2025-05-10 13:44:59'),
(6, 'Pascal Sikuka', 'mgmgigmgmg ', '2025-05-08', 'mongu', '1000', 1500.00, 'mg5000', 'uploads/WhatsApp Image 2025-05-14 at 13.55.44_19d0492f.jpg', '2025-05-14 18:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$eJ7yadtoh4p5blVwc7L4C.ORwDMPLmjL9EJdITnDKnzZT9S4ClGF.'),
(2, 'michelo', '$2y$10$xEb02NJ6UqPT4LKgs0fVD.9IbGyZmOQwAKiJc818ni2JgtNKcAPL2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `births`
--
ALTER TABLE `births`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deaths`
--
ALTER TABLE `deaths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_records`
--
ALTER TABLE `land_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marriages`
--
ALTER TABLE `marriages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `births`
--
ALTER TABLE `births`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deaths`
--
ALTER TABLE `deaths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `land_records`
--
ALTER TABLE `land_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marriages`
--
ALTER TABLE `marriages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
