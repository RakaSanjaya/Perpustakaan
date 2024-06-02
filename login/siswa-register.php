<?php

require_once '../config/app.php';
if (isset($_POST['daftar'])) {
    $nisn = mysqli_real_escape_string($db, $_POST['nisn']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (isset($_POST["daftar"])) {
        if (register_siswa($_POST) > 0) {
            echo "<script>
            alert('Akun Berhasil Terdaftar');
            document.location.href = 'siswa-login.php';
            </script>";
        } else {
            echo "<script>
            alert('Gagal Daftar Akun');
            document.location.href = 'siswa-register.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Login Siswa</title>
</head>

<body>

    <section class="d-flex justify-content-center" style="background-color: #f5f5f5;">
        <div class="w-50 d-flex align-items-center flex-column justify-content-center">
            <h3 class="fw-bold mt-5">Selamat Datang</h3>
            <p>Silahkan register agar dapat login</p>
            <form action="" method="POST" class="d-flex justify-content-center align-items-center row g-3 p-4 needs-validation w-75 shadow-sm mt-3 mb-5 bg-white">
                <label for="validationCustom01" class="form-label fw-bold">Nama Lengkap</label>
                <div class="input-group mt-0">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <label for="validationCustom01" class="form-label fw-bold">NISN</label>
                <div class="input-group mt-0">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-hashtag"></i></span>
                    <input type="number" class="form-control" name="nisn" required>
                </div>
                <label for="validationCustom01" class="form-label fw-bold">Telepon</label>
                <div class="input-group mt-0">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                    <input type="tel" class="form-control" name="telepon" required>
                </div>
                <label for="validationCustom01" class="form-label fw-bold">Jenis Kelamin</label>
                <div class="input-group mt-0">
                    <select class="form-select" id="inputGroupSelect01" name="kelamin">
                        <option selected>-- JENIS KELAMIN --</option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                </div>
                <label for="validationCustom01" class="form-label fw-bold">Kelas</label>
                <div class="input-group mt-0">
                    <select class="form-select" id="inputGroupSelect01" name="kelas">
                        <option selected>-- PILIH KELAS --</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <label for="validationCustom01" class="form-label fw-bold">Jurusan</label>
                <div class="input-group mt-0">
                    <select class="form-select" id="inputGroupSelect01" name="jurusan">
                        <option selected>-- Jurusan --</option>
                        <option value="jurusan1">Teknologi Informasi</option>
                        <option value="jurusan2">Desain Grafis</option>
                        <option value="jurusan3">Administrasi Bisnis</option>
                        <option value="jurusan4">Keuangan & Perbankan</option>
                        <option value="jurusan5">Manajemen Perhotelan</option>
                    </select>
                </div>
                <label for="validationCustom01" class="form-label fw-bold" name="password">Password</label>
                <div class="input-group mt-0">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="col-12 d-flex gap-2 justify-content-end">
                    <a class="btn btn-danger" href="../index.php">Batal</a>
                    <button class="btn btn-primary" type="submit" name="daftar">Sign Up</button>
                </div>
                <p class="text-center fw-regular mt-5">Already Have an Account? <a href="siswa-login.php" class="text-decoration-none text-primary fw-bold">Sign In</a></p>
            </form>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</body>

</html>