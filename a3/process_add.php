<?php
session_start();
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



if ($error === 0 && in_array($type, ['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/jpg']) && $size < 1000000) {

    if (move_uploaded_file($temp, $image_directory . $updated_filename)) {

        $sql = "INSERT INTO skills (title, description, category, level, rate_per_hr, image_path, user_id) VALUES (?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            $_SESSION["error"] = "An error occured while adding to the database.";
            header("Location: add.php");
            exit("");
        }
        $image_path = $image_directory . $updated_filename;
        $stmt->bind_param("ssssdsi",$title,$description, $category, $level, $rate_per_hr, $image_path, $user_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION["message"] = "New record successfully inserted into the database.";
            header("Location: gallery.php");
            exit("");
        } else {
            $_SESSION["error"] = "Couldn't move file please try again.";
            header("Location: add.php");
            exit("");
        }


    } else {
        $_SESSION["error"] = "Couldn't move file please try again.";
        header("Location: add.php");
        exit("");
    }

} else {
    $_SESSION["error"] = "Image is not suitable, failed to upload title and image.";
    header("Location: add.php");
    exit("");
}