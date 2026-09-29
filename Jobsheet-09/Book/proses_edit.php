<?$id = $_POST['id'] ?? null;
// ... Take another field of $_POST, validate it (identical to proses_tambah.php)...
if (!$id) {
    header('Location: list.php');
    exit;
}
// ... If there is a validation error, redirect to edit.php?id=... (not tambah.php)...
$stmt = $pdo->prepare(
    "UPDATE book SET title = :title, author = :p engarang, year = :year,
     isbn = :isbn, stok = :stok, category = :category WHERE id = :id"
);
$stmt->execute([
    'title' => $judul,
    'author' => $pengarang,
    'year' => (int) $tahun,
    'isbn' => $isbn,
    'stock' => (int) $stok,
    'category' => $kategori,
    'id' => $id,
]);
?>