<?php
session_start();
$title = 'Login';
include('includes/db_connect.inc');
include('includes/header.inc');
include('includes/nav.inc');
?>
<main class="container col-12">
    <h1 class="p-10">Log In</h1>
    <?php if (isset($_SESSION['user_id'])) { ?>
        <h2>Currently logged in as: <?php echo '' . $_SESSION["username"] . $_SESSION["user_id"]. '' ?></h2>
    <?php } ?>
    <form method="post" action="process_login.php" class="form-control" enctype="multipart/form-data" id="loginForm">
        <div class="mb-3">
            <label for="username" class="form-label">Username <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="username" id="username" name="username" placeholder="Enter Username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password <span class="orangeAsterisk">*</span></label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password" required>
        </div>
        <button type="submit" class="btn-dark btn cont rounded-5 skill">Login</button>
        <a href="register.php" class="btn btn-secondary">Don't have an account? Register here</a>
    </form>

</main>

<?php
include('includes/footer.inc')

?>