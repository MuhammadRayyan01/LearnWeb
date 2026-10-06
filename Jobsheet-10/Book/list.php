<?php
$page_title = "Book List";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

require __DIR__ . '/../includes/koneksi.php';

// Point 5: Pagination & Server-Side Search Logic[cite: 1]
$perPage = 5;
$page = max(1, (int) ($_GET['page'] ?? 1));
$offset = ($page - 1) * $perPage;
$keyword = trim($_GET['q'] ?? '');

if ($keyword !== '') {
    // Adjusted table 'book' and column 'title' to match your database schema
    $hitung = $pdo->prepare("SELECT COUNT(*) FROM book WHERE title ILIKE :kw");
    $hitung->execute(['kw' => '%' . $keyword . '%']);
    $totalRows = $hitung->fetchColumn();
    
    $stmt = $pdo->prepare("SELECT * FROM book WHERE title ILIKE :kw ORDER BY id DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue('kw', '%' . $keyword . '%');
} else {
    $totalRows = $pdo->query("SELECT COUNT(*) FROM book")->fetchColumn();
    $stmt = $pdo->prepare("SELECT * FROM book ORDER BY id DESC LIMIT :limit OFFSET :offset");
}

$stmt->bindValue('limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue('offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$daftarBuku = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalPages = max(1, (int) ceil($totalRows / $perPage));
?>
<main>
<section>
    <h2>Book List</h2>
    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['message']; ?></p>
    <?php endif; ?>
    
    <!-- Point 5.8: Updated Search Form with method="get"[cite: 1] -->
    <div class="search-box">
        <form method="get" action="list.php">
            <span>
                <label for="search-input">Search Book Title</label><br>
                <input type="text" id="search-input" name="q" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Type book title...">
            </span>
            <button type="submit">Search</button>
        </form>
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
                    <?php foreach ($daftarBuku as $book): ?>
                <tr>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['year']); ?></td>
                    <td><?php echo htmlspecialchars($book['stock']); ?></td>
                    <td>
                        <!-- Updated Edit button to link to edit.php[cite: 1] -->
                        <a href="edit.php?id=<?php echo $book['id']; ?>" class="btn-edit">Edit</a>
                        
                        <form class="form-hapus" method="post" action="delete.php" style="display:inline;"> 
                            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                            <button type="submit" class="btn-delete">Delete</button> 
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Point 5.9: Pagination Navigation[cite: 1] -->
    <nav class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="list.php?page=<?php echo $i; ?><?php echo $keyword !== '' ? '&q=' . urlencode($keyword) : ''; ?>"
           class="<?php echo $i === $page ? 'active' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </nav>
</section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>