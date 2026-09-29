<?php
$page_title = "Add Member";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<?php
// session_start() is mandatory before you can read or write to $_SESSION
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Session Debug</title>
    <style>
        body { padding: 20px; font-family: monospace; background: #f4f4f4; }
        pre { background: #fff; padding: 15px; border: 1px solid #ccc; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Raw $_SESSION Data</h2>
    <pre><?php print_r($_SESSION); ?></pre>
    
    <hr>
    <a href="index.php">Back to Home</a>
    <a href="debug_session.php?clear=1" style="color: red; margin-left: 20px;">Clear Session</a>
    
    <?php
    // Optional helper to easily wipe the session clean if data gets too messy
    if (isset($_GET['clear']) && $_GET['clear'] == '1') {
        session_destroy();
        header("Location: debug_session.php");
        exit;
    }
    ?>
</body>
</html>