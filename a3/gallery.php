<?php
session_start();
$pageTitle = "Gallery";
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');

$sql = "SELECT skill_id, title, image_path,category FROM skills ORDER BY skill_id";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($stmt);
$resultsSkills = mysqli_stmt_get_result($stmt);
$records = mysqli_fetch_all($resultsSkills, MYSQLI_ASSOC);

$sqlCat = "SELECT DISTINCT category FROM skills";
$stmt = mysqli_prepare($conn, $sqlCat);
mysqli_stmt_execute($stmt);
$resultsUsers = mysqli_stmt_get_result($stmt);
$recordsCat = mysqli_fetch_all($resultsUsers, MYSQLI_ASSOC);

?>

<main class="container">
    <h1>Skills Gallery</h1>
    <form onchange="" class="" enctype="multipart/form-data" id="categorySelect">
        <div class="mb-3">
        <label for="category" class="form-label">Filter by category</label>
        <select class="form-select form-control w-25" id="category" name="category">
            <?php
            echo'<option value="none">None</option>';
            foreach ($recordsCat as $row) {
                echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
            }
            ?>
        </select>
    </div>
    </form>
    
    <div class="row">
        <?php
            foreach ($records as $row) {
                    echo '<div class="col-6 col-md-3 p-2 '.$row['category'].' galdiv">';
                    echo '<img class="img-fluid gallery rounded" src="' . $row['image_path'] . '" alt="' . $row['title'] . '" data-bs-toggle="modal" data-bs-target="#imageModal">';
                    echo ' <p><a href="details.php?skill_id=' . $row['skill_id'] . '">' . $row['title'] . '</a></p>';
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
        
</main>
<script src="assets/scripts.js"></script>
<?php
include('includes/footer.inc')

    ?>