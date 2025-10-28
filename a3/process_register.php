<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include('includes/db_connect.inc');
session_start();

$username = trim($_POST['username']);
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);
$bio = trim($_POST['bio']);
$email = trim($_POST['email']);

$stmt = mysqli_prepare($conn,'INSERT INTO users (username,password,bio,email) VALUES (?,?,?,?)');
mysqli_stmt_bind_param($stmt, 'ssss', $username, $password, $bio, $email);

if (mysqli_stmt_execute($stmt)) {
    $user_id = mysqli_insert_id($conn);
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['bio'] = $bio;
    $_SESSION['message'] = 'Registered new user '.$username.'.';
    header("Location: index.php");
    exit();
} else{
    $_SESSION['error'] = 'Could not register user. Please re-enter username and email.';
    header("Location: register.php");
    exit();
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>