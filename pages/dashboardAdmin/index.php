<?php
session_start();

$title = "Dashboard Admin";
require_once("../../layouts/header.php");
?>
<section>
    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar.php" ?></div>
        <div class="w-75 mx-5 my-4">
            <h1 class="fw-bold fs-3">Dashboard Admin</h1>
            <hr>

            <div class="d-flex gap-3">
                <a href="daftar_buku.php" class="btn d-flex justify-content-center align-items-center gap-3 bg-body-secondary py-3 px-4 rounded-2">
                    <img src="../../assets/icon/book.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">Daftar Buku</span>
                </a>
                <a href="" class="btn d-flex justify-content-center align-items-center gap-3 bg-body-secondary py-3 px-4 rounded-2">
                    <img src="../../assets/icon/book-rent.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">Peminjaman</span>
                </a>
                <a href="" class="btn d-flex justify-content-center align-items-center gap-3 bg-body-secondary py-3 px-4 rounded-2">
                    <img src="../../assets/icon/book-refund.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">Pengembalian</span>
                </a>
                <a href="" class="btn d-flex justify-content-center align-items-center gap-3 bg-body-secondary py-3 px-4 rounded-2">
                    <img src="../../assets/icon/students.png" width="30px" alt="book">
                    <span class="fs-6 fw-bold">Siswa</span>
                </a>
            </div>
        </div>
    </div>

</section>

<?php require_once("../../layouts/footer.php"); ?>