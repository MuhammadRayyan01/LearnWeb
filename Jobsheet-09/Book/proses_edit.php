<?php
session_start();

// Aktifkan error reporting untuk mempermudah debugging jika ada error lain
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../includes/koneksi.php';

// 1. Ambil data ID
$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: list.php');
    exit;
}

// 2. Ambil field dari $_POST
$judul     = trim($_POST['title'] ?? '');
$pengarang = trim($_POST['author'] ?? '');
$tahun     = $_POST['year'] ?? null;
$isbn      = trim($_POST['isbn'] ?? '');
$stok       = $_POST['stok'] ?? null;
$kategori  = $_POST['category'] ?? '';

// 3. Validasi field wajib
if (empty($judul) || empty($pengarang) || empty($tahun)) {
    $_SESSION['flash'] = [
        'type' => 'danger', 
        'message' => 'Judul, Pengarang, dan Tahun wajib diisi!'
    ];
    header('Location: edit.php?id=' . urlencode($id));
    exit;
}

try {
    // 4. Prepare SQL Update Query
    $stmt = $pdo->prepare(
        "UPDATE book SET 
            title = :title, 
            author = :author, 
            year = :year,
            isbn = :isbn, 
            stock = :stock, 
            category = :category 
         WHERE id = :id"
    );

    // 5. Eksekusi Query
    $stmt->execute([
        'title'    => $judul,
        'author'   => $pengarang,
        'year'     => (int) $tahun,
        'isbn'     => $isbn,
        'stock'    => (int) $stok,
        'category' => $kategori,
        'id'       => $id,
    ]);

    $_SESSION['flash'] = [
        'type' => 'success', 
        'message' => 'Buku berhasil diperbarui!'
    ];
    header('Location: list.php');
    exit;

} catch (PDOException $e) {
    $_SESSION['flash'] = [
        'type' => 'danger', 
        'message' => 'Gagal memperbarui data: ' . $e->getMessage()
    ];
    header('Location: edit.php?id=' . urlencode($id));
    exit;
}