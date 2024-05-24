<?php
$title = "Tambah Buku";
require_once("../../layouts/header.php");

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

<section class="container">
    <h1 class="fs-3 my-4">Tambah Buku</h1>
    <hr>
    <form method="post" class="" enctype="multipart/form-data">
        <div class="d-flex gap-4">
            <div class="input-group mb-3 w-50">
                <span class="input-group-text fs-6" id="inputGroup-sizing-default">Judul Buku</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="judul">
            </div>
            <div class="input-group mb-3 w-50">
                <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                <select class="form-select" id="inputGroupSelect01" name="kategori">
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
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="id_buku">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Pengarang</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="pengarang">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Penerbit</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="penerbit">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Tahun Terbit</span>
            <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tahun_terbit">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Jumlah Halaman</span>
            <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="halaman">
        </div>
        <div class="form-floating mb-3 ">
            <textarea class="form-control col" placeholder="Sinopsis" id="floatingTextarea" name="sinopsis"></textarea>
            <label for="floatingTextarea">Sinopsis</label>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="cover" name="cover" onchange="previewImg()">
            <label class="input-group-text" for="cover">Upload Cover</label>
        </div>
        <img src="../../assets/public/book/<?= $data_buku['image']; ?>" alt="" class="img-thumbnail img-preview mt-2" width="100px" height="200px">
        <div class="d-flex justify-content-end my-3 gap-2">
            <a href="daftar_buku.php" onclick="return confirm('Apakah Anda Yakin Ingin Kembali?')" class="btn btn-danger">Kembali</a>
            <button class="btn btn-warning" type="reset">Reset</button>
            <button type="submit" class="btn btn-primary" name="tambah_buku">Tambah Buku</button>
        </div>
    </form>

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