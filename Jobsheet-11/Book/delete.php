<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';
//Deliberately only accept POST (not GET) so that deletion cannot be done Accidentally triggered via link/preview crawler.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: list.php');
    exit;
}
$id = $_POST['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM book WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $_SESSION['flash'] = ['type' => 'success', 'message' => 'The book was successfully deleted.'];
}
header('Location: list.php');
exit;
