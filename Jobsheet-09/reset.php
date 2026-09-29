<?php
$page_title = "Add Member";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<?php
session_start();

// 1. Clear all session variables from the current script execution
$_SESSION = []; 

// 2. Destroy the session data stored on the server
session_destroy(); 

// 3. Redirect back to the homepage
header("Location: index.php");
exit;
?>