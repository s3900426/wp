<?php
$title = "Details";
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');


?>
    <main class="container">
        <div class="row">
            <h1 class="col-12">Title</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <img src="assets/images/skills/2.png" alt="Some picture" id ="" class="d-block w-100 border border-3 rounded" data-bs-toggle="modal" data-bs-target="#imageModal">
            </div>
        </div>
        <div class="row">
            <div class="d-inline">
                <h4>Level: </h4>
            </div>
            <div class="d-inline">
                <p>babababab</p>
            </div>
        </div>
        <div class="row">
            <div class="d-inline-flex col-6 fit-content">
                <h4>Level: </h4>
            </div>
            <div class="d-inline-flex col-6 fit-content">
                <p>babababab</p>
            </div>
        </div>
        <div class="fit-content">
            <h4 class="d-inline-flex">Level: </h4><h4 class="d-inline-flex text-dark">babababab</h4>
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
include('includes/footer.inc');

?>