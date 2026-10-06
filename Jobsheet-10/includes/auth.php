<?php
// Guard clause: di-require di baris paling atas halaman yang butuh login
// (sebelum header.php mencetak output), supaya header('Location: ...') masih bisa dipanggil.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}