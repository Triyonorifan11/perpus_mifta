<?php
session_start();
if (isset($_SESSION["username"])) {
    $id = $_GET["admin"];
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
</head>

<body>

    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: white;">
        <div class="container-fluid container">
            <a href="dashboard.php?admin=<?= $id; ?>" class="navbar-brand me-4 fs-3" href="#"><i class="bi bi-house-door"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex  me-auto " role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary " type="submit"><i class="bi bi-search"></i></button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item d-flex">
                    </li>
                </ul>
                <h5 class="me-4"><?php if (isset($_SESSION["username"])) {
                                        echo "Selamat Datang, " . $_SESSION["username"];
                                    } ?></h5>

                <div class="dropdown">
                    <i class="bi bi-person-circle fs-3" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"></i>
                    <?php if (isset($_SESSION["username"])) : ?>
                        <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenu2">
                            <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                            <li><button class="dropdown-item" type="button">Setting</button></li>
                            <!-- <li><button class="dropdown-item" type="button">Something else here</button></li> -->
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>