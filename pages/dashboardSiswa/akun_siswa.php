<?php
session_start();
$title = "History Peminjaman";
require_once "../../layouts/header.php";
$nisn = (int)$_SESSION['nisn'];

if (!isset($_SESSION['signIn'])) {
    echo "<script>
    alert('Anda harus login terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}
$data_siswa = select("SELECT * FROM `siswa` INNER JOIN `jurusan` ON siswa.jurusan = jurusan.id_jurusan WHERE `nisn` = $nisn")[0];
$list_jurusan = select("SELECT * FROM `jurusan`");

if (isset($_POST["edit_data"])) {
    if (ubah_mahasiswa($_POST) > 0) {
        echo "<script>
    alert('Data Berhasil Diubah');
    document.location.href = '../../loginSystem/redirect.php';
    </script>";
    } else {
        echo "<script>
    alert('Data Gagal Diubah');
    document.location.href = 'akun_siswa.php';
    </script>";
    }
}
?>


<section>
    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar_siswa.php" ?></div>
        <div class="w-75 mx-5 my-4">
            <h1 class="fw-bold fs-3">Ubah Data Mahasiswa</h1>
            <hr>
            <form method="POST" enctype="multipart/form-data">
                <div class="d-flex gap-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text fs-6" id="inputGroup-sizing-default">Nama Siswa</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" name="nama" aria-describedby="inputGroup-sizing-default" value="<?= $data_siswa["nama"]; ?>">
                    </div>
                    <div class="input-group mb-3 w-50">
                        <span class="input-group-text fs-6" id="inputGroup-sizing-default">NISN</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" name="nisn" aria-describedby="inputGroup-sizing-default" value="<?= $data_siswa["nisn"]; ?>">
                    </div>
                    <div class="input-group mb-3 w-50">
                        <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                        <select class="form-select" id="inputGroupSelect01" name="kelas">
                            <option selected><?= $data_siswa["kelas"]; ?></option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>

                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Jurusan</label>
                    <select class="form-select" id="inputGroupSelect01" name="jurusan">
                        <option value="<?= $data_siswa["id_jurusan"]; ?>" selected><?= $data_siswa["nama_jurusan"]; ?></option>
                        <?php foreach ($list_jurusan as $jurusan) : ?>
                            <option value="<?= $jurusan["id_jurusan"]; ?>"><?= $jurusan["nama_jurusan"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Kelamin</label>
                    <select class="form-select" id="inputGroupSelect01" name="kelamin">
                        <option selected><?= $data_siswa["kelamin"]; ?></option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text fs-6" id="inputGroup-sizing-default">No Telepon</span>
                    <input type="tel" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="telepon" value="<?= $data_siswa["telepon"]; ?>">
                </div>
                <input type="hidden" value="<?= $data_siswa["password"]; ?>" name="passwordLama">
                <div class="input-group mb-3">
                    <span class="input-group-text fs-6" id="inputGroup-sizing-default">Password Baru</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="passwordBaru">
                </div>
                <div class="d-flex justify-content-end my-3 gap-2">
                    <a href="akun_siswa.php" class="btn btn-danger">Batal</a>
                    <button type="submit" name="edit_data" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once "../../layouts/footer.php" ?>