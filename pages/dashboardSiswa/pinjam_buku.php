<?php
session_start();
if (!isset($_SESSION['signIn'])) {
    echo "<script>
    alert('Anda harus login terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}
$title = "Pinjam Buku";
require_once "../../layouts/header.php";
$id_buku = $_GET["id_buku"];
$nisn_siswa = $_SESSION['nisn'];
$data_buku = select("SELECT * FROM `buku` WHERE `id_buku` = '$id_buku'")[0];
$data_siswa = select("SELECT * FROM `siswa` INNER JOIN `jurusan` ON siswa.jurusan = jurusan.id_jurusan WHERE `nisn` = $nisn_siswa")[0];
$data_petugas = select("SELECT * FROM `petugas`");


if (isset($_POST['pinjam'])) {
    if (pinjam_buku($_POST) > 0) {
        echo "<script>
        alert('Buku Berhasil Dipinjam');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<section>
    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar_siswa.php" ?></div>
        <div class="w-75 mx-5 my-4">
            <h1 class="fw-bold fs-3">Keterangan Buku</h1>
            <hr>
            <div class="d-flex gap-5">
                <div class="position-relative w-75 card rounded-3">
                    <h1 class="fw-bold fs-4 card-header">Keterangan Buku</h1>
                    <table class="table table-striped rounded-bottom-3 mb-0 p-5">
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
                <div class="position-relative w-50 card rounded-3 h-25">
                    <h1 class="fw-bold fs-4 card-header">Data Siswa</h1>
                    <table class="table table-striped p-0 rounded-bottom-3 mb-0 overflow-hidden">
                        <tr>
                            <th class="table-head w-25">Nama</th>
                            <td>:</td>
                            <td><?= $data_siswa['nama']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">NISN</th>
                            <td>:</td>
                            <td><?= $data_siswa['nisn']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Kelas</th>
                            <td>:</td>
                            <td><?= $data_siswa['kelas']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Jurusan</th>
                            <td>:</td>
                            <td><?= $data_siswa['nama_jurusan']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Kelamin</th>
                            <td>:</td>
                            <td><?= $data_siswa['kelamin']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">No Telepon</th>
                            <td>:</td>
                            <td><?= $data_siswa['telepon']; ?></td>
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
                            <input type="text" class="form-control disabled" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $data_siswa['nama']; ?>" name="nama" readonly>
                        </div>
                        <div class="input-group p-2">
                            <span class="input-group-text fs-6" id="inputGroup-sizing-default">NISN</span>
                            <input type="text" class="form-control disabled" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $data_siswa['nisn']; ?>" name="nisn" readonly>
                        </div>
                        <input type="hidden" name="id_jurusan" value="<?= $data_siswa['id_jurusan'] ?>">
                        <input type="hidden" name="id_buku" value="<?= $data_buku['id_buku'] ?>">
                        <div class="input-group p-2">
                            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Buku Dipinjam</span>
                            <input type="text" class="form-control disabled" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $data_buku['judul']; ?>" name="nama_buku" readonly>
                        </div>
                        <div class="input-group p-2">
                            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Petugas</span>
                            <select class="form-select" id="inputGroupSelect01" name="id_petugas">
                                <?php foreach ($data_petugas as $petugas) : ?>
                                    <option value="<?= $petugas['id_petugas'] ?>"><?= $petugas['nama_petugas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php
                        $today = date('Y-m-d');
                        $defaultDate = date('Y-m-d', strtotime($today . ' + 7 days'));
                        ?>
                        <div class="input-group p-2">
                            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Tanggal Peminjaman</span>
                            <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tanggal_peminjaman" value="<?= $today ?>" readonly>
                        </div>
                        <div class="input-group p-2">
                            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Maksimal Pengembalian</span>
                            <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tanggal_pengembalian" value="<?= $defaultDate ?>" readonly>
                        </div>
                        <div class="alert alert-warning fs-6 m-3" role="alert">
                            <b>Perhatian!,</b> maksimal peminjaman adalah 7 hari.
                        </div>
                        <div class="d-flex gap-2 p-2">
                            <a href="daftar_buku.php" class="btn btn-danger w-50">Kembali</a>
                            <button class="btn btn-success w-50" name="pinjam">Pinjam</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
require_once "../../layouts/footer.php";
?>