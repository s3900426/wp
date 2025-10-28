<?php
session_start();
$title = "Details";
$skill_id = isset($_GET['skill_id']) ? (int) $_GET['skill_id'] : 0;
if ($skill_id == 0) {
    header('Location: skills.php');
    exit();
}
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');


$sqlSkills = "SELECT * FROM skills WHERE skill_id = $skill_id";
$stmt = mysqli_prepare($conn, $sqlSkills);
mysqli_stmt_execute($stmt);
$resultsSkills = mysqli_stmt_get_result($stmt);
$recordsSkills = mysqli_fetch_assoc($resultsSkills);

$user_id = $recordsSkills["user_id"];
$sqlUsers = "SELECT user_id, username, bio FROM users WHERE user_id = $user_id";
$stmt = mysqli_prepare($conn, $sqlUsers);
mysqli_stmt_execute($stmt);
$resultsUsers = mysqli_stmt_get_result($stmt);
$recordsUsers = mysqli_fetch_assoc($resultsUsers);

?>
<main class="container">
    <div class="row">
        <h1 class="col-12"><?php echo $recordsSkills['title'] ?></h1>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <img src="<?php echo $recordsSkills['image_path'] ?>" alt="Something herer"
                class="details d-block w-100 border border-5 rounded" data-bs-toggle="modal"
                data-bs-target="#imageModal">
        </div>
    </div>

    <div class="d-block">
        <p class="d-inline-flex text-dark"><?php echo $recordsSkills['description'] ?></p>
    </div>
    <div class="d-block">
        <p class="d-inline-flex orange">Category: </p>
        <p class="d-inline-flex text-dark"><?php echo $recordsSkills['category'] ?></p>
    </div>
    <div class="d-block">
        <p class="d-inline-flex orange">Level: </p>
        <p class="d-inline-flex text-dark"><?php echo $recordsSkills['level'] ?></p>
    </div>
    <div class="d-block">
        <p class="d-inline-flex orange">Rate: </p>
        <p class="d-inline-flex text-dark"><?php echo $recordsSkills['rate_per_hr'] ?></p>
    </div>
    <hr>
    <div class="d-block">
        <p class="d-inline-flex orange">Instructor: </p>
        <p class="d-inline-flex orange"><?php echo $recordsUsers['username'] ?></p>
    </div>
    <div class="d-block">
        <p class="d-inline-flex"><?php echo $recordsUsers['bio'] ?></p>
    </div>
    <div class="d-block">
        <a href="edit.php?skill_id=<?php echo $skill_id ?>" class="btn btn-warning">Edit Skill</a>
        <button onclick="" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delModal">Delete Skill</button>
        <button class="btn btn-dark text-light rounded-4 skill ms-5" onclick="history.back()"> <a href="skills.php"
                class="link-light link-underline-opacity-0">Back</a></button>

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

    <div class="modal fade" id="delModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to permanantly delete <?php $recordsSkills['title']?>?</p>
                </div>
                <form action="delete.php" method="post">
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/scripts.js"></script>

</main>
<?php
include('includes/footer.inc');

?>