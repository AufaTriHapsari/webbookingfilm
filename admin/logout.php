<?php
session_start();

// Hapus session
unset($_SESSION['uid']);
session_destroy();

// Hapus cookie
if(isset($_COOKIE['ingat_saya'])){
    // Hapus cookie dengan memberikan nilai kosong dan masa berlaku yang sudah berlalu
    setcookie('ingat_saya', '', time() - 3600, '/');
}

// Redirect ke halaman login
echo "<script> window.location.href='../login.php';  </script>";
?>

