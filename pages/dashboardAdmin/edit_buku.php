<?php
$title = "Edit Buku";
require_once("../../layouts/header.php");

$id_buku = (int)$_GET["id_buku"];
$data_buku = select("SELECT * FROM buku WHERE id_buku = $id_buku")[0];

if (isset($_POST["edit_buku"])) {
    if (edit_buku($_POST) > 0) {
        echo "<script>
        alert('Data Berhasil Diubah');
        document.location.href = 'daftar_buku.php';
        </script>";
    }
}
?>

<section class="container">
    <h1 class="fs-3 my-4">Edit Buku</h1>
    <hr>
    <form method="POST" enctype="multipart/form-data">
        <div class="d-flex gap-4">
            <div class="input-group mb-3">
                <span class="input-group-text fs-6" id="inputGroup-sizing-default">Nama Buku</span>
                <input type="text" class="form-control" aria-label="Sizing example input" name="judul" aria-describedby="inputGroup-sizing-default" value="<?= $data_buku["judul"]; ?>">
            </div>
            <div class="input-group mb-3 w-50">
                <span class="input-group-text fs-6" id="inputGroup-sizing-default">ID Buku</span>
                <input type="text" class="form-control" aria-label="Sizing example input" name="id_buku" aria-describedby="inputGroup-sizing-default" value="<?= $data_buku["id_buku"]; ?>">
            </div>
            <div class="input-group mb-3 w-50">
                <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                <select class="form-select" id="inputGroupSelect01" name="kategori">
                    <option selected><?= $data_buku["kategori"]; ?></option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Filsafat">Filsafat</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Novel">Novel</option>
                    <option value="Sains">Sains</option>
                </select>
            </div>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Pengarang</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="pengarang" value="<?= $data_buku["pengarang"]; ?>">
        </div>
        <div class=" input-group mb-3">
            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Penerbit</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="penerbit" value="<?= $data_buku["penerbit"]; ?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Tahun Terbit</span>
            <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tahun_terbit" value="<?= $data_buku["tahun_terbit"]; ?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text fs-6" id="inputGroup-sizing-default">Jumlah Halaman</span>
            <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="halaman" value="<?= $data_buku["halaman"]; ?>">
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name="sinopsis" placeholder="Leave a comment here" id="floatingTextarea"><?= $data_buku["sinopsis"]; ?></textarea>
            <label for=" floatingTextarea">Sinopsis</label>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="cover" name="cover" onchange="previewImg()">
            <label class="input-group-text" for="cover">Upload Cover</label>
        </div>
        <input type="hidden" name="coverLama" value="<?= $data_buku['image']; ?>">
        <img src="../../assets/public/book/<?= $data_buku['image']; ?>" alt="" class="img-thumbnail img-preview mt-2" width="100px">
        <div class="d-flex justify-content-end my-3 gap-2">
            <a href="detail_buku.php?id_buku=<?= $data_buku["id_buku"]; ?>" class="btn btn-danger">Batal</a>
            <button type="submit" name="edit_buku" class="btn btn-primary">Simpan</button>
        </div>
    </form>

</section>
<script>
    function previewImg() {
        const cover = document.querySelector('#cover');
        const imgPreview = document.querySelector('.img-preview');
        const fileCover = new FileReader();
        fileCover.readAsDataURL(cover.files[0])

        fileCover.onload = function(e) {
            imgPreview.src = e.target.result
        }
    }
</script>