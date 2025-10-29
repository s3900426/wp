<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'includes/db_connect.inc';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$skill_id = intval($_GET['skill_id']);

$sql = "SELECT * from skills where skill_id = ? AND user_id=?";
// Prepare the SQL statement
$stmt = $conn->prepare($sql);

$stmt->bind_param("ii", $skill_id, $user_id);

$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
if (!$row) {
    $_SESSION['error'] = "Unauthorized access.";
    header("Location: index.php");
    exit();
}
$image = $row['image_path'];

// Delete DB record
mysqli_query($conn, "DELETE FROM skills WHERE skill_id = $skill_id AND user_id= $user_id");

// Delete file
$upload_dir = 'assets/images/skills/';
if ($image && file_exists($upload_dir . $image)) {
    unlink($upload_dir . $image);
}

$_SESSION['message'] = "Skill deleted.";
header("Location: index.php");
exit();
