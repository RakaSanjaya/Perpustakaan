<?php
require_once "../../config/app.php";
$id_buku = $_GET['id_buku'];

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
