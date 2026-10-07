<?php
$page_title = "Add Member";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<section>
    <h2>Add New Member</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo htmlspecialchars($flash['message']); ?></p>
    <?php endif; ?>

    <form id="form-plus" method="post" action="proses_add.php">
        <p>
            <label for="nama">Name</label><br>
            <input type="text" id="nama" name="nama" required>
        </p>

        <p>
            <label for="no_anggota">Member number</label><br>
            <input type="text" id="no_anggota" name="no_anggota" required>
        </p>

        <p>
            <label for="alamat">Address</label><br>
            <input type="text" id="alamat" name="alamat" required>
        </p>

        <p>
            <label for="no_hp">No. HP</label><br>
            <input type="text" id="no_hp" name="no_hp" required>
        </p>

        <p>
            <button type="submit">Save</button>
        </p>
    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>