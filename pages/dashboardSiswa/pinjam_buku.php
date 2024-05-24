<?php
session_start();

$title = "Pinjam Buku";
require_once "../../layouts/header.php";
$id_buku = $_GET["id_buku"];
$data_buku = select("SELECT * FROM `buku` WHERE `id_buku` = '$id_buku'")[0];
$nisn_siswa = $_SESSION['siswa']['nisn'];
$data_siswa = select("SELECT * FROM `siswa` WHERE `nisn` = '$nisn_siswa'")[0];
?>

<section class="container">
    <h1 class="fs-3 my-4">Peminjaman Buku</h1>
    <hr>
    <div class="d-flex gap-5">
        <div class="position-relative w-75 card rounded-3">
            <h1 class="fw-bold fs-4 card-header">Keterangan Buku</h1>
            <table class="table table-striped p-0 rounded-bottom-3 p-5">
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
    <hr class="my-5">
    <div class="d-flex gap-5">
        <div class="position-relative w-50 card rounded-3">
            <h1 class="fw-bold fs-4 card-header">Data Siswa</h1>
            <table class="table table-striped p-0 rounded-bottom-3 overflow-hidden">
                <tr>
                    <th class="table-head w-25">Nama</th>
                    <td>:</td>
                    <td><?= $_SESSION['siswa']['nama']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">NISN</th>
                    <td>:</td>
                    <td><?= $_SESSION['siswa']['nisn']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Kelas</th>
                    <td>:</td>
                    <td><?= $_SESSION['siswa']['kelas']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Jurusan</th>
                    <td>:</td>
                    <td><?= $_SESSION['siswa']['jurusan']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">Kelamin</th>
                    <td>:</td>
                    <td><?= $_SESSION['siswa']['kelamin']; ?></td>
                </tr>
                <tr>
                    <th class="table-head w-25">No Telepon</th>
                    <td>:</td>
                    <td><?= $_SESSION['siswa']['telepon']; ?></td>
                </tr>
            </table>
            <div class="alert alert-danger fs-6 m-3" role="alert">
                Silahkan cek data diri anda, pastikan benar semua.
            </div>
        </div>
        <div class="position-relative w-50 card rounded-3">
            <h1 class="fw-bold fs-4 card-header">Form Peminjaman</h1>
            <form method="POST" action="">
                <div class="input-group p-2">
                    <span class="input-group-text fs-6" id="inputGroup-sizing-default">Nama</span>
                    <input type="text" class="form-control disabled" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $_SESSION['siswa']['nama']; ?>" name="nama" disabled>
                </div>
                <div class="input-group p-2">
                    <span class="input-group-text fs-6" id="inputGroup-sizing-default">Pengembalian</span>
                    <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tahun_terbit">
                </div>
                <div class="input-group p-2">
                    <span class="input-group-text fs-6" id="inputGroup-sizing-default">Pengembalian</span>
                    <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tahun_terbit">
                </div>
            </form>
        </div>
    </div>
</section>


<?php
require_once "../../layouts/footer.php";
?>