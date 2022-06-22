<?php
session_start();

// session
if (!isset($_SESSION["email"])) {
    header("Location: login_admin.php");
    exit;
}
