<?php
// include_once("session.php");

include_once("../conn.php");
?>
<?php include_once("navbar.php"); // session
if (!isset($_SESSION["username"])) {
    header("Location: login_admin.php");
    exit;
}
$id = $_GET["admin"];
?>


<?php if (isset($_POST["submit"])) : ?>

    <?php if (addBuku($_POST) > 0) : ?>
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'daftar_buku.php?admin=<?= $id; ?>';
        </script>
    <?php else : ?>
        <script>
            alert('data Errorr !!');
            document.location.href = 'daftar_buku.php?admin=<?= $id; ?>';
        </script>
    <?php endif ?>
<?php endif ?>



<div class="container">
    <div class="d-flex justify-content-center">
        <h1 class="mt-4">Form Tambah Buku Baru</h1>
    </div>

    <div class="d-flex justify-content-center">

        <div class="col-lg-8 col-sm-12">
            <div class="card mt-4">
                <div class="card-body">
                    <form method="POST">
                        <div class="row g-3 align-items-center mb-3">

                            <div class="col-3">
                                <label for="kode_buku" class="col-form-label">Kode Buku</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="kode_buku" id="kode_buku" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="judul_buku" class="col-form-label">Judul buku</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="judul_buku" id="judul_buku" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="Penulis_buku" class="col-form-label">Penulis buku</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="penulis_buku" id="Penulis_buku" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="penerbit_buku" class="col-form-label">Penerbit buku</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="penerbit_buku" id="penerbit_buku" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="tahun_terbit" class="col-form-label">Tahun Terbit</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="kategori" class="col-form-label">Kategori</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="kategori" id="kategori" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>


                        <div class="d-grid gap-2" style="margin: 0 10rem;">
                            <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include_once("footer.php") ?>