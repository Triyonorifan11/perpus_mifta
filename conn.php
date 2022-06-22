<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpusku";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function addBuku($data)
{
    global $conn;
    $kode_buku = htmlspecialchars($data["kode_buku"]);
    $judul_buku = htmlspecialchars($data["judul_buku"]);
    $penulis_buku = htmlspecialchars($data["penulis_buku"]);
    $penerbit_buku = htmlspecialchars($data["penerbit_buku"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    $kategori = htmlspecialchars($data["kategori"]);

    $tgl_input = date("Y-m-d");

    $insert = "INSERT INTO buku VALUES ('','$kode_buku', '$judul_buku', '$penulis_buku', '$penerbit_buku', '$tahun_terbit', '$kategori', '$tgl_input')";
    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

function addAnggota($data)
{
    global $conn;
    $no_identitas = htmlspecialchars($data["no_identitas"]);
    $nama_anggota = htmlspecialchars($data["nama_anggota"]);
    $jk_anggota = htmlspecialchars($data["jk_anggota"]);
    $no_telp_anggota = htmlspecialchars($data["no_telp_anggota"]);
    $alamat_anggota = htmlspecialchars($data["alamat_anggota"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);

    $insert = "INSERT INTO anggota VALUES ('', '$no_identitas', '$nama_anggota', '$jk_anggota', '$no_telp_anggota', '$alamat_anggota', '$email', '$password' )";
    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

function deleteBuku($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id_buku = $id");

    return mysqli_affected_rows($conn);
}

function updateBuku($data)
{
    global $conn;
    $id = $data["id_buku"];
    $kode_buku = htmlspecialchars($data["kode_buku"]);
    $judul_buku = htmlspecialchars($data["judul_buku"]);
    $penulis_buku = htmlspecialchars($data["penulis_buku"]);
    $penerbit_buku = htmlspecialchars($data["penerbit_buku"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    $kategori = htmlspecialchars($data["kategori"]);

    $tgl_input = date("Y-m-d");

    $query = "UPDATE buku SET
    kode_buku = $kode_buku,
    judul_buku = '$judul_buku',
    penulis_buku = '$penulis_buku',
    penerbit_buku = '$penerbit_buku',
    tahun_penerbit = '$tahun_terbit',
    kategori = '$kategori',
    tgl_input = '$tgl_input'
    WHERE id_buku = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function createTamu($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $tgl_hadir = date("Y-m-d");
    $jam_hadir = date("H:i:s");

    $insert = "INSERT INTO pengunjung VALUES ('', '$nama', '$alamat', '$telepon', '$tgl_hadir', '$jam_hadir')";
    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

// Ambil id Buku
function pinjamBuku($data)
{
    global $conn;
    $tgl_pinjam = date("Y-m-d");
    $tgl_kembali = $data["tgl_kembali"];
    $id_buku = $data["id_buku"];
    $id_anggota = $data["id_anggota"];
    $id_petugas = $data["id_petugas"];
    $status = 0;

    $insert = "INSERT INTO peminjaman VALUES ('', '$tgl_pinjam', '$tgl_kembali', '$id_buku', '$id_anggota', '$id_petugas', $status)";
    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

// 
function statusPinjam($id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT id_buku FROM pengembalian WHERE id_anggota = $id");
    $id_kembali = [];
    while ($kembali = mysqli_fetch_assoc($result)) {
        $id_kembali[] = $kembali["id_buku"];
    }
    return $id_kembali;
}


// confirm Kembali Buku
function kembali_buku($data)
{
    global $conn;
    $tanggal_pengembalian = htmlspecialchars($data["tgl_kembali"]);
    $id_buku = htmlspecialchars($data["id_buku"]);
    $id_anggota = htmlspecialchars($data["id_anggota"]);
    $id_petugas = htmlspecialchars($data["id_petugas"]);

    $insert = "INSERT INTO pengembalian VALUES ('','$tanggal_pengembalian','$id_buku','$id_anggota','$id_petugas')";
    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

// update
function update_status_peminjaman($id)
{
    global $conn;

    $query = "UPDATE peminjaman SET status = 1 WHERE id_peminjaman = $id";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}
