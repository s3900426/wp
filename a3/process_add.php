<?php
session_start();
$title = 'Add Skill';
include('includes/db_connect.inc');


$title = trim($_POST['title']);
$description = trim($_POST['description']);
$category = trim($_POST['category']);
$level = trim($_POST['level']);
$rate_per_hr = trim($_POST['rate_per_hr']);

$image = $_FILES['image']['name'];
$temp = $_FILES['image']['tmp_name'];
$error = $_FILES['image']['error'];
$type = $_FILES['image']['type'];
$size = $_FILES['image']['size'];
$image_directory = 'assets/images/skills/';
$user_id = $_SESSION['user_id'];

$ext = pathinfo($image, PATHINFO_EXTENSION);
$updated_filename = $title . '.' . $ext;
if (!$user_id){
    header('Location: add.php');
}

include('includes/header.inc');
include('includes/nav.inc');

if ($error === 0 && in_array($type, ['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/jpg']) && $size < 1000000) {

    if (move_uploaded_file($temp, $image_directory . $updated_filename)) {

        $sql = "INSERT INTO skills (title, description, category, level, rate_per_hr, image_path, user_id) VALUES (?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            exit("An error occurred");
        }
        $image_path = $image_directory . $updated_filename;
        $stmt->bind_param("ssssdsi",$title,$description, $category, $level, $rate_per_hr, $image_path, $user_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo '<div class="alert alert-success alert-dismissible">';
            echo "<p>New record successfully inserted into the database</p>";
            echo '</div>';
            echo '<button class="btn btn-dark text-light rounded-4 skill"> <a href="add.php" class="link-light link-underline-opacity-0">Back</a></button>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible">';
            echo "<p>Image not moved to folder</p>";
            echo '</div>';
            echo '<a href="add.php" class="btn btn-dark text-light rounded-4 skill back-btn">Back</a>';
        }


    } else {
        echo '<div class="alert alert-danger">Failed to move uploaded image.</div>';
        echo '<button class="btn btn-dark text-light rounded-4 skill" onclick="history.back()"> <a href="add.php" class="link-light link-underline-opacity-0">Back</a></button>';
    }

} else {
    echo "<p class='warning'>Image is not suitable, failed to upload title and image.</p>";
    echo '<button class="btn btn-dark text-light rounded-4 skill"> <a href="add.php" class="link-light link-underline-opacity-0">Back</a></button>';
}

include('includes/footer.inc');
?>