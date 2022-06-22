<?php
// include_once("session.php");
include_once("../conn.php");
include_once("navbar.php");
// session
if (!isset($_SESSION["username"])) {
    header("Location: login_admin.php");
    exit;
}

?>

<?php
$id = $_GET["admin"];

$books = query("SELECT * FROM peminjaman");
$nama_peminjam = query("SELECT nama_anggota from anggota");
// var_dump($nama_peminjam);
// $kembali = query("SELECT id_buku FROM pengembalian WHERE id_anggota = $id");
$result = mysqli_query($conn, "SELECT id_buku FROM pengembalian ");
?>
<div class="container">
    <div class="d-flex justify-content-center">
        <h1 class="mt-4">Konfirmasi Pengembalian Buku</h1>
    </div>

    <div class="card my-5">
        <div class="card-header bg-primary bg-gradient text-light">
            <h5>Daftar Buku Dipinjam</h5>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="card mt-3 mb-5">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="tb_pinjam">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Anggota</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Tanggal Kembali</th>
                                        <th scope="col">ID Buku</th>
                                        <th scope="col">ID Petugas</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Confirm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($books as $book) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $book["id_anggota"]; ?></td>
                                            <td><?= $book["tanggal_pinjam"]; ?></td>
                                            <td><?= $book["tanggal_kembali"]; ?></td>
                                            <td><?= $book["id_buku"]; ?></td>
                                            <td><?= $book["id_petugas"]; ?></td>
                                            <td class="fw-bold <?= $book["status"] == 0 ? "text-danger" : "text-success" ?>"><?= $book["status"] == 0 ? "Belum Kembali" : "Kembali" ?></td>
                                            <td>
                                                <a href="confirm.php?admin=<?= $id; ?>&id=<?= $book["id_peminjaman"]; ?>" class="btn btn-outline-success <?= $book["status"] == 0 ? "" : "disabled" ?>">Confirm</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php") ?>