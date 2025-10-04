<?php 
include 'includes/db_connect.inc';
include 'includes/header.inc'; 
?>

<div class="row">
    <!-- Left Column: Banner Image -->
    <div class="col-lg-4 mb-4">
        <img src="assets/images/skills_banner.png" alt="All Skills Banner" class="img-fluid rounded">
    </div>

    <!-- Right Column: Skills Table -->
    <div class="col-lg-8">
        <h1 class="page-title">All Skills</h1>
        <div class="table-responsive">
            <table class="table table-hover skills-table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">TITLE</th>
                        <th scope="col">CATEGORY</th>
                        <th scope="col">LEVEL</th>
                        <th scope="col">RATE ($/HR)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Prepare statement to fetch all skills
                    $sql = "SELECT id, title, category, level, rate FROM skills ORDER BY title ASC";
                    $stmt = mysqli_prepare($conn, $sql);

                    if ($stmt) {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td><a href="details.php?id=' . $row['id'] . '">' . htmlspecialchars($row['title']) . '</a></td>';
                                echo '<td>' . htmlspecialchars($row['category']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['level']) . '</td>';
                                echo '<td>' . htmlspecialchars(number_format($row['rate'], 2)) . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4" class="text-center">No skills available yet.</td></tr>';
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                         echo '<tr><td colspan="4" class="text-center">Error fetching skills.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
include 'includes/footer.inc'; 
mysqli_close($conn);
?>