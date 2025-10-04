<?php 
include 'includes/db_connect.inc';

// Check if an ID is provided in the query string
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Redirect to skills page if ID is missing or invalid
    header("Location: skills.php");
    exit();
}

$skill_id = intval($_GET['id']);
$skill = null;

// Use a prepared statement to prevent SQL injection
$sql = "SELECT title, description, category, level, rate, image FROM skills WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $skill_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 1) {
        $skill = mysqli_fetch_assoc($result);
    } else {
        // No skill found with that ID
        header("Location: skills.php");
        exit();
    }
    mysqli_stmt_close($stmt);
}

include 'includes/header.inc'; 
?>

<?php if ($skill): ?>
<div class="row">
    <div class="col-md-4">
        <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img-src="assets/images/skills/<?php echo htmlspecialchars($skill['image']); ?>">
            <img src="assets/images/skills/<?php echo htmlspecialchars($skill['image']); ?>" class="img-fluid rounded mb-3" alt="<?php echo htmlspecialchars($skill['title']); ?>">
        </a>
    </div>
    <div class="col-md-8">
        <h1 class="page-title"><?php echo htmlspecialchars($skill['title']); ?></h1>
        <p><?php echo htmlspecialchars($skill['description']); ?></p>
        <ul class="list-unstyled">
            <li><strong>CATEGORY:</strong> <?php echo htmlspecialchars($skill['category']); ?></li>
            <li><strong>LEVEL:</strong> <?php echo htmlspecialchars($skill['level']); ?></li>
            <li><strong>RATE:</strong> $<?php echo htmlspecialchars(number_format($skill['rate'], 2)); ?>/HR</li>
        </ul>
    </div>
</div>
<?php else: ?>
    <p>Skill not found.</p>
<?php endif; ?>

<!-- Modal for full-size image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body p-0">
        <img id="modalImage" src="" class="img-fluid" alt="Full size skill image">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
      </div>
    </div>
  </div>
</div>


<?php 
include 'includes/footer.inc'; 
mysqli_close($conn);
?>