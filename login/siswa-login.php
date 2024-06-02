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
            if (password_verify($password, $hasil['password']) && $nisn == $_POST['nisn']) {
                $_SESSION['signIn'] = true;
                $_SESSION['namaSiswa'] = $hasil['nama'];
                $_SESSION['nisn'] = $hasil['nisn'];
                echo "<script>
                alert('Login Siswa Berhasil');
                </script>";
                header("Location: ../pages/dashboardSiswa/index.php");
                exit;
            }
        } else {
            $error = true;
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
    <section class="d-flex">
        <div class="w-50 d-flex align-items-center flex-column justify-content-center">
            <h3 class="fw-bold">Selamat Datang</h3>
            <p>Silahkan login sebagai siswa</p>
            <form action="" method="POST" class="row g-3 p-4 needs-validation w-50 shadow-sm mt-3">
                <label for="validationCustom01" class="form-label fw-bold">NISN</label>
                <div class="input-group mt-0">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                    <input type="number" class="form-control" name="nisn" required>
                </div>
                <label for="validationCustom02" class="form-label fw-bold">Password</label>
                <div class="input-group mt-0">
                    <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <p class="text-center">Don't have an Account? <a href="siswa-register.php" class="text-decoration-none fw-bold">Register</a></p>
                <button class="btn btn-primary mt-3" type="submit" name="login">Login</button>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger mt-3" role="alert">Nisn / Password tidak sesuai!
                    </div>
                <?php endif; ?>
            </form>
        </div>
        <div class="w-50">
            <img src="../assets/public/library-siswa.jpg" alt="" class="w-100 vh-100">
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>