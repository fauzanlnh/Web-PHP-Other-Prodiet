-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 06:15 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro_diet`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `berat_badan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`email`, `username`, `nama`, `berat_badan`) VALUES
('admin@prodiet@gmail.com', 'ADMIN-001', 'Admin1', 60),
('azizi@gmail.com', 'azz', 'azizi', 60),
('fauzanlh2000@gmail.com', 'fauzanlnh', 'fauzan', 54),
('gentra@gmail.com', 'gentra', 'gentra', 60);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `kegiatan`) VALUES
(1, 'Main Course'),
(2, 'Dessert'),
(3, 'Drink'),
(4, 'Pengukuran');

-- --------------------------------------------------------

--
-- Table structure for table `metode`
--

CREATE TABLE `metode` (
  `id_metode` int(11) NOT NULL,
  `nama_metode` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `keuntungan` varchar(255) NOT NULL,
  `rekomen1` varchar(50) NOT NULL,
  `rekomen2` varchar(50) NOT NULL,
  `rekomen3` varchar(50) NOT NULL,
  `deskripsi_rekomen1` varchar(255) NOT NULL,
  `deskripsi_rekomen2` varchar(255) NOT NULL,
  `deskripsi_rekomen3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode`
--

INSERT INTO `metode` (`id_metode`, `nama_metode`, `deskripsi`, `keuntungan`, `rekomen1`, `rekomen2`, `rekomen3`, `deskripsi_rekomen1`, `deskripsi_rekomen2`, `deskripsi_rekomen3`) VALUES
(1, 'Pescetarian', 'Pescatarian adalah pola makan tanpa mengonsumsi daging. Namun, orang yang menjalani pola makan ini masih mengonsumsi ikan dan jenis makanan laut lain', 'Diet Sehat', 'pesce1', 'pesce2', 'pesce3', 'pesce1', 'pesce2', 'pesce'),
(2, 'Lacto Vegetarian', 'Lacto vegetarian adalah jenis diet yang tidak mengkonsumsi unggas, daging, makanan laut, dan telur.', 'Diet Sehat', 'Lacto1', 'Lacto2', 'Lacto3', 'Lacto1', 'Lacto2', 'Lacto3'),
(3, 'Ovo Vegetarian', 'Tidak memakan produk daging, unggas, ikan, atau susu, tapi mengkonsumsi telur.', 'Diet Sehat', 'Ovo1', 'Ovo2', 'Ovo3', 'Ovo1', 'Ovo2', 'Ovo3'),
(4, 'Vegan', 'Tidak memakan daging, unggas, ikan, atau produk apapun yang berasal dari hewan, termasuk telur, produk susu, dan gelatin.', 'Diet Sehat', 'vegan1', 'vegan2', 'vegan3', 'vegan1', 'vegan2', 'vegan3');

-- --------------------------------------------------------

--
-- Table structure for table `metode_todolist`
--

CREATE TABLE `metode_todolist` (
  `id_todolist` int(11) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `api` varchar(50) NOT NULL,
  `hari_ke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode_todolist`
--

INSERT INTO `metode_todolist` (`id_todolist`, `id_metode`, `id_kegiatan`, `nama_kegiatan`, `api`, `hari_ke`) VALUES
(1, 1, 1, 'Pasta With Tuna', '654959', 1),
(2, 1, 2, 'Banana Bread Muffins, Bisquick', '634003', 1),
(3, 1, 3, 'Lemon Drop Jello Shots', '649625', 1),
(4, 1, 4, 'Berat Badan', '-', 1),
(5, 1, 1, 'Shrimp Fried Rice', '682619', 2),
(6, 1, 2, 'Raspberry Peach Crisp', '657889', 2),
(7, 1, 3, 'Spiked Watermelon lemonade', '661240', 2),
(8, 1, 4, 'Berat Badan', '-', 2),
(9, 1, 1, 'My Asian Calamari', '652825', 3),
(10, 1, 2, 'Banana Bread with Chocolate Glaze', '634010', 3),
(11, 1, 3, 'Refreshing Strawberry Limeade', '658152', 3),
(12, 1, 4, 'Berat Badan', '-', 3),
(13, 1, 1, 'Shrimp With Tomatoes, Feta, and Pine Nuts', '660021', 4),
(14, 1, 2, 'Berry Fruit Crumble', '634854', 4),
(15, 1, 3, 'Refreshing Strawberry Limeade', '658152', 4),
(16, 1, 4, 'Berat Badan', '-', 4),
(17, 1, 1, 'Tuna Mexi Melts', '663931', 5),
(18, 1, 2, 'Apple Pomegranate Crisp', '632622', 5),
(19, 1, 3, 'Strawberry Mango Green Tea Limeade', '661834', 5),
(20, 1, 4, 'Berat Badan', '-', 5),
(21, 1, 1, 'Italian Tuna Pasta', '648279', 6),
(22, 1, 2, 'Quick Apple Ginger Pie', '657563', 6),
(23, 1, 3, 'Summer Fruit Sangria', '662218', 6),
(24, 1, 4, 'Berat Badan', '-', 6),
(25, 1, 1, 'Easy Shrimp Scampi', '642096', 7),
(26, 1, 2, 'Banana Bread with Chocolate Chips', '634005', 7),
(27, 1, 3, 'Hot Spiced Cran-Apple Cider', '647531', 7),
(28, 1, 4, 'Berat Badan', '-', 7),
(29, 2, 1, 'Baked Sweet Potato Fries With Yogurt', '633840', 1),
(30, 2, 2, 'Coconut Banana Nut Bread', '639726', 1),
(31, 2, 3, 'Spiked Watermelon Lemonade', '661240', 1),
(32, 2, 4, 'Berat Badan', '-', 1),
(33, 2, 1, 'GF Vegan Creamy Broccoli Pasta', '1096053', 2),
(34, 2, 2, 'Dulce De Leche Swirled Amaretto Frozen Yogurt', '641732', 2),
(35, 2, 3, 'Lychee Smoothie', '650498', 2),
(36, 2, 4, 'Berat Badan', '-', 2),
(37, 2, 1, 'Vegetarian Tostadas', '664718', 3),
(38, 2, 2, 'Rhubarby Crumble', '471109', 3),
(39, 2, 3, 'Apple Cider Honey Jack Martini', '1095759', 3),
(40, 2, 4, 'Berat Badan', '-', 3),
(41, 2, 1, 'Mushroom Quesadillas', '652679', 4),
(42, 2, 2, 'Fresh Strawberry Rhubarb Compote Dessert', '643612', 4),
(43, 2, 3, 'Cherry Lime Mojito', '637766', 4),
(44, 2, 4, 'Berat Badan', '-', 4),
(45, 2, 1, 'Lentil, Sweet Potato and Spinach Soup', '649946', 5),
(46, 2, 2, 'Apple Rose Puff Dessert', '1095958', 5),
(47, 2, 3, 'Strawberry Mango Green Tea Limeade', '661834', 5),
(48, 2, 4, 'Berat Badan', '-', 5),
(49, 2, 1, 'Big Batch Smoothie Bowl', '1082038', 6),
(50, 2, 2, 'Fresh Cherry Scones', '643450', 6),
(51, 2, 3, 'Refreshing Strawberry Limeade', '658152', 6),
(52, 2, 4, 'Berat Badan', '-', 6),
(53, 2, 1, 'Baked Potatoes with Creamy Mushroom Ragout', '633744', 7),
(54, 2, 2, 'Oatmeal Coconut Cookies', '653445', 7),
(55, 2, 3, 'Ginger Lime Cooler', '644595', 7),
(56, 2, 4, 'Berat Badan', '-', 7),
(57, 3, 1, 'Soba Noodle Salad with Avocado and Mango', '660494', 1),
(58, 3, 2, 'Apple and Walnut Cake', '632471', 1),
(59, 3, 3, 'Celery & Ginger Juice', '637344', 1),
(60, 3, 4, 'Berat Badan', '-', 1),
(61, 3, 1, 'Banana Chocolate Pudding', '634048', 2),
(62, 3, 2, 'Blueberry Banana Bread', '635413', 2),
(63, 3, 3, 'Detox Orange Carrot Juice', '641443', 2),
(64, 3, 4, 'Berat Badan', '-', 2),
(65, 3, 1, 'Instant Pot Quinoa Grain Bowl', '982371', 3),
(66, 3, 2, 'Apple Rose Puff Dessert', '1095958', 3),
(67, 3, 3, 'Persimmons Pumpkin Orange Smoothie With Chia Seeds', '655786', 3),
(68, 3, 4, 'Berat Badan', '-', 3),
(69, 3, 1, 'Coconut Flour Pancakes with Blueberry Honey Compot', '639769', 4),
(70, 3, 2, 'Baby Blake’s Oatmeal Breakfast Cookies', '633219', 4),
(71, 3, 3, 'Cherry Lime Mojito', '637766', 4),
(72, 3, 4, 'Berat Badan', '-', 4),
(73, 3, 1, 'Bulgur Wheat Salad with Chickpeas, Bell Peppers & ', '1095768', 5),
(74, 3, 2, 'Buckwheat Crepes', '636392', 5),
(75, 3, 3, 'Black Forest Martini with Xocai Healthy Chocolate', '635111', 5),
(76, 3, 4, 'Berat Badan', '-', 5),
(77, 3, 1, 'Gulasch', '646051', 6),
(78, 3, 2, 'Flour-Less Peanut Butter Cookies', '643117', 6),
(79, 3, 3, 'Rhubarb & Blueberry Pink Lemonade', '1095765', 6),
(80, 3, 4, 'Berat Badan', '-', 6),
(81, 3, 1, 'Savory Oats', '659480', 7),
(82, 3, 2, 'Indian Sweet Jackfruit Dessert', '1095688', 7),
(83, 3, 3, 'Chai Concentrate', '637383', 7),
(84, 3, 4, 'Berat Badan', '-', 7),
(85, 4, 1, 'Quinoa Stuffed Mushrooms', '657682', 1),
(86, 4, 2, 'Blueberry Banana Bread', '635413', 1),
(87, 4, 3, 'Coconut Bliss Smoothie', '639728', 1),
(88, 4, 4, 'Berat Badan', '-', 1),
(89, 4, 1, 'fennel, Peppers, Lettuce Salad', '665831', 2),
(90, 4, 2, 'Fresh Strawberry Rhubarb Compote Dessert', '643612', 2),
(91, 4, 3, 'Vegan Peach Cobbler Milkshake', '664468', 2),
(92, 4, 4, 'Berat Badan', '-', 2),
(93, 4, 1, 'Mung Bean Sprout and Quinoa Salad', '652594', 3),
(94, 4, 2, 'Vegan Mango Chia seed Mango Coconut Ice Pops', '664452', 3),
(95, 4, 3, 'Coconut Bliss Smoothie', '639728', 3),
(96, 4, 4, 'Berat Badan', '-', 3),
(97, 4, 1, 'Quinoa Salad with Barberries & Nuts', '1098387', 4),
(98, 4, 2, 'Coconut & Pomogranate Ice Cream - Raw and Vegan', '639708', 4),
(99, 4, 3, 'Coconut Cream Pie Vegan Milkshake', '639749', 4),
(100, 4, 4, 'Berat Badan', '-', 4),
(101, 4, 1, 'Lentil, Sweet Potato and Spinach Soup', '649946', 5),
(102, 4, 2, 'Peach-Ginger Sorbet', '655178', 5),
(103, 4, 3, 'Spiked Watermelon lemonade', '661240', 5),
(104, 4, 4, 'Berat Badan', '-', 5),
(105, 4, 1, 'Soba Noodle Salad with Avocado and Mango', '660494', 6),
(106, 4, 2, 'Lychee Granita', '650499', 6),
(107, 4, 3, 'Refreshing Strawberry Limeade', '658152', 6),
(108, 4, 4, 'Berat Badan', '-', 6),
(109, 4, 1, 'Summer Garlic Mushrooms and Mostaccioli', '662222', 7),
(110, 4, 2, 'Vegan Peanut Butter Chocolate Fudge', '664473', 7),
(111, 4, 3, 'Strawberry Mango Green Tea Limeade', '661834', 7),
(112, 4, 4, 'Berat Badan', '-', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('ADMIN-001', 'bapamana', 'Admin'),
('azz', 'azz', 'Anggota'),
('fauzanlnh', 'bapamana', 'Anggota'),
('gentra', 'tes', 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `user_ambil`
--

CREATE TABLE `user_ambil` (
  `id_ambil` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `sebelum_diet` int(11) NOT NULL,
  `setelah_diet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_ambil`
--

INSERT INTO `user_ambil` (`id_ambil`, `username`, `id_metode`, `tanggal`, `status`, `sebelum_diet`, `setelah_diet`) VALUES
(1, 'fauzanlnh', 1, '2021-01-19', 'BERJALAN', 55, 54),
(2, 'gentra', 2, '2021-01-24', 'BATAL', 60, 0),
(3, 'azz', 2, '2021-01-25', 'BATAL', 60, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_detambil`
--

CREATE TABLE `user_detambil` (
  `id_detambil` int(11) NOT NULL,
  `id_todolist` int(11) NOT NULL,
  `id_ambil` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detambil`
--

INSERT INTO `user_detambil` (`id_detambil`, `id_todolist`, `id_ambil`, `status`) VALUES
(1, 1, 1, 'DILAKUKAN'),
(2, 2, 1, 'BELUM DILAKUKAN'),
(3, 3, 1, 'BELUM DILAKUKAN'),
(4, 4, 1, '55 '),
(5, 5, 1, 'DILAKUKAN'),
(6, 6, 1, 'BELUM DILAKUKAN'),
(7, 7, 1, 'BELUM DILAKUKAN'),
(8, 8, 1, '54'),
(9, 9, 1, 'BELUM DILAKUKAN'),
(10, 10, 1, 'BELUM DILAKUKAN'),
(11, 11, 1, 'DILAKUKAN'),
(12, 12, 1, '53'),
(13, 13, 1, 'DILAKUKAN'),
(14, 14, 1, 'DILAKUKAN'),
(15, 15, 1, 'DILAKUKAN'),
(16, 16, 1, '55'),
(17, 17, 1, 'BELUM DILAKUKAN'),
(18, 18, 1, 'DILAKUKAN'),
(19, 19, 1, 'DILAKUKAN'),
(20, 20, 1, '53'),
(21, 21, 1, 'DILAKUKAN'),
(22, 22, 1, 'DILAKUKAN'),
(23, 23, 1, 'DILAKUKAN'),
(24, 24, 1, '50'),
(25, 25, 1, 'DILAKUKAN'),
(26, 26, 1, 'DILAKUKAN'),
(27, 27, 1, 'DILAKUKAN'),
(28, 28, 1, '54'),
(33, 29, 3, 'BATAL'),
(34, 30, 3, 'BATAL'),
(35, 31, 3, 'BATAL'),
(36, 32, 3, 'BATAL'),
(37, 33, 3, 'BATAL'),
(38, 34, 3, 'BATAL'),
(39, 35, 3, 'BATAL'),
(40, 36, 3, 'BATAL'),
(41, 37, 3, 'BATAL'),
(42, 38, 3, 'BATAL'),
(43, 39, 3, 'BATAL'),
(44, 40, 3, 'BATAL'),
(45, 41, 3, 'BATAL'),
(46, 42, 3, 'BATAL'),
(47, 43, 3, 'BATAL'),
(48, 44, 3, 'BATAL'),
(49, 45, 3, 'BATAL'),
(50, 46, 3, 'BATAL'),
(51, 47, 3, 'BATAL'),
(52, 48, 3, 'BATAL'),
(53, 49, 3, 'BATAL'),
(54, 50, 3, 'BATAL'),
(55, 51, 3, 'BATAL'),
(56, 52, 3, 'BATAL'),
(57, 53, 3, 'BATAL'),
(58, 54, 3, 'BATAL'),
(59, 55, 3, 'BATAL'),
(60, 56, 3, 'BATAL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`email`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `metode_todolist`
--
ALTER TABLE `metode_todolist`
  ADD PRIMARY KEY (`id_todolist`),
  ADD KEY `id_metode` (`id_metode`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_ambil`
--
ALTER TABLE `user_ambil`
  ADD PRIMARY KEY (`id_ambil`),
  ADD KEY `id_metode` (`id_metode`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user_detambil`
--
ALTER TABLE `user_detambil`
  ADD PRIMARY KEY (`id_detambil`),
  ADD KEY `id_todolist` (`id_todolist`),
  ADD KEY `user_detambil_ibfk_1` (`id_ambil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `metode`
--
ALTER TABLE `metode`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `metode_todolist`
--
ALTER TABLE `metode_todolist`
  MODIFY `id_todolist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `user_ambil`
--
ALTER TABLE `user_ambil`
  MODIFY `id_ambil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_detambil`
--
ALTER TABLE `user_detambil`
  MODIFY `id_detambil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `metode_todolist`
--
ALTER TABLE `metode_todolist`
  ADD CONSTRAINT `metode_todolist_ibfk_1` FOREIGN KEY (`id_metode`) REFERENCES `metode` (`id_metode`),
  ADD CONSTRAINT `metode_todolist_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`);

--
-- Constraints for table `user_ambil`
--
ALTER TABLE `user_ambil`
  ADD CONSTRAINT `user_ambil_ibfk_1` FOREIGN KEY (`id_metode`) REFERENCES `metode` (`id_metode`),
  ADD CONSTRAINT `user_ambil_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `user_detambil`
--
ALTER TABLE `user_detambil`
  ADD CONSTRAINT `user_detambil_ibfk_1` FOREIGN KEY (`id_ambil`) REFERENCES `user_ambil` (`id_ambil`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_detambil_ibfk_2` FOREIGN KEY (`id_todolist`) REFERENCES `metode_todolist` (`id_todolist`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
