<?php
session_start();
$pageTitle = 'Edit Skill';
include('includes/db_connect.inc');

$skill_id = isset($_GET['skill_id']) ? (int) $_GET['skill_id'] : 0;
$user_id = $_SESSION['user_id'];

$sqlSkills = "SELECT * FROM skills WHERE skill_id = $skill_id";
$stmt = mysqli_prepare($conn, $sqlSkills);
mysqli_stmt_execute($stmt);
$resultsSkills = mysqli_stmt_get_result($stmt);
$recordsSkills = mysqli_fetch_assoc($resultsSkills);

$image_path = $recordsSkills['image_path'];

$title = isset($_POST['title']) && trim($_POST['title']) ? trim($_POST['title']) : $recordsSkills['title'];
$description = isset($_POST['description']) && trim($_POST['description']) ? trim($_POST['description']) : $recordsSkills['description'];
$category = isset($_POST['category']) && trim($_POST['category']) ? trim($_POST['category']) : $recordsSkills['category'];
$level = isset($_POST['level']) && trim($_POST['level']) ? trim($_POST['level']) : $recordsSkills['level'];
$rate_per_hr = isset($_POST['rate_per_hr']) && trim($_POST['rate_per_hr']) ? trim($_POST['rate_per_hr']) : $recordsSkills['rate_per_hr'];





if (!$user_id) {
    header('Location: add.php');
}

include('includes/header.inc');
include('includes/nav.inc');
if (isset($_FILES['image']['name']) && $_FILES['image']['name'] !== '') {
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    $type = $_FILES['image']['type'];
    $size = $_FILES['image']['size'];

    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $updated_filename = $title . '.' . $ext;
    $image_directory = 'assets/images/skills/';

    if ($error === 0 && in_array($type, ['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/jpg']) && $size < 1000000) {
        unlink($image_path);
        if (move_uploaded_file($temp, $image_directory . $updated_filename)) {
            $image_path = $image_directory . $updated_filename;

        } else {
            $_SESSION["error"] = "Couldn't move file please try again";
            header("Location: edit.php?skill_id=".$skill_id);
            exit("");
        }

    } else {
        $_SESSION["error"] = "Image is not suitable, failed to upload title and image.";
        header("Location: edit.php?skill_id=".$skill_id);
        exit("");
    }
}

$sql = "UPDATE skills SET title = ?,description = ?, category = ?, level = ?, rate_per_hr = ?, image_path = ? WHERE skill_id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    header("Location: edit.php?skill_id=".$skill_id);
    exit("An error occurred");
}
$stmt->bind_param("ssssdsii", $title, $description, $category, $level, $rate_per_hr, $image_path, $skill_id, $user_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $_SESSION["message"] = "Successfully updated record '.$title.'";
    header("Location: edit.php?skill_id=".$skill_id);
    exit("");
} else {
    $_SESSION["error"] = $stmt->error;
    header("Location: edit.php?skill_id=".$skill_id);
    exit("");

}

include('includes/footer.inc');
?>