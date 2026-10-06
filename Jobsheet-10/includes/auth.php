<?php
//Guard clause: included in the top row of each page
//requires login (before header.php output any output),
//so that the header('Location: ...') can still be called.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}
