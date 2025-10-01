<?php
$title = 'SkillSwap';
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');

$sql = "SELECT skill_id, title, rate_per_hr FROM skills ORDER BY skill_id ASC LIMIT 4";
$records = $conn->query($sql);
?>


<main class="container">
    <div class="row">
        <div class="col-12">
            <h1>SkillSwap</h1>
            <p>Browse the latest skills shared by our community</p>
        </div>
    </div>

    <div class="row">
        <div id="Main" class="carousel slide" data-bs-ride="carousel">
            <button class="carousel-control-prev" type="button" data-bs-target="#Main" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#Main" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/skills/1.png" alt="Guitar" class="d-block w-100">
                    <div class="carousel-caption caption">
                        <h3>Beginner Guitar Lessons</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/skills/2.png" alt="Guitar2?" class="d-block w-100">
                    <div class="carousel-caption">
                        <h3>Intermediate Fingerstyle</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/skills/3.png" alt="Baking" class="d-block w-100">
                    <div class="carousel-caption">
                        <h3>Artisan Bread Baking</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/skills/4.png" alt="Also Baking" class="d-block w-100">
                    <div class="carousel-caption">
                        <h3>French Pastry Making</h3>-
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <?php
            foreach ($records as $row) {
                echo '<div class="skillSection col-12 col-sm-6 col-md-3">';
                echo '<p class="skill">' . $row["title"] . '</p>';
                echo '<p>Rate:' . $row["rate_per_hr"] . '/HR</p>';
                echo '<button class="btn btn-dark text-light rounded-4 skill"> <a href="details.php?skill_id=' . $row['skill_id'] . '" class="link-light link-underline-opacity-0">View Details</a></button>';
                echo '</div>';

            }
            ?>
        </div>
    </div>
</main>
<?php
include('includes/footer.inc');

?>