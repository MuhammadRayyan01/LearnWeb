<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}
$page_title = "Registration Officer";
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
include __DIR__ . '/../includes/header.php';
?>
<main>
<section>
    <h2>Registration Officer</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo htmlspecialchars($flash['message']); ?></p>
    <?php endif; ?>

    <form method="post" action="proses_register.php">
        <p>
            <label for="nama">Name</label><br>
            <input type="text" id="nama" name="nama" required>
        </p>
        <p>
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" required>
        </p>
        <p>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" minlength="6" required>
        </p>
        <p>
            <button type="submit">Register</button>
        </p>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login</a></p>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
