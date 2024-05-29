<?php
session_start();
$title = "History Peminjaman";
require_once "../../layouts/header.php";

$daftar_history = select("SELECT * FROM `history`");
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
                        <th scope="col">NO</th>
                        <th scope="col">ID Pinjam</th>
                        <th scope="col">Nisn</th>
                        <th scope="col">ID Petugas</th>
                        <th scope="col">ID Buku</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($daftar_history) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($daftar_history as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['id_peminjaman']; ?></td>
                                <td><?= $data['kode_siswa']; ?></td>
                                <td><?= $data['kode_petugas']; ?></td>
                                <td><?= $data['kode_buku']; ?></td>
                                <td><?= $data['tgl_peminjaman']; ?></td>
                                <td><?= $data['tgl_pengembalian']; ?></td>
                                <td>
                                    <a href="hapus_histori.php?id_history=<?= $data['id_history'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr class="text-center">
                            <td colspan="8">Tidak Ada History Peminjaman</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once "../../layouts/footer.php"; ?>