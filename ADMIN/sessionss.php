<?php
session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>
    alert('Anda Belum Login'); window.location = 'login_admin.php'
</script>";
}
