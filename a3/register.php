<?php
$pageTitle = 'Register';
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');
?>
<main class="container col-12">
    <h1 class="p-10">Register</h1>
    <?php if (!empty($_SESSION['error'])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
        unset($_SESSION['error']);
    } ?>
    <form method="post" action="process_register.php" class="form-control" enctype="multipart/form-data"
        id="registerForm">
        <div class="mb-3">
            <label for="email" class="form-label">Email <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="email" id="email" name="email" placeholder="Enter Email..." required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="username" id="username" name="username" placeholder="Enter Username..."
                required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password..."
                required>
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Bio <span class="orangeAsterisk">*</span></label>
            <textarea class="form-control" rows="8" id="bio" name="bio" placeholder="Tell us about yourself..."
                required></textarea>
        </div>
        <button type="submit" class="btn-dark btn cont rounded-5 skill">Register</button>
        <a href="login.php" class="btn btn-secondary">Have an account? Log in here</a>
    </form>

</main>

<?php
include('includes/footer.inc')

    ?>