<?php

session_start();
require_once '../config/app.php';

if (isset($_POST['login'])) {
    $nisn = mysqli_real_escape_string($db, $_POST['nisn']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $result = mysqli_query($db, "SELECT * FROM siswa WHERE nisn = '$nisn'");

    if (isset($_POST['login'])) {
        if (mysqli_num_rows($result) == 1) {
            $hasil = mysqli_fetch_assoc($result);
            if (password_verify($password, $hasil['password'])) {
                $_SESSION['signIn'] = true;
                $_SESSION['siswa']['nisn'] = $hasil['nisn'];
                $_SESSION['siswa']['nama'] = $hasil['nama'];
                $_SESSION['siswa']['kelas'] = $hasil['kelas'];
                $_SESSION['siswa']['jurusan'] = $hasil['jurusan'];
                $_SESSION['siswa']['kelamin'] = $hasil['kelamin'];
                $_SESSION['siswa']['telepon'] = $hasil['telepon'];
                echo "<script>
                alert('Login Berhasil');
                </script>";
                header("Location: ../pages/dashboardSiswa/index.php");
                exit;
            } else {
                $error = true;
            }
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

<body class="d-flex vh-100">
    <div class="container justify-content-center align-content-center my-5">
        <div class="card p-2 w-50 mx-auto rounded-5">
            <div class="position-absolute top-0 start-50 translate-middle">
                <img src="../assets/icon/profil.png" alt="adminLogo" width="85px">
            </div>
            <h1 class="pt-5 text-center fw-bold">Sign In Siswa</h1>
            <hr>
            <form action="" method="post" class="row g-3 p-4 needs-validation" novalidate>
                <label for="validationCustom01" class="form-label fw-bold">Nama Lengkap</label>
                <div class="input-group mt-0">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control" name="username" required>
                    <div class="invalid-feedback">
                        Masukkan Username
                    </div>
                </div>
                <label for="validationCustom01" class="form-label fw-bold">nisn</label>
                <div class="input-group mt-0">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-hashtag"></i></span>
                    <input type="number" class="form-control" name="nisn" required>
                    <div class="invalid-feedback">
                        Masukkan Nisn anda!
                    </div>
                </div>
                <label for="validationCustom02" class="form-label fw-bold">Password</label>
                <div class="input-group mt-0">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" required>
                    <div class="invalid-feedback">
                        Masukkan Password anda!
                    </div>
                </div>
                <div class="col-12 d-flex gap-2 justify-content-end">
                    <a class="btn btn-danger" href="../index.php">Batal</a>
                    <button class="btn btn-primary" type="submit" name="login">Sign In</button>
                </div>
                <p class="text-center fw-regular mt-5 ">Don't have an account yet? <a href="siswa-register.php" class="text-decoration-none text-primary fw-bold">Sign Up</a></p>
            </form>
        </div>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger mt-2" role="alert">Nama / Nisn / Password tidak sesuai !
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>