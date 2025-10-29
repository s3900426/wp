<?php
session_start();
$title = 'Edit Skill';
include('includes/db_connect.inc');

$skill_id = isset($_GET['skill_id']) ? (int) $_GET['skill_id'] : 0;

$sqlSkills = "SELECT * FROM skills WHERE skill_id = $skill_id";
$stmt = mysqli_prepare($conn, $sqlSkills);
mysqli_stmt_execute($stmt);
$resultsSkills = mysqli_stmt_get_result($stmt);
$recordsSkills = mysqli_fetch_assoc($resultsSkills);
if ($recordsSkills["user_id"] != $_SESSION["user_id"]) {
    header('Location: index.php');
    exit();
}

include('includes/header.inc');
include('includes/nav.inc');
?>

<main class="container col-12">
    <h1 class="p-10">Edit Skill</h1>
    <form method="post" action="process_edit.php?skill_id=<?php echo $recordsSkills['skill_id']?>" class="form-control" enctype="multipart/form-data" id="skillFormUpdate">
        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="text" id="title" name="title" placeholder="<?php echo $recordsSkills["title"]?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description <span class="orangeAsterisk">*</span></label>
            <textarea class="form-control" rows="8" id="description" name="description" placeholder="<?php echo $recordsSkills["description"]?>"
                ></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="text" id="category" name="category" placeholder="<?php echo $recordsSkills["category"]?>"
                >
        </div>
        <div class="mb-3">
            <label for="rate" class="form-label">Rate per Hour ($) <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="number" step="0.01" min="0" id="rate_per_hr" name="rate_per_hr"
                placeholder="<?php echo $recordsSkills["title"]?>" >
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level <span class="orangeAsterisk">*</span></label>
            <select class="form-select" id="level" name="level" >
                <option value="Beginner" <?php echo $recordsSkills["title"]?>>Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Expert">Expert</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="imageUpload" class="form-label">Skill Image <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="file" id="imageUpload" name="image" >
        </div>
        <div class="alert alert-danger hiddenAlert" id="alert"></div>
        <button type="submit" class="btn-dark btn cont rounded-5 skill">Update</button>
    </form>

</main>

<?php
include('includes/footer.inc')

?>
