<?php
//Checl what server you're accessing
if (strstr($_SERVER['SERVER_NAME'],'localhost')){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "destination";
} else {
    $servernamemachine = "localhost";
    $servernameonline = "talsprddb02.int.its.rmit.edu.au";
    $username = "s3900426";
    $password = "Blinky90!";
    $dbname = "s3900426";
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>