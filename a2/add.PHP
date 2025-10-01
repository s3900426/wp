<?php
$title = 'Add Skill';
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');
?>

    <main class="container col-12">
        <h1 class="p-10">Add New Skill</h1>
        <form class="form-control" id="skillForm">
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="orangeAsterisk">*</span></label>
                <input class="form-control" type="text" id="title" placeholder="Enter skill title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description <span class="orangeAsterisk">*</span></label>
                <textarea class="form-control" rows="8" id="description" placeholder="Enter Description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category <span class="orangeAsterisk">*</span></label>
                <input class="form-control" type="text" id="category" placeholder="Enter skill category" required>
            </div>
            <div class="mb-3">
                <label for="rate" class="form-label">Rate per Hour ($) <span class="orangeAsterisk">*</span></label>
                <input class="form-control" type="number" id="rate" placeholder="Enter rate per hour" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level <span class="orangeAsterisk">*</span></label>
                <select class="form-select" id="level" required>
                    <option value="" disabled selected>Please select</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Expert">Expert</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="imageUpload" class="form-label">Skill Image <span class="orangeAsterisk">*</span></label>
                <input class="form-control" type="file" id="imageUpload" required>
            </div>
            <div class="alert alert-danger hiddenAlert" id="alert"></div>
            <button type="submit" class="btn-dark btn cont rounded-5 skill">Submit</button>
        </form>

    </main>

<?php
include('includes/footer.inc')

?>