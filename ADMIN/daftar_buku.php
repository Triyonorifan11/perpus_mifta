<?php
include_once("../conn.php");

include_once("navbar.php");

$books = query("SELECT * FROM buku");
$id = $_GET["admin"];
?>

<div class="container">
    <div class="d-flex justify-content-center">
        <h1 class="mt-4">Daftar Buku</h1>
    </div>

    <a href="tambah_buku.php?admin=<?= $id; ?>" class="btn btn-primary px-5">Tambah</a>

    <div class="card mt-3 mb-5">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="tablebuku">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Tanggal Input</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($books as $book) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $book["kode_buku"]; ?></td>
                                <td><?= $book["judul_buku"]; ?></td>
                                <td><?= $book["penulis_buku"]; ?></td>
                                <td><?= $book["penerbit_buku"]; ?></td>
                                <td><?= $book["tahun_penerbit"]; ?></td>
                                <td><?= $book["kategori"]; ?></td>
                                <td><?= $book["tgl_input"]; ?></td>
                                <td>
                                    <a href="edit_buku.php?admin=<?= $id; ?>&id_buku=<?= $book["id_buku"]; ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="delete_buku.php?admin=<?= $id; ?>&id_buku=<?= $book["id_buku"]; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Menaghapus data ini?');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</div>

<?php include_once("footer.php") ?>