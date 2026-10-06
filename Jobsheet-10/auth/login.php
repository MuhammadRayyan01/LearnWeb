<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}
$page_title = "Login";
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
include __DIR__ . '/../includes/header.php';
?>
<main>
<section>
    <h2>Login</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo htmlspecialchars($flash['message']); ?></p>
    <?php endif; ?>

    <form method="post" action="proses_login.php">
        <p>
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" required>
        </p>
        <p>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required>
        </p>
        <p>
            <button type="submit">Login</button>
        </p>
    </form>
    <p>Belum punya akun? <a href="register.php">Register</a></p>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
