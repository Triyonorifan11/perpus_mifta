<?php

include_once("../conn.php");

include_once("navbar.php");
// include_once("session.php");
if (!isset($_SESSION["email"])) {
    header("Location: login_anggota.php");
    exit;
}

$id = $_GET["user"];

?>

<div class="container">
    <div class="card my-5">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-sm-5">
                    <img src="../GAMBAR/books.png" alt="" width="100%">
                </div>
                <div class="col-lg-7 d-flex ms-lg-5">
                    <div class="row col-sm-12">
                        <div class="d-lg-flex justify-content-center align-items-center">
                            <div class="col-lg-6 col-sm-12">
                                <a href="lihat_buku.php?user=<?= $id ?>" class="btn btn-lg btn-outline-primary box-link">Telusuri Buku</a>
                            </div>
                        </div>
                        <div class="d-lg-flex">
                            <div class="col-lg-6 col-sm-12 mt-4">
                                <a href="riwayat_peminjaman.php?user=<?= $id ?>" class="btn btn-lg btn-outline-primary box-link">Riwayat Peminjaman</a>
                            </div>
                            <div class="col-lg-6 col-sm-12 mt-4 ">
                                <a href="isi_buku_tamu.php?user=<?= $id ?>" class="btn btn-lg btn-outline-primary box-link">Isi Buku Tamu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- table daftar buku yang kembali -->



    <!-- akhir table daftar buku yang kembali -->


</div>

<?php include_once("footer.php") ?>