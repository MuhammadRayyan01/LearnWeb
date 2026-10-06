<?php
$errors = [];
if ($nama === '') {
    $errors[] = "Name required.";
}
if ($username === '') {
    $errors[] = "Username required.";
}
if (strlen($password) < 6) {
    $errors[] = "Password at least 6 characters.";
}

$cek = $pdo->prepare("SELECT id FROM users WHERE username = :username");
$cek->execute(['username' => $username]);
if ($cek->fetch()) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Username already in use.'];
    header('Location: register.php');
    exit;
}
$stmt = $pdo->prepare(
    "INSERT INTO users (name, username, password, role) VALUES (:name, :username, :p assword, 'officer')"
);
$stmt->execute([
    'name' => $nama,
    'username' => $username,
    'password' => password_hash($password, PASSWORD_DEFAULT),
]);


?>