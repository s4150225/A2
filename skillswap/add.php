<?php 
include 'includes/header.inc'; 
?>

<h1 class="page-title text-center mb-4">Add New Skill</h1>

<!-- Display messages if they exist -->
<?php
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-' . $_SESSION['message_type'] . ' alert-dismissible fade show" role="alert">';
    echo $_SESSION['message'];
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';
    // Unset the session variables so they dont show on refresh
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <form action="process_add.php" method="POST" enctype="multipart/form-data" id="addSkillForm">
            <div class="mb-3">
                <label for="title" class="form-label">TITLE *</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="ENTER SKILL TITLE" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">DESCRIPTION *</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="ENTER DESCRIPTION" required></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">CATEGORY *</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="ENTER SKILL CATEGORY" required>
            </div>
            <div class="mb-3">
                <label for="rate" class="form-label">RATE PER HOUR ($) *</label>
                <input type="number" class="form-control" id="rate" name="rate" step="0.01" min="0" placeholder="ENTER RATE PER HOUR" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">LEVEL *</label>
                <select class="form-select" id="level" name="level" required>
                    <option value="" selected disabled>PLEASE SELECT</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Expert">Expert</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">SKILL IMAGE *</label>
                <input class="form-control" type="file" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">SUBMIT</button>
        </form>
    </div>
</div>


<?php include 'includes/footer.inc'; ?>