<?php
session_start();
$title = "Peminjaman Buku";
require_once "../../layouts/header.php";
$nisn_siswa = $_SESSION['siswa']['nisn'];
?>

<section class="container my-5">
    <h1 class="fw-bold fs-3">Keterangan Buku</h1>
    <hr>

    <table class="table table-border table table-striped mt-5">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id Pinjam</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Petugas</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (select("SELECT * FROM `peminjaman` WHERE `kode_siswa` = $nisn_siswa")) :
                $item = select("SELECT * FROM `peminjaman` INNER JOIN `petugas` ON peminjaman.kode_petugas = petugas.id_petugas INNER JOIN `buku` ON peminjaman.kode_buku = buku.id_buku INNER JOIN `siswa` ON peminjaman.kode_siswa = siswa.nisn INNER JOIN `jurusan` ON peminjaman.kode_jurusan = jurusan.id_jurusan WHERE `kode_siswa` = $nisn_siswa")[0];
            ?>
                <tr>
                    <td><?= $item['id_peminjaman']; ?></td>
                    <td><?= $item['judul']; ?></td>
                    <td><?= $item['nama_petugas']; ?></td>
                    <td><?= $item['tgl_peminjaman']; ?></td>
                    <td><?= $item['tgl_pengembalian']; ?></td>
                    <td>
                        <a href="pengembalian_buku.php?id_peminjaman=<?= $item['id_peminjaman']; ?>" class="btn btn-success">Kembalikan</a>
                    </td>
                </tr>
            <?php else : ?>
                <tr class="text-center">
                    <td colspan="6">Tidak Ada Buku Yang Dipinjam</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>

<?php require_once "../../layouts/footer.php"; ?>