<?php


include_once("../conn.php");

include_once("navbar.php");

// session
if (!isset($_SESSION["email"])) {
    header("Location: login_anggota.php");
    exit;
}

$books = query("SELECT * FROM buku");

?>

<div class="container">
    <div class="d-flex justify-content-center">
        <h1 class="mt-4">Daftar Buku</h1>
    </div>

    <div class="card mt-3 mb-5">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Kategori</th>



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



                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php") ?>