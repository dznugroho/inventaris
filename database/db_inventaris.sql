-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2020 at 04:20 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(2) NOT NULL,
  `nama_akses` varchar(10) NOT NULL,
  `status` enum('1','0','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama_akses`, `status`) VALUES
(1, 'admin', '1'),
(2, 'Perorangan', '1'),
(3, 'kecamatan', '1'),
(4, 'Perusahaan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `coba`
--

CREATE TABLE `coba` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coba`
--

INSERT INTO `coba` (`kode`, `nama`, `file`) VALUES
(1, '34', 'update1-34.pdf'),
(2, '4', 'update2-4.pdf'),
(3, '3', 'update3-3.pdf'),
(4, 'Indra', 'jadwal.pdf'),
(5, 'l', 'jadwal.pdf'),
(6, 'Indra', 'jadwal1.pdf'),
(7, 'DDD', 'jadwal2.pdf'),
(8, 'adnada', 'jadwal3.pdf'),
(9, 'll', 'jadwal4.pdf');

-- --------------------------------------------------------

--
-- Stand-in structure for view `infrastruktur`
-- (See below for the actual view)
--
CREATE TABLE `infrastruktur` (
`kode_subbidang` varchar(15)
,`nama_sub` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kesehatan`
-- (See below for the actual view)
--
CREATE TABLE `kesehatan` (
`kode_subbidang` varchar(15)
,`nama_sub` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `lingkungan`
-- (See below for the actual view)
--
CREATE TABLE `lingkungan` (
`kode_subbidang` varchar(15)
,`nama_sub` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pek`
-- (See below for the actual view)
--
CREATE TABLE `pek` (
`kode_subbidang` varchar(15)
,`nama_sub` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pendidikan`
-- (See below for the actual view)
--
CREATE TABLE `pendidikan` (
`kode_subbidang` varchar(15)
,`nama_sub` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `NIK` int(16) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(60) NOT NULL,
  `kode_wilayah` varchar(16) NOT NULL,
  `kode_kecamatan` varchar(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`NIK`, `nama_depan`, `nama_belakang`, `username`, `password`, `email`, `kode_wilayah`, `kode_kecamatan`, `level`) VALUES
(432113, 'dddd', 'ddad', 'umum', 'adfab9c56b8b16d6c067f8d3cff8818e', 'dimasnugroho443@gmail.com', '3320132002', '13', 2),
(2147483647, 'fafa', 'fahmi', 'dimas', '7d49e40f4b3d8f68c19406a58303f826', 'dimasnugroho2709@gmail.com', '3320012001', '01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbu_kecamatan`
--

CREATE TABLE `tbu_kecamatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode_kecamatan` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `level` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbu_kecamatan`
--

INSERT INTO `tbu_kecamatan` (`id`, `nama`, `kode_kecamatan`, `password`, `level`) VALUES
(2, 'indra', '13', 'c3ec0f7b054e729c5a716c8125839829', 3),
(4, 'nanana', '12', '518d5f3401534f5c6c21977f12f60989', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `kode_bidang` varchar(15) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`kode_bidang`, `nama_bidang`, `keterangan`) VALUES
('01', 'Bidang Pendidikan', ''),
('02', 'Bidang Kesehatan', ''),
('03', 'Bidang Lingkungan', ''),
('04', 'Bidang Peningkatan Ekonomi Kerakyatan', ''),
('05', 'Bidang Infrastruktur', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_k`
--

CREATE TABLE `tb_k` (
  `kode_k` varchar(50) NOT NULL,
  `nama_k` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_k`
--

INSERT INTO `tb_k` (`kode_k`, `nama_k`) VALUES
('01', 'Kedung'),
('02', 'Pecangaan'),
('03', 'Welahan'),
('04', 'Mayong'),
('05', 'Batealit'),
('06', 'Jepara'),
('07', 'Mlonggo'),
('08', 'Bangsri'),
('09', 'Keling'),
('10', 'Karimun Jawa'),
('11', 'Tahunan'),
('12', 'Nalumsari'),
('13', 'Kalinyamatan'),
('14', 'Kembang'),
('15', 'Pakis aji'),
('16', 'Donorojo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `kode_kecamatan` varchar(15) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`kode_kecamatan`, `nama_kecamatan`) VALUES
('01', 'Kedung'),
('02', 'Pecangaan'),
('03', 'Welahan'),
('04', 'Mayong'),
('05', 'Batealit'),
('06', 'Jepara'),
('07', 'Mlonggo'),
('08', 'Bangsri'),
('09', 'Keling'),
('10', 'Karimun Jawa'),
('11', 'Tahunan'),
('12', 'Nalumsari'),
('13', 'Kalinyamatan'),
('14', 'Kembang'),
('15', 'Pakis aji'),
('16', 'Donorojo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kode_kecamatan` varchar(50) NOT NULL,
  `kode_wilayah` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id`, `username`, `password`, `level`, `nama_perusahaan`, `alamat`, `kode_kecamatan`, `kode_wilayah`, `no_telp`, `email`) VALUES
(3, 'fais', '0e36c2ce66632a10bab79d49c6303819', 4, 'PT. DUA PUTRA', 'jl kartini 01 ', '10', '3320102001', '08122561167', 'cumanyobi@gmail.com'),
(4, 'indra', '5b307381861d9a4c51b0e881eef973d3', 4, 'PT.Indra davidon ', 'jl kartini 01 ', '09', '3320092001', '08122561167', 'cumanyobi@gmail.com'),
(5, 'coba', 'c3ec0f7b054e729c5a716c8125839829', 4, 'PT. Maju Mundur', 'Jonggol', '01', '3320012017', '08122561167', 'iansyaharief94@gmail.com'),
(6, 'coba1', 'bf0c95ff56e3b2598456cd455a8684c1', 4, 'CV. Anjir Coy', 'Jepun', '08', '3320082001', '24242424', 'cumanyobi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pilihan`
--

CREATE TABLE `tb_pilihan` (
  `kode_pilih` int(11) NOT NULL,
  `kode_usulan` varchar(50) NOT NULL,
  `kode_perusahaan` varchar(50) NOT NULL,
  `dana` bigint(20) NOT NULL,
  `status_perusahaan` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pilihan`
--

INSERT INTO `tb_pilihan` (`kode_pilih`, `kode_usulan`, `kode_perusahaan`, `dana`, `status_perusahaan`, `status`) VALUES
(9, '22', '3', 2000000000, 1, 0),
(10, '23', '3', 25000000000, 2, 0),
(11, '22', '4', 1000000000, 2, 0),
(12, '23', '4', 45000000000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subbidang`
--

CREATE TABLE `tb_subbidang` (
  `kode_subbidang` varchar(15) NOT NULL,
  `nama_sub` varchar(200) NOT NULL,
  `parent_bidang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subbidang`
--

INSERT INTO `tb_subbidang` (`kode_subbidang`, `nama_sub`, `parent_bidang`) VALUES
('0101', 'Penyedia Sarana dan Prasarana di Bidang Pendidikan', '01'),
('0102', 'Peningkatan Kualifikasi dan Kompentensi Tenaga Pendidik dan Kependidikan', '01'),
('0103', 'Pemberian Beasiswa', '01'),
('0104', 'Kegiatan Pengembangan SDM', '01'),
('0201', 'Sarana dan Prasarana Puskesmas', '02'),
('0202', 'Sarana dan Prasarana Puskesmas Pembantu', '02'),
('0203', 'Sarana dan Prasarana Poliklinik Kesehatan', '02'),
('0204', 'Sarana dan Prasarana Posyandu', '02'),
('0205', 'Peningkatan Kualitas Tenaga Kesehatan', '02'),
('0301', 'Pencegahan Polusi', '03'),
('0302', 'Penggunaan Sumber Daya yang Berkelanjutan', '03'),
('0303', 'Pegembangan Penyehatan Lingkungan', '03'),
('0304', 'Pengembangan Sarana Prasarana Umum', '03'),
('0305', 'Bantuan Korban Bencana Alam', '03'),
('0306', 'Pendidilan dan Latihan', '03'),
('0307', 'Bantuan Pelestarian Alam', '03'),
('0401', 'Peningkatan Pendapatan Masyarakat Khususnya Sektor Usaha Mikro dan Menengah', '04'),
('0501', 'Pembangunan Rumah Layak Huni', '05'),
('0502', 'Penyediaan Listrik Pedesaan', '05'),
('0503', 'Penyediaan Air Bersih', '05'),
('0504', 'Pembangunan Jalan', '05'),
('0505', 'Pembangunan Jembatan', '05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Dimas Adi Nugroho', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_usulan`
--

CREATE TABLE `tb_usulan` (
  `kode_usulan` int(11) NOT NULL,
  `kode_bidang` varchar(50) NOT NULL,
  `kode_subbidang` varchar(5) NOT NULL,
  `tahun_pengusulan` varchar(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `waktu_mulai` date NOT NULL,
  `waktu_selesai` date NOT NULL,
  `anggaran` bigint(30) NOT NULL,
  `alamat_kegiatan` varchar(200) NOT NULL,
  `kode_kecamatan` varchar(15) NOT NULL,
  `kode_wilayah` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `nama_institusi` varchar(100) NOT NULL,
  `alamat_institusi` varchar(100) NOT NULL,
  `kode_k` varchar(4) NOT NULL,
  `kode_w` varchar(20) NOT NULL,
  `nama_pengusul` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `file` text NOT NULL,
  `status_usulan` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_usulan`
--

INSERT INTO `tb_usulan` (`kode_usulan`, `kode_bidang`, `kode_subbidang`, `tahun_pengusulan`, `nama_kegiatan`, `waktu_mulai`, `waktu_selesai`, `anggaran`, `alamat_kegiatan`, `kode_kecamatan`, `kode_wilayah`, `deskripsi`, `nama_institusi`, `alamat_institusi`, `kode_k`, `kode_w`, `nama_pengusul`, `no_telp`, `file`, `status_usulan`) VALUES
(22, '01', '0101', '2020', 'Kerja Rodi', '2020-02-14', '2020-02-29', 100000000, 'Jl. Kartini No. 42', '13', '3320132006', 'ipsum', 'Dinas KOMINFO', 'Jalan Kartini', '13', '3320132006', 'Indra Nooooooor', '08122561167', '1760-3924-1-PB.pdf', 1),
(23, '02', '0201', '2020', 'Kerja Baik', '2020-02-14', '2020-02-14', 4000000, 'Jalan', '12', '3320122004', 'daddaad', 'Kecamatan COba', 'dvavdsv', '12', '3320122004', 'Indra Nooooooor', '24242424', '554-1360-1-SM.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_w`
--

CREATE TABLE `tb_w` (
  `kode_w` varchar(25) NOT NULL,
  `nama_d` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kode_k` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_w`
--

INSERT INTO `tb_w` (`kode_w`, `nama_d`, `kabupaten`, `provinsi`, `kode_k`) VALUES
('3320012001', 'Kedungmalang', 'Jepara', 'Jawa Tengah', '01'),
('3320012002', 'Kalianyar', 'Jepara', 'Jawa Tengah', '01'),
('3320012003', 'Karangaji', 'Jepara', 'Jawa Tengah', '01'),
('3320012004', 'Tedunan', 'Jepara', 'Jawa Tengah', '01'),
('3320012005', 'Sowan lor', 'Jepara', 'Jawa Tengah', '01'),
('3320012006', 'Sowan Kidul', 'Jepara', 'Jawa Tengah', '01'),
('3320012007', 'Wanusobo', 'Jepara', 'Jawa Tengah', '01'),
('3320012008', 'Surodadi', 'Jepara', 'Jawa Tengah', '01'),
('3320012009', 'Panggung', 'Jepara', 'Jawa Tengah', '01'),
('3320012010', 'Bulak Baru', 'Jepara', 'Jawa Tengah', '01'),
('3320012011', 'Jondang', 'Jepara', 'Jawa Tengah', '01'),
('3320012012', 'Bugel', 'Jepara', 'Jawa Tengah', '01'),
('3320012013', 'Dongos', 'Jepara', 'Jawa Tengah', '01'),
('3320012014', 'Menganti', 'Jepara', 'Jawa Tengah', '01'),
('3320012015', 'Kerso', 'Jepara', 'Jawa Tengah', '01'),
('3320012016', 'Tanggultlare', 'Jepara', 'Jawa Tengah', '01'),
('3320012017', 'Rau', 'Jepara', 'Jawa Tengah', '01'),
('3320012018', 'Sukosono', 'Jepara', 'Jawa Tengah', '01'),
('3320022001', 'Kaliombo', 'Jepara', 'Jawa Tengah', '02'),
('3320022002', 'Karangrandu', 'Jepara', 'Jawa Tengah', '02'),
('3320022003', 'Gerdu', 'Jepara', 'Jawa Tengah', '02'),
('3320022004', 'Pecangaan Kulon', 'Jepara', 'Jawa Tengah', '02'),
('3320022005', 'Rengging', 'Jepara', 'Jawa Tengah', '02'),
('3320022006', 'Troso', 'Jepara', 'Jawa Tengah', '02'),
('3320022007', 'Ngeling', 'Jepara', 'Jawa Tengah', '02'),
('3320022008', 'Pulodarat', 'Jepara', 'Jawa Tengah', '02'),
('3320022009', 'Lebuawu', 'Jepara', 'Jawa Tengah', '02'),
('3320022010', 'Gemulung', 'Jepara', 'Jawa Tengah', '02'),
('3320022011', 'Pecangaan Wetan', 'Jepara', 'Jawa Tengah', '02'),
('3320022012', 'Krasak', 'Jepara', 'Jawa Tengah', '02'),
('3320032001', 'Ujung Pandan', 'Jepara', 'Jawa Tengah', '03'),
('3320032002', 'Karanganyar', 'Jepara', 'Jawa Tengah', '03'),
('3320032003', 'Guwosobokerto', 'Jepara', 'Jawa Tengah', '03'),
('3320032004', 'Kedungsarimulyo', 'Jepara', 'Jawa Tengah', '03'),
('3320032005', 'Bugo', 'Jepara', 'Jawa Tengah', '03'),
('3320032006', 'Welahan', 'Jepara', 'Jawa Tengah', '03'),
('3320032007', 'Gedangan', 'Jepara', 'Jawa Tengah', '03'),
('3320032008', 'Ketileng Singolelo', 'Jepara', 'Jawa Tengah', '03'),
('3320032009', 'Kalipucang Wetan', 'Jepara', 'Jawa Tengah', '03'),
('3320032010', 'Kalipucang Kulon', 'Jepara', 'Jawa Tengah', '03'),
('3320032011', 'Gidangelo', 'Jepara', 'Jawa Tengah', '03'),
('3320032012', 'Kendeng Sidialit', 'Jepara', 'Jawa Tengah', '03'),
('3320032013', 'Sidigede', 'Jepara', 'Jawa Tengah', '03'),
('3320032014', 'Teluk Wetan', 'Jepara', 'Jawa Tengah', '03'),
('3320032015', 'Brantak Sekarjati', 'Jepara', 'Jawa Tengah', '03'),
('3320042001', 'Mayong Lor', 'Jepara', 'Jawa Tengah', '04'),
('3320042002', 'Tigajuru', 'Jepara', 'Jawa Tengah', '04'),
('3320042003', 'Paren', 'Jepara', 'Jawa Tengah', '04'),
('3320042004', 'Kuanyar', 'Jepara', 'Jawa Tengah', '04'),
('3320042005', 'Pelang', 'Jepara', 'Jawa Tengah', '04'),
('3320042006', 'Sengonbugel', 'Jepara', 'Jawa Tengah', '04'),
('3320042007', 'Jebol', 'Jepara', 'Jawa Tengah', '04'),
('3320042008', 'Singorojo', 'Jepara', 'Jawa Tengah', '04'),
('3320042009', 'Pelemkerep', 'Jepara', 'Jawa Tengah', '04'),
('3320042010', 'Buaran', 'Jepara', 'Jawa Tengah', '04'),
('3320042011', 'Ngroto', 'Jepara', 'Jawa Tengah', '04'),
('3320042012', 'Rajekwesi', 'Jepara', 'Jawa Tengah', '04'),
('3320042013', 'Datar', 'Jepara', 'Jawa Tengah', '04'),
('3320042014', 'Pule', 'Jepara', 'Jawa Tengah', '04'),
('3320042015', 'Bandung', 'Jepara', 'Jawa Tengah', '04'),
('3320042016', 'Bungu', 'Jepara', 'Jawa Tengah', '04'),
('3320042017', 'Pancur', 'Jepara', 'Jawa Tengah', '04'),
('3320042018', 'Mayong Kidul', 'Jepara', 'Jawa Tengah', '04'),
('3320052001', 'Geneng', 'Jepara', 'Jawa Tengah', '05'),
('3320052002', 'Raguklampitan', 'Jepara', 'Jawa Tengah', '05'),
('3320052003', 'Ngasem', 'Jepara', 'Jawa Tengah', '05'),
('3320052004', 'Bawu', 'Jepara', 'Jawa Tengah', '05'),
('3320052005', 'Mindahan', 'Jepara', 'Jawa Tengah', '05'),
('3320052006', 'Somosari', 'Jepara', 'Jawa Tengah', '05'),
('3320052007', 'Batealit', 'Jepara', 'Jawa Tengah', '05'),
('3320052008', 'Bringin', 'Jepara', 'Jawa Tengah', '05'),
('3320052009', 'Bantrung', 'Jepara', 'Jawa Tengah', '05'),
('3320052010', 'Pekalongan', 'Jepara', 'Jawa Tengah', '05'),
('3320052011', 'Mindahan Kidul', 'Jepara', 'Jawa Tengah', '05'),
('3320061001', 'Karangkebagusan', 'Jepara', 'Jawa Tengah', '06'),
('3320061002', 'Demaan', 'Jepara', 'Jawa Tengah', '06'),
('3320061003', 'Potroyudan', 'Jepara', 'Jawa Tengah', '06'),
('3320061004', 'Bapangan', 'Jepara', 'Jawa Tengah', '06'),
('3320061005', 'Saripan', 'Jepara', 'Jawa Tengah', '06'),
('3320061006', 'Panggang', 'Jepara', 'Jawa Tengah', '06'),
('3320061007', 'Kauman', 'Jepara', 'Jawa Tengah', '06'),
('3320061008', 'Bulu', 'Jepara', 'Jawa Tengah', '06'),
('3320061009', 'Jobokuto', 'Jepara', 'Jawa Tengah', '06'),
('3320061010', 'Ujungbatu', 'Jepara', 'Jawa Tengah', '06'),
('3320061011', 'Pengkol', 'Jepara', 'Jawa Tengah', '06'),
('3320062012', 'Mulyoharjo', 'Jepara', 'Jawa Tengah', '06'),
('3320062013', 'Wonorejo', 'Jepara', 'Jawa Tengah', '06'),
('3320062014', 'Kedungcino', 'Jepara', 'Jawa Tengah', '06'),
('3320062015', 'Kuwasen', 'Jepara', 'Jawa Tengah', '06'),
('3320062016', 'Bandengan', 'Jepara', 'Jawa Tengah', '06'),
('3320072001', 'Mororejo', 'Jepara', 'Jawa Tengah', '07'),
('3320072009', 'Suwawal', 'Jepara', 'Jawa Tengah', '07'),
('3320072010', 'Sinanggul', 'Jepara', 'Jawa Tengah', '07'),
('3320072011', 'Jambu', 'Jepara', 'Jawa Tengah', '07'),
('3320072012', 'Srobyong', 'Jepara', 'Jawa Tengah', '07'),
('3320072013', 'Sekuro', 'Jepara', 'Jawa Tengah', '07'),
('3320072014', 'Karanggondang', 'Jepara', 'Jawa Tengah', '07'),
('3320072015', 'Jambu Timur', 'Jepara', 'Jawa Tengah', '07'),
('3320082001', 'Guyangan', 'Jepara', 'Jawa Tengah', '08'),
('3320082002', 'Kepuk', 'Jepara', 'Jawa Tengah', '08'),
('3320082003', 'Papasan', 'Jepara', 'Jawa Tengah', '08'),
('3320082004', 'Srikandang', 'Jepara', 'Jawa Tengah', '08'),
('3320082005', 'Tengguli', 'Jepara', 'Jawa Tengah', '08'),
('3320082006', 'Bangsri', 'Jepara', 'Jawa Tengah', '08'),
('3320082007', 'Banjaran', 'Jepara', 'Jawa Tengah', '08'),
('3320082008', 'Wedelan', 'Jepara', 'Jawa Tengah', '08'),
('3320082009', 'Kedungleper', 'Jepara', 'Jawa Tengah', '08'),
('3320082010', 'Jerukwangi', 'Jepara', 'Jawa Tengah', '08'),
('3320082011', 'Bondo', 'Jepara', 'Jawa Tengah', '08'),
('3320082012', 'Banjaragung', 'Jepara', 'Jawa Tengah', '08'),
('3320092001', 'Tempur', 'Jepara', 'Jawa Tengah', '09'),
('3320092002', 'Damarwulan', 'Jepara', 'Jawa Tengah', '09'),
('3320092003', 'Kunir', 'Jepara', 'Jawa Tengah', '09'),
('3320092004', 'Watuaji', 'Jepara', 'Jawa Tengah', '09'),
('3320092005', 'Klepu', 'Jepara', 'Jawa Tengah', '09'),
('3320092006', 'Tunahan', 'Jepara', 'Jawa Tengah', '09'),
('3320092007', 'Kaligarang', 'Jepara', 'Jawa Tengah', '09'),
('3320092008', 'Keling', 'Jepara', 'Jawa Tengah', '09'),
('3320092009', 'Gelang', 'Jepara', 'Jawa Tengah', '09'),
('3320092010', 'Jlegong', 'Jepara', 'Jawa Tengah', '09'),
('3320092011', 'Kelet', 'Jepara', 'Jawa Tengah', '09'),
('3320092020', 'Bumiharjo', 'Jepara', 'Jawa Tengah', '09'),
('3320102001', 'Karimun Jawa', 'Jepara', 'Jawa Tengah', '10'),
('3320102002', 'Kemujan', 'Jepara', 'Jawa Tengah', '10'),
('3320102003', 'Parang', 'Jepara', 'Jawa Tengah', '10'),
('3320102004', 'Nyamuk', 'Jepara', 'Jawa Tengah', '10'),
('3320112001', 'Ngabul', 'Jepara', 'Jawa Tengah', '11'),
('3320112002', 'Langon', 'Jepara', 'Jawa Tengah', '11'),
('3320112003', 'Sukodono', 'Jepara', 'Jawa Tengah', '11'),
('3320112004', 'Petekeyan', 'Jepara', 'Jawa Tengah', '11'),
('3320112005', 'Mangunan', 'Jepara', 'Jawa Tengah', '11'),
('3320112006', 'Platar', 'Jepara', 'Jawa Tengah', '11'),
('3320112007', 'Semat', 'Jepara', 'Jawa Tengah', '11'),
('3320112008', 'Teluk Awur', 'Jepara', 'Jawa Tengah', '11'),
('3320112009', 'Demangan', 'Jepara', 'Jawa Tengah', '11'),
('3320112010', 'Tegalsambi', 'Jepara', 'Jawa Tengah', '11'),
('3320112011', 'Mantingan', 'Jepara', 'Jawa Tengah', '11'),
('3320112012', 'Tahunan', 'Jepara', 'Jawa Tengah', '11'),
('3320112013', 'Kecapi', 'Jepara', 'Jawa Tengah', '11'),
('3320112014', 'Senenan', 'Jepara', 'Jawa Tengah', '11'),
('3320112015', 'Krapyak', 'Jepara', 'Jawa Tengah', '11'),
('3320122001', 'Blimbingrejo', 'Jepara', 'Jawa Tengah', '12'),
('3320122002', 'Tunggul Pandean', 'Jepara', 'Jawa Tengah', '12'),
('3320122003', 'Pringtulis', 'Jepara', 'Jawa Tengah', '12'),
('3320122004', 'Jatisari', 'Jepara', 'Jawa Tengah', '12'),
('3320122005', 'Gemiring Kidul', 'Jepara', 'Jawa Tengah', '12'),
('3320122006', 'Gemiring Lor', 'Jepara', 'Jawa Tengah', '12'),
('3320122007', 'Nalumsari', 'Jepara', 'Jawa Tengah', '12'),
('3320122008', 'Tritis', 'Jepara', 'Jawa Tengah', '12'),
('3320122009', 'Daren', 'Jepara', 'Jawa Tengah', '12'),
('3320122010', 'Karangnongko', 'Jepara', 'Jawa Tengah', '12'),
('3320122011', 'Ngetuk', 'Jepara', 'Jawa Tengah', '12'),
('3320122012', 'Bendanpete', 'Jepara', 'Jawa Tengah', '12'),
('3320122013', 'Muryolobo', 'Jepara', 'Jawa Tengah', '12'),
('3320122014', 'Bategede', 'Jepara', 'Jawa Tengah', '12'),
('3320122015', 'Dorang', 'Jepara', 'Jawa Tengah', '12'),
('3320132001', 'Batukali', 'Jepara', 'Jawa Tengah', '13'),
('3320132002', 'Bandungrejo', 'Jepara', 'Jawa Tengah', '13'),
('3320132003', 'Banyuputih', 'Jepara', 'Jawa Tengah', '13'),
('3320132004', 'Pendosawalan', 'Jepara', 'Jawa Tengah', '13'),
('3320132005', 'Damarjati', 'Jepara', 'Jawa Tengah', '13'),
('3320132006', 'Purwogondo', 'Jepara', 'Jawa Tengah', '13'),
('3320132007', 'Margoyoso', 'Jepara', 'Jawa Tengah', '13'),
('3320132008', 'Sendang', 'Jepara', 'Jawa Tengah', '13'),
('3320132009', 'Kriyan', 'Jepara', 'Jawa Tengah', '13'),
('3320132010', 'Robayan', 'Jepara', 'Jawa Tengah', '13'),
('3320132011', 'Bakalan', 'Jepara', 'Jawa Tengah', '13'),
('3320132012', 'Manyargading', 'Jepara', 'Jawa Tengah', '13'),
('3320142001', 'Dudakawu', 'Jepara', 'Jawa Tengah', '14'),
('3320142002', 'Sumanding', 'Jepara', 'Jawa Tengah', '14'),
('3320142003', 'Bucu', 'Jepara', 'Jawa Tengah', '14'),
('3320142004', 'Cepogo', 'Jepara', 'Jawa Tengah', '14'),
('3320142005', 'Pendem', 'Jepara', 'Jawa Tengah', '14'),
('3320142006', 'Jinggotan', 'Jepara', 'Jawa Tengah', '14'),
('3320142007', 'Dermolo', 'Jepara', 'Jawa Tengah', '14'),
('3320142008', 'Kaliaman', 'Jepara', 'Jawa Tengah', '14'),
('3320142009', 'Tubanan', 'Jepara', 'Jawa Tengah', '14'),
('3320142010', 'Balong', 'Jepara', 'Jawa Tengah', '14'),
('3320142011', 'Kancilan', 'Jepara', 'Jawa Tengah', '14'),
('3320152001', 'Lebak', 'Jepara', 'Jawa Tengah', '15'),
('3320152002', 'Bulungan', 'Jepara', 'Jawa Tengah', '15'),
('3320152003', 'Suwawal Timur', 'Jepara', 'Jawa Tengah', '15'),
('3320152004', 'Kawak', 'Jepara', 'Jawa Tengah', '15'),
('3320152005', 'Tanjung', 'Jepara', 'Jawa Tengah', '15'),
('3320152006', 'Plajan', 'Jepara', 'Jawa Tengah', '15'),
('3320152007', 'Slagi', 'Jepara', 'Jawa Tengah', '15'),
('3320152008', 'Mambak', 'Jepara', 'Jawa Tengah', '15'),
('3320162001', 'Sumberrejo', 'Jepara', 'Jawa Tengah', '16'),
('3320162002', 'Clering', 'Jepara', 'Jawa Tengah', '16'),
('3320162003', 'Ujung Watu', 'Jepara', 'Jawa Tengah', '16'),
('3320162004', 'Banyumanis', 'Jepara', 'Jawa Tengah', '16'),
('3320162005', 'Tulakan', 'Jepara', 'Jawa Tengah', '16'),
('3320162006', 'Bandungharjo', 'Jepara', 'Jawa Tengah', '16'),
('3320162007', 'Blingoh', 'Jepara', 'Jawa Tengah', '16'),
('3320162008', 'Jugo', 'Jepara', 'Jawa Tengah', '16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wilayah`
--

CREATE TABLE `tb_wilayah` (
  `kode_wilayah` varchar(11) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kode_kecamatan_wilayah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wilayah`
--

INSERT INTO `tb_wilayah` (`kode_wilayah`, `desa`, `kabupaten`, `provinsi`, `kode_kecamatan_wilayah`) VALUES
('3320012001', 'Kedungmalang', 'Jepara', 'Jawa Tengah', '01'),
('3320012002', 'Kalianyar', 'Jepara', 'Jawa Tengah', '01'),
('3320012003', 'Karangaji', 'Jepara', 'Jawa Tengah', '01'),
('3320012004', 'Tedunan', 'Jepara', 'Jawa Tengah', '01'),
('3320012005', 'Sowan lor', 'Jepara', 'Jawa Tengah', '01'),
('3320012006', 'Sowan Kidul', 'Jepara', 'Jawa Tengah', '01'),
('3320012007', 'Wanusobo', 'Jepara', 'Jawa Tengah', '01'),
('3320012008', 'Surodadi', 'Jepara', 'Jawa Tengah', '01'),
('3320012009', 'Panggung', 'Jepara', 'Jawa Tengah', '01'),
('3320012010', 'Bulak Baru', 'Jepara', 'Jawa Tengah', '01'),
('3320012011', 'Jondang', 'Jepara', 'Jawa Tengah', '01'),
('3320012012', 'Bugel', 'Jepara', 'Jawa Tengah', '01'),
('3320012013', 'Dongos', 'Jepara', 'Jawa Tengah', '01'),
('3320012014', 'Menganti', 'Jepara', 'Jawa Tengah', '01'),
('3320012015', 'Kerso', 'Jepara', 'Jawa Tengah', '01'),
('3320012016', 'Tanggultlare', 'Jepara', 'Jawa Tengah', '01'),
('3320012017', 'Rau', 'Jepara', 'Jawa Tengah', '01'),
('3320012018', 'Sukosono', 'Jepara', 'Jawa Tengah', '01'),
('3320022001', 'Kaliombo', 'Jepara', 'Jawa Tengah', '02'),
('3320022002', 'Karangrandu', 'Jepara', 'Jawa Tengah', '02'),
('3320022003', 'Gerdu', 'Jepara', 'Jawa Tengah', '02'),
('3320022004', 'Pecangaan Kulon', 'Jepara', 'Jawa Tengah', '02'),
('3320022005', 'Rengging', 'Jepara', 'Jawa Tengah', '02'),
('3320022006', 'Troso', 'Jepara', 'Jawa Tengah', '02'),
('3320022007', 'Ngeling', 'Jepara', 'Jawa Tengah', '02'),
('3320022008', 'Pulodarat', 'Jepara', 'Jawa Tengah', '02'),
('3320022009', 'Lebuawu', 'Jepara', 'Jawa Tengah', '02'),
('3320022010', 'Gemulung', 'Jepara', 'Jawa Tengah', '02'),
('3320022011', 'Pecangaan Wetan', 'Jepara', 'Jawa Tengah', '02'),
('3320022012', 'Krasak', 'Jepara', 'Jawa Tengah', '02'),
('3320032001', 'Ujung Pandan', 'Jepara', 'Jawa Tengah', '03'),
('3320032002', 'Karanganyar', 'Jepara', 'Jawa Tengah', '03'),
('3320032003', 'Guwosobokerto', 'Jepara', 'Jawa Tengah', '03'),
('3320032004', 'Kedungsarimulyo', 'Jepara', 'Jawa Tengah', '03'),
('3320032005', 'Bugo', 'Jepara', 'Jawa Tengah', '03'),
('3320032006', 'Welahan', 'Jepara', 'Jawa Tengah', '03'),
('3320032007', 'Gedangan', 'Jepara', 'Jawa Tengah', '03'),
('3320032008', 'Ketileng Singolelo', 'Jepara', 'Jawa Tengah', '03'),
('3320032009', 'Kalipucang Wetan', 'Jepara', 'Jawa Tengah', '03'),
('3320032010', 'Kalipucang Kulon', 'Jepara', 'Jawa Tengah', '03'),
('3320032011', 'Gidangelo', 'Jepara', 'Jawa Tengah', '03'),
('3320032012', 'Kendeng Sidialit', 'Jepara', 'Jawa Tengah', '03'),
('3320032013', 'Sidigede', 'Jepara', 'Jawa Tengah', '03'),
('3320032014', 'Teluk Wetan', 'Jepara', 'Jawa Tengah', '03'),
('3320032015', 'Brantak Sekarjati', 'Jepara', 'Jawa Tengah', '03'),
('3320042001', 'Mayong Lor', 'Jepara', 'Jawa Tengah', '04'),
('3320042002', 'Tigajuru', 'Jepara', 'Jawa Tengah', '04'),
('3320042003', 'Paren', 'Jepara', 'Jawa Tengah', '04'),
('3320042004', 'Kuanyar', 'Jepara', 'Jawa Tengah', '04'),
('3320042005', 'Pelang', 'Jepara', 'Jawa Tengah', '04'),
('3320042006', 'Sengonbugel', 'Jepara', 'Jawa Tengah', '04'),
('3320042007', 'Jebol', 'Jepara', 'Jawa Tengah', '04'),
('3320042008', 'Singorojo', 'Jepara', 'Jawa Tengah', '04'),
('3320042009', 'Pelemkerep', 'Jepara', 'Jawa Tengah', '04'),
('3320042010', 'Buaran', 'Jepara', 'Jawa Tengah', '04'),
('3320042011', 'Ngroto', 'Jepara', 'Jawa Tengah', '04'),
('3320042012', 'Rajekwesi', 'Jepara', 'Jawa Tengah', '04'),
('3320042013', 'Datar', 'Jepara', 'Jawa Tengah', '04'),
('3320042014', 'Pule', 'Jepara', 'Jawa Tengah', '04'),
('3320042015', 'Bandung', 'Jepara', 'Jawa Tengah', '04'),
('3320042016', 'Bungu', 'Jepara', 'Jawa Tengah', '04'),
('3320042017', 'Pancur', 'Jepara', 'Jawa Tengah', '04'),
('3320042018', 'Mayong Kidul', 'Jepara', 'Jawa Tengah', '04'),
('3320052001', 'Geneng', 'Jepara', 'Jawa Tengah', '05'),
('3320052002', 'Raguklampitan', 'Jepara', 'Jawa Tengah', '05'),
('3320052003', 'Ngasem', 'Jepara', 'Jawa Tengah', '05'),
('3320052004', 'Bawu', 'Jepara', 'Jawa Tengah', '05'),
('3320052005', 'Mindahan', 'Jepara', 'Jawa Tengah', '05'),
('3320052006', 'Somosari', 'Jepara', 'Jawa Tengah', '05'),
('3320052007', 'Batealit', 'Jepara', 'Jawa Tengah', '05'),
('3320052008', 'Bringin', 'Jepara', 'Jawa Tengah', '05'),
('3320052009', 'Bantrung', 'Jepara', 'Jawa Tengah', '05'),
('3320052010', 'Pekalongan', 'Jepara', 'Jawa Tengah', '05'),
('3320052011', 'Mindahan Kidul', 'Jepara', 'Jawa Tengah', '05'),
('3320061001', 'Karangkebagusan', 'Jepara', 'Jawa Tengah', '06'),
('3320061002', 'Demaan', 'Jepara', 'Jawa Tengah', '06'),
('3320061003', 'Potroyudan', 'Jepara', 'Jawa Tengah', '06'),
('3320061004', 'Bapangan', 'Jepara', 'Jawa Tengah', '06'),
('3320061005', 'Saripan', 'Jepara', 'Jawa Tengah', '06'),
('3320061006', 'Panggang', 'Jepara', 'Jawa Tengah', '06'),
('3320061007', 'Kauman', 'Jepara', 'Jawa Tengah', '06'),
('3320061008', 'Bulu', 'Jepara', 'Jawa Tengah', '06'),
('3320061009', 'Jobokuto', 'Jepara', 'Jawa Tengah', '06'),
('3320061010', 'Ujungbatu', 'Jepara', 'Jawa Tengah', '06'),
('3320061011', 'Pengkol', 'Jepara', 'Jawa Tengah', '06'),
('3320062012', 'Mulyoharjo', 'Jepara', 'Jawa Tengah', '06'),
('3320062013', 'Wonorejo', 'Jepara', 'Jawa Tengah', '06'),
('3320062014', 'Kedungcino', 'Jepara', 'Jawa Tengah', '06'),
('3320062015', 'Kuwasen', 'Jepara', 'Jawa Tengah', '06'),
('3320062016', 'Bandengan', 'Jepara', 'Jawa Tengah', '06'),
('3320072001', 'Mororejo', 'Jepara', 'Jawa Tengah', '07'),
('3320072009', 'Suwawal', 'Jepara', 'Jawa Tengah', '07'),
('3320072010', 'Sinanggul', 'Jepara', 'Jawa Tengah', '07'),
('3320072011', 'Jambu', 'Jepara', 'Jawa Tengah', '07'),
('3320072012', 'Srobyong', 'Jepara', 'Jawa Tengah', '07'),
('3320072013', 'Sekuro', 'Jepara', 'Jawa Tengah', '07'),
('3320072014', 'Karanggondang', 'Jepara', 'Jawa Tengah', '07'),
('3320072015', 'Jambu Timur', 'Jepara', 'Jawa Tengah', '07'),
('3320082001', 'Guyangan', 'Jepara', 'Jawa Tengah', '08'),
('3320082002', 'Kepuk', 'Jepara', 'Jawa Tengah', '08'),
('3320082003', 'Papasan', 'Jepara', 'Jawa Tengah', '08'),
('3320082004', 'Srikandang', 'Jepara', 'Jawa Tengah', '08'),
('3320082005', 'Tengguli', 'Jepara', 'Jawa Tengah', '08'),
('3320082006', 'Bangsri', 'Jepara', 'Jawa Tengah', '08'),
('3320082007', 'Banjaran', 'Jepara', 'Jawa Tengah', '08'),
('3320082008', 'Wedelan', 'Jepara', 'Jawa Tengah', '08'),
('3320082009', 'Kedungleper', 'Jepara', 'Jawa Tengah', '08'),
('3320082010', 'Jerukwangi', 'Jepara', 'Jawa Tengah', '08'),
('3320082011', 'Bondo', 'Jepara', 'Jawa Tengah', '08'),
('3320082012', 'Banjaragung', 'Jepara', 'Jawa Tengah', '08'),
('3320092001', 'Tempur', 'Jepara', 'Jawa Tengah', '09'),
('3320092002', 'Damarwulan', 'Jepara', 'Jawa Tengah', '09'),
('3320092003', 'Kunir', 'Jepara', 'Jawa Tengah', '09'),
('3320092004', 'Watuaji', 'Jepara', 'Jawa Tengah', '09'),
('3320092005', 'Klepu', 'Jepara', 'Jawa Tengah', '09'),
('3320092006', 'Tunahan', 'Jepara', 'Jawa Tengah', '09'),
('3320092007', 'Kaligarang', 'Jepara', 'Jawa Tengah', '09'),
('3320092008', 'Keling', 'Jepara', 'Jawa Tengah', '09'),
('3320092009', 'Gelang', 'Jepara', 'Jawa Tengah', '09'),
('3320092010', 'Jlegong', 'Jepara', 'Jawa Tengah', '09'),
('3320092011', 'Kelet', 'Jepara', 'Jawa Tengah', '09'),
('3320092020', 'Bumiharjo', 'Jepara', 'Jawa Tengah', '09'),
('3320102001', 'Karimun Jawa', 'Jepara', 'Jawa Tengah', '10'),
('3320102002', 'Kemujan', 'Jepara', 'Jawa Tengah', '10'),
('3320102003', 'Parang', 'Jepara', 'Jawa Tengah', '10'),
('3320102004', 'Nyamuk', 'Jepara', 'Jawa Tengah', '10'),
('3320112001', 'Ngabul', 'Jepara', 'Jawa Tengah', '11'),
('3320112002', 'Langon', 'Jepara', 'Jawa Tengah', '11'),
('3320112003', 'Sukodono', 'Jepara', 'Jawa Tengah', '11'),
('3320112004', 'Petekeyan', 'Jepara', 'Jawa Tengah', '11'),
('3320112005', 'Mangunan', 'Jepara', 'Jawa Tengah', '11'),
('3320112006', 'Platar', 'Jepara', 'Jawa Tengah', '11'),
('3320112007', 'Semat', 'Jepara', 'Jawa Tengah', '11'),
('3320112008', 'Teluk Awur', 'Jepara', 'Jawa Tengah', '11'),
('3320112009', 'Demangan', 'Jepara', 'Jawa Tengah', '11'),
('3320112010', 'Tegalsambi', 'Jepara', 'Jawa Tengah', '11'),
('3320112011', 'Mantingan', 'Jepara', 'Jawa Tengah', '11'),
('3320112012', 'Tahunan', 'Jepara', 'Jawa Tengah', '11'),
('3320112013', 'Kecapi', 'Jepara', 'Jawa Tengah', '11'),
('3320112014', 'Senenan', 'Jepara', 'Jawa Tengah', '11'),
('3320112015', 'Krapyak', 'Jepara', 'Jawa Tengah', '11'),
('3320122001', 'Blimbingrejo', 'Jepara', 'Jawa Tengah', '12'),
('3320122002', 'Tunggul Pandean', 'Jepara', 'Jawa Tengah', '12'),
('3320122003', 'Pringtulis', 'Jepara', 'Jawa Tengah', '12'),
('3320122004', 'Jatisari', 'Jepara', 'Jawa Tengah', '12'),
('3320122005', 'Gemiring Kidul', 'Jepara', 'Jawa Tengah', '12'),
('3320122006', 'Gemiring Lor', 'Jepara', 'Jawa Tengah', '12'),
('3320122007', 'Nalumsari', 'Jepara', 'Jawa Tengah', '12'),
('3320122008', 'Tritis', 'Jepara', 'Jawa Tengah', '12'),
('3320122009', 'Daren', 'Jepara', 'Jawa Tengah', '12'),
('3320122010', 'Karangnongko', 'Jepara', 'Jawa Tengah', '12'),
('3320122011', 'Ngetuk', 'Jepara', 'Jawa Tengah', '12'),
('3320122012', 'Bendanpete', 'Jepara', 'Jawa Tengah', '12'),
('3320122013', 'Muryolobo', 'Jepara', 'Jawa Tengah', '12'),
('3320122014', 'Bategede', 'Jepara', 'Jawa Tengah', '12'),
('3320122015', 'Dorang', 'Jepara', 'Jawa Tengah', '12'),
('3320132001', 'Batukali', 'Jepara', 'Jawa Tengah', '13'),
('3320132002', 'Bandungrejo', 'Jepara', 'Jawa Tengah', '13'),
('3320132003', 'Banyuputih', 'Jepara', 'Jawa Tengah', '13'),
('3320132004', 'Pendosawalan', 'Jepara', 'Jawa Tengah', '13'),
('3320132005', 'Damarjati', 'Jepara', 'Jawa Tengah', '13'),
('3320132006', 'Purwogondo', 'Jepara', 'Jawa Tengah', '13'),
('3320132007', 'Margoyoso', 'Jepara', 'Jawa Tengah', '13'),
('3320132008', 'Sendang', 'Jepara', 'Jawa Tengah', '13'),
('3320132009', 'Kriyan', 'Jepara', 'Jawa Tengah', '13'),
('3320132010', 'Robayan', 'Jepara', 'Jawa Tengah', '13'),
('3320132011', 'Bakalan', 'Jepara', 'Jawa Tengah', '13'),
('3320132012', 'Manyargading', 'Jepara', 'Jawa Tengah', '13'),
('3320142001', 'Dudakawu', 'Jepara', 'Jawa Tengah', '14'),
('3320142002', 'Sumanding', 'Jepara', 'Jawa Tengah', '14'),
('3320142003', 'Bucu', 'Jepara', 'Jawa Tengah', '14'),
('3320142004', 'Cepogo', 'Jepara', 'Jawa Tengah', '14'),
('3320142005', 'Pendem', 'Jepara', 'Jawa Tengah', '14'),
('3320142006', 'Jinggotan', 'Jepara', 'Jawa Tengah', '14'),
('3320142007', 'Dermolo', 'Jepara', 'Jawa Tengah', '14'),
('3320142008', 'Kaliaman', 'Jepara', 'Jawa Tengah', '14'),
('3320142009', 'Tubanan', 'Jepara', 'Jawa Tengah', '14'),
('3320142010', 'Balong', 'Jepara', 'Jawa Tengah', '14'),
('3320142011', 'Kancilan', 'Jepara', 'Jawa Tengah', '14'),
('3320152001', 'Lebak', 'Jepara', 'Jawa Tengah', '15'),
('3320152002', 'Bulungan', 'Jepara', 'Jawa Tengah', '15'),
('3320152003', 'Suwawal Timur', 'Jepara', 'Jawa Tengah', '15'),
('3320152004', 'Kawak', 'Jepara', 'Jawa Tengah', '15'),
('3320152005', 'Tanjung', 'Jepara', 'Jawa Tengah', '15'),
('3320152006', 'Plajan', 'Jepara', 'Jawa Tengah', '15'),
('3320152007', 'Slagi', 'Jepara', 'Jawa Tengah', '15'),
('3320152008', 'Mambak', 'Jepara', 'Jawa Tengah', '15'),
('3320162001', 'Sumberrejo', 'Jepara', 'Jawa Tengah', '16'),
('3320162002', 'Clering', 'Jepara', 'Jawa Tengah', '16'),
('3320162003', 'Ujung Watu', 'Jepara', 'Jawa Tengah', '16'),
('3320162004', 'Banyumanis', 'Jepara', 'Jawa Tengah', '16'),
('3320162005', 'Tulakan', 'Jepara', 'Jawa Tengah', '16'),
('3320162006', 'Bandungharjo', 'Jepara', 'Jawa Tengah', '16'),
('3320162007', 'Blingoh', 'Jepara', 'Jawa Tengah', '16'),
('3320162008', 'Jugo', 'Jepara', 'Jawa Tengah', '16');

-- --------------------------------------------------------

--
-- Structure for view `infrastruktur`
--
DROP TABLE IF EXISTS `infrastruktur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `infrastruktur`  AS  select `tb_subbidang`.`kode_subbidang` AS `kode_subbidang`,`tb_subbidang`.`nama_sub` AS `nama_sub` from `tb_subbidang` where (`tb_subbidang`.`parent_bidang` = 5) ;

-- --------------------------------------------------------

--
-- Structure for view `kesehatan`
--
DROP TABLE IF EXISTS `kesehatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kesehatan`  AS  select `tb_subbidang`.`kode_subbidang` AS `kode_subbidang`,`tb_subbidang`.`nama_sub` AS `nama_sub` from `tb_subbidang` where (`tb_subbidang`.`parent_bidang` = 2) ;

-- --------------------------------------------------------

--
-- Structure for view `lingkungan`
--
DROP TABLE IF EXISTS `lingkungan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lingkungan`  AS  select `tb_subbidang`.`kode_subbidang` AS `kode_subbidang`,`tb_subbidang`.`nama_sub` AS `nama_sub` from `tb_subbidang` where (`tb_subbidang`.`parent_bidang` = 3) ;

-- --------------------------------------------------------

--
-- Structure for view `pek`
--
DROP TABLE IF EXISTS `pek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pek`  AS  select `tb_subbidang`.`kode_subbidang` AS `kode_subbidang`,`tb_subbidang`.`nama_sub` AS `nama_sub` from `tb_subbidang` where (`tb_subbidang`.`parent_bidang` = 4) ;

-- --------------------------------------------------------

--
-- Structure for view `pendidikan`
--
DROP TABLE IF EXISTS `pendidikan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pendidikan`  AS  select `tb_subbidang`.`kode_subbidang` AS `kode_subbidang`,`tb_subbidang`.`nama_sub` AS `nama_sub` from `tb_subbidang` where (`tb_subbidang`.`parent_bidang` = 1) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `tbu_kecamatan`
--
ALTER TABLE `tbu_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`kode_bidang`);

--
-- Indexes for table `tb_k`
--
ALTER TABLE `tb_k`
  ADD PRIMARY KEY (`kode_k`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`kode_kecamatan`);

--
-- Indexes for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pilihan`
--
ALTER TABLE `tb_pilihan`
  ADD PRIMARY KEY (`kode_pilih`);

--
-- Indexes for table `tb_subbidang`
--
ALTER TABLE `tb_subbidang`
  ADD PRIMARY KEY (`kode_subbidang`),
  ADD KEY `parent_bidang` (`parent_bidang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usulan`
--
ALTER TABLE `tb_usulan`
  ADD PRIMARY KEY (`kode_usulan`);

--
-- Indexes for table `tb_wilayah`
--
ALTER TABLE `tb_wilayah`
  ADD PRIMARY KEY (`kode_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coba`
--
ALTER TABLE `coba`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbu_kecamatan`
--
ALTER TABLE `tbu_kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pilihan`
--
ALTER TABLE `tb_pilihan`
  MODIFY `kode_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_usulan`
--
ALTER TABLE `tb_usulan`
  MODIFY `kode_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_subbidang`
--
ALTER TABLE `tb_subbidang`
  ADD CONSTRAINT `tb_subbidang_ibfk_1` FOREIGN KEY (`parent_bidang`) REFERENCES `tb_bidang` (`kode_bidang`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
