<?php
require_once '../../config/app.php';
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
    <title><?= $title; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg header-top bg-light sticky-top shadow-sm">
        <div class="w-100 mx-5 d-flex justify-content-between">
            <a class="navbar-brand fw-bold" href="#">Perpustakaan</a>
            <div class="d-flex align-items-center gap-4">
                <a href="../../loginSystem/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')" class="btn btn-danger">Logout</a>
                <img src="../../assets/icon/profil.png" alt="profil" width="40px">
            </div>
        </div>
    </nav>