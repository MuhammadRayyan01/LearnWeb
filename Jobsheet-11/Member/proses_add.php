<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$nama       = trim($_POST['nama'] ?? '');
$no_anggota = trim($_POST['no_anggota'] ?? '');
$alamat     = trim($_POST['alamat'] ?? '');
$no_hp      = trim($_POST['no_hp'] ?? '');

$errors = [];
if ($nama === '') {
    $errors[] = "Name required.";
}
if ($no_anggota === '' || !preg_match('/^[A-Za-z0-9\-]+$/', $no_anggota)) {
    $errors[] = "Member number is required (letters, numbers and hyphens only).";
}
if ($alamat === '') {
    $errors[] = "Address must be filled.";
}
if ($no_hp === '' || !preg_match('/^[0-9\-+]+$/', $no_hp)) {
    $errors[] = "Phone number is required and must contain only numbers, hyphens or +.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => implode(' ', $errors)];
    header('Location: add.php');
    exit;
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO member (nama, no_anggota, alamat, no_hp)
         VALUES (:nama, :no_anggota, :alamat, :no_hp)"
    );
    $stmt->execute([
        'nama'       => $nama,
        'no_anggota' => $no_anggota,
        'alamat'     => $alamat,
        'no_hp'      => $no_hp,
    ]);
} catch (PDOException $e) {
    $msg = $e->getCode() === '23505'
        ? 'Member number already exists.'
        : 'Failed to save member: ' . $e->getMessage();
    $_SESSION['flash'] = ['type' => 'error', 'message' => $msg];
    header('Location: add.php');
    exit;
}

$_SESSION['flash'] = ['type' => 'success', 'message' => 'Member successfully added.'];
header('Location: list.php');
exit;