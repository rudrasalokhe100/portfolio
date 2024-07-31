<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, message, submitted_at FROM contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Messages</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='message'>";
            echo "<h3>" . $row["name"] . " (" . $row["email"] . ")</h3>";
            echo "<p>" . $row["message"] . "</p>";
            echo "<small>Submitted on: " . $row["submitted_at"] . "</small>";
            echo "</div>";
        }
    } else {
        echo "No messages found.";
    }
    $conn->close();
    ?>
</body>
</html>
