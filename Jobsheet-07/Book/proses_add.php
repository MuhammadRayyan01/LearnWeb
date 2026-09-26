<?php
session_start();
$judul = trim($_POST['title'] ?? '');
$pengarang = trim($_POST['author'] ?? '');
$tahun = $_POST['year'] ?? '';
$isbn = trim($_POST['isbn'] ?? '');
$stok = $_POST['stock'] ?? '';
$kategori = trim($_POST['category'] ?? '');

$errors = [];
if ($judul === '') {
    $errors[] = "Title required.";
}
if ($pengarang === '') {
    $errors[] = "Author must be filled.";
}
if (!is_numeric($tahun) || $tahun < 1900 || $tahun > 2026) {
    $errors[] = "The year must be between 1900-2026.";
}
if (!is_numeric($stok) || $stok < 0) {
    $errors[] = "Stock must not be negative.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => implode(' ', $errors)];
    header('Location: add.php');
    exit;
}

if (!isset($_SESSION['book'])) {
    $_SESSION['book'] = [];
}
$_SESSION['book'][] = [
    'title' => $judul,
    'author' => $pengarang,
    'year' => (int) $tahun,
    'isbn' => $isbn,
    'stock' => (int) $stok,
    'category' => $kategori,
];
$_SESSION['flash'] = ['type' => 'success', 'message' => 'Books successfully added.'];
header('Location: list.php');
exit;
