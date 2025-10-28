<?php
$title = 'Login';
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');
session_start();
?>
<main class="container col-12">
    <h1 class="p-10">Register</h1>
    <form method="post" action="process_register.php" class="form-control" enctype="multipart/form-data"
        id="registerForm">
        <div class="mb-3">
            <label for="email" class="form-label">Email <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="email" id="email" name="email" placeholder="Enter Email"
                required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="username" id="username" name="username" placeholder="Enter Username"
                required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password"
                required>
        </div>
        <button type="submit" class="btn-dark btn cont rounded-5 skill">Submit</button>
    </form>

</main>

<?php
include('includes/footer.inc')

    ?>