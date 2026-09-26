<! DOCTYPE html>
<html lang="id">
<head> 

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMPUS-Mini | Home</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
    <script src="../assets/js/app.js"></script>
<body> 
    <header> 
         <h1>SIMPUS-Mini</h1> 
<button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">&#9776;</button>         <nav> 
             <ul>
                <li><a href="../index.php">Home</a></li> 
                <li><a href="../Book/list.php">List of Books</a></li> 
                <li><a href="../Book/add.php">Add Books</a></li>
                <li><a href="../Member/list.php">Member List</a></li> 
                <li><a href="add.php">Add Members</a></li> 
             </ul> 
         </nav> 
    </header>
<form id="form-tambah"> 
<form> 
    <p> 
        <label for="name">Name</label><br> 
        <input type="text" id="name" name="name" required> 
    </p>

    <p>
        <label for="no_anggota">Member No</label><br> 
        <input type="text" id="no_anggota" name="no_anggota" required> 
    </p>

    <p> 
        <label for="address">Address</label><br> 
        <input type="text" id="address" name="address"> 
    </p>

    <p> 
        <label for="no_hp">No. HP</label><br> 
        <input type="text" id="no_hp" name="no_hp"> 
    </p>

    <p> 
        <button type="submit">Save</button> 
    </p>
</form>
