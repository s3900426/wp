<?php
//Checks what server you're accessing
if (strstr($_SERVER['SERVER_NAME'],'localhost')){
    ini_set('display_errors', 1); 
    error_reporting(E_ALL);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "skillswap";
} else {
    $servername = "talsprddb02.int.its.rmit.edu.au";
    $username = "s3900426";
    include("/home/sl6/S3900426/public_html/.htdb_pass");
    $dbname = "s3900426";
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>
<?