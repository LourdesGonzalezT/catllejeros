<?php include "connection/connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catllejeros</title>
    <link rel="shortcut icon" href="images/imgWeb/paw-green.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> -->
    <!-- Spinner End -->
    <header class="fixed-top">
    <nav class="navbar navbar-expand-lg " id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style="order: -1;"><span style= "font-size: 1.4rem"><span
                                class="brandWelcome1">Cat</span><span class="brandWelcome2">llejeros</span></span> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item navLink">
                    <a class="nav-link active" aria-current="page" href="#cats-section">ADOPTA</a>
                </li>
                <li class="nav-item navLink">
                    <a class="nav-link" href="#events-section">EVENTOS</a>
                </li>
                <li class="nav-item navLink">
                    <a class="nav-link" href="#reports-section">NOTICIAS</a>
                </li>
                <li class="nav-item navLink">
                    <a class="nav-link" href="#services-section">SERVICIOS</a>
                </li>
                <li class="nav-item navLink">
                    <a class="nav-link" href="#contact-section">CONTACTO</a>
                </li>
                <?php if (isset($_SESSION["loggedin"])) { ?>
                <li class="nav-item dropdown dropstart">
                    <a class="nav-link navLink dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        ADMIN:<?= $_SESSION['name'] ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-start">
                        <li><a class="dropdown-item navLink" href="register-forms.php">Registrar</a></li>
                        <li><a class="dropdown-item navLink" href="registerAdmin-form.php">Registrar Admin</a></li>
                        <li><a class="dropdown-item navLink" href="admin-editForm.php">Editar admin</a></li>
                        <li><a class="dropdown-item navLink" href="login-form.php">Login</a></li>
                        <li><a class="dropdown-item navLink" href="controllers/admins/logout-admin.php">Cerrar sesión</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

    </header>