<div class="d-flex flex-column sidebar position-fixed flex-shrink-0 p-3 text-white bg-dark" style="width: 285px;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="index.php" class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?> text-white py-3">
                <i class="fa-solid fa-house me-2"></i>
                Beranda
            </a>
        </li>
        <li>
            <a href="daftar_buku.php" class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'daftar_buku.php' || basename($_SERVER['PHP_SELF']) == 'detail_buku.php') ? 'active' : ''; ?> text-white py-3">
                <i class="fa-solid fa-list-ul me-2"></i>
                Daftar Buku
            </a>
        </li>
        <li>
            <a href="peminjaman.php" class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == 'peminjaman.php' || basename($_SERVER['PHP_SELF']) == 'pengembalian_buku.php' || basename($_SERVER['PHP_SELF']) == 'pinjam_buku.php') ? 'active' : ''; ?> py-3">
                <i class="fa-solid fa-book-bookmark me-2"></i>
                Peminjaman Buku
            </a>
        </li>
        <li>
            <a href="histori_peminjaman.php" class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == 'histori_peminjaman.php') ? 'active' : ''; ?> py-3">
                <i class="fa-solid fa-clock-rotate-left me-2"></i>
                Histori Peminjaman
            </a>
        </li>
        <li>
            <a href="akun_siswa.php" class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == 'akun_siswa.php' || basename($_SERVER['PHP_SELF']) == 'ubah_akun_siswa.php') ? 'active' : ''; ?> py-3">
                <i class="fa-solid fa-users me-2"></i>
                Akun Siswa
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <strong><?= $_SESSION['namaSiswa']; ?></strong>
    </div>a
</div>