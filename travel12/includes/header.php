<?php
// Ensure db_connect is included to start the session
if (!isset($conn)) { // If db_connect.php wasn't included before this
    require_once 'db_connect.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelX</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="logo">TravelX</a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                    <!--<li><a href="dashboard.php">Dashboard</a></li>-->
                    <li><a href="#book">Book</a></li>
                    <li><a href="#packages">Packages</a></li>
                     <li><a href="#services">Services</a></li>
                     <li><a href="#gallery">Gallery</a></li>
                     <li><a href="#about">About Us</a></li>
                    <li><a href="logout.php">Logout (<?php echo htmlspecialchars($_SESSION["username"]); ?>)</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>