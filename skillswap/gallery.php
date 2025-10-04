<?php 
include 'includes/db_connect.inc';
include 'includes/header.inc'; 
?>

<h1 class="page-title text-center mb-4">Skill Gallery</h1>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    <?php
    $sql = "SELECT id, title, image FROM skills ORDER BY title ASC";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col">';
                echo '  <div class="card h-100 gallery-card">';
                echo '    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img-src="assets/images/skills/' . htmlspecialchars($row['image']) . '">';
                echo '      <img src="assets/images/skills/' . htmlspecialchars($row['image']) . '" class="card-img-top" alt="' . htmlspecialchars($row['title']) . '">';
                echo '    </a>';
                echo '    <div class="card-body text-center">';
                echo '      <h5 class="card-title"><a href="details.php?id=' . $row['id'] . '">' . htmlspecialchars($row['title']) . '</a></h5>';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-center">No images found in the gallery.</p>';
        }
        mysqli_stmt_close($stmt);
    }
    ?>
</div>

<!-- Modal for full-size image (re-used from details.php) -->
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