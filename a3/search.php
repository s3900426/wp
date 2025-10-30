<?php
$pageTitle = 'Search';
include('includes/db_connect.inc');

$search = isset($_POST['search']) ? '%' . strtolower($_POST['search']) . '%' : '';
$searchtwo = $_POST['search'];
if ($search == '') {
    $_SESSION['error'] = 'No search term entered';
    header('Location: index.php');
    exit();
}

$sql = "SELECT s.skill_id, s.title, s.image_path, s.category, s.description, s.level, s.user_id, u.user_id, u.username, u.bio
        FROM skills AS s
        JOIN users AS u ON s.user_id = u.user_id
        WHERE LOWER(s.title) LIKE ?
           OR LOWER(s.category)  LIKE ?
           OR LOWER(s.description)      LIKE ?
           OR LOWER(s.level)      LIKE ?
           OR LOWER(u.bio)      LIKE ?
           OR LOWER(u.username)      LIKE ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssss', $search, $search, $search, $search, $search, $search);
$stmt->execute();
$results = mysqli_stmt_get_result($stmt);
$records = mysqli_fetch_all($results, MYSQLI_ASSOC);

include('includes/header.inc');
include('includes/nav.inc');
?>
<main class="container col-12">
    <h1 class="p-10">Searching for: <?php echo $searchtwo ?></h1>
    <div class="row">
        <?php
        if (empty($records)) {
            echo '<h4 class="text-danger fw-bold"><span class="material-symbols-outlined">
sentiment_dissatisfied
</span>No results</h4>';
        }
        foreach ($records as $row) {
            echo '<div class="col-6 col-md-3 p-2 ' . $row['category'] . ' galdiv">';
            echo '<img class="img-fluid gallery rounded" src="' . $row['image_path'] . '" alt="' . $row['title'] . '" data-bs-toggle="modal" data-bs-target="#imageModal">';
            echo '<p><a href="details.php?skill_id=' . $row['skill_id'] . '" class="text-decoration-none orange">' . $row['title'] . '</a></p>';
            echo '<p><a href="instructor.php?user_id=' . $row['user_id'] . '" class="text-decoration-none orange">' . $row['username'] . '</a></p>';
            echo '</div>';
        }
        ?>
    </div>
</main>

<?php
include('includes/footer.inc')
    ?>