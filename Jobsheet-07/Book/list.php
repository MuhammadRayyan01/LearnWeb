<! DOCTYPE html>
<html lang="id">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMPUS-Mini | Home</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
    <script src="../assets/js/app.js"></script>
    
<?php
$page_title = "Book List";
include __DIR__ . '/../includes/header.php';
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$daftarBuku = $_SESSION['book'] ?? [];
?>
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
                <!-- Perbaikan: Gunakan $daftarBuku agar sesuai dengan variabel di atas -->
                <?php if (empty($daftarBuku)): ?>
                <tr>
                    <td colspan="5">There is no book data yet. Please add it via the "Add Books" menu.</td>
                </tr>
                <?php else: ?>
                    <!-- Perbaikan: Gunakan kata kunci 'as' -->
                    <?php foreach ($daftarBuku as $book): ?>
                    <tr>
                        <td><?php echo $book['title']; ?></td>
                        <td><?php echo $book['author']; ?></td>
                        <td><?php echo $book['year']; ?></td>
                        <td><?php echo $book['stock']; ?></td>
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