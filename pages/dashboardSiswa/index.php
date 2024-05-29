<?php
session_start();
$title = "Dashboard Siswa";
require_once("../../layouts/header.php");
?>

<section class="container vh-100">
    <h1 class="my-3 fw-bold fs-3">Dashboard Siswa</h1>
    <div class="d-flex gap-3">
        <a href="daftar_buku.php" class="btn d-flex justify-content-center align-items-center gap-3 bg-body-secondary py-3 px-4 rounded-2">
            <img src="../../assets/icon/book.png" width="30px" alt="book">
            <span class="fs-6 fw-bold">Daftar Buku</span>
        </a>
        <a href="peminjaman.php" class="btn d-flex justify-content-center align-items-center gap-3 bg-body-secondary py-3 px-4 rounded-2">
            <img src="../../assets/icon/book-rent.png" width="30px" alt="book">
            <span class="fs-6 fw-bold">Peminjaman</span>
        </a>
        <a href="" class="btn d-flex justify-content-center align-items-center gap-3 bg-body-secondary py-3 px-4 rounded-2">
            <img src="../../assets/icon/book-refund.png" width="30px" alt="book">
            <span class="fs-6 fw-bold">Pengembalian</span>
        </a>
        <a href="akun.php" class="btn d-flex justify-content-center align-items-center gap-3 bg-body-secondary py-3 px-4 rounded-2">
            <img src="../../assets/icon/students.png" width="30px" alt="book">
            <span class="fs-6 fw-bold">Akun Anda</span>
        </a>
    </div>
</section>

<?php require_once("../../layouts/footer.php"); ?>