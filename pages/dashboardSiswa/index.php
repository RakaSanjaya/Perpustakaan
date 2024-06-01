<?php
session_start();
if (!isset($_SESSION['signIn'])) {
    echo "<script>
    alert('Anda harus login terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}
$title = "Dashboard Siswa";
require_once("../../layouts/header.php");
$daftar_buku = select("SELECT COUNT(id_buku) FROM buku")[0]["COUNT(id_buku)"];
?>
<section>
    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar_siswa.php" ?></div>
        <div class="w-75 mx-5 my-4">
            <h1 class="fw-bold fs-3">Dashboard Admin</h1>
            <hr>
            <div class="d-flex gap-3">
                <a href="daftar_buku.php" class="btn box-admin d-flex justify-content-center align-items-center gap-3 py-3 px-4">
                    <img src="../../assets/icon/book.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">Daftar Buku(<?= $daftar_buku; ?>)</span>
                </a>
                <a href="peminjaman.php" class="btn box-admin d-flex justify-content-center align-items-center gap-3 py-3 px-4">
                    <img src="../../assets/icon/book-rent.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">Peminjaman</span>
                </a>
                <a href="histori_peminjaman.php" class="btn box-admin d-flex justify-content-center align-items-center gap-3 py-3 px-4">
                    <img src="../../assets/icon/book-refund.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">History Peminjaman</span>
                </a>
                <a href="akun_siswa.php" class="btn box-admin d-flex justify-content-center align-items-center gap-3 py-3 px-4">
                    <img src="../../assets/icon/students.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">Akun Anda</span>
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once("../../layouts/footer.php"); ?>