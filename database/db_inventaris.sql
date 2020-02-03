-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 01:19 AM
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
-- Stand-in structure for view `infrastruktur`
-- (See below for the actual view)
--
CREATE TABLE `infrastruktur` (
`kode_subbidang` varchar(15)
,`nama_sub` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kesehatan`
-- (See below for the actual view)
--
CREATE TABLE `kesehatan` (
`kode_subbidang` varchar(15)
,`nama_sub` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `lingkungan`
-- (See below for the actual view)
--
CREATE TABLE `lingkungan` (
`kode_subbidang` varchar(15)
,`nama_sub` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pek`
-- (See below for the actual view)
--
CREATE TABLE `pek` (
`kode_subbidang` varchar(15)
,`nama_sub` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pendidikan`
-- (See below for the actual view)
--
CREATE TABLE `pendidikan` (
`kode_subbidang` varchar(15)
,`nama_sub` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `kode_berkas` int(11) NOT NULL,
  `nama_berkas` varchar(100) NOT NULL,
  `parent_subbidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('04', 'Bidang Infrastruktur', ''),
('05', 'Bidang Infrastruktur', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subbidang`
--

CREATE TABLE `tb_subbidang` (
  `kode_subbidang` varchar(15) NOT NULL,
  `nama_sub` varchar(100) NOT NULL,
  `parent_bidang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subbidang`
--

INSERT INTO `tb_subbidang` (`kode_subbidang`, `nama_sub`, `parent_bidang`) VALUES
('0101', 'Penyedia Sarana dan Prasarana yang  Layak dan Memadai Disemua Jenjang Pendidikan Baik Formal maupun ', '01'),
('0102', 'Peningkatan Kualifikasi dan Kompentensi Tenaga Pendidik dan Kependidikan', '01'),
('0103', 'Pemberian Beasiswa', '01'),
('0104', 'kegiatan pengembangan SDM', '01'),
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
('0401', 'Peningkatan pendapatan masyarakat khususnya sektor', '04'),
('0501', 'pembangunan rumah layak huni', '05'),
('0502', 'Penyediaan listrik pedesaan', '05'),
('0503', 'penyediaan air bersih', '05'),
('0504', 'pembangunan jalan', '05'),
('0505', 'pembangunan jembatan', '05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wilayah`
--

CREATE TABLE `tb_wilayah` (
  `kode_wilayah` varchar(11) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wilayah`
--

INSERT INTO `tb_wilayah` (`kode_wilayah`, `desa`, `kecamatan`, `kabupaten`, `provinsi`) VALUES
('3320012001', 'Kedungmalang', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012002', 'Kalianyar', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012003', 'Karangaji', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012004', 'Tedunan', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012005', 'Sowan lor', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012006', 'Sowan Kidul', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012007', 'Wanusobo', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012008', 'Surodadi', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012009', 'Panggung', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012010', 'Bulak Baru', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012011', 'Jondang', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012012', 'Bugel', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012013', 'Dongos', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012014', 'Menganti', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012015', 'Kerso', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012016', 'Tanggultlare', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012017', 'Rau', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320012018', 'Sukosono', 'Kedung', 'Jepara', 'Jawa Tengah'),
('3320022001', 'Kaliombo', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320022002', 'Karangrandu', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320022003', 'Gerdu', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320022004', 'Pecangaan Kulon', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320022005', 'Rengging', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320022006', 'Troso', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320022007', 'Ngeling', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320022008', 'Pulodarat', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320022009', 'Lebuawu', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320022010', 'Gemulung', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320022011', 'Pecangaan Wetan', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320022012', 'Krasak', 'Pecangaan', 'Jepara', 'Jawa Tengah'),
('3320032001', 'Ujung Pandan', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032002', 'Karanganyar', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032003', 'Guwosobokerto', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032004', 'Kedungsarimulyo', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032005', 'Bugo', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032006', 'Welahan', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032007', 'Gedangan', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032008', 'Ketileng Singolelo', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032009', 'Kalipucang Wetan', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032010', 'Kalipucang Kulon', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032011', 'Gidangelo', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032012', 'Kendeng Sidialit', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032013', 'Sidigede', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032014', 'Teluk Wetan', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320032015', 'Brantak Sekarjati', 'Welahan', 'Jepara', 'Jawa Tengah'),
('3320042001', 'Mayong Lor', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042002', 'Tigajuru', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042003', 'Paren', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042004', 'Kuanyar', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042005', 'Pelang', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042006', 'Sengonbugel', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042007', 'Jebol', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042008', 'Singorojo', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042009', 'Pelemkerep', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042010', 'Buaran', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042011', 'Ngroto', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042012', 'Rajekwesi', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042013', 'Datar', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042014', 'Pule', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042015', 'Bandung', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042016', 'Bungu', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042017', 'Pancur', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320042018', 'Mayong Kidul', 'Mayong', 'Jepara', 'Jawa Tengah'),
('3320052001', 'Geneng', 'Batealit', 'Jepara', 'Jawa Tengah'),
('3320052002', 'Raguklampitan', 'Batealit', 'Jepara', 'Jawa Tengah'),
('3320052003', 'Ngasem', 'Batealit', 'Jepara', 'Jawa Tengah'),
('3320052004', 'Bawu', 'Batealit', 'Jepara', 'Jawa Tengah'),
('3320052005', 'Mindahan', 'Batealit', 'Jepara', 'Jawa Tengah'),
('3320052006', 'Somosari', 'Batealit', 'Jepara', 'Jawa Tengah'),
('3320052007', 'Batealit', 'Batealit', 'Jepara', 'Jawa Tengah'),
('3320052008', 'Bringin', 'Batealit', 'Jepara', 'Jawa Tengah'),
('3320052009', 'Bantrung', 'Batealit', 'Jepara', 'Jawa Tengah'),
('3320052010', 'Pekalongan', 'Batealit', 'Jepara', 'Jawa Tengah'),
('3320052011', 'Mindahan Kidul', 'Batealit', 'Jepara', 'Jawa Tengah'),
('3320061001', 'Karangkebagusan', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320061002', 'Demaan', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320061003', 'Potroyudan', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320061004', 'Bapangan', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320061005', 'Saripan', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320061006', 'Panggang', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320061007', 'Kauman', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320061008', 'Bulu', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320061009', 'Jobokuto', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320061010', 'Ujungbatu', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320061011', 'Pengkol', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320062012', 'Mulyoharjo', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320062013', 'Wonorejo', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320062014', 'Kedungcino', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320062015', 'Kuwasen', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320062016', 'Bandengan', 'Jepara', 'Jepara', 'Jawa Tengah'),
('3320072001', 'Mororejo', 'Mlonggo', 'Jepara', 'Jawa Tengah'),
('3320072009', 'Suwawal', 'Mlonggo', 'Jepara', 'Jawa Tengah'),
('3320072010', 'Sinanggul', 'Mlonggo', 'Jepara', 'Jawa Tengah'),
('3320072011', 'Jambu', 'Mlonggo', 'Jepara', 'Jawa Tengah'),
('3320072012', 'Srobyong', 'Mlonggo', 'Jepara', 'Jawa Tengah'),
('3320072013', 'Sekuro', 'Mlonggo', 'Jepara', 'Jawa Tengah'),
('3320072014', 'Karanggondang', 'Mlonggo', 'Jepara', 'Jawa Tengah'),
('3320072015', 'Jambu Timur', 'Mlonggo', 'Jepara', 'Jawa Tengah'),
('3320082001', 'Guyangan', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320082002', 'Kepuk', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320082003', 'Papasan', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320082004', 'Srikandang', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320082005', 'Tengguli', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320082006', 'Bangsri', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320082007', 'Banjaran', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320082008', 'Wedelan', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320082009', 'Kedungleper', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320082010', 'Jerukwangi', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320082011', 'Bondo', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320082012', 'Banjaragung', 'Bangsri', 'Jepara', 'Jawa Tengah'),
('3320092001', 'Tempur', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320092002', 'Damarwulan', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320092003', 'Kunir', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320092004', 'Watuaji', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320092005', 'Klepu', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320092006', 'Tunahan', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320092007', 'Kaligarang', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320092008', 'Keling', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320092009', 'Gelang', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320092010', 'Jlegong', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320092011', 'Kelet', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320092020', 'Bumiharjo', 'Keling', 'Jepara', 'Jawa Tengah'),
('3320102001', 'Karimun Jawa', 'Karimun Jawa', 'Jepara', 'Jawa Tengah'),
('3320102002', 'Kemujan', 'Karimun Jawa', 'Jepara', 'Jawa Tengah'),
('3320102003', 'Parang', 'Karimun Jawa', 'Jepara', 'Jawa Tengah'),
('3320102004', 'Nyamuk', 'Karimun Jawa', 'Jepara', 'Jawa Tengah'),
('3320112001', 'Ngabul', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112002', 'Langon', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112003', 'Sukodono', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112004', 'Petekeyan', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112005', 'Mangunan', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112006', 'Platar', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112007', 'Semat', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112008', 'Teluk Awur', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112009', 'Demangan', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112010', 'Tegalsambi', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112011', 'Mantingan', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112012', 'Tahunan', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112013', 'Kecapi', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112014', 'Senenan', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320112015', 'Krapyak', 'Tahunan', 'Jepara', 'Jawa Tengah'),
('3320122001', 'Blimbingrejo', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122002', 'Tunggul Pandean', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122003', 'Pringtulis', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122004', 'Jatisari', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122005', 'Gemiring Kidul', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122006', 'Gemiring Lor', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122007', 'Nalumsari', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122008', 'Tritis', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122009', 'Daren', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122010', 'Karangnongko', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122011', 'Ngetuk', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122012', 'Bendanpete', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122013', 'Muryolobo', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122014', 'Bategede', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320122015', 'Dorang', 'Nalumsari', 'Jepara', 'Jawa Tengah'),
('3320132001', 'Batukali', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320132002', 'Bandungrejo', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320132003', 'Banyuputih', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320132004', 'Pendosawalan', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320132005', 'Damarjati', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320132006', 'Purwogondo', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320132007', 'Margoyoso', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320132008', 'Sendang', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320132009', 'Kriyan', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320132010', 'Robayan', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320132011', 'Bakalan', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320132012', 'Manyargading', 'Kalinyamatan', 'Jepara', 'Jawa Tengah'),
('3320142001', 'Dudakawu', 'Kembang', 'Jepara', 'Jawa Tengah'),
('3320142002', 'Sumanding', 'Kembang', 'Jepara', 'Jawa Tengah'),
('3320142003', 'Bucu', 'Kembang', 'Jepara', 'Jawa Tengah'),
('3320142004', 'Cepogo', 'Kembang', 'Jepara', 'Jawa Tengah'),
('3320142005', 'Pendem', 'Kembang', 'Jepara', 'Jawa Tengah'),
('3320142006', 'Jinggotan', 'Kembang', 'Jepara', 'Jawa Tengah'),
('3320142007', 'Dermolo', 'Kembang', 'Jepara', 'Jawa Tengah'),
('3320142008', 'Kaliaman', 'Kembang', 'Jepara', 'Jawa Tengah'),
('3320142009', 'Tubanan', 'Kembang', 'Jepara', 'Jawa Tengah'),
('3320142010', 'Balong', 'Kembang', 'Jepara', 'Jawa Tengah'),
('3320142011', 'Kancilan', 'Kembang', 'Jepara', 'Jawa Tengah'),
('3320152001', 'Lebak', 'Pakis aji', 'Jepara', 'Jawa Tengah'),
('3320152002', 'Bulungan', 'Pakis aji', 'Jepara', 'Jawa Tengah'),
('3320152003', 'Suwawal Timur', 'Pakis aji', 'Jepara', 'Jawa Tengah'),
('3320152004', 'Kawak', 'Pakis aji', 'Jepara', 'Jawa Tengah'),
('3320152005', 'Tanjung', 'Pakis aji', 'Jepara', 'Jawa Tengah'),
('3320152006', 'Plajan', 'Pakis aji', 'Jepara', 'Jawa Tengah'),
('3320152007', 'Slagi', 'Pakis aji', 'Jepara', 'Jawa Tengah'),
('3320152008', 'Mambak', 'Pakis aji', 'Jepara', 'Jawa Tengah'),
('3320162001', 'Sumberrejo', 'Donorojo', 'Jepara', 'Jawa Tengah'),
('3320162002', 'Clering', 'Donorojo', 'Jepara', 'Jawa Tengah'),
('3320162003', 'Ujung Watu', 'Donorojo', 'Jepara', 'Jawa Tengah'),
('3320162004', 'Banyumanis', 'Donorojo', 'Jepara', 'Jawa Tengah'),
('3320162005', 'Tulakan', 'Donorojo', 'Jepara', 'Jawa Tengah'),
('3320162006', 'Bandungharjo', 'Donorojo', 'Jepara', 'Jawa Tengah'),
('3320162007', 'Blingoh', 'Donorojo', 'Jepara', 'Jawa Tengah'),
('3320162008', 'Jugo', 'Donorojo', 'Jepara', 'Jawa Tengah');

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
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`kode_berkas`);

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`kode_bidang`);

--
-- Indexes for table `tb_subbidang`
--
ALTER TABLE `tb_subbidang`
  ADD PRIMARY KEY (`kode_subbidang`);

--
-- Indexes for table `tb_wilayah`
--
ALTER TABLE `tb_wilayah`
  ADD PRIMARY KEY (`kode_wilayah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
