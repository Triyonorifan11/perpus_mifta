<?php


include_once("../conn.php");

include_once("navbar.php");

// session
if (!isset($_SESSION["email"])) {
    header("Location: login_anggota.php");
    exit;
}
?>

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
                                        <input type="text" name="nama" id="id_buku" class="form-control" aria-describedby="passwordHelpInline" required>
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-3">
                                        <label for="judul_buku" class="col-form-label">Judul Buku</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="judul" id="judul_buku" class="form-control" aria-describedby="passwordHelpInline" required>
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-3">
                                        <label for="penulis" class="col-form-label">Penulis</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="pengarang" id="penulis" class="form-control" aria-describedby="passwordHelpInline" required>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-3">
                                        <label for="penerbit" class="col-form-label">Penerbit</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="penerbit" id="penerbit" class="form-control" aria-describedby="passwordHelpInline" required>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-3">
                                        <label for="tahun" class="col-form-label">Tahun</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" name="tahun_terbit" id="tahun" class="form-control" aria-describedby="passwordHelpInline" required>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-3">
                                        <label for="ketersediaan" class="col-form-label">Ketersediaan</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="ketersediaan" class="form-control" aria-describedby="passwordHelpInline" required>
                                    </div>
                                </div>


                            </div>

                            <div class="col-4 ps-5">

                                <div class="mb-3">
                                    <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" id="tanggal_peminjaman" aria-describedby="passwordHelpInline">
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                    <input type="date" class="form-control" id="durasi_peminjaman" aria-describedby="passwordHelpInline">
                                </div>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit" style="height:200%">Pinjam</button>
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