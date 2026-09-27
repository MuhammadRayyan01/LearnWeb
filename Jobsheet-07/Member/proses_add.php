<?php
session_start();
$name = trim($_POST['name'] ?? '');
$no_anggota = trim($_POST['member_no'] ?? '');
$address = trim($_POST['address'] ?? '');
$phone= $_POST['phone'] ?? '';

$errors = [];
if ($name === '') {
    $errors[] = "Name required.";
}
if ($member_no !== '' && !preg_match('/^[0-9\-]+$/', $member_no)) {
    $errors[] = "Number must be filled with only number.";
}
if ($address === '') {
    $errors[] = "address must be filled.";
}
if ($phone !== '' && !preg_match('/^[0-9\-]+$/', $phone)) {
    $errors[] = "phone number must be filled with only number.";
}


if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => implode(' ', $errors)];
    header('Location: add.php');
    exit;
}

if (!isset($_SESSION['member'])) {
    $_SESSION['member'] = [];
}
$_SESSION['member'][] = [
    'name' => $name,
    'member_no' => (int) $member_no,
    'address' =>  $address,
    'phone' => (int) $phone,
];
$_SESSION['flash'] = ['type' => 'success', 'message' => 'member successfully added.'];
header('Location: list.php');
exit;

