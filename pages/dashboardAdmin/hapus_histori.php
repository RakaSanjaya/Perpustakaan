<?php
session_start();
require_once "../../config/app.php";
$id_history = (int)$_GET['id_history'];

if (!isset($_SESSION['adminLogin'])) {
    echo "<script>
    alert('Anda harus login admin terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}

if ($_SESSION['adminRole'] != 1) {
    echo "<script>
    alert('Role anda tidak sesuai!');
    document.location.href='index.php';
     </script>";
    exit;
}

if (hapus_histori($id_history) > 0) {
    echo "<script>
    alert('Data Histori berhasil dihapus');
    document.location.href='histori_peminjaman.php';
          </script>";
} else {
    echo "<script>
    alert('Data Histori gagal dihapus');
    document.location.href='histori_peminjaman.php';
          </script>";
}
