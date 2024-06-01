<div class="d-flex flex-column sidebar position-fixed flex-shrink-0 p-3 text-white bg-dark" style="width: 285px;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="index.php" class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?> text-white py-3">
                <i class="fa-solid fa-house me-2"></i>
                Beranda
            </a>
        </li>
        <li>
            <a href="daftar_buku.php" class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'daftar_buku.php' || basename($_SERVER['PHP_SELF']) == 'detail_buku.php' || basename($_SERVER['PHP_SELF']) == 'edit_buku.php') ? 'active' : ''; ?> text-white py-3">
                <i class="fa-solid fa-list-ul me-2"></i>
                Daftar Buku
            </a>
        </li>
        <?php if (isset($_SESSION['adminRole']) && ($_SESSION['adminRole'] == 1 || $_SESSION['adminRole'] == 2)) : ?>
            <li>
                <a href="tambah_buku.php" class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'tambah_buku.php') ? 'active' : ''; ?> text-white py-3">
                    <i class="fa-solid fa-book-medical me-2"></i>
                    Tambah Buku
                </a>
            </li>
        <?php endif; ?>
        <li>
            <a href="daftar_pinjam.php" class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'daftar_pinjam.php' || basename($_SERVER['PHP_SELF']) == 'detail_peminjaman.php') ? 'active' : ''; ?> text-white py-3">
                <i class="fa-solid fa-book-bookmark me-2"></i>
                Daftar Peminjaman
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
        <?php if (isset($_SESSION['adminName'])) : ?>
            <strong><?= $_SESSION['adminName'] ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item bg-danger" href="../../loginSystem/logout.php">Sign out</a></li>
            </ul>
        <?php endif; ?>
    </div>
</div>