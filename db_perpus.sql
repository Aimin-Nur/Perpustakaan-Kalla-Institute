-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 04:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_mahasiswa`
--

CREATE TABLE `anggota_mahasiswa` (
  `id_anggota` int(11) NOT NULL,
  `nim` varchar(30) DEFAULT NULL,
  `nama_mhs` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `jurusan` varchar(30) DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `foto_mhs` varchar(255) NOT NULL,
  `id_prodi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota_mahasiswa`
--

INSERT INTO `anggota_mahasiswa` (`id_anggota`, `nim`, `nama_mhs`, `email`, `password`, `jurusan`, `no_hp`, `gender`, `foto_mhs`, `id_prodi`) VALUES
(2, 'S1321006', 'Muhaimin Nur', 'aiminnur02@gmail.com', 'mahasiswa', NULL, '2147483647', 'Pria', '1690005619_6c06c7ce8577a27ce95e.png', '1'),
(3, 'S1321005', 'Afnan', 'aiminnur02@gmail.com', 'mahasiswa', NULL, '2147483647', 'Pria', '1690040375_d894ab17145a89069885.png', '4'),
(4, 'S1321001', 'Firman Baharuddin', 'aiminnur02@gmail.com', 'mahasiswa', NULL, '2147483647', 'Pria', '1690991910_66ac8ecf1176330ec08a.png', '1'),
(5, 'S1321002', 'Muh. Farhan Ilyas', 'aiminnur02@gmail.com', 'mahasiswa', NULL, '2147483647', 'Pria', '1690958854_fa5d154c9cfd00c32024.png', '1'),
(6, 'S1321008', 'Al Hilal Hamdi', 'muhammadmuhaimin@kallabs.ac.id', 'mahasiswa', NULL, '+62-83811-1232-1', 'Pria', '1690524794_5be9e5a00b4d276232ad.png', '1'),
(7, 'S1321003', 'Nurazizah Yusuf', 'muhammadmuhaimin@kallabs.ac.id', 'mahasiswa', NULL, '032232213', 'Wanita', '1690556519_4e9648fc20894272c424.png', '1'),
(8, 'H123891', 'Fauzan Ansar', 'muhammadmuhaimin@kallabs.ac.id', 'mahasiswa', NULL, '+62 878-38901-12', 'Pria', '1690862982_64bb5909f076f5fc1857.png', '6'),
(9, 'A23131', 'Fuad Ahmad', 'aiminnur02@gmail.com', 'mahasiswa', NULL, '+62 876-2912-1', 'Pria', '1690955778_3d516083472edfe34971.png', '5'),
(10, 'K1232142', 'Adam Saputra', 'muhammadmuhaimin@kallabs.ac.id', 'mahasiswa', NULL, '+62 8123-4321-22', 'Pria', '1690990992_55c70dce53e19ef2ceba.png', '3'),
(12, 'S1321010', 'Nurfitrayani', 'aiminnur02@gmail.com', 'mahasiswa', NULL, '08124218043', 'Pria', '1690894538_b33fa639e89449074668.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(3) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori_buku` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori_buku`) VALUES
(1, 'Kewirausahaan'),
(2, 'Sistem Informasi'),
(4, 'Bisnis Digital'),
(5, 'Pendidikan Agama'),
(19, 'Statistika 2'),
(20, 'Algoritma Pemrograman'),
(21, 'Copywirting'),
(22, 'Hukum Perdata'),
(23, 'Manajemen'),
(24, 'Data Mining 2');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(1, 'Erlangga'),
(2, 'Tiga Serangkai'),
(4, 'Bukunesia'),
(5, 'Emir Cakrawala Islam'),
(6, 'Ummul Quro');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` int(11) NOT NULL,
  `nama_pengarang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(50) NOT NULL,
  `nama_penulis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`) VALUES
(1, 'Tere Liye'),
(2, 'Ahmad Fuadi'),
(4, 'Rohi Abdullah'),
(5, '	Dr. H. Otong Surasman, M.A.'),
(6, 'Muh. Saleh Malawat'),
(7, 'Prof. Dr. Pallang');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'Sistem Informasi'),
(3, 'Kewirausahaan'),
(4, 'Bisnis Digital'),
(5, 'Manajemen Retail'),
(6, 'Hukum'),
(7, 'Ekonomi'),
(8, 'Sastra Arab'),
(9, 'Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `kode_buku` int(20) DEFAULT NULL,
  `judul_buku` varchar(200) DEFAULT NULL,
  `foto_buku` varchar(250) DEFAULT NULL,
  `id_penulis` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `sinopsis` varchar(200) DEFAULT NULL,
  `jumlah_hlm` int(11) DEFAULT NULL,
  `tersedia` int(11) DEFAULT NULL,
  `dipinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `isbn`, `kode_buku`, `judul_buku`, `foto_buku`, `id_penulis`, `id_kategori`, `id_rak`, `id_penerbit`, `tahun_terbit`, `sinopsis`, `jumlah_hlm`, `tersedia`, `dipinjam`) VALUES
(8, '978-623-02-0713-6', 893232, 'Teknik Pengelolaan Video & Audio', '1689217803_298c29bc370904bca410.jpg', 2, 2, 4, 1, NULL, 'Buat kamu yang ingin memfokuskan diri dibidang pengolahan audio dan video di teknik komputer dan informatika, maka buku Johnie Rogers Swanda Pasaribu ini adalah jawabannya. Sesuai judulnya, kamu di sa', 171, 9, 1),
(9, '321-456-346', 4839812, 'Manajemen Proyek Teknologi Informasi', '1689348153_023f74558181eb367598.jpg', 4, 4, 3, 4, NULL, 'Buat kamu yang ingin memfokuskan diri dibidang pengolahan audio dan video di teknik komputer dan informatika, maka buku Johnie Rogers Swanda Pasaribu ini adalah jawabannya. Sesuai judulnya, kamu di sa', 420, 4, 0),
(10, '4763-291-2', 984761, ' Pemrograman Database PHP Mysql 7', '1689348626_c327dd336b2cee7d9b2f.jpg', 1, 20, NULL, 1, NULL, 'Perkembangan teknologi hingga saat buku ini ditulis dan dipublikasikan telah mengarah kepada zaman di mana perangkat elektronik, mesin dan komputer telah mulai menggantikan peran sumber daya manusia d', 510, 2, 0),
(11, '978-602-1514-91-7', 832319831, 'Pendidikan Agama Islam', '1690338709_7315daaa93d951509e69.jpg', 5, 0, 3, 5, NULL, 'Buku Pendidikan Agama Islam (PAI) untuk Perguruan Tinggi ini disusun secara sistematis dan ditujukan khusus untuk mahasiswa/mahasiswi tingkat perguruan tinggi agar memudahkan mereka belajar agama Isla', 320, 1, 1),
(13, '978-623-02-3022-12', 8329912, '7 IN 1 Pemrograman Web', '1690860445_40fc1bef907673a617e0.jpg', 4, 2, 3, 4, NULL, '7 in 1 Pemrograman Web untuk Pemula ; Pengarang : Rohi Abdulloh ; Deskripsi : Teknologi pemrograman web berkembang begitu cepat. Bagi pemula, tentu akan sangat tertinggal jika tidak cepat mengejarnya.', 320, 5, 0),
(14, '9786026673381', 8381291, 'Pengantar Ilmu Hukum', '1690860729_0404c380e1fa52b5ca6a.jpg', 1, 22, 6, 2, NULL, 'Ibarat peta yang dapat memberikan arah tujuan, sehingga kita tidak tersesat di tengah jalan. Pengantar ilmu hukum adalah penuntun menuju ilmu hukum yang luas dan kompleks. Kodifikasi-kodifikasi hukum ', 100, 2, 0),
(16, '9-781234-567897', 82381289, 'Pemrograman Database Mysql', '1690955108_6a462a0651f7cf83efe1.jpg', 1, 2, 4, 2, NULL, 'Buku ini merupakan buku edisi keenam dari buku sebelumnya yaitu Algoritma dan Pemrograman dalam Bahasa Pascal dan C. Buku ini diperuntukkan bagi siapa saja yang ingin mempelajari bidang pemrograman. A', 450, 4, 0),
(17, '9786024326504', 38948922, 'Manajemen Strategik', '1690955241_b019cb2782eb7374625d.jpg', 2, 23, 5, 2, NULL, 'Manajemen strategis adalah keputusan dan tindakan manajerial terkait dengan kinerja jangka panjang organisasi. Manajemen strategis mencakup semua fungsi dasar manajemen, yaitu mulai dari merencanakan,', 500, 1, 1),
(18, '978-623-209-750-6', 23391312, 'Kewirausahaan Pendidikan', '1690991784_42bc1329586184107e10.jpg', 6, 1, 3, 4, NULL, 'Buku ini terdiri dari beberapa bab. Bab pertama berisi tentang pendahuluan, bab dua membahas tentang kreativitas dan inovasi, bab tiga membahas tentang hakikat dan sikap kewirausahaan. Adapun bab empa', 450, 3, 1),
(19, '9789790614451', 82382189, 'Statistika Ekonomi & Keuangan', '1691016805_960ec31cfb4bf99001a2.jpg', 4, 19, 4, 5, NULL, 'Kompetisi dan globalisasi di segala bidang menuntut pelaku bisnis untuk menghasilkan produk dan jasa yang berkualitas. Tuntutan kualitas tersebut mengharuskan setiap keputusan diambil berdasarkan fakt', 320, 3, 0),
(20, '9786026579348', 782381381, 'Tafsir Jalalain', '1691017036_6b322554c61d4cd04c01.jpg', 7, 5, 3, 6, NULL, 'Tafsir Al-Jalalain merupakan kitab tafsir Al-Qur\'an yang sangat terkenal di seantero Dunia Islam. Kitab tafsir klasik Sunni ini awalnya disusun oleh Jalaluddin Al-Mahalli pada tahun 1459 M. Kemudian d', 500, 3, 0),
(22, '834298-32', 782872722, 'Data Mining', '1691027577_811418f4c522e8b09a85.jpg', 4, 24, 5, 4, NULL, 'Perkembangan teknologi hingga saat buku ini ditulis dan dipublikasikan telah mengarah kepada zaman di mana perangkat elektronik, mesin dan komputer telah mulai menggantikan peran sumber daya manusia d', 320, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_pinjam` int(30) NOT NULL,
  `no_pinjam` varchar(20) DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `id_anggota` int(30) DEFAULT NULL,
  `id_prodi` int(10) DEFAULT NULL,
  `id_buku` int(30) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `lama_pinjam` int(30) DEFAULT NULL,
  `denda` decimal(20,0) DEFAULT NULL,
  `keterlambatan` int(10) DEFAULT NULL,
  `status_pinjam` text DEFAULT NULL,
  `tgl_terlambat` date DEFAULT NULL,
  `ket` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_pinjam`, `no_pinjam`, `tgl_pengajuan`, `id_anggota`, `id_prodi`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `lama_pinjam`, `denda`, `keterlambatan`, `status_pinjam`, `tgl_terlambat`, `ket`) VALUES
