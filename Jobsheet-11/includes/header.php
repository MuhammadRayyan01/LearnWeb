<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$sudahLogin = isset($_SESSION['user_id']);

$__root = realpath(__DIR__ . '/..');
$__dir  = realpath(dirname($_SERVER['SCRIPT_FILENAME']));
$__rel  = trim(str_replace('\\', '/', substr($__dir, strlen($__root))), '/');
$base   = $__rel === '' ? '' : str_repeat('../', substr_count($__rel, '/') + 1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMPUS-Mini<?php echo isset($page_title) ? ' | ' . $page_title : ''; ?></title>
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
</head>
<body>
    <header>
        <h1>SIMPUS-Mini</h1>
        <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">&#9776; </button>
        <nav>
            <ul>
                <li><a href="<?php echo $base; ?>index.php">Beranda</a></li>
                <li><a href="<?php echo $base; ?>Book/list.php">Book List</a></li>
                <?php if ($sudahLogin): ?>
                <li><a href="<?php echo $base; ?>Book/add.php">Add Book</a></li>
                <li><a href="<?php echo $base; ?>Member/list.php">Member List</a></li>
                <li><a href="<?php echo $base; ?>Member/add.php">Add Member</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="auth-status">
            <?php if ($sudahLogin): ?>
                <span><?php echo htmlspecialchars($_SESSION['name'] ?? ''); ?></span>
                <a href="<?php echo $base; ?>auth/logout.php">Logout</a>
            <?php else: ?>
                <a href="<?php echo $base; ?>auth/login.php">Login</a>
            <?php endif; ?>
        </div>
    </header>

