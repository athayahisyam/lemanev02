-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2019 at 10:41 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lemanev02`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nidn` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`nidn`, `nama`, `status`) VALUES
('140341', 'Shoffin Nahwa Utama, M. Kom.', 'aktif'),
('150487', 'Aziz Mustafa, M.T.', 'aktif'),
('150489', 'Dihin Muriyatmoko, M. T.', 'aktif'),
('160589', 'Oddy Virgantara Putra, M.Kom.', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_krisar`
--

CREATE TABLE `tb_krisar` (
  `id_krisar` int(11) NOT NULL,
  `nim` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `id_mk` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `kritik` text COLLATE utf8_unicode_ci NOT NULL,
  `saran` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_krisar`
--

INSERT INTO `tb_krisar` (`id_krisar`, `nim`, `id_mk`, `kritik`, `saran`) VALUES
(1, '3820176110328', 'TI621383', '<pre>Dosen kurang rapi dalam berbusana</pre>', '<pre>Agar merapikan berbusana sebelum mengajar</pre>'),
(2, '362015611011', 'TI411335', '<pre>Metode pengajaran sudah baik, namun tugas terlalu banyak</pre>', '<pre>Mengurangi tugas</pre>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nim` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tahun_masuk` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nim`, `nama`, `tahun_masuk`, `status`) VALUES
('362015611011', 'Naufal Fikri Al Hazmi', '2015', 'aktif'),
('3820176110328', 'Akhmad Trisna Wijaya', '2017', 'aktif'),
('3820176110332', 'Ardhi Wira Widya', '2017', 'aktif'),
('3820176110340', 'Kukuh Prasetyo Wibowo', '2017', 'aktif'),
('3820176110341', 'Muhammad Sayyidul Adnan', '2017', 'aktif'),
('3820176110353', 'Rino Wahyu Bagus Mahendra', '2017', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matakuliah`
--

CREATE TABLE `tb_matakuliah` (
  `id_mk` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `nama_mk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nidn` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `id_tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_matakuliah`
--

INSERT INTO `tb_matakuliah` (`id_mk`, `nama_mk`, `nidn`, `id_tahun`) VALUES
('TI411334', 'Pemrograman Berorientasi Objek', '150489', 4),
('TI411335', 'Pemrograman Web', '150487', 4),
('TI621383', 'Sistem Informasi Geografis', '150489', 4),
('TI621391', 'Mikrokontroller', '140341', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `aspek` enum('pedagogik','profesionalisme','kepribadian','sosial') COLLATE utf8_unicode_ci NOT NULL,
  `soal` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `aspek`, `soal`) VALUES
(1, 'pedagogik', 'Kesiapan Dosen memberikan Perkuliahan dan Praktikum'),
(2, 'pedagogik', 'Keteraturan dan ketertiban dalam menyelenggarakan perkuliahan'),
(3, 'pedagogik', 'Kemampuan menghidupkan suasana kelas'),
(4, 'pedagogik', 'Kejelasan dalam menyampaikan materi dan menjawab pertanyaan dikelas'),
(5, 'pedagogik', 'Pemanfaatan media dan teknologi pembelajaran'),
(6, 'pedagogik', 'Keanekaragaman cara pengukuran hasil belajar'),
(7, 'pedagogik', 'Pemberian umpan balik terhadap tugas'),
(8, 'pedagogik', 'Kesesuaian materi ujian dan/atau tugas dengan tujuan mata kuliah'),
(9, 'pedagogik', 'Kesesuaian nilai yang diberikan dengan hasil belajar'),
(10, 'profesionalisme', 'Kemampuan menjelaskan pokok bahasan/topik secara tepat   '),
(11, 'profesionalisme', 'Kemampuan memberikan contoh relevan dari konsep yang diajarkan '),
(12, 'profesionalisme', 'Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan bidang/topik lain '),
(13, 'profesionalisme', 'Kemampuan menjelaskan keterkaitan bidang/topik yang diajarkan dengan konteks kehidupan  '),
(14, 'profesionalisme', 'Penguasaan akan isu-isu mutakhir dalam bidang yang diajarkan '),
(15, 'profesionalisme', 'Penggunaan hasil-hasil penelitian untuk meningkatkan kualitas perkuliahan '),
(16, 'profesionalisme', 'Pelibatan mahasiswa dalam penelitian/kajian atau pengembangan/rekayasa/desain yang dilakukan dosen '),
(17, 'profesionalisme', 'Kemampuan menggunakan beragam teknologi komunikasi '),
(18, 'kepribadian', 'Kewibawaan sebagai pribadi dosen'),
(19, 'kepribadian', 'Kearifan dalam mengambil keputusan'),
(20, 'kepribadian', 'Menjadi contoh dalam bersikap dan berperilaku'),
(21, 'kepribadian', 'Satunya kata dan tindakan (konsistensi)'),
(22, 'kepribadian', 'Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi'),
(23, 'kepribadian', 'Adil dalam memperlakukan mahasiswa/i'),
(24, 'sosial', 'Kemampuan menyampaikan pendapat'),
(25, 'sosial', 'Kemampuan menerima kritik, saran dan pendapat orang lain'),
(26, 'sosial', 'Mengenal dengan baik mahasiswa/i yang mengikuti matakuliahnya'),
(27, 'sosial', 'Mudah bergaul di kalangan sejawat, karyawan dan mahasiswa/i'),
(28, 'sosial', 'Toleransi terhadap keberagaman mahasiswa/i');

-- --------------------------------------------------------

--
-- Table structure for table `tb_th_akademik`
--

CREATE TABLE `tb_th_akademik` (
  `id_tahun` int(11) NOT NULL,
  `th_akademik1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `th_akademik2` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_th_akademik`
--

INSERT INTO `tb_th_akademik` (`id_tahun`, `th_akademik1`, `th_akademik2`) VALUES
(3, '2018/2019', 'Ganjil'),
(4, '2018/2019', 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_jwb`
--

CREATE TABLE `tb_transaksi_jwb` (
  `id_trans` int(11) NOT NULL,
  `nim` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `id_mk` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `jwb1` float NOT NULL,
  `jwb2` float NOT NULL,
  `jwb3` float NOT NULL,
  `jwb4` float NOT NULL,
  `jwb5` float NOT NULL,
  `jwb6` float NOT NULL,
  `jwb7` float NOT NULL,
  `jwb8` float NOT NULL,
  `jwb9` float NOT NULL,
  `jwb10` float NOT NULL,
  `jwb11` float NOT NULL,
  `jwb12` float NOT NULL,
  `jwb13` float NOT NULL,
  `jwb14` float NOT NULL,
  `jwb15` float NOT NULL,
  `jwb16` float NOT NULL,
  `jwb17` float NOT NULL,
  `jwb18` float NOT NULL,
  `jwb19` float NOT NULL,
  `jwb20` float NOT NULL,
  `jwb21` float NOT NULL,
  `jwb22` float NOT NULL,
  `jwb23` float NOT NULL,
  `jwb24` float NOT NULL,
  `jwb25` float NOT NULL,
  `jwb26` float NOT NULL,
  `jwb27` float NOT NULL,
  `jwb28` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_transaksi_jwb`
--

INSERT INTO `tb_transaksi_jwb` (`id_trans`, `nim`, `id_mk`, `jwb1`, `jwb2`, `jwb3`, `jwb4`, `jwb5`, `jwb6`, `jwb7`, `jwb8`, `jwb9`, `jwb10`, `jwb11`, `jwb12`, `jwb13`, `jwb14`, `jwb15`, `jwb16`, `jwb17`, `jwb18`, `jwb19`, `jwb20`, `jwb21`, `jwb22`, `jwb23`, `jwb24`, `jwb25`, `jwb26`, `jwb27`, `jwb28`) VALUES
(7, '362015611011', 'TI411334', 3, 2, 2, 3, 4, 3, 3, 4, 4, 3, 4, 3, 5, 4, 3, 4, 4, 3, 4, 4, 4, 4, 4, 3, 4, 3, 4, 4),
(8, '3820176110328', 'TI411335', 4, 5, 4, 4, 5, 5, 4, 5, 5, 4, 4, 5, 4, 4, 4, 3, 4, 5, 4, 4, 4, 5, 5, 5, 4, 5, 4, 4),
(9, '3820176110328', 'TI411334', 3, 4, 3, 4, 4, 4, 3, 5, 5, 4, 4, 4, 5, 4, 5, 5, 5, 5, 4, 5, 4, 5, 4, 5, 4, 5, 5, 4),
(10, '3820176110332', 'TI411335', 4, 4, 5, 4, 4, 5, 5, 5, 5, 4, 5, 4, 4, 5, 4, 4, 5, 5, 5, 5, 5, 4, 5, 4, 5, 5, 5, 5),
(11, '3820176110332', 'TI411334', 4, 4, 5, 4, 5, 4, 4, 5, 5, 4, 4, 5, 4, 4, 4, 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5),
(12, '3820176110341', 'TI411335', 4, 4, 4, 4, 3, 3, 4, 4, 4, 4, 4, 4, 3, 4, 5, 3, 5, 3, 4, 5, 3, 4, 5, 3, 5, 3, 5, 5),
(13, '3820176110341', 'TI411334', 3, 4, 4, 4, 4, 4, 4, 4, 4, 5, 4, 5, 4, 4, 5, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(14, '3820176110340', 'TI411334', 4, 3, 5, 4, 3, 4, 5, 4, 3, 3, 4, 3, 3, 4, 5, 4, 4, 5, 4, 3, 4, 4, 3, 3, 3, 4, 4, 5),
(15, '3820176110340', 'TI411335', 4, 3, 4, 5, 4, 3, 4, 4, 4, 3, 4, 3, 4, 3, 4, 4, 4, 3, 4, 5, 4, 4, 4, 3, 4, 4, 5, 4),
(16, '3820176110353', 'TI411334', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(17, '3820176110353', 'TI411335', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(18, '3820176110328', 'TI621383', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(19, '362015611011', 'TI411335', 5, 5, 5, 5, 4, 5, 5, 5, 5, 1, 2, 3, 3, 3, 4, 4, 4, 1, 2, 3, 4, 4, 5, 5, 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_krs`
--

CREATE TABLE `tb_transaksi_krs` (
  `id_trans` int(11) NOT NULL,
  `nim` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `id_mk` varchar(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_transaksi_krs`
--

INSERT INTO `tb_transaksi_krs` (`id_trans`, `nim`, `id_mk`) VALUES
(11, '362015611011', 'TI411334'),
(12, '3820176110328', 'TI411335'),
(13, '3820176110328', 'TI411334'),
(14, '3820176110332', 'TI411335'),
(15, '3820176110332', 'TI411334'),
(16, '3820176110341', 'TI411335'),
(17, '3820176110341', 'TI411334'),
(18, '3820176110340', 'TI411334'),
(19, '3820176110340', 'TI411335'),
(20, '3820176110353', 'TI411334'),
(21, '3820176110353', 'TI411335'),
(22, '3820176110328', 'TI621383'),
(23, '362015611011', 'TI411335');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tahun_masuk` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('admin','dosen','mahasiswa') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `name`, `password`, `tahun_masuk`, `level`, `status`) VALUES
('140341', 'shofin@unida.gontor.ac.id', 'Shoffin Nahwa Utama, M. Kom.', '123456', '2014', 'dosen', 'aktif'),
('150487', 'aziz.mustafa@unida.gontor.ac.id', 'Aziz Mustafa, M.T.', '123456', '2015', 'dosen', 'aktif'),
('150489', 'dihin@unida.gontor.ac.id', 'Dihin Muriyatmoko, M. T.', '123456', '2016', 'dosen', 'aktif'),
('160589', 'oddy@unida.gontor.ac.id', 'Oddy Virgantara Putra, M.Kom.', '123456', '2017', 'dosen', 'aktif'),
('352014610853', 'hisyamathaya@unida.gontor.ac.id', 'Hisyam Athaya', '123456', '2014', 'admin', 'aktif'),
('362015611011 ', 'naufal.fikri@unida.gontor.ac.id', 'Naufal Fikri Al Hazmi', '123456', '2015', 'mahasiswa', 'aktif'),
('3820176110328', 'trisna@unida.gontor.ac.id', 'Akhmad Trisna Wijaya', '123456', '2017', 'mahasiswa', 'aktif'),
('3820176110332', 'ardhi@unida.gontor.ac.id', 'Ardhi Wira Widya', '123456', '2017', 'mahasiswa', 'aktif'),
('3820176110340', 'kukuh@unida.gontor.ac.id', 'Kukuh Prasetyo Wibowo', '123456', '2017', 'mahasiswa', 'aktif'),
('3820176110341', 'sayyidul@unida.gontor.ac.id', 'Muhammad Sayyidul Adnan', '123456', '2017', 'mahasiswa', 'aktif'),
('3820176110353', 'rino@unida.gontor.ac.id', 'Rino Wahyu Bagus Mahendra', '123456', '2017', 'mahasiswa', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nidn`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tb_krisar`
--
ALTER TABLE `tb_krisar`
  ADD PRIMARY KEY (`id_krisar`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_krisar` (`id_krisar`),
  ADD KEY `id_mk` (`id_mk`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id` (`nim`,`nama`);

--
-- Indexes for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  ADD PRIMARY KEY (`id_mk`),
  ADD KEY `nidn_pengajar` (`nidn`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_soal` (`aspek`);

--
-- Indexes for table `tb_th_akademik`
--
ALTER TABLE `tb_th_akademik`
  ADD PRIMARY KEY (`id_tahun`),
  ADD KEY `th_akademik1` (`th_akademik1`),
  ADD KEY `th_akademik2` (`th_akademik2`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indexes for table `tb_transaksi_jwb`
--
ALTER TABLE `tb_transaksi_jwb`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `id_trans` (`id_trans`,`nim`,`id_mk`,`jwb1`,`jwb2`,`jwb3`,`jwb4`,`jwb5`,`jwb6`,`jwb7`,`jwb8`,`jwb9`,`jwb10`,`jwb11`,`jwb12`,`jwb13`,`jwb14`,`jwb15`,`jwb16`,`jwb17`,`jwb18`,`jwb19`,`jwb20`,`jwb21`,`jwb22`,`jwb23`,`jwb24`,`jwb25`,`jwb26`,`jwb27`,`jwb28`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_mk` (`id_mk`);

--
-- Indexes for table `tb_transaksi_krs`
--
ALTER TABLE `tb_transaksi_krs`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_mk` (`id_mk`),
  ADD KEY `id_trans` (`id_trans`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `name` (`name`),
  ADD KEY `level` (`level`),
  ADD KEY `status` (`status`),
  ADD KEY `nim` (`id`),
  ADD KEY `tahun_masuk` (`tahun_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_krisar`
--
ALTER TABLE `tb_krisar`
  MODIFY `id_krisar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_th_akademik`
--
ALTER TABLE `tb_th_akademik`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_transaksi_jwb`
--
ALTER TABLE `tb_transaksi_jwb`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_transaksi_krs`
--
ALTER TABLE `tb_transaksi_krs`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_krisar`
--
ALTER TABLE `tb_krisar`
  ADD CONSTRAINT `tb_krisar_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_mahasiswa` (`nim`),
  ADD CONSTRAINT `tb_krisar_ibfk_2` FOREIGN KEY (`id_mk`) REFERENCES `tb_matakuliah` (`id_mk`);

--
-- Constraints for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  ADD CONSTRAINT `tb_matakuliah_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `tb_dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_matakuliah_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_th_akademik` (`id_tahun`);

--
-- Constraints for table `tb_transaksi_jwb`
--
ALTER TABLE `tb_transaksi_jwb`
  ADD CONSTRAINT `tb_transaksi_jwb_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_mahasiswa` (`nim`),
  ADD CONSTRAINT `tb_transaksi_jwb_ibfk_2` FOREIGN KEY (`id_mk`) REFERENCES `tb_matakuliah` (`id_mk`);

--
-- Constraints for table `tb_transaksi_krs`
--
ALTER TABLE `tb_transaksi_krs`
  ADD CONSTRAINT `tb_transaksi_krs_ibfk_2` FOREIGN KEY (`id_mk`) REFERENCES `tb_matakuliah` (`id_mk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_krs_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `tb_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