(37, '801082023040845', '2023-08-01', 8, 6, 14, '2023-08-02', '2023-08-04', 2, NULL, NULL, 'Dikembalikan', NULL, NULL),
(38, '202082023050808', '2023-08-02', 2, 1, 17, '2023-08-02', '2023-08-03', 1, NULL, NULL, 'Belum Kembali', NULL, NULL),
(39, '902082023050845', '2023-08-02', 9, 5, 9, '2023-08-02', '2023-08-04', 2, NULL, 0, 'Dikembalikan', NULL, NULL),
(40, '1202082023060852', '2023-08-02', 12, 1, 11, '2023-08-03', '2023-08-06', 3, NULL, NULL, 'Ditolak', NULL, 'Buku hanya boleh dibaca di perpustakaan'),
(41, '1002082023150833', '2023-08-02', 10, 3, 11, '2023-08-02', '2023-08-05', 3, NULL, NULL, 'Dipinjam', NULL, NULL),
(42, '1002082023150809', '2023-08-02', 10, 3, 8, '2023-08-02', '2023-08-06', 4, NULL, NULL, 'Dipinjam', NULL, NULL),
(43, '402082023150849', '2023-08-02', 4, 1, 18, '2023-08-02', '2023-08-06', 4, NULL, NULL, 'Dipinjam', NULL, NULL),
(44, '203082023010807', '2023-08-03', 2, 1, 22, '2023-08-03', '2023-08-06', 3, NULL, NULL, 'Dipinjam', NULL, NULL);

--
-- Triggers `tbl_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `tr_peminjaman_insert` AFTER UPDATE ON `tbl_peminjaman` FOR EACH ROW BEGIN
    -- Periksa apakah status_peminjaman adalah 'Dipinjam'
    IF NEW.status_pinjam = 'Dipinjam' THEN
        -- Tambahkan jumlah orang yang meminjam buku dan kurangi ketersediaan buku di tabel buku
        UPDATE tbl_buku
        SET dipinjam = dipinjam + 1,
            tersedia = tersedia - 1
        WHERE id_buku = NEW.id_buku;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_peminjaman_update` AFTER UPDATE ON `tbl_peminjaman` FOR EACH ROW BEGIN
    IF NEW.status_pinjam = 'Dikembalikan' AND OLD.status_pinjam = 'Dipinjam' THEN
        -- Tambahkan ketersediaan buku dan kurangi jumlah buku yang dipinjam di tabel buku
        UPDATE tbl_buku
        SET tersedia = tersedia + 1,
            dipinjam = dipinjam - 1
        WHERE id_buku = NEW.id_buku;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `rak_buku` varchar(30) DEFAULT NULL,
  `posisi_lantai` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `rak_buku`, `posisi_lantai`) VALUES
(2, 'Rak 800 ', 1),
(3, 'Rak 700 ', 3),
(4, 'Rak 300', 4),
(5, 'Rak 100', 9),
(6, 'Rak 500', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(20) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `email_user` varchar(30) DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email_user`, `no_hp`, `password`, `foto`, `level`) VALUES
(1, 'admin123', 'admin123@kallabs.com', '0812373723982', 'perpuskalla', 'admin.jpg', 0),
(6, 'Reza Fayzu', 'aiminnur02@gmail.com', '0320290921', 'superadmin', '1688199255_37efc54b773132a956b4.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE `web_setting` (
  `id_web` int(20) NOT NULL,
  `nama_kampus` varchar(200) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`id_web`, `nama_kampus`, `alamat`, `logo`) VALUES
(1, 'Kalla Institute', 'Office Building Nipah Mall Jalan Urip Sumoharjo, Makassar', 'admin.jpg'),
(2, 'klla', 'Office Building Nipah Mall Jalan Urip Sumoharjo, Makassar', 'admin.jpg\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_mahasiswa`
--
ALTER TABLE `anggota_mahasiswa`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`id_web`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_mahasiswa`
--
ALTER TABLE `anggota_mahasiswa`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `id_pengarang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_pinjam` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `id_web` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
