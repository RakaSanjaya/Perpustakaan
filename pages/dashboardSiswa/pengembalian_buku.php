<?php
session_start();
if (!isset($_SESSION['signIn'])) {
    echo "<script>
    alert('Anda harus login terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}
$title = "Pengembalian Buku";
require_once "../../layouts/header.php";
$id_peminjaman = $_GET["id_peminjaman"];
$nisn_siswa = $_SESSION['nisn'];
$data_peminjaman = select("SELECT * FROM `peminjaman` INNER JOIN `buku` ON peminjaman.kode_buku = buku.id_buku INNER JOIN `siswa` ON peminjaman.kode_siswa = siswa.nisn INNER JOIN `petugas` ON peminjaman.kode_petugas = petugas.id_petugas INNER JOIN `jurusan` ON peminjaman.kode_jurusan = jurusan.id_jurusan WHERE `id_peminjaman` = $id_peminjaman")[0];

if (isset($_POST['kembalikan_buku'])) {
    if (kembalikan_buku($_POST) > 0) {
        echo "<script>
        alert('Buku Berhasil Dikembalikan');
        document.location.href = 'index.php';
        </script>";
    }
}
?>
<section>
    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar_siswa.php" ?></div>
        <div class="w-75 mx-5 my-4">
            <h1 class="fw-bold fs-3">Pengembalian Buku</h1>
            <hr>
            <div class="d-flex gap-5">
                <div class="position-relative w-75 card rounded-3">
                    <h1 class="fw-bold fs-4 card-header">Keterangan Buku</h1>
                    <table class="table table-striped p-0 rounded-bottom-3 p-5">
                        <tr>
                            <th class="table-head w-25">Judul</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['judul']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Kategori</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['kategori']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Pengarang</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['pengarang']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Penerbit</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['penerbit']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Tahun Terbit</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['tahun_terbit']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Jumlah Halaman</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['halaman']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">ID Buku</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['id_buku']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Sinopsis</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['sinopsis']; ?></td>
                        </tr>
                    </table>
                </div>
                <img src="../../assets/public/book/<?= $data_peminjaman['image']; ?>" class="w-25 rounded-3" alt="<?= $data_peminjaman['image']; ?>">
            </div>
            <hr class="my-5">
            <div class="d-flex gap-5">
                <div class="position-relative w-50 card rounded-3 h-25">
                    <h1 class="fw-bold fs-4 card-header">Data Siswa</h1>
                    <table class="table table-striped p-0 rounded-bottom-3 overflow-hidden">
                        <tr>
                            <th class="table-head w-25">Nama</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['nama']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">NISN</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['nisn']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Kelas</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['kelas']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Jurusan</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['nama_jurusan']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">Kelamin</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['kelamin']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-head w-25">No Telepon</th>
                            <td>:</td>
                            <td><?= $data_peminjaman['telepon']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="position-relative w-50 card rounded-3">
                    <h1 class="fw-bold fs-4 card-header">Form Pengembalian</h1>
                    <form method="POST" action="">
                        <input type="hidden" name="id_peminjaman" value="<?= $id_peminjaman ?>">
                        <input type="hidden" name="id_buku" value="<?= $data_peminjaman['kode_buku'] ?>">
                        <input type="hidden" name="id_petugas" value="<?= $data_peminjaman['id_petugas'] ?>">
                        <div class="input-group p-2">
                            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Nama</span>
                            <input type="text" class="form-control disabled" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $data_peminjaman['nama']; ?>" name="nama" readonly>
                        </div>
                        <div class="input-group p-2">
                            <span class="input-group-text fs-6" id="inputGroup-sizing-default">NISN</span>
                            <input type="text" class="form-control disabled" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $data_peminjaman['nisn']; ?>" name="nisn" readonly>
                        </div>
                        <div class="input-group p-2">
                            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Buku Dipinjam</span>
                            <input type="text" class="form-control disabled" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $data_peminjaman['judul']; ?>" name="nama_buku" readonly>
                        </div>
                        <div class="input-group p-2">
                            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Nama Petugas</span>
                            <input type="text" class="form-control disabled" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $data_peminjaman['nama_petugas']; ?>" name="nama_petugas" readonly>
                        </div>
                        <?php
                        $today = date('Y-m-d');
                        ?>
                        <div class="input-group p-2">
                            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Tanggal Pinjam</span>
                            <input type="text" class="form-control disabled" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $data_peminjaman['tgl_peminjaman']; ?>" name="tanggal_peminjaman" readonly>
                        </div>
                        <div class="input-group p-2">
                            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Tanggal Pengembalian</span>
                            <input type="text" class="form-control disabled" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?= $today; ?>" name="tanggal_pengembalian" readonly>
                        </div>
                        <div class="d-flex gap-2 p-2">
                            <a href="daftar_buku.php" class="btn btn-danger w-50">Kembali</a>
                            <button class="btn btn-success w-50" name="kembalikan_buku">Kembalikan</button>
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