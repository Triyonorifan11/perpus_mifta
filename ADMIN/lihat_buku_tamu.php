<?php
// include_once("session.php");
include_once("../conn.php");
include_once("navbar.php");
// session
if (!isset($_SESSION["username"])) {
    header("Location: login_admin.php");
    exit;
}
$id = $_GET["admin"];

$tamu = query("SELECT * FROM pengunjung");
?>

<div class="container">
    <div class="d-flex justify-content-center">
        <h1 class="mt-4">Buku Tamu || Pengunjung</h1>
    </div>

    <form action="" method="post">
        <div class="col-3 d-flex">
            <input type="date" id="Tanggal-lahir" class="form-control" aria-describedby="passwordHelpInline" required>
            <button class="btn btn-outline-success mx-2" type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>

    <div class="card mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table  mt-4" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Tanggal Berkunjung</th>
                            <th scope="col">Jam Berkunjung</th>
                            <!-- <th scope="col">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tamu as $pengunjung) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $pengunjung['nama']; ?></td>
                                <td><?= $pengunjung['alamat']; ?></td>
                                <td><?= $pengunjung['no_telp']; ?></td>
                                <td><?= $pengunjung['tgl_hadir']; ?></td>
                                <td><?= $pengunjung['jam_hadir']; ?></td>
                                <!-- <td>
                                    <a href="edit_buku.php?admin=<?= $id; ?>&id=<?= $pengunjung["id"]; ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="delete_buku.php?admin=<?= $id; ?>&id=<?= $pengunjung["id"]; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Menaghapus data ini?');">Hapus</a>
                                </td> -->
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

<?php include_once("footer.php") ?>