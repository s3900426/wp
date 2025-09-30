<?php
include('includes/db_connect.inc')
include('includes/header.inc')
include('includes/nav.inc')
?>

    <main class="container">
        <h1>Skills Gallery</h1>
        <div class="row">
            <div class="col-6 col-md-3 p-2">
                <img class="img-fluid gallery rounded" src="images/skills/1.png" alt="Guitar" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>Beginner Guitar Lessons</p>
            </div>
            <div class="col-6 col-md-3 p-2">
                <img class="img-fluid gallery rounded" src="images/skills/2.png" alt="Fingerstyle" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>Intermediate Fingerstyle</p>
            </div>
            <div class="col-6 col-md-3 p-2">
                <img class="img-fluid gallery rounded" src="images/skills/3.png" alt="Bread Baking" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>Artisan Bread Baking</p>
            </div>
            <div class="col-6 col-md-3 p-2">
                <img class="img-fluid gallery rounded" src="images/skills/4.png" alt="Pastry Making" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>French Pastry Making</p>
            </div>
            <div class="col-6 col-md-3 p-2">
                <img class="img-fluid gallery rounded" src="images/skills/5.png" alt="Watercolour" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>Watercolour Basics</p>
            </div>
            <div class="col-6 col-md-3 p-2">
                <img class="img-fluid gallery rounded" src="images/skills/6.png" alt="Procreate" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>Digital Illustration with Procreate</p>
            </div>
            <div class="col-6 col-md-3 p-2">
                <img class="img-fluid gallery rounded" src="images/skills/7.png" alt="Vinyasa" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>Morning Vinyasa Flow</p>
            </div>
            <div class="col-6 col-md-3 p-2">
                <img class="img-fluid gallery rounded" src="images/skills/8.png" alt="PHP & MySQL" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>Intro to PHP & MySQL</p>
            </div>

        </div>

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