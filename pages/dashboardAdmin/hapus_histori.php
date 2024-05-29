<?php
require_once "../../config/app.php";
$id_history = (int)$_GET['id_history'];

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
