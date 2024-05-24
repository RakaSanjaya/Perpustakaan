<?php
$title = "Daftar Buku";
require_once("../../layouts/header.php");
$data_buku = select("SELECT * FROM buku");

?>

<section class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="w-bold fs-3">Daftar Buku</h1>
        <a href="tambah_buku.php" class="btn btn-success px-4">Tambah Buku <i class="fas fa-plus"></i></a>
    </div>
    <hr>
    <div class="d-flex flex-wrap justify-content-between gap-3 my-5">
        <?php $no = 1; ?>
        <?php foreach ($data_buku as $buku) : ?>
            <div class="card" style="width: 16rem;">
                <img src="../../assets/public/book/<?= $buku["image"]; ?>" class="card-img-top" height="300px" alt="...">
                <div class="card-body">
                    <h5 class="heading-book"><?= $buku["judul"]; ?></h5>
                    <p class="card-text desc-book"><?= $buku["sinopsis"]; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item fw-bold"><?= $buku["kategori"]; ?></li>
                </ul>
                <div class="card-body d-flex gap-2 justify-content-between align-items-center ">
                    <a href="hapus_buku.php?id_buku=<?= $buku['id_buku'] ?>" class="btn btn-danger w-50 fs-6 fw-medium d-flex align-items-center justify-content-center btn-action" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Hapus</a>
                    <a href="detail_buku.php?id_buku=<?= $buku['id_buku'] ?>" class="btn btn-secondary w-50  d-flex align-items-center justify-content-center btn-action fs-6 fw-medium">Detail</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php
require_once("../../layouts/footer.php");
?>