<?php
$page_title = "Member List";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

// Pagination & server-side search (same concept as Book/list.php)
$perPage = 5;
$page    = max(1, (int) ($_GET['page'] ?? 1));
$offset  = ($page - 1) * $perPage;
$keyword = trim($_GET['q'] ?? '');

if ($keyword !== '') {
    $like = '%' . $keyword . '%';
    $hitung = $pdo->prepare("SELECT COUNT(*) FROM member WHERE name ILIKE :kw1 OR member_no ILIKE :kw2");
    $hitung->execute(['kw1' => $like, 'kw2' => $like]);
    $totalRows = $hitung->fetchColumn();

    $stmt = $pdo->prepare(
        "SELECT * FROM member WHERE name ILIKE :kw1 OR member_no ILIKE :kw2
         ORDER BY id DESC LIMIT :limit OFFSET :offset"
    );
    $stmt->bindValue('kw1', $like);
    $stmt->bindValue('kw2', $like);
} else {
    $totalRows = $pdo->query("SELECT COUNT(*) FROM member")->fetchColumn();
    $stmt = $pdo->prepare("SELECT * FROM member ORDER BY id DESC LIMIT :limit OFFSET :offset");
}

$stmt->bindValue('limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue('offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$memberList = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalPages = max(1, (int) ceil($totalRows / $perPage));
?>
<main>
<section>
    <h2>Member List</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo htmlspecialchars($flash['message']); ?></p>
    <?php endif; ?>

    <div class="search-box">
        <form method="get" action="list.php">
            <span>
                <label for="search-input">Search Member Name / Number</label><br>
                <input type="text" id="search-input" name="q" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Type member name...">
            </span>
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Member No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>No. HP</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($memberList)): ?>
                <tr>
                    <td colspan="5">There is no member data yet. Please add it via the "Add Member" menu.</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($memberList as $member): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($member['member_no']); ?></td>
                        <td><?php echo htmlspecialchars($member['name']); ?></td>
                        <td><?php echo htmlspecialchars($member['address']); ?></td>
                        <td><?php echo htmlspecialchars($member['phone']); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo (int) $member['id']; ?>" class="btn-edit">Edit</a>

                            <form class="form-hapus" method="post" action="delete.php" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo (int) $member['id']; ?>">
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <nav class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="list.php?page=<?php echo $i; ?><?php echo $keyword !== '' ? '&q=' . urlencode($keyword) : ''; ?>"
           class="<?php echo $i === $page ? 'active' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </nav>
</section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>