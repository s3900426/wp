<?php
session_start();
$pageTitle = "Instructors";
$user_id = isset($_GET['user_id']) ? (int) $_GET['user_id'] : 0;
if ($user_id == 0) {
    header('Location: skills.php');
    exit();
}
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');

$sqlUsers = "SELECT * FROM users WHERE user_id = $user_id";
$stmt = mysqli_prepare($conn, $sqlUsers);
mysqli_stmt_execute($stmt);
$resultsUsers = mysqli_stmt_get_result($stmt);
$recordsUsers = mysqli_fetch_assoc($resultsUsers);

$sqlSkills = "SELECT * FROM skills WHERE user_id = $user_id";
$stmt = mysqli_prepare($conn, $sqlSkills);
mysqli_stmt_execute($stmt);
$resultsSkills = mysqli_stmt_get_result($stmt);
$recordsSkills = mysqli_fetch_all($resultsSkills, MYSQLI_ASSOC);


?>
<main class="container">
    <div class="row">
        <h1 class="col-12">Instructor: <?php echo $recordsUsers['username'] ?></h1>
        <p><?php echo $recordsUsers['bio'] ?></p>
    </div>
    <div class="row">
        <h2 class="d-inline-flex orange">Skills Offered</h2>
        <?php
            foreach ($recordsSkills as $row) {
                    echo '<div class="col-6 col-md-3 p-2 '.$row['category'].' galdiv">';
                    echo '<img class="img-fluid gallery rounded" src="' . $row['image_path'] . '" alt="' . $row['title'] . '" data-bs-toggle="modal" data-bs-target="#imageModal">';
                    echo '<p class="skill">' . $row["title"] . '</p>';
                    echo '<p>Rate:' . $row["rate_per_hr"] . '/HR</p>';
                    echo '<button class="btn btn-dark text-light rounded-4 skill"> <a href="details.php?skill_id=' . $row['skill_id'] . '" class="link-light link-underline-opacity-0">View Details</a></button>';
                    echo '</div>';
            }

        ?>
        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <img id="modalImage" class="img-fluid" alt="Preview" src="#">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="modalImage" class="img-fluid" alt="Preview" src="#">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/scripts.js"></script>

</main>
<?php
include('includes/footer.inc');

?>