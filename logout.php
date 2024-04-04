<?php
session_start();

// Hapus semua data sesi
session_unset();
session_destroy();

// Hapus cookie ingat_saya
setcookie("ingat_saya", "", time() - 3600, "/");


header("Location: login.php");
exit;
?>
