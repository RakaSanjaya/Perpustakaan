<?php
$title = "Detail Buku";
require_once("../../layouts/header.php");
$id_buku = $_GET["id_buku"];
$data_buku = select("SELECT * FROM buku WHERE id_buku = '$id_buku'")[0];

?>

<section class="container d-flex my-5 gap-5 flex-sm-column align-items-center">
    <div class="w-25">
        <img src="../../assets/public/book/<?= $data_buku['image']; ?>" class="w-100" alt="">
        <div class="d-flex gap-2">
            <a href="daftar_buku.php" class="btn btn-danger w-50 mt-3">Kembali</a>
            <a href="edit_buku.php?id_buku=<?= $data_buku['id_buku']; ?>" class="btn btn-success w-50 mt-3">Edit</a>
        </div>
    </div>
    <div class="w-75">
        <h1 class="fw-bold fs-3">Keterangan Buku</h1>
        <hr>
        <table class="table table-striped border">
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
</section>

<?php require_once("../../layouts/footer.php"); ?>