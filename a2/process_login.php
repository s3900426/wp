<?php
include('includes/db_connect.inc');
session_start();

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$stmt = mysqli_prepare($conn,'SELECT user_id,password FROM users WHERE email=?');
mysqli_stmt_bind_param( $stmt,'s', $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$user_id, $hash);
mysqli_stmt_fetch($stmt);

if($user_id && password_verify($password, $hash)){
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    $_SESSION['message'] = "Login Successful!";
    header('Location: index.php');
}else{
    $_SESSION['error'] = "Failed to login. Please check username and password";
    header('Location: index.php');
}
?>