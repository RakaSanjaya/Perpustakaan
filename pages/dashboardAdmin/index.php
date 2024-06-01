<?php
session_start();
$title = "Dashboard Admin";
require_once("../../layouts/header.php");

if (!isset($_SESSION['adminLogin'])) {
    echo "<script>
    alert('Anda harus login admin terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}
$daftar_buku = select("SELECT COUNT(id_buku) FROM buku")[0]["COUNT(id_buku)"];
$peminjaman = select("SELECT COUNT(id_peminjaman) FROM peminjaman")[0]["COUNT(id_peminjaman)"];
$daftar_buku = select("SELECT COUNT(id_buku) FROM buku")[0]["COUNT(id_buku)"];
$daftar_siswa = select("SELECT COUNT(nisn) FROM siswa")[0]["COUNT(nisn)"];
$history = select("SELECT COUNT(id_history) FROM history")[0]["COUNT(id_history)"];
?>
<section>
    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar.php" ?></div>
        <div class="w-75 mx-5 my-4">
            <h1 class="fw-bold fs-3">Dashboard Admin</h1>
            <hr>
            <div class="d-flex gap-3">
                <a href="daftar_buku.php" class="btn box-admin d-flex justify-content-center align-items-center gap-3 py-3 px-4">
                    <img src="../../assets/icon/book.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">Daftar Buku(<?= $daftar_buku; ?>)</span>
                </a>
                <a href="daftar_pinjam.php" class="btn box-admin d-flex justify-content-center align-items-center gap-3 py-3 px-4">
                    <img src="../../assets/icon/book-rent.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">Peminjaman(<?= $peminjaman; ?>)</span>
                </a>
                <a href="histori_peminjaman.php" class="btn box-admin d-flex justify-content-center align-items-center gap-3 py-3 px-4">
                    <img src="../../assets/icon/book-refund.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">History Peminjaman
                        <?php if ($history > 0) : ?>
                            (<?= $history; ?>)
                        <?php else : ?>
                            (0)
                        <?php endif; ?>
                    </span>
                </a>
                <a href="akun_siswa.php" class="btn box-admin d-flex justify-content-center align-items-center gap-3 py-3 px-4">
                    <img src="../../assets/icon/students.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">Daftar Siswa(<?= $daftar_siswa; ?>)</span>
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once("../../layouts/footer.php"); ?>