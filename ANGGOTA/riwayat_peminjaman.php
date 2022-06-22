<?php
// include_once("session.php");

include_once("../conn.php");
include_once("navbar.php");

// session
if (!isset($_SESSION["email"])) {
    header("Location: login_anggota.php");
    exit;
}

$id = $_GET["user"];
$books = query("SELECT * FROM peminjaman WHERE id_anggota = $id");
// $kembali = query("SELECT id_buku FROM pengembalian WHERE id_anggota = $id");
$result = mysqli_query($conn, "SELECT id_buku FROM pengembalian WHERE id_anggota = $id");

// $id_kembali = statusPinjam($id);
// var_dump($id_kembali);
?>
<?php include_once("navbar.php") ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <h1 class="mt-4">Riwayat Peminjaman Buku</h1>
    </div>

    <!-- table daftar buku yang dipinjam -->

    <div class="card my-5">
        <div class="card-header bg-primary bg-gradient text-light">
            <h5>Daftar Buku Dipinjam</h5>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="card mt-3 mb-5">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="tablebuku_pinjam">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Peminjaman</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Tanggal Kembali</th>
                                        <th scope="col">ID Buku</th>
                                        <th scope="col">ID Petugas</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($books as $book) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $book["id_peminjaman"]; ?></td>
                                            <td><?= $book["tanggal_pinjam"]; ?></td>
                                            <td><?= $book["tanggal_kembali"]; ?></td>
                                            <td><?= $book["id_buku"]; ?></td>
                                            <td><?= $book["id_petugas"]; ?></td>
                                            <td class="fw-bold <?= $book["status"] == 0 ? "text-danger" : "text-success" ?>"><?= $book["status"] == 0 ? "Belum Kembali" : "Kembali" ?></td>
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
    <!-- akhir table daftar buku yang dipinjam -->

</div>

<?php include_once("footer.php") ?>