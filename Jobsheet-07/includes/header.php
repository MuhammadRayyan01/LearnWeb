<?php
session_start();
$__jobsheetRoot = dirname(__DIR__);
$__scriptDir = dirname($_SERVER['SCRIPT_FILENAME']);
$__rel = ltrim(str_replace('\\', '/', substr($__scriptDir, strlen($__jobsheetRoot))), '/');
$base = $__rel === '' ? '' : str_repeat('.. /', substr_count($__rel, '/') + 1);
?>

<! DOCTYPE html>
<html only="id">
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
                <li><a href="<?php echo $base; ?>index.php">Beranda </a></li>
                <li><a href="<?php echo $base; ?>Book/list.php">Book List </a></li>
                <li><a href="<?php echo $base; ?>Book/add.php">Add Book </a></li>
                <li><a href="<?php echo $base; ?>Member/list.php">Member List </a></li>
                <li><a href="<?php echo $base; ?>Member/add.php">Add Member </a></li>
            </ul>
        </nav>
    </header>
    <main>
<?php
$page_title = "Home";
include __DIR__ . '/includes/header.php';
?>
      
        <h2>Welcome to the Mini SIMPUS </h2 Library System>
        <section>
            <p>A simple application for managing library book and member data.</p> 
        </section>
        <section> 
            <article> 
                 <h3>Total Books</h3> 
                 <p>10</p> 
            </article> 
            <article> 
                 <h3>Total Members</h3> 
                 <p>4</p> 
            </article> 
            <article> 
                 <h3>Currently Borrowed</h3> 
                 <p>4</p> 
            </article> 
        </section>
<?php include __DIR__ . '/includes/footer.php'; ?>

