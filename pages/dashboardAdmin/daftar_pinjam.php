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

$daftar_peminjaman = select("SELECT * FROM `peminjaman` INNER JOIN `buku` ON peminjaman.kode_buku = buku.id_buku INNER JOIN `petugas` ON peminjaman.kode_petugas = petugas.id_petugas INNER JOIN `siswa` ON peminjaman.kode_siswa = siswa.nisn INNER JOIN `jurusan` ON peminjaman.kode_jurusan = jurusan.id_jurusan");
?>

<section>
    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar.php" ?></div>
        <div class="w-75 mx-5 my-4">
            <h1 class="fw-bold fs-3">Keterangan Buku</h1>
            <hr>
            <table class="table table-border table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id Pinjam</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Nisn</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($daftar_peminjaman) : ?>
                        <?php foreach ($daftar_peminjaman as $data) : ?>
                            <tr>
                                <td><?= $data['id_peminjaman']; ?></td>
                                <td><?= $data['judul']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['nisn']; ?></td>
                                <td><?= $data['nama_petugas']; ?></td>
                                <td><?= $data['tgl_peminjaman']; ?></td>
                                <td><?= $data['tgl_pengembalian']; ?></td>
                                <td>
                                    <a href="detail_peminjaman.php?id_peminjaman=<?= $data['id_peminjaman']; ?>" class="btn btn-primary btn-sm">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr class="text-center">
                            <td colspan="8">Tidak Ada Yang Meminjam Buku</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once "../../layouts/footer.php"; ?>