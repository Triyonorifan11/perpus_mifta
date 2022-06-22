<?php
include_once("../conn.php");

// include_once("session.php");

include_once("navbar.php");

// session
if (!isset($_SESSION["username"])) {
    header("Location: login_admin.php");
    exit;
}
$id = $_GET["admin"];
?>


<div class="container mt-4">
    <div class="row">
        <!-- card 1 -->
        <div class="col-lg-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center m-4">
                        <img src="../GAMBAR/body.png" alt="" class="me-5" width="100px">
                        <img src="../GAMBAR/add.png" alt="" width="100px">
                    </div>

                    <div class="d-grid gap-2 px-5">
                        <a href="tambah_anggota.php?admin=<?= $id; ?>" class="btn btn-outline-primary" type="button">Tambah Member Baru</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- card 2 -->
        <div class="col-lg-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center m-4">
                        <img src="../GAMBAR/open-book.png" class="me-5" alt="" width="100px">
                        <img src="../GAMBAR/add.png" alt="" width="100px">
                    </div>

                    <div class="d-grid gap-2 px-5">
                        <a href="daftar_buku.php?admin=<?= $id; ?>" class="btn btn-outline-primary" type="button">Tambah Koleksi Buku</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- card 3 -->
        <div class="col-lg-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center m-4">
                        <img src="../GAMBAR/notice.png" class="me-5" alt="" width=" 100px">
                        <img src="../GAMBAR/checked.png" alt="" width="100px">
                    </div>

                    <div class="d-grid gap-2 px-5">
                        <a href="kembali_buku.php?admin=<?= $id; ?>" class="btn btn-outline-primary" type="button">Konfirmasi Pengembalian Buku</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- card 4 -->
        <div class="col-lg-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center m-4">
                        <img src="../GAMBAR/notes.png" alt="" width="100px">
                    </div>

                    <div class="d-grid gap-2 px-5">
                        <a href="lihat_buku_tamu.php?admin=<?= $id; ?>" class="btn btn-outline-primary" type="button">Lihat Buku Tamu</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- card 5 -->
        <div class="col-lg-6 col-sm-12 mb-4">
            <div class="card" style="margin-bottom: 10rem;">
                <div class="card-body">
                    <div class="d-flex justify-content-center m-4">
                        <img src="../GAMBAR/open-book.png" class="me-5" alt="" width="100px">
                    </div>

                    <div class="d-grid gap-2 px-5">
                        <a href="peminjaman_buku.php?admin=<?= $id; ?>" class="btn btn-outline-primary" type="button">Peminjaman Buku</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php") ?>