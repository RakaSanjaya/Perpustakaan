<?php
session_start();
$title = "Daftar Peminjaman Buku";
require_once "../../layouts/header.php";

if (!isset($_SESSION['adminLogin'])) {
    echo "<script>
    alert('Anda harus login admin terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}

$detail_peminjaman = select("SELECT * FROM `peminjaman` INNER JOIN `buku` ON peminjaman.kode_buku = buku.id_buku INNER JOIN `petugas` ON peminjaman.kode_petugas = petugas.id_petugas INNER JOIN `siswa` ON peminjaman.kode_siswa = siswa.nisn INNER JOIN `jurusan` ON peminjaman.kode_jurusan = jurusan.id_jurusan")[0];
?>

<section>
    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar.php" ?></div>
        <div class="w-75 mx-5 my-4">
            <h1 class="fw-bold fs-3">Detail Peminjaman</h1>
            <hr>
            <table class="table table-border table table-striped">
                <tr>
                    <th class="table-head w-25">Nama Mahasiswa</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['nama']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">NISN</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['nisn']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Jurusan</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['nama_jurusan']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Petugas</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['nama_petugas']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Judul Buku</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['judul']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Kategori</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['kategori']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Pengarang</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['pengarang']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Penerbit</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['penerbit']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Tahun Terbit</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['tahun_terbit']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Jumlah Halaman</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['halaman']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">ID Buku</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['id_buku']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Sinopsis</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['sinopsis']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Tanggal Peminjaman</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['tgl_peminjaman']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Maksimal Pengembalian</th>
                    <td>:</td>
                    <td><?= $detail_peminjaman['tgl_pengembalian']; ?></td>
                </tr>
            </table>
            <a href="daftar_pinjam.php" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</section>
<?php require_once "../../layouts/footer.php"; ?>