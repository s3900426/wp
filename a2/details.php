<?php
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');

$sql = "SELECT * WHERE skill_id = "
$records = $conn->query($sql);
?>
    <main class="container">
        <div class="row">
            <h1 class="col-12">Title</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <p>description</p>
            </div>
            <div class="col-sm-12 col-md-8">
                <img src="" alt="" class="d-block w-100">>
            </div>
        </div>

    </main>
<?php
include('includes/footer.inc');

?>