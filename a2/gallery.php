<?php
$title = "Gallery";
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');

$sql = "SELECT title, image_path FROM skills ORDER BY skill_id";
$records = $conn->query($sql);
?>

    <main class="container">
        <h1>Skills Gallery</h1>
        <div class="row">
<?php
foreach($records as $row){
    echo '<div class="col-6 col-md-3 p-2">';
    echo '<img class="img-fluid gallery rounded" src="'.$row['image_path'].'" alt="'.$row['title'].'" data-bs-toggle="modal" data-bs-target="#imageModal">';
    echo '<p>'.$row['title'].'</p>';
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
        <script src="assets/scripts.js"></script>
    </main>

<?php
include('includes/footer.inc')

?>