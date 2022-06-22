<?php


include_once("../conn.php");

include_once("navbar.php");

// session
if (!isset($_SESSION["username"])) {
    header("Location: login_anggota.php");
    exit;
}

$id_admin = $_GET["admin"];

$idBuku = query("SELECT * from buku");
$idAnggota = query("SELECT * from anggota");
?>

<?php if (isset($_POST["pinjam_buku"])) : ?>

    <?php if (pinjamBuku($_POST) > 0) : ?>
        <script>
            alert('Buku dipinjam');
            document.location.href = 'dashboard.php?admin=<?= $id_admin; ?>';
        </script>
    <?php else : ?>
        <script>
            alert('data Errorr !!');
            document.location.href = 'dashboard.php?admin=<?= $id_admin; ?>';
        </script>
    <?php endif ?>

<?php endif ?>

<div class="container">
    <div class="d-flex justify-content-center">

        <h1>Peminjaman Buku</h1>
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
                                        <select class="form-select" aria-label="Default select example" id="id_buku" name="id_buku" required>
                                            <option selected>ID Buku</option>
                                            <?php foreach ($idBuku as $id_buku) : ?>
                                                <option value="<?= $id_buku["id_buku"]; ?>"><?= $id_buku["id_buku"]; ?> - <?= $id_buku["judul_buku"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-3">
                                        <label for="judul_buku" class="col-form-label">Judul Buku</label>
                                    </div>
                                    <div class="col-9">
                                        <select class="form-select" aria-label="Default select example" id="judul_buku" name="judul_buku" required>
                                            <option selected>Judul Buku</option>
                                            <?php foreach ($idBuku as $id_buku) : ?>
                                                <option value="<?= $id_buku["id_buku"]; ?>"><?= $id_buku["judul_buku"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-3">
                                        <label for="penulis" class="col-form-label">Nama Anggota - Peminjam</label>
                                    </div>
                                    <div class="col-9">
                                        <select class="form-select" aria-label="Default select example" name="id_anggota" required>
                                            <option selected>Pilih Nama Anggota</option>
                                            <?php foreach ($idAnggota as $id_Anggota) : ?>
                                                <option value="<?= $id_Anggota["id_anggota"]; ?>"><?= $id_Anggota["nama_anggota"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
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
                                    <input type="date" name="tgl_kembali" class="form-control" id="tgl_pinjam" aria-describedby="passwordHelpInline" required>
                                </div>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" name="pinjam_buku" type="submit" style="height:200%">Pinjam</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../ADMIN/footer.php") ?>