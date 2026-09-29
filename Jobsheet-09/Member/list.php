<?require __DIR__ . '/includes/koneksi.php';?>

<?php
$page_title = "Member List";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$memberList = $_SESSION['member'] ?? [];
?>

<section>
    <h2>Member List</h2>
    
    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['message']; ?></p>
    <?php endif; ?>
    
    <div class="search-box">
        <label for="search-input">Search Member Name</label>
        <input type="text" id="search-input" placeholder="Type member name...">
    </div>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Member No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>No. HP</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($memberList)): ?>
                <tr>
                    <td colspan="5">There is no member data yet. Please add it via the "Add Members" menu.</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($memberList as $member): ?>
                    <tr>
                        <td><?php echo $member['member_no']; ?></td>
                        <td><?php echo $member['name']; ?></td>
                        <td><?php echo $member['address']; ?></td>
                        <td><?php echo $member['phone']; ?></td>
                        <td>
                            <button type="button">Edit</button>
                            <button type="button" class="btn-delete">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>