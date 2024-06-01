<?php
session_start();
$title = "Tambah Buku";
require_once("../../layouts/header.php");

if (!isset($_SESSION['adminLogin'])) {
    echo "<script>
    alert('Anda harus login admin terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}

if ($_SESSION['adminRole'] != 1 && $_SESSION['adminRole'] != 2) {
    echo "<script>
    alert('Role anda tidak sesuai!');
    document.location.href='index.php';
     </script>";
    exit;
}

if (isset($_POST['tambah_buku'])) {
    if (tambah_buku($_POST) > 0) {
        echo "<script>
        alert('Data buku berhasil ditambahkan');
        document.location.href= 'daftar_buku.php';
        </script>";
    } else {
        echo "<script>
        alert('Data buku gagal ditambahkan!');
        document.location.href = 'daftar_buku.php';
        </script>";
    }
}
?>

<section>

    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar.php" ?></div>
        <form method="post" class="w-75 mx-5 my-4" enctype="multipart/form-data">
            <h1 class="fw-bold fs-3">Tambah Buku</h1>
            <hr>
            <div class="d-flex gap-4">
                <div class="input-group mb-3 w-50">
                    <span class="input-group-text fs-6" id="inputGroup-sizing-default">Judul Buku</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="judul" required>
                </div>
                <div class="input-group mb-3 w-50">
                    <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                    <select class="form-select" id="inputGroupSelect01" name="kategori" required>
                        <option selected>-- Pilih --</option>
                        <option value="Bisnis">Bisnis</option>
                        <option value="Filsafat">Filsafat</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Novel">Novel</option>
                        <option value="Sains">Sains</option>
                    </select>
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text fs-6" id="inputGroup-sizing-default">ID Buku</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="id_buku" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text fs-6" id="inputGroup-sizing-default">Pengarang</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="pengarang" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text fs-6" id="inputGroup-sizing-default">Penerbit</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="penerbit" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text fs-6" id="inputGroup-sizing-default">Tahun Terbit</span>
                <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tahun_terbit" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text fs-6" id="inputGroup-sizing-default">Jumlah Halaman</span>
                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="halaman" required>
            </div>
            <div class="form-floating mb-3 ">
                <textarea class="form-control col" placeholder="Sinopsis" id="floatingTextarea" name="sinopsis" style="height:150px" required></textarea>
                <label for="floatingTextarea">Sinopsis</label>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="cover" name="cover" required onchange="previewImg()">
                <label class="input-group-text" for="cover">Upload Cover</label>
            </div>
            <img src="../../assets/public/book/<?= $data_buku['image']; ?>" alt="" class="img-thumbnail img-preview mt-2" width="100px" height="200px">
            <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-danger" onclick="return confirm('Yakin ingin mereset?')" type="reset">Reset</button>
                <button type="submit" class="btn btn-primary" name="tambah_buku">Tambah Buku</button>
            </div>
        </form>
    </div>

</section>
<script>
    window.onload = function() {
        previewImg();
    };

    function previewImg() {
        const cover = document.querySelector('#cover');
        const imgPreview = document.querySelector('.img-preview');

        const fileCover = new FileReader();

        if (cover.files.length > 0) {
            fileCover.readAsDataURL(cover.files[0]);
        }

        fileCover.onload = function(e) {
            imgPreview.src = e.target.result;
            imgPreview.style.display = "block";
        }

        if (!cover.files[0]) {
            imgPreview.style.display = "none";
        }
    }
</script>

<?php require_once("../../layouts/footer.php"); ?>