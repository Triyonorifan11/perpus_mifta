<?php
// include_once("session.php");

include_once("../conn.php");
$id_buku = $_GET["id_buku"];
$id = $_GET["admin"];

if (deleteBuku($id_buku) > 0) {
    echo "
<script>
    alert('data berhasil dihapus');
    document.location.href = 'daftar_buku.php?admin=$id';
</script>
";
} else {
    echo "
<script>
    alert('data Errorr !!');
    document.location.href = 'daftar_buku.php?admin=$id';
</script>
";
    echo mysqli_error($conn);
}
