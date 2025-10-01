<?php
$title = "Details";
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');

$skill_id = isset($_GET['skill_id']) ? (int) $_GET['skill_id'] : 0;

$sql = "SELECT * FROM skills WHERE skill_id = $skill_id";
$record = $conn->query($sql);
$current_skill = $record->fetch_assoc();
?>
<main class="container">

    <div class="row">
        <h1 class="col-12"><?php echo $current_skill['title'] ?></h1>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <img src="<?php echo $current_skill['image_path'] ?>" alt="Something herer"
                class="details d-block w-100 border border-5 rounded" data-bs-toggle="modal"
                data-bs-target="#imageModal">
        </div>
    </div>

    <div class="d-block">
        <p class="d-inline-flex text-dark"><?php echo $current_skill['description'] ?></p>
    </div>
    <div class="d-block">
        <p class="d-inline-flex orange">Category: </p>
        <p class="d-inline-flex text-dark"><?php echo $current_skill['category'] ?></p>
    </div>
    <div class="d-block">
        <p class="d-inline-flex orange">Level: </p>
        <p class="d-inline-flex text-dark"><?php echo $current_skill['level'] ?></p>
    </div>
    <div class="d-block">
        <p class="d-inline-flex orange">Rate: </p>
        <p class="d-inline-flex text-dark"><?php echo $current_skill['rate_per_hr'] ?></p>
    </div>
    <button class="btn btn-dark text-light rounded-4 skill"> <a href="skills.php"
            class="link-light link-underline-opacity-0">Back</a></button>

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