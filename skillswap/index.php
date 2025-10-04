<?php 
include 'includes/db_connect.inc';
include 'includes/header.inc'; 

// --- Fetch data for the top Carousel ---
$slides = [];
$sql_carousel = "SELECT id, title, image FROM skills ORDER BY id DESC LIMIT 4";
$stmt_carousel = mysqli_prepare($conn, $sql_carousel);

if ($stmt_carousel) {
    mysqli_stmt_execute($stmt_carousel);
    $result_carousel = mysqli_stmt_get_result($stmt_carousel);
    $slides = mysqli_fetch_all($result_carousel, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt_carousel);
}
?>

<!-- Dynamic Carousel at the top -->
<?php if (!empty($slides)): ?>
<div id="heroCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <!-- FIX: Changed class. to class= to fix the slider and footer issue -->
    <div class="carousel-inner">
        <?php foreach ($slides as $index => $slide): ?>
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <img src="assets/images/skills/<?php echo htmlspecialchars($slide['image']); ?>" class="d-block w-100" alt="<?php echo htmlspecialchars($slide['title']); ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo htmlspecialchars($slide['title']); ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php endif; ?>

<div class="text-center mb-4">
    <h1>SkillSwap</h1>
    <p class="lead">BROWSE THE LATEST SKILLS SHARED BY OUR COMMUNITY.</p>
</div>

<!-- Scrolling Skill Cards with Side-by-Side Layout -->
<div class="scrolling-wrapper-container">
    <div class="scrolling-wrapper">
        <div class="scrolling-content">
            <?php
            $sql_scroll = "SELECT id, title, rate, image FROM skills ORDER BY id DESC LIMIT 8";
            $stmt_scroll = mysqli_prepare($conn, $sql_scroll);
            $scrolling_skills = [];

            if ($stmt_scroll) {
                mysqli_stmt_execute($stmt_scroll);
                $result_scroll = mysqli_stmt_get_result($stmt_scroll);
                $scrolling_skills = mysqli_fetch_all($result_scroll, MYSQLI_ASSOC);
                mysqli_stmt_close($stmt_scroll);
            }

            if (!empty($scrolling_skills)) {
                $all_skills_for_scroll = array_merge($scrolling_skills, $scrolling_skills);

                foreach ($all_skills_for_scroll as $skill) {
                    echo '<div class="scroll-card">';
                    echo '  <div class="card h-100 skill-card card-horizontal">';
                    echo '      <div class="row g-0">';
                    echo '          <div class="col-5">';
                    echo '              <img src="assets/images/skills/' . htmlspecialchars($skill['image']) . '" class="card-img-left" alt="' . htmlspecialchars($skill['title']) . '">';
                    echo '          </div>';
                    echo '          <div class="col-7">';
                    echo '              <div class="card-body">';
                    echo '                  <h5 class="card-title">' . htmlspecialchars($skill['title']) . '</h5>';
                    echo '                  <p class="card-text">RATE: $' . htmlspecialchars(number_format($skill['rate'], 2)) . '/HR</p>';
                    echo '                  <a href="details.php?id=' . $skill['id'] . '" class="btn btn-primary mt-auto">VIEW DETAILS</a>';
                    echo '              </div>';
                    echo '          </div>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No skills found.</p>";
            }
            ?>
        </div>
    </div>
</div>

<?php 
// This will now be displayed correctly
include 'includes/footer.inc'; 
mysqli_close($conn);
?>