<?php
session_start();
$title = "Skills";
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');

$sql = "SELECT skills.skill_id, skills.title, skills.category, skills.level,  skills.rate_per_hr, skills.user_id, users.username
FROM skills
LEFT JOIN users ON users.user_id=skills.user_id
ORDER BY skills.created_at";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($stmt);
$resultsSkills = mysqli_stmt_get_result($stmt);
$records = mysqli_fetch_all($resultsSkills, MYSQLI_ASSOC);

?>

<main class="container">
    <div class="row">
        <h1 class="col-12">All Skills</h1>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <img src="assets/images/skills_banner.png" class="img-fluid skillsBanner"
                alt="Collage of all skills taught">
        </div>
        <div class="col-sm-12 col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Level</th>
                        <th>Rate($/HR)</th>
                        <th>Instructor</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($records as $row) {
                        echo '<tr>';
                        echo '<td><a href="details.php?skill_id=' . $row['skill_id'] . '" id="' . $row['skill_id'] . '" class="skillsTableLink">' . $row['title'] . '</a></td>';
                        echo '<td>' . $row['category'] . '</td>';
                        echo '<td>' . $row['level'] . '</td>';
                        echo '<td>' . $row['rate_per_hr'] . '</td>';
                        echo '<td>' . ($row['username'] ?? 'unknown'). '</td>';
                        echo '</tr>';

                    }
                    ?>

                </tbody>

            </table>
        </div>
    </div>

</main>

<?php
include('includes/footer.inc')

    ?>