<?php
// session_start() wajib dipanggil sebelum membaca $_SESSION
if (session_status() === PHP_SESSION_NONE) { session_start(); }
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