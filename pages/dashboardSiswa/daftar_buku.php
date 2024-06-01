<?php
session_start();
if (!isset($_SESSION['signIn'])) {
    echo "<script>
    alert('Anda harus login terlebih dahulu!');
    document.location.href='../../index.php';
     </script>";
    exit;
}
$title = "Daftar Buku";
require_once("../../layouts/header.php");
$data_buku = select("SELECT * FROM buku");
if (isset($_POST['search'])) {
    $data_buku = select("SELECT * FROM `buku` WHERE judul LIKE '%$_POST[keyword]%'");
} else {
    $data_buku = select("SELECT * FROM buku");
}

?>
<section>
    <div class="d-flex">
        <div class="w-25"><?php require_once "../../layouts/sidebar_siswa.php" ?></div>
        <div class="w-75 mx-5 my-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="fw-bold fs-3">Daftar Buku</h1>
                <form class="d-flex" role="search" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Cari Buku" aria-label="Search" name="keyword">
                    <button class="btn btn-outline-success" type="submit" name=search>Cari</button>
                </form>
            </div>
            <hr>
            <div class="d-flex flex-wrap gap-5 w-100">
                <?php $no = 1; ?>
                <?php foreach ($data_buku as $buku) : ?>
                    <div class="card" style="width: 16rem;">
                        <img src="../../assets/public/book/<?= $buku["image"]; ?>" class="card-img-top" height="300px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= $buku["judul"]; ?></h5>
                            <p class="card-text desc-book"><?= $buku["sinopsis"]; ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fw-bold"><?= $buku["kategori"]; ?></li>
                        </ul>
                        <div class="card-body d-flex gap-2 justify-content-between align-items-center ">
                            <a href="detail_buku.php?id_buku=<?= $buku['id_buku'] ?>" class="btn btn-secondary w-50 fs-6 fw-medium d-flex align-items-center justify-content-center btn-action">Detail</a>
                            <a href="pinjam_buku.php?id_buku=<?= $buku['id_buku'] ?>" class="btn btn-success w-50  d-flex align-items-center justify-content-center btn-action fs-6 fw-medium">Pinjam</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php
require_once("../../layouts/footer.php");
?>