-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2025 at 04:30 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compeny_profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_logo` text NOT NULL,
  `school_banner` varchar(200) NOT NULL,
  `school_video` varchar(255) DEFAULT NULL,
  `school_tagline` varchar(255) NOT NULL,
  `school_description` text NOT NULL,
  `since` date NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `school_name`, `school_logo`, `school_banner`, `school_video`, `school_tagline`, `school_description`, `since`, `alamat`) VALUES
(8, 'SMKN 3 BANJAR  ', '68a81ef995ea2_logo.png', '68ad19f288006_banner.png', '6929b03949d9f_video.mp4', ' SMK NEGERI 3 BANJAR? BERSAMA KITA BISA!!', 'SMK Negeri 3 Banjar merupakan sekolah kejuruan yang memiliki enam jurusan dan berbagai macam laboratorium untuk praktik.', '2008-06-01', 'Jl. Julaeni, RT/RW 5/2, Dsn. Langensari, Kel. Langensari, Kec. Langensari, Kota Banjar, Jawa Barat 46341');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `image`, `title`, `description`) VALUES
(10, '1756042334.png', 'Juara 1 seni tari pada lomba FL3SN', 'Seorang siswa smkn 3 banjar berhasil menjuarai seni tari yang diraih oleh ananda :  ▪︎ Nur\'aeni Jagadhita & Karina Eka Nasifa - Juara 1 Lomba Seni Tari  Pada Lomba FL3SN Tingkat Kota Banjar Tahun 2025.'),
(12, '1756178596.png', 'Juara 1 Lomba Monolog', 'Selamat atas prestasi yang diraih oleh ananda : ▪︎ Rifa Nur Rahma - Juara 1 Lomba Monolog Pada Lomba FL3SN Tingkat Kota Banjar Tahun 2025'),
(13, '1756178665.png', 'Juara 1 Lomba Kriya', 'Selamat atas prestasi yang diraih oleh ananda :  ▪︎ Azril Maulana - Juara 1 Lomba Kriya  Pada Lomba FL3SN Tingkat Kota Banjar Tahun 2025'),
(14, '1756182310.png', 'Juara 1 Pencak Silat Lomba 02SN', 'Selamat atas prestasi yang diraih oleh ananda :  Aldi Ardiansyah - Juara 1  Pada Lomba 02SN Tingkat Kota Banjar Cabang Olahraga Silat'),
(15, '1756182368.png', 'Juara 2 Pencak Silat Lomba 02SN', 'Selamat atas prestasi yang diraih oleh ananda : Jesika Oktaviani - Juara 2 Pada Lomba 02SN Tingkat Kota Banjar Cabang Olahraga Silat'),
(16, '1756182513.png', 'Juara Pasanggiri Mojang Jajaka', 'Kami ucapkan selamat kepada ananda  1. Ikhsan Pendowo Sebagai Juara Pasanggiri Mojang Jajaka Remaja Kategori Jajaka Kamemeut'),
(17, '1756182627.png', 'Juara 3 Lomba menggambar Kategori SMA/MA/SMK', 'Selamat atas prestasi yang diraih oleh Sinta Dewi Anggraeni (X APAT 3) pada ajang Lomba Online Tingkat Nasional'),
(18, '1756182691.png', 'Juara 1 Olimpiade', 'Selamat atas prestasi yang di raih oleh Aprizal Pratama  Sebagai juara 1 Olimpiade di Universitas Galuh Ciamis'),
(19, '1756182783.png', 'Juara 2 Lomba cepat tepat akutansi', 'Selamat atas prestasi yang di raih oleh  1. Neng Riska Amelia (XII AKL 3) 2. Mahesa Dwi Andika (XII AKL 2) 3. Reva Rukmawati (XI AKL 1)  Sebagai juara 2 Lomba Cepat Tepat Akuntansi (LCTA) di Universitas Galuh Ciamis'),
(20, '1756182997.png', 'Juara 3 MTQ Pentas PAI', 'Selamat dan sukses kepada Indri Lestari siswi SMKN 3 Banjar kelas X PPLG 1 atas prestasinya meraih Juara III MTQ Pentas PAI Tingkat SMA/SMK Kota Banjar.');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint NOT NULL,
  `announcements_title` varchar(255) NOT NULL,
  `announcements_image` text NOT NULL,
  `announcements_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcements_title`, `announcements_image`, `announcements_description`) VALUES
(7, 'MOPK DAY 2', '1756183554.png', 'Masa Orientasi Pendidikan Kepramukaan (MOPK) SMKN 3 Banjar 2025/2026'),
(10, 'MPLS 18 juli 2025', '68af1c3b9550d_logo.png', 'Masa Pengenalan Lingkungan Sekolah (MPLS) SMK Negeri 3 Banjar 18 juli 2025'),
(12, 'Pengambilan ijasah', '1756306655.png', 'PENGUMUMAN‼️  Jadwal Pengambilan Ijasah');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `title`, `content`) VALUES
(14, '1756345910.png', 'Penerapan Jam Malam Bagi Peserta Didik‼️', 'Pa dedi mulyadi melarang para siswa/siswi keluar malam malam diatas jam9 malam '),
(15, '1756345993.png', 'Rapat Wali Murid Kelas X', 'Rapat Wali Murid Kelas X Jumat, 18 Juli 2025'),
(16, '1756346055.png', 'Job Fair', 'dalam rangka Hari Kemerdekaan Indonesia ke - 80\n\nUntuk para Alumni segera merapat ke Polres Kota Banjar dan siapkan berkas lamaran kerja kalian 🔥');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `img` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `link_url` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `link_map` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `img`, `contact`, `link_url`, `email`, `link_map`) VALUES
(7, '1756280627.png', '(0265)2734141', 'https://smkn3banjar.sch.id/', 'smkn3banjar@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.020746420615!2d108.63262127404242!3d-7.351566372325486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f7d197699ecd7%3A0x420255777005d790!2sSMK%20Negeri%203%20Banjar!5e0!3m2!1sid!2sid!4v1756304628897!5m2!1sid!2sid');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `title`) VALUES
(11, '1756192675.png', 'Kunjungan Industri Jurusan TKRO ke Balai Yasa PT. KAI dan PT. FUTAKE INDONESIA 2023'),
(12, '1756192690.png', 'Kunjungan Industri Jurusan TBSM ke BLPT Jogjakarta 2023'),
(13, '1756192705.png', 'Kunjungan Industri Jurusan APAT ke BPTPB Jogjakarta'),
(14, '1756192718.png', 'Workshop Implementasi Kurikulum dan Kunjungan Industri 2023'),
(15, '1756192735.png', 'Foto Bersama Visitasi Akreditasi SMK Negeri 3 Banjar'),
(16, '1756192752.png', 'Akreditasi SMK Negeri 3 Banjar');

-- --------------------------------------------------------

--
-- Table structure for table `headmasters`
--

CREATE TABLE `headmasters` (
  `id` bigint NOT NULL,
  `headmaster_name` varchar(255) NOT NULL,
  `headmaster_photo` text NOT NULL,
  `headmaster_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `headmasters`
--

INSERT INTO `headmasters` (`id`, `headmaster_name`, `headmaster_photo`, `headmaster_description`) VALUES
(7, 'Bapak Rusdiharto, S.P.d', '1756179477.png', 'Alhamdulillahi robbil alamin kami panjatkan kehadlirat Allah SWT, bahwasannya dengan rahmat dan karunia-Nya lah akhirnya Website sekolah ini dengan alamat <a href=\"https://smkn3banjar.sch.id/\" target=\"_blank\" >https://smkn3banjar.sch.id/</a>  ini dapat kami perbaharui. Kami mengucapkan selamat datang di Website kami Sekolah Menengah Kejuruan Negeri 3 banjar yang saya tujukan untuk seluruh unsur pimpinan, guru, karyawan dan siswa serta khalayak umum guna dapat mengakses seluruh informasi tentang segala profil, aktifitas/kegiatan serta fasilitas sekolah kami. Kami selaku pimpinan sekolah mengucapkan terima kasih kepada tim pembuat Website ini yang telah berusaha untuk dapat lebih memperkenalkan segala perihal yang dimiliki oleh sekolah. Dan tentunya Website sekolah kami masih terdapat banyak kekurangan, oleh karena itu kepada seluruh civitas akademika dan masyarakat umum dapat memberikan saran dan kritik yang membangun demi kemajuan Website ini lebih lanjut. Saya berharap Website ini dapat dijadikan wahana interaksi yang positif baik antar civitas akademika maupun masyarakat pada umumnya sehingga dapat menjalin silaturahmi yang erat disegala unsur. Mari kita bekerja dan berkarya dengan mengharap ridho sang Kuasa dan keikhlasan yang tulus dijiwa demi anak bangsa. Terima kasih semoga Allah ‘Azza Wa Jalla menyertai doa kita semua……amin.');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` bigint NOT NULL,
  `majors_name` varchar(255) NOT NULL,
  `majors_image` text NOT NULL,
  `majors_description` text NOT NULL,
  `head` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `majors_name`, `majors_image`, `majors_description`, `head`) VALUES
(11, 'PPLG(Pengembangan Perangakt Lunak dan GIM )', '1756266105.png', 'Pengembangan Perangakt Lunak dan GIM\r\nPPLG adalah singkatan dari Pengembangan Perangakt Lunak dan GIM dan merupakan sebuah jurusan yang ada di Sekolah Menengah Kejuruan (SMK). PPLG adalah sebuah jurusan yang mempelajari dan mendalami semua cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas. Bukan hanya itu, PPLG juga berkaitan dengan software komputer mulai dari pembuatan website, aplikasi, game dan semua yang berkaitan dengan pemrograman dengan menguasai bahasa pemrograman tersebut. Intinya PPLG tidak akan jauh-jauh dari tiga hal yaitu Coding, Desain dan Algoritma yang akan menjadi kunci keberhasilan rekayasa perangkat', 'Yasrifan Mahzar Nurisa, S.Kom.'),
(12, 'APHP(Agribisnis Pengolahan Hasil Pertanian )', '1756266151.png', 'Agribisnis Pengolahan Hasil Pertanian\r\nAgribisnis Pengolahan Hasil Pertanian atau biasa disingkat dengan APHP merupakan kompetensi keahlian yang mempelajari bagaimana pengolahan hasil tani hingga menjadi suatu produk yang memiliki nilai jual tinggi, termasuk bagaimana penjualan produk tersebut. Di Indonesia, kompetensi ini sebenarnya sangat di perlukan. Pasalnya, di Indonesia merupakan salah satu Negara Agraris yang akan akan potensi hasil pertanian', 'Dwi Astuti, ST'),
(13, 'TBSM(Teknik Bisnis Sepeda Motor)', '1756266207.png', 'Teknik Bisnis Sepeda Motor\r\nTeknik dan Bisnis Sepeda Motor adalah kompetensi keahlian pada Bidang Studi Keahlian Teknologi dan Rekayasa Program Studi Keahlian Teknik Otomotif yang menekankan pada keterampilan pelayanan jasa mekanik kendaraan sepeda motor roda dua. Kompetensi Keahlian Teknik dan Bisnis Sepeda Motor menyiapkan peserta didik untuk bekerja pada bidang pekerjaan yang dikelola oleh badan, instansi atau perusahaan maupun pribadi (wirausaha).', ' Wagino, S.Pd'),
(14, 'TKRO(Teknik Kendaraan Ringan Otomotif)', '1756266250.png', 'Teknik Kendaraan Ringan Otomotif\r\nTeknik Kendaraan Ringan Otomotif (TKRO) merupakan kompetensi keahlian pada rumpun program keahlian teknik otomotif. Beberapa tahun lalu mungkin kita familiar dan mengenal jurusan ini dengan Teknik Otomotif. Jadi Jurusan ini memfokuskan peserta didiknya dalam bidang otomotif khususnya mobil baik niaga maupun penumpang. Siswa akan dibekali keterampilan seperti melakukan perawatan dan perbaikan komponen mobil sampai dengan perbaikan mobil sesuai dengan standar yang ditetapkan.', 'Danu Sujiwa, ST'),
(15, 'AKL(Akuntansi dan Keuangan Lembaga)', '1756266290.png', 'Akuntansi dan Keuangan Lembaga\r\nProgram Keahlian Akuntansi dan Keuangan Lembaga secara umum memberikan keterampilan kepada peserta didik untuk mengelola dan melakukan pencatatan keuangan secara manual maupun komputerisasi, dan membekali peserta dengan keterampilan akuntansi, mengelola transaksi keuangan, pajak dan membentuk siswa yang bersikap mandiri dan berkarakter sehingga lulusannya dapat menjadi staff accounting yang handal', ' Diki Zaitun, M.Pd.'),
(16, 'APAT(Agribisnis Perikanan Air Tawar)', '1756266335.png', 'Agribisnis Perikanan Air Tawar\r\nAgribisnis Perikanan Air Tawar atau sering juga disebut dengan APAT adalah jurusan yang mempelajari proses pemeliharaan dan pengelolaan ikan air tawar untuk kepentingan usaha. Mata pelajaran yang diberikan antara lain Dasar-dasar budidaya perikanan, Teknik pengembangbiakan komoditas Perikanan Air Tawar, serta hasil perikanan dan kewirausahaan', 'Wahyudin Abdul Hadi, STP');

-- --------------------------------------------------------

--
-- Table structure for table `majors_slider`
--

CREATE TABLE `majors_slider` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` bigint NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`, `telepon`, `created_at`) VALUES
(7, 'inka', 'sybrogaming@gmail.com', 'rshges', '081511535109', '2025-09-01 15:03:24'),
(10, 'ciput', 'ciput@gmail.com', 'dimas lapar buk', '081511535109', '2025-09-04 01:44:30'),
(11, 'kkkfdjnfjk', 'pesfkj@ges', 'ebfkae', '0i8458394340', '2025-09-04 01:46:01'),
(12, 'sad', 'q@gmail.com', 'kakakaka', '081511535109', '2025-09-04 02:32:07'),
(13, 'admin', 'putraciput054@gmail.com', 'aefhtjk', '081511535109', '2025-11-25 02:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `qna`
--

CREATE TABLE `qna` (
  `id` bigint NOT NULL,
  `tanya` varchar(255) NOT NULL,
  `jawab` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `qna`
--

INSERT INTO `qna` (`id`, `tanya`, `jawab`) VALUES
(1, 'Apa tujuan dibuatnya website sekolah ini?', 'Website sekolah ini dibuat untuk memudahkan siswa, guru, dan orang tua dalam mengakses informasi terbaru tentang kegiatan sekolah, pengumuman, jadwal, dan layanan akademik.'),
(2, 'Apa saja informasi yang bisa saya temukan di website sekolah ini?', 'Di website ini tersedia informasi profil sekolah, visi dan misi, data guru, ekstrakurikuler, jadwal kegiatan, berita terbaru, serta pengumuman penting.'),
(3, 'Apakah ada fitur galeri atau dokumentasi kegiatan sekolah?', 'Ada, semua dokumentasi kegiatan sekolah baik berupa foto maupun video dapat dilihat di menu Galeri.'),
(5, 'Bagaimana cara menghubungi pihak sekolah melalui website ini?', ' Orang tua atau pengunjung bisa menghubungi pihak sekolah melalui menu Kontak yang menyediakan alamat, nomor telepon, email, dan form pesan langsung.'),
(6, '. Apakah website ini bisa diakses lewat HP? ', 'Tentu, website sekolah ini sudah responsive sehingga bisa dibuka dengan baik melalui laptop, tablet, maupun smartphone.'),
(7, 'Bagaimana cara mendapatkan pengumuman terbaru dari sekolah? ', 'Pengumuman terbaru bisa dilihat langsung di halaman utama website atau di menu Pengumuman, di about');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint NOT NULL,
  `icon` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `icon`, `title`, `link_url`) VALUES
(9, 'bi bi-instagram', 'SocialMedia Smkn 3 Banjar', 'https://www.instagram.com/smkn3banjar/'),
(10, 'bi bi-facebook', 'facebook', 'https://www.facebook.com/groups/264967953519756?locale=id_ID'),
(11, 'bi bi-youtube', 'youtube smk', 'https://www.youtube.com/@smkn3banjar795'),
(12, 'bi bi-tiktok', 'tiktok smk', 'https://www.tiktok.com/@mitek.smkn3bjr');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint NOT NULL,
  `teachers_name` varchar(255) NOT NULL,
  `teachers_photo` text NOT NULL,
  `teachers_major` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teachers_name`, `teachers_photo`, `teachers_major`, `gender`) VALUES
(16, 'Wahyudin Abdul Hadi, STP', '1756215081.png', 'Ketua Jurusan APAT ', 'Laki-laki'),
(17, 'Danu Sujiwa, ST', '1756257894.png', 'Teknik Kendaraan Ringan Otomotif (TKRO) ', 'Laki-laki'),
(18, 'Wagino, S.Pd', '1756258101.png', 'Teknik dan Bisnis Sepeda Motor Atau disingkat TBSM', 'Laki-laki'),
(19, 'Apri Nurardiansyah, S.Pd', '1756259899.png', 'Ketua Organisasi Osis', 'Laki-laki'),
(20, 'Azka Dalila Nurlimatin, S.Pd', '1756259978.png', 'yang mengajar bahasa jepang', 'Perempuan'),
(21, 'Arif Rahman Hakim, S.Pd', '1756260700.png', 'Guru B.inggris', 'Laki-laki'),
(22, 'Budianto, S.Pd', '1756260749.png', 'Mengajar PKK', 'Laki-laki'),
(23, 'Budianto, S.Pd', '1756260782.png', 'Mengajar MTK', 'Laki-laki'),
(24, 'Fitriana Laela, S.Pd.', '1756260845.png', 'Mengajar SEJARAH', 'Perempuan'),
(25, 'Gema Patimah, S.Pd', '1756260903.png', 'Mengajar MTK ', 'Perempuan'),
(26, 'Maman Suparman, ST', '1756261152.png', 'Mengajar Web ', 'Laki-laki'),
(27, 'Siti Maryam, S.Pd.', '1756261250.png', 'Guru BK', 'Perempuan'),
(28, 'Wahyu Suryaman, SE.,ST', '1756261302.png', 'Mengajar PPL', 'Laki-laki'),
(29, 'Yusep Yanuar Sanjaya, S.Pd', '1756261372.png', 'Mengajar B.inggris\r\n', 'Laki-laki'),
(30, 'Yasrifan Mahzar Nurisa, S.Kom.', '1756307232.png', 'Ketua jurusan PPLG', 'Laki-laki'),
(34, 'Dewi Rahmat Agustini, S.Pd', '1756949979.png', 'Mengajar PPKN', 'Perempuan'),
(35, 'Tatik Widiyati, S.Si', '1756950051.png', 'Mengajar Pelajaran IPAS', 'Perempuan'),
(36, 'Dian Dachniar, SH', '1756950141.png', 'Mengajar PPKN', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rating` tinyint(1) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `status`, `message`, `rating`) VALUES
(27, '1756109263.png', 'Rizky Hidayat', 'Karyawan', 'Setelah saya lulus, saya langsung bisa bekerja di perusahaan besar berkat keterampilan dan pengalaman yang saya pelajari di sekolah ini. Kurikulumnya sesuai dengan kebutuhan kerja dan industri, ditambah lagi ada banyak pelatihan yang mendukung kami agar siap bersaing  di dunia kerja', 4),
(28, '1756197123.png', ' Rusdiharto, S.P.d ', 'Kepala Sekolah', 'Sekolah ini punya suasana belajar yang nyaman. Saya senang karena guru-gurunya sangat sabar dan tidak pernah bosan menjelaskan pelajaran sampai kami benar-benar paham. Selain itu, kegiatan di luar kelas juga seru,  hingga lomba-lomba yang bikin pengalaman sekolah jadi lebih berwarna.', 5),
(29, '1756197144.png', 'Hendra Wijaya', 'Supervisor', 'Saya sangat bangga pernah menjadi bagian dari sekolah ini. Banyak hal yang saya pelajari di luar pelajaran akademik, seperti kepemimpinan, manajemen waktu, dan kerja sama tim. Semua pengalaman itu sekarang sangat berguna dalam pekerjaan saya sebagai supervisor di sebuah perusahaan swasta.', 4),
(30, '1756197170.png', 'Budi Sentosa', 'CEO Laguna shanghai', 'Belajar di sekolah ini membuat saya jauh lebih percaya diri. Awalnya saya orangnya pemalu, tapi dengan berbagai kegiatan ekstrakurikuler dan bimbingan dari guru, saya jadi berani berbicara di depan umum dan bahkan dipercaya sebagai ketua OSIS. Pengalaman ini menurut saya tidak ternilai harganya,.', 4),
(31, '1756197191.png', 'Ahmad Toeng', 'Manajer Group Laguna', 'Saya tidak hanya belajar teori di sini, tapi juga banyak praktek yang langsung bisa diterapkan. Misalnya, saya ikut program magang yang difasilitasi sekolah, dan pengalaman itu sangat membantu ketika masuk dunia kerja. Sekolah ini benar-benar mempersiapkan siswanya untuk masa depan.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(10, 'admin', 'admin@gmail.com', '$2y$10$DgH/jkD8fKSzulqcWGW1O.ZYwWPF6y0RK9rO0LQwCwDtKLYZXK0Qy', NULL, NULL, NULL, '2025-09-08 02:57:37', 'admin'),
(11, 'staff', 'staff@gmail.com', '$2y$10$8ERT5TTVy5NZhBtKAKZOQ.gWn8V2Sky.j2Y5E4Nmhtemr2uPo2bzW', NULL, NULL, NULL, '2025-09-08 02:57:32', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `activity` varchar(50) NOT NULL,
  `description` text,
  `activity_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `activity`, `description`, `activity_time`) VALUES
