<?php
session_start();
require_once "../../config/app.php";
$id_buku = $_GET['id_buku'];

if (!isset($_SESSION['adminLogin'])) {
    echo "<script>
    alert('Anda harus login admin terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}

if (hapus_buku($id_buku) > 0) {
    echo "<script>
    alert('Data Buku berhasil dihapus');
    document.location.href='daftar_buku.php';
          </script>";
} else {
    echo "<script>
    alert('Data Buku gagal dihapus');
    document.location.href='daftar_buku.php';
          </script>";
}
