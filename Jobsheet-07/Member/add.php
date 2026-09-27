<?php
$page_title = "Add Member";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<section>
    <h2>Add New Member</h2>
    
    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['message']; ?></p>
    <?php endif; ?>

    <form id="form-plus" method="post" action="proses_add.php"> 
        <p> 
            <label for="name">Name</label><br> 
            <input type="text" id="name" name="name" required>
        </p>

        <p> 
            <label for="member_no">Member_no</label><br> 
            <input type="text" id="member_no" name="member_no" required> 
        </p>

        <p> 
            <label for="address">Address</label><br> 
            <input type="text" id="address" name="address" required> 
        </p>

        <p> 
            <label for="phone">No. HP</label><br> 
            <input type="text" id="phone" name="phone" required> 
        </p>

        <p> 
            <button type="submit">Save</button> 
        </p>
    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>