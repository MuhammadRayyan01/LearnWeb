<?php
$page_title = "Edit Book";
include __DIR__ . '/.. /includes/header.php';
require __DIR__ . '/.. /includes/koneksi.php';
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list.php');
    exit;
}
$stmt = $pdo->prepare("SELECT * FROM buku WHERE id = :id");
$stmt->execute(['id' => $id]);
$buku = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$buku) {
    header('Location: list.php');
    exit;
}
?>
        <section>
            <h2>Book Edit</h2>
            ...
            <form id="form-plus" method="post" action="proses_edit.php">
                <input type="hidden" name="id" value="<?php echo $buku['id']; ?>">
                <p>
                    <label for="title">Title</label><br>
                    <input type="text" id="title" name="title" value="<?php echo $buku['title']; ?>" required>
                </p>
                ...
            </form>
        </section>
