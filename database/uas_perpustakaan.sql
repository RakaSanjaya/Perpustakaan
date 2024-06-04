-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2024 pada 02.40
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(40) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `halaman` int(11) NOT NULL,
  `sinopsis` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `kategori`, `pengarang`, `penerbit`, `tahun_terbit`, `halaman`, `sinopsis`, `image`) VALUES
('Bisnis-01', 'Bussiness is Fun', 'Bisnis', 'Coach Yohannes G Pauly', 'Rejove', '2016-11-10', 900, '7 strategi untuk membangun bisnis anda', '664ef970dac59.png'),
('Bisnis-02', 'Marketing 5.0 Teknologi untuk Kemanusiaan', 'Bisnis', 'Philip Kotler, Hermawan Kartajaya, Iwan Setiawan', 'Gramedia Pustaka Utama', '2022-07-09', 256, 'Buku ini mengacu pada pemanfaatan teknologi untuk kepentingan manusia atau kemanusiaan. Intinya, kalau bisnis ingin maju dan bisa mendapatkan outcome yang optimal, bisnis tersebut harus bisa mengkombinasikan dua kekuatan, yakni kekuatan human dan ditopang oleh teknologi seperti mesin dengan artificial intelligence (AI) di baliknya. Ini yang disebut sebagai the bionics.', '66568d9861c27.png'),
('Filsafat-1', 'Filosofi Teras', 'Filsafat', 'Henry Manampiring ', 'Kompas', '2018-11-26', 320, 'Filosofi Teras adalah sebuah buku pengantar filsafat Stoa yang dibuat khusus sebagai panduan moral anak muda. Buku ini ditulis untuk menjawab permasalahan tentang tingkat kekhawatiran yang cukup tinggi dalam skala nasional, terutama yang dialami oleh anak muda.', '6655254c6187e.png'),
('Filsafat-2', 'Sejarah dunia yang disembunyikan ', 'Filsafat', 'Jonathan Black ', '-', '2007-10-11', 633, 'Banyak orang mengatakan bahwa sejarah ditulis oleh para pemenang. Hal ini sama sekali tak mengejutkan alias wajar belaka. Tetapi, bagaimana jika sejarahâ€”atau apa yang kita ketahui sebagai sejarahâ€”ditulis oleh orang yang salah? ', '665525cfb0b54.png'),
('Informatika-01', 'Kursus Mandiri Python', 'Informatika', 'Budi Raharjo', 'Informatika', '2022-05-10', 550, 'Belajar pemrogramman python dengan 5 tahapan yaitu : \r\n1. Dasar dasar python\r\n2. PBO(OOP)\r\n3. Eksplorasi Pustaka\r\n4. SQL & MySql\r\n5. Pemrogramman GUI', '664ef8c823bcc.png'),
('novel-09', 'Surat Kecil Untuk Tuhan', 'Novel', 'Agnes Danovar', 'Inandra Publised', '2018-11-10', 200, 'Surat kecil untuk Tuhan adalah sebuah buku yang diangkat dari kisah nyata perjuangan gadis remaja bernama Gita Sesa Wanda Cantika alias Keke melawan kanker ganas.', '665bc1855b210.png'),
('Novel-1', 'Cantik Itu Luka', 'Novel', 'Eka Kurniawan', 'Gramedia Pustaka Utama', '2018-01-18', 520, 'Novel ini memadukan unsur keluarga, romansa, dan politik yang menceritakan tentang kehidupan Dewi Ayu. Kisah dalam novel ini diawali oleh seorang perempouan yang bangkit dari kuburannya setelah dua puluh satu tahun kematiannya. Kisah kekasih yang lenyap ditelan kabut, hingga ada seorang ibu yang menginginkan bayi buruk rupa karena baginya kecantikan hanyalah sebuah luka.', '6655513cd9f80.png'),
('Novel-2', 'Laut Bercerita', 'Novel', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', '2017-12-21', 400, 'Laut Bercerita, novel terbaru Leila S. Chudori, bertutur tentang kisah keluarga yang kehilangan, sekumpulan sahabat yang merasakan kekosongan di dada, sekelompok orang yang gemar menyiksa dan lancar berkhianat, sejumlah keluarga yang mencari kejelasan makam anaknya, dan tentang cinta yang tak akan luntur.', '6655528ab456e.png'),
('Novel-3', 'Rongeng Dukuh Paruk', 'Novel', 'Ahmad Tohari', 'Gramedia Pustaka Utama', '2020-06-14', 412, 'Semangat Dukuh Paruk kembali menggeliat sejak Srintil dinobatkan menjadi ronggeng baru, menggantikan ronggeng terakhir yang mati dua belas tahun yang lalu. Bagi pedukuhan yang kecil, miskin, terpencil, dan bersahaja itu, ronggeng adalah perlambang. Tanpanya, dukuh itu merasa kehilangan jati diri. Dengan segera Srintil menjadi tokoh yang amat terkenal dan digandrungi. Cantik dan menggoda. Semua ingin pernah bersama ronggeng itu. Dari kaula biasa hingga pejabat-pejabat desa maupun kabupaten.\r\n', '6655543744024.png'),
('Novel-4', 'Laskar Pelangi', 'Novel', 'Andrea Hirata', 'Gramedia Pustaka Utama', '2020-02-02', 340, 'Laskar Pelangi mengisahkan tentang sebelas anak yang berasal dari keluarga miskin, di mana mereka harus selalu berjuang dalam menempuh pendidikannya di sekolah sederhana yang ada di desa Balitong. Novel ini menegaskan bahwa setiap orang berhak memiliki cita-cita dan impian, serta setiap orang pasti memiliki kesempatan untuk bisa mewujudkan impiannya.', '66555504e28e0.png'),
('Novel-5', 'Masih Ingatkah Kau Jalan Pulang', 'Novel', 'Sapardi Djoko Damono', 'Gramedia Pustaka Utama', '2020-02-16', 112, 'Tak ada jalan dan tak ada pulang\r\nKita di atap langit nun di bawah rata belaka\r\nSuatu saat biru di saat lain merah kesumba\r\n\r\nJadi, kau tidak ingat lagi\r\ntak percaya lagi akan jalan pulang?\r\n\r\nApakah pergi harus juga pulang?\r\nApakah pergi harus juga berpikir untuk pulang?\r\nApakah pulang hanya ada kalau kita pergi?\r\nApakah pulang dan pergi harus berpasangan?', '665688605284f.png'),
('Novel-6', 'Ibu Tercinta (Please Look after Mom)', 'Novel', 'Kyung Sook Shin', 'Gramedia Pustaka Utama', '2020-02-23', 296, 'Sepasang suami-istri berangkat ke kota untuk mengunjungi anak-anak mereka yang telah dewasa. Sang suami bergegas naik ke gerbong kereta bawah tanah dan mengira istrinya mengikuti di belakangnya. Setelah melewati beberapa stasiun, barulah dia menyadari bahwa istrinya tak ada. Istrinya tertinggal di Stasiun Seoul. Perempuan yang hilang itu tak kunjung ditemukan, dan keluarga yang kehilangan ibu/istri/ipar itu mesti mengatasi trauma akibat kejadian tersebut. Satu per satu mereka teringat hal-hal di masa lampau yang kini membuat mereka tersadar betapa pentingnya peran sang ibu bagi mereka; dan betapa sedikitnya mereka mengenal sosok sang ibu selama ini perasaan-perasaannya, harapan-harapannya, dan mimpi-mimpinya.', '6656896835504.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `kode_petugas` int(11) NOT NULL,
  `kode_siswa` int(11) NOT NULL,
  `kode_buku` varchar(40) NOT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(20) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
('jurusan1', 'Teknologi Informasi'),
('jurusan2', 'Desain Grafis'),
('jurusan3', 'Administrasi Bisnis'),
('jurusan4', 'Keuangan dan Perbankan'),
('jurusan5', 'Manajemen Perhotelan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode_petugas` int(11) NOT NULL,
  `kode_siswa` int(11) NOT NULL,
  `kode_jurusan` varchar(23) NOT NULL,
  `kode_buku` varchar(40) NOT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_tugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `no_telepon`, `password`, `id_tugas`) VALUES
(21220, 'Raka Sanjaya', '087389123208', '1234', 1),
(21221, 'Ramdhan Hidayat', '089283273847', '1234', 2),
(21222, 'Adinda Putri', '087389343538', '1234', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `kelas`, `jurusan`, `kelamin`, `telepon`, `password`) VALUES
(2331410, 'Raka Sanjaya', 'XI', 'jurusan1', 'pria', '0832023321', '$2y$10$TiDuy5OnDd.nHXeMfXnyuu1QZzxiCoY7MJlReq8uGy8/p8x1v23GW'),
(2331415, 'Angger Abed Nego', 'XI', 'jurusan1', 'pria', '089207364819', '$2y$10$kmIIVJfxEWmJQJr8kYVkp.bsSii1a6lerIhfYI9n.i.g52QARiw6e');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `kode_petugas` (`kode_petugas`),
  ADD KEY `kode_buku` (`kode_buku`),
  ADD KEY `kode_siswa` (`kode_siswa`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `kode_petugas` (`kode_petugas`),
  ADD KEY `kode_buku` (`kode_buku`),
  ADD KEY `kode_siswa` (`kode_siswa`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `jurusan` (`jurusan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21223;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nisn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2331416;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`kode_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`kode_siswa`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `peminjaman_ibfk_4` FOREIGN KEY (`kode_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `peminjaman_ibfk_5` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_6` FOREIGN KEY (`kode_siswa`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `peminjaman_ibfk_7` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
