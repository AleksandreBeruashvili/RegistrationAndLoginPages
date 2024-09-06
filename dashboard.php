<?php
// Check if the username is passed in the URL
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $username; ?>!</h2>
        <p>Login successful! You have successfully entered the dashboard.</p>
        <a href="logout.php" class="button">Logout</a>
    </div>
</body>
</html>
