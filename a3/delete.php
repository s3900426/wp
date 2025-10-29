<?php
session_start();
$pageTitle = 'Delete';
include('includes/db_connect.inc');

$skill_id= $_POST['skill_id'];

$sqlSkills = "SELECT * FROM skills WHERE skill_id = $skill_id";
$stmt = mysqli_prepare($conn, $sqlSkills);
mysqli_stmt_execute($stmt);
$resultsSkills = mysqli_stmt_get_result($stmt);
$recordsSkills = mysqli_fetch_assoc($resultsSkills);

if($recordsSkills["user_id"] != $_SESSION["user_id"]){
    $_SESSION['error'] = "Unauthorized access.";
    header("Location: index.php");
    exit();
}

include('includes/header.inc');
include('includes/nav.inc');
?>
<main class="container col-12">
    <h1 class="p-10 strong">Are you <span class="text-danger">REALLY, REALLY, REALLY</span> sure you want to delete:</h1>
    <div class="container-fluid p-5 d-flex justify-content-center border border-danger pb-0">
        <h2 class="row"><?php echo $recordsSkills['title']?></h2>
    </div>
    <div class="container-fluid p-5 d-flex justify-content-center">
        <img class="border border-danger row img-fluid gallery rounded" src="<?php echo $recordsSkills['image_path']?>" alt="<?php echo $recordsSkills['title']?>">
    </div>
    <div class="container-fluid p-5 d-flex justify-content-between">
        <a href="process_delete.php?skill_id=<?php echo $recordsSkills['skill_id']?>" class="btn btn-danger">YES I AM ABSOLUTELY CERTAIN</a>
        <a href="details.php?skill_id=<?php echo $recordsSkills['skill_id']?>" class="btn btn-success">NO IM SCARED NOW HELP ME</a>
    </div>
</main>

<?php
include('includes/footer.inc')

?>