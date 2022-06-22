<?php
// include_once("session.php");
include_once("../conn.php");
include_once("navbar.php");
// session
if (!isset($_SESSION["username"])) {
    header("Location: login_admin.php");
    exit;
}
$id_admin = $_GET["admin"];
$id = $_GET["id"];

$idBuku = query("SELECT * from peminjaman WHERE id_peminjaman = $id")[0];
$id_buku = $idBuku["id_buku"];

$judul_buku = query("SELECT judul_buku from buku WHERE id_buku = $id_buku")[0];
$idAnggota = query("SELECT * from anggota");
?>

<?php if (isset($_POST["confirm_buku"])) : ?>

    <?php if (kembali_buku($_POST) > 0) : ?>
        <script>
            alert('data berhasil diperbarui');
            <?php update_status_peminjaman($id); ?>
            document.location.href = 'kembali_buku.php?admin=<?= $id_admin; ?>';
        </script>
    <?php else : ?>
        <script>
            alert('data Errorr !!');
            document.location.href = 'kembali_buku.php?admin=<?= $id_admin; ?>';
        </script>
    <?php endif ?>
<?php endif ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <h1>Confirm pengembalian Buku</h1>
    </div>

    <div class="d-flex justify-content-center">

        <div class="col-12">
            <div class="card mt-4">
                <div class="card-body">
                    <form method="POST">
                        <div class="d-flex">
                            <div class="col-8">
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-3">
                                        <label for="id_buku" class="col-form-label">ID Buku</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="id_buku" value="<?= $idBuku["id_buku"]; ?>" class="form-control" id="petugas" aria-describedby="passwordHelpInline" readonly>
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-3">
                                        <label for="judul_buku" class="col-form-label">Judul Buku</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="judul_buku" value="<?= $judul_buku["judul_buku"]; ?>" class="form-control" id="petugas" aria-describedby="passwordHelpInline" readonly>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-3">
                                        <label for="penulis" class="col-form-label">Nama Anggota - Peminjam</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="id_anggota" value="<?= $idBuku["id_anggota"]; ?>" class="form-control" id="petugas" aria-describedby="passwordHelpInline" readonly>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-3">
                                        <label for="petugas" class="col-form-label">Petugas</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="hidden" name="id_petugas" id="id" value="<?= $_GET["admin"]; ?>">
                                        <input type="text" value="<?= $_SESSION["username"]; ?>" class="form-control" id="petugas" aria-describedby="passwordHelpInline" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4 ps-5">

                                <div class="mb-3">
                                    <label for="tgl_pinjam" class="form-label">Tanggal Pengembalian</label>
                                    <input type="date" value="<?= $idBuku["tanggal_kembali"]; ?>" name="tgl_kembali" class="form-control" id="tgl_pinjam" aria-describedby="passwordHelpInline" required>
                                </div>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" name="confirm_buku" type="submit" style="height:100%">Confirm</button>
                                    <a href="kembali_buku.php?admin=<?= $id_admin; ?>" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>