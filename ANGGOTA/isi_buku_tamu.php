<?php

include_once("../conn.php");
include_once("navbar.php");

// session
if (!isset($_SESSION["email"])) {
    header("Location: login_anggota.php");
    exit;
}
$id = $_GET["user"];
$absen_anggota = query("SELECT * from anggota WHERE id_anggota=$id")[0];
?>

<?php if (isset($_POST["submit"])) : ?>

    <?php if (createTamu($_POST) > 0) : ?>
        <script>
            alert('Selamat Datang Di Library');
            document.location.href = 'dashboard.php?user=<?= $id; ?>';
        </script>
    <?php else : ?>
        <script>
            alert('data Errorr !!');
            document.location.href = 'dashboard.php?user=<?= $id; ?>';
        </script>
    <?php endif ?>
<?php endif ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <h1 class="mt-4">Isi Buku Tamu</h1>
    </div>

    <div class="d-flex justify-content-center">

        <div class="col-lg-8 col-sm-12 col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <form method="POST">
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="Nama" class="col-form-label">Nama</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="nama" value="<?= $absen_anggota["nama_anggota"]; ?>" id="Nama" class="form-control" aria-describedby="passwordHelpInline" readonly>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="alamat" class="col-form-label">Alamat</label>
                            </div>
                            <div class="col-9">
                                <textarea class="form-control" name="alamat" id="alamat" rows="4" readonly><?= $absen_anggota["alamat_anggota"]; ?></textarea>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="telepon" class="col-form-label">No Telepon</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="telepon" value="<?= $absen_anggota["no_telp_anggota"]; ?>" id="telepon" class="form-control" aria-describedby="passwordHelpInline" readonly>
                            </div>
                        </div>

                        <!-- <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="Tanggal-hadir" class="col-form-label">Tanggal Kehadiran</label>
                            </div>
                            <div class="col-9">
                                <input type="date" name="tgl_hadir" id="Tanggal-hadir" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="Jam-hadir" class="col-form-label">Jam Kehadiran</label>
                            </div>
                            <div class="col-9">
                                <input type="time" name="jam_hadir" id="Jam-hadir" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div> -->

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