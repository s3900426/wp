$servername = "localhost";
$username = "s3900426";
$password = "password123";
$dbname = "skillswap";

$conn = new mysqli($servername,$username, $password, $dbname)

if ($conn->connect_error){
    die("connection failed: " . $conn->connect_error)
}