<?php
session_start();
if (!isset($_SESSION['signIn'])) {
    echo "<script>
    alert('Anda harus login terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}
$title = "Detail Buku";
require_once("../../layouts/header.php");
$id_buku = $_GET["id_buku"];
$data_buku = select("SELECT * FROM buku WHERE id_buku = '$id_buku'")[0];

?>
<section>
    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar_siswa.php"; ?></div>
        <div class="w-75 mx-5 my-4">
            <h1 class="fw-bold fs-3">Keterangan Buku</h1>
            <hr>
            <div class="d-flex gap-5 mb-3">
                <div class="position-relative w-75 card rounded-3">
                    <h1 class="fw-bold fs-4 card-header">Keterangan Buku</h1>
                    <table class="table table-striped mb-0 p-5">
                        <tr>
                            <th class="table-head w-25">Judul</th>
                            <td>:</td>
                            <td><?= $data_buku['judul']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Kategori</th>
                            <td>:</td>
                            <td><?= $data_buku['kategori']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Pengarang</th>
                            <td>:</td>
                            <td><?= $data_buku['pengarang']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Penerbit</th>
                            <td>:</td>
                            <td><?= $data_buku['penerbit']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Tahun Terbit</th>
                            <td>:</td>
                            <td><?= $data_buku['tahun_terbit']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Jumlah Halaman</th>
                            <td>:</td>
                            <td><?= $data_buku['halaman']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">ID Buku</th>
                            <td>:</td>
                            <td><?= $data_buku['id_buku']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Sinopsis</th>
                            <td>:</td>
                            <td><?= $data_buku['sinopsis']; ?></td>
                        </tr>
                    </table>
                </div>
                <img src="../../assets/public/book/<?= $data_buku['image']; ?>" class="w-25 rounded-3" alt="<?= $data_buku['image']; ?>">
            </div>
            <a href="daftar_buku.php" class="btn btn-danger me-2">Kembali</a>
            <a href="pinjam_buku.php?id_buku=<?= $data_buku['id_buku']; ?>" class="btn btn-success">Pinjam</a>
        </div>
    </div>
</section>

<?php require_once("../../layouts/footer.php"); ?>