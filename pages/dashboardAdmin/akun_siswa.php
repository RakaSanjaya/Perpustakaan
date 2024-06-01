<?php
session_start();
if (!isset($_SESSION['adminLogin'])) {
    echo "<script>
    alert('Anda harus login admin terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}
$title = "Daftar Peminjaman Buku";
require_once "../../layouts/header.php";
$daftar_siswa = select("SELECT * FROM `siswa`, `jurusan` WHERE siswa.jurusan = jurusan.id_jurusan");
?>

<section>
    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar.php" ?></div>
        <div class="w-75 mx-5 my-4">
            <h1 class="fw-bold fs-3">Daftar Akun</h1>
            <hr>
            <table class="table table-border table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Kelamin</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Password</th>
                        <?php if ($_SESSION['adminRole'] == 1 || $_SESSION['adminRole'] == 3) : ?>
                            <th scope="col">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($daftar_siswa as $data) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nisn']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['kelas']; ?></td>
                            <td><?= $data['nama_jurusan']; ?></td>
                            <td><?= $data['kelamin']; ?></td>
                            <td><?= $data['telepon']; ?></td>
                            <td>Terenkripsi</td>
                            <?php if ($_SESSION['adminRole'] == 1 || $_SESSION['adminRole'] == 3) : ?>
                                <td>
                                    <a href="ubah_akun_siswa.php?nisn=<?= $data['nisn']; ?>" class="btn btn-primary btn-sm">Ubah</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once "../../layouts/footer.php"; ?>