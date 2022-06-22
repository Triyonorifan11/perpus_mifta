<?php
include_once("conn.php");

$books = query("SELECT DISTINCT kategori FROM buku");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS/home.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: white;">
        <div class="container-fluid container">
            <a class="navbar-brand me-4 fs-3" href="#"><i class="bi bi-house-door"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex  me-auto " role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success " type="submit"><i class="bi bi-search"></i></button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item d-flex">
                        <a href="ANGGOTA/login_anggota.php" class="btn btn-sm btn-outline-primary" aria-current="page" href="#">Login Member</a>
                        <a href="ADMIN/login_admin.php" class="btn btn-sm mx-3 btn-outline-primary" aria-current="page" href="#">Login Operator</a>
                    </li>
                </ul>
                <i class="bi bi-person-circle fs-3"></i>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="bg-light my-4 ">
            <div class="img-jumbo">
                <div class="box">LIBRARY</div>
            </div>
        </div>

        <!-- pengumuman -->
        <div class="row ">
            <div class="col-lg-12">
                <div class=" d-lg-flex d-md-grid">
                    <div class="col-lg-3 col-md-6 p-3">
                        <h3>Pengumuman</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam qui iste porro temporibus dicta. Sint maxime laudantium dicta aliquid quibusdam optio libero, similique velit nostrum sed dolore rem veritatis nemo.</p>
                    </div>

                    <div class="col-lg-3 col-md-6 p-3">
                        <h3>Koleksi</h3>

                        <?php $i = 1 ?>
                        <?php foreach ($books as $book) : ?>
                            <a href="" class="btn btn-outline-primary mt-2"><?= $book["kategori"]; ?></a>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-lg-3 col-md-6 p-3">
                        <h3>Kontak Kami</h3>
                        <ul>
                            <li>WA : 085655624796 (Admin)</li>
                            <li>Email : library@gmail.com</li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 p-3">
                        <h3>Jam Operasional</h3>
                        <ul>
                            <li>Senin : 08.00-15.00 WIB</li>
                            <li>Selasa : 08.00-15.00 WIB</li>
                            <li>Rabu : 08.00-15.00 WIB</li>
                            <li>Kamis : 08.00-15.00 WIB</li>
                            <li>Jum'at : 08.00-15.00 WIB</li>
                            <li>Sabtu : Libur</li>
                            <li>Minggu : Libur</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>