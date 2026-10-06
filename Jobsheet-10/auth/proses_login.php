<?php
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute(['username' => $username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['role'] = $user['role'];
    header('Location: .. /index.php');
    exit;
}
$_SESSION['flash'] = ['type' => 'error', 'message' => 'Username or password incorrect.'];
header('Location: login.php');
exit;
?>