<?php
// include_once("session.php");

include_once("../conn.php");
$id = $_GET["admin"];
?>

<?php
include_once("navbar.php");
// session
if (!isset($_SESSION["username"])) {
    header("Location: login_admin.php");
    exit;
} ?>

<?php if (isset($_POST["submit"])) : ?>

    <?php if (addAnggota($_POST) > 0) : ?>
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'tambah_anggota.php?admin=<?= $id; ?>';
        </script>
    <?php else : ?>
        <script>
            alert('data Errorr !!');
            document.location.href = 'tambah_anggota.php?admin=<?= $id; ?>';
        </script>
    <?php endif ?>
<?php endif ?>



<?php $no_identitas = query("SELECT no_identitas FROM anggota order by no_identitas desc;")[0]; ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <h1 class="mt-4">Form Tambah Anggota Baru</h1>
    </div>

    <div class="d-flex justify-content-center">

        <div class="col-lg-8 col-sm-12">
            <div class="card my-4">
                <div class="card-body">
                    <form method="POST">

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="identitas" class="col-form-label">No. Identitas</label>
                            </div>
                            <div class="col-9">
                                <input type="text" value="<?= $no_identitas["no_identitas"] + 1; ?>" name="no_identitas" id="identitas" class="form-control" aria-describedby="passwordHelpInline" readonly>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="Nama" class="col-form-label">Nama</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="nama_anggota" id="Nama" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="jk" class="col-form-label">Jenis Kelamin</label>
                            </div>
                            <div class="col-9">
                                <select class="form-select" aria-label="Default select example" name="jk_anggota">
                                    <option selected value="Laki-Laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="no_telp_anggota" class="col-form-label">No. Telp / WhatsApp</label>
                            </div>
                            <div class="col-9">
                                <input type="number" name="no_telp_anggota" id="no_telp_anggota" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="alamat_anggota" class="col-form-label">Alamat</label>
                            </div>
                            <div class="col-9">
                                <textarea class="form-control" name="alamat_anggota" id="alamat_anggota" rows="3" required></textarea>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="email" class="col-form-label">Email</label>
                            </div>
                            <div class="col-9">
                                <input type="email" name="email" id="email" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-3">
                                <label for="password" class="col-form-label">Password</label>
                            </div>
                            <div class="col-9">
                                <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2" style="margin: 0 10rem;">
                            <button class="btn btn-primary" type="submit" name="submit">Registrasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include_once("footer.php") ?>