<?php
session_start();
if (!isset($_SESSION['adid'])) {
    echo "<script>window.location.href = 'front_admin_login.php';</script>";
    exit;
}

session_unset();
echo "<script>window.location.href = 'front_admin_login.php';</script>";
?>