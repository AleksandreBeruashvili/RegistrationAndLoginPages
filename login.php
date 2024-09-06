<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beru_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Redirect to dashboard.php on successful login
            header("Location: dashboard.php?username=" . urlencode($username));
            exit();
        } else {
            echo "<div class='alert error'>Invalid password. Please try again.</div>";
        }
    } else {
        echo "<div class='alert error'>No user found with that username.</div>";
    }

    $stmt->close();
}

$conn->close();
?>