(152, 10, 'update', 'Mengedit data About ID 8: SMKN 3 BANJAR  ', '2025-09-10 07:07:11'),
(153, 10, 'create', 'Menambahkan data Prestasi:', '2025-09-10 08:07:08'),
(154, 10, 'update', 'Mengedit data Prestasi ID 28:', '2025-09-10 08:07:16'),
(155, 10, 'delete', 'Menghapus data Prestasi ID 28', '2025-09-10 08:07:26'),
(156, 10, 'create', 'Menambahkan data Kepala Sekolah:', '2025-09-10 08:07:41'),
(157, 10, 'update', 'Mengedit data Kepala Sekolah ID 10:', '2025-09-10 08:07:48'),
(158, 10, 'delete', 'Menghapus data Kepala Sekolah ID 10', '2025-09-10 08:07:51'),
(159, 10, 'login', NULL, '2025-09-11 07:16:36'),
(160, 10, 'login', NULL, '2025-09-12 02:25:02'),
(161, 10, 'login', NULL, '2025-09-13 14:15:55'),
(167, 10, 'login', NULL, '2025-09-21 11:02:51'),
(168, 10, 'login', NULL, '2025-09-22 04:25:42'),
(169, 10, 'login', NULL, '2025-09-29 02:27:44'),
(170, 10, 'login', NULL, '2025-10-06 02:29:10'),
(171, 10, 'logout', NULL, '2025-10-06 02:29:39'),
(172, 11, 'login', NULL, '2025-10-06 02:29:46'),
(173, 11, 'logout', NULL, '2025-10-06 02:30:12'),
(174, 10, 'login', NULL, '2025-10-06 02:30:20'),
(175, 10, 'login', NULL, '2025-10-06 02:53:39'),
(176, 10, 'login', NULL, '2025-11-24 13:03:23'),
(177, 10, 'login', NULL, '2025-11-25 02:12:22'),
(178, 10, 'logout', NULL, '2025-11-25 02:39:15'),
(179, 10, 'login', NULL, '2025-11-25 02:42:50'),
(180, 10, 'login', NULL, '2025-11-25 07:59:34'),
(181, 10, 'login', NULL, '2025-11-28 14:22:34'),
(182, 10, 'update', 'Mengedit data About ID 8: SMKN 3 BANJAR  ', '2025-11-28 14:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `visi_missions`
--

CREATE TABLE `visi_missions` (
  `id` bigint NOT NULL,
  `category` enum('visi','misi') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visi_missions`
--

INSERT INTO `visi_missions` (`id`, `category`, `text`) VALUES
(25, 'visi', 'MENGHASILKAN LULUSAN YANG KOMPETITIF DAN BERAKHLAK MULIA'),
(26, 'misi', 'MENINGKATKAN PROFESIONALITAS GURU DAN TENAGA KEPENDIDIKAN\r\nMENANAMKAN SOFT SKILLS DAN HARD SKILLS PADA PESERTA DIDIK\r\nMENYEDIAKAN FASILITAS PEMBELAJARAN YANG REPRESENTATIF MELALUI PROGRAM REVITALISASI SMK\r\nMENCIPTAKAN LINGKUNGAN YANG SEHAT, AMAN, RINDANG, DAN INDAH\r\nMENJALIN KERJASAMA YANG OPTIMAL DENGAN INDUSTRI DAN DUNIA KERJA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headmasters`
--
ALTER TABLE `headmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors_slider`
--
ALTER TABLE `majors_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `visi_missions`
--
ALTER TABLE `visi_missions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `headmasters`
--
ALTER TABLE `headmasters`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `majors_slider`
--
ALTER TABLE `majors_slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `qna`
--
ALTER TABLE `qna`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `visi_missions`
--
ALTER TABLE `visi_missions`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD CONSTRAINT `user_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
