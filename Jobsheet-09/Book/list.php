<?php
$page_title = "Book List";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

require __DIR__ . '/../includes/koneksi.php';
$daftarBuku = $pdo->query("SELECT * FROM book ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<main>
<section>
    <h2>Book List</h2>
    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['message']; ?></p>
    <?php endif; ?>
    
    <div class="search-box">
        <label for="search-input">Search Book Title</label>
        <input type="text" id="search-input" placeholder="Type book title...">
    </div>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($daftarBuku)): ?>
                <tr>
                    <td colspan="5">There is no book data yet. Please add it via the "Add Books" menu.</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($daftarBuku as $buku): ?>
                <tr>
                    <td><?php echo htmlspecialchars($buku['title']); ?></td>
                    <td><?php echo htmlspecialchars($buku['author']); ?></td>
                    <td><?php echo htmlspecialchars($buku['year']); ?></td>
                    <td><?php echo htmlspecialchars($buku['stock']); ?></td>
                    <td>
                        <button type="button">Edit</button>
                        <button type="button" class="btn-delete">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>