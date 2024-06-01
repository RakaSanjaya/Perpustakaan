<?php

function select($query)
{
    // panggil koneksi db
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
function tambah_buku($post)
{
    global $db;
    $id_buku = strip_tags($post["id_buku"]);
    $judul = strip_tags($post["judul"]);
    $kategori = strip_tags($post["kategori"]);
    $pengarang = strip_tags($post["pengarang"]);
    $penerbit = strip_tags($post["penerbit"]);
    $tahun_terbit = strip_tags($post["tahun_terbit"]);
    $halaman = strip_tags($post["halaman"]);
    $sinopsis = strip_tags($post["sinopsis"]);
    $cover = upload_file();

    if (!$cover) {
        return false;
    }

    $query = "INSERT INTO buku VALUES('$id_buku', '$judul', '$kategori', '$pengarang', '$penerbit', '$tahun_terbit', '$halaman', '$sinopsis', '$cover')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function upload_file()
{
    $namaFile = $_FILES['cover']['name'];
    $ukuranFile = $_FILES['cover']['size'];
    $tmpName = $_FILES['cover']['tmp_name'];

    $extensionFileValid = ['jpg', 'jpeg', 'png'];
    $extensionFile = explode('.', $namaFile);
    $extensionFile = strtolower(end($extensionFileValid));

    if (!in_array($extensionFile, $extensionFileValid)) {
        echo "<script>
            alert('Format tidak valid!');
            document.location.href = '../pages/dashboardAdmin/tambah_buku.php';
            </script>";
        die();
    }

    if ($ukuranFile > 4096000) {
        echo "<script>
    alert('ukuran maksimal 2 MB!');
    document.location.href = '../pages/dashboardAdmin/tambah_buku.php';
    </script>";
        die();
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensionFile;

    move_uploaded_file($tmpName, '../../assets/public/book/' . $namaFileBaru);
    return $namaFileBaru;
}

function edit_buku($post)
{
    global $db;
    $id_buku = strip_tags($post["id_buku"]);
    $judul = strip_tags($post["judul"]);
    $kategori = strip_tags($post["kategori"]);
    $pengarang = strip_tags($post["pengarang"]);
    $penerbit = strip_tags($post["penerbit"]);
    $tahun_terbit = strip_tags($post["tahun_terbit"]);
    $halaman = strip_tags($post["halaman"]);
    $sinopsis = strip_tags($post["sinopsis"]);
    $coverLama = strip_tags($post["coverLama"]);

    if ($_FILES['cover']['error'] == 4) {
        $cover = $coverLama;
    } else {
        $cover = upload_file();
    }

    $query = "UPDATE buku SET id_buku = '$id_buku', judul = '$judul', kategori = '$kategori', pengarang = '$pengarang', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit', halaman = '$halaman', sinopsis = '$sinopsis', `image` = '$cover' WHERE id_buku  = '$id_buku'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapus_buku($id_buku)
{
    global $db;
    $cover = select("SELECT * FROM buku WHERE id_buku = '$id_buku'")[0];
    unlink("../../assets/public/book/" . $cover['image']);

    $query = "DELETE FROM buku WHERE id_buku = '$id_buku'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function register_siswa($post)
{
    global $db;
    $nama = strip_tags($post["nama"]);
    $nisn = strip_tags($post["nisn"]);
    $telepon = strip_tags($post["telepon"]);
    $kelamin = strip_tags($post["kelamin"]);
    $kelas = strip_tags($post["kelas"]);
    $jurusan = strip_tags($post["jurusan"]);
    $password = strip_tags($post["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO siswa (`nama`, `nisn`, `kelas`, `jurusan`, `kelamin`, `telepon`, `password`) VALUES ('$nama', '$nisn', '$kelas', '$jurusan', '$kelamin', '$telepon', '$password')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function pinjam_buku($post)
{
    global $db;
    $id_petugas = strip_tags($post['id_petugas']);
    $id_siswa = strip_tags($post['nisn']);
    $id_jurusan = strip_tags($post['id_jurusan']);
    $id_buku = strip_tags($post['id_buku']);
    $tgl_pinjam = strip_tags($post['tanggal_peminjaman']);
    $tgl_kembali = strip_tags($post['tanggal_pengembalian']);
    $query = "INSERT INTO peminjaman(`kode_petugas`,`kode_siswa`,`kode_jurusan`, `kode_buku`, `tgl_peminjaman`, `tgl_pengembalian`) VALUES ('$id_petugas', '$id_siswa','$id_jurusan', '$id_buku', '$tgl_pinjam', '$tgl_kembali')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function kembalikan_buku($post)
{
    global $db;
    $id_peminjaman = strip_tags($post['id_peminjaman']);
    $id_petugas = strip_tags($post['id_petugas']);
    $id_siswa = strip_tags($post['nisn']);
    $id_buku = strip_tags($post['id_buku']);
    $tgl_pinjam = strip_tags($post['tanggal_peminjaman']);
    $tgl_kembali = strip_tags($post['tanggal_pengembalian']);
    $queryHistory = "INSERT INTO `history` (`id_peminjaman`,`kode_petugas`,`kode_siswa`, `kode_buku`, `tgl_peminjaman`, `tgl_pengembalian`) VALUES ('$id_peminjaman','$id_petugas', '$id_siswa', '$id_buku', '$tgl_pinjam', '$tgl_kembali')";
    $queryDelete = "DELETE FROM `peminjaman` WHERE `id_peminjaman` = $id_peminjaman";
    mysqli_query($db, $queryHistory);
    mysqli_query($db, $queryDelete);
    return mysqli_affected_rows($db);
}

function hapus_histori($id_history)
{
    global $db;
    $query = "DELETE FROM `history` WHERE id_history = $id_history";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function ubah_data_mahasiswa($post)
{
    global $db;

    $nama = strip_tags($post['nama']);
    $nisn = strip_tags($post['nisn']);
    $telepon = strip_tags($post['telepon']);
    $kelas = strip_tags($post['kelas']);
    $jurusan = strip_tags($post['jurusan']);
    $password = strip_tags($post['passwordBaru']);

    if (!$password) {
        $password = strip_tags($post['passwordLama']);
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE siswa SET `nama` = '$nama', `nisn` = '$nisn', `telepon` = '$telepon', `kelas` = '$kelas', `jurusan` = '$jurusan', `password` = '$password' WHERE `nisn` = '$nisn'";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function ubah_mahasiswa($post)
{
    global $db;

    $nama = strip_tags($post['nama']);
    $nisn = strip_tags($post['nisn']);
    $telepon = strip_tags($post['telepon']);
    $kelas = strip_tags($post['kelas']);
    $jurusan = strip_tags($post['jurusan']);
    $password = strip_tags($post['passwordBaru']);

    if (!$password) {
        $password = strip_tags($post['passwordLama']);
    } else if ($password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

    $query = "UPDATE siswa SET `nama` = '$nama', `nisn` = '$nisn', `telepon` = '$telepon', `kelas` = '$kelas', `jurusan` = '$jurusan', `password` = '$password' WHERE `nisn` = '$nisn'";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
