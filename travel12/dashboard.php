<?php
require_once 'includes/header.php'; // Session started, db connected

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your dashboard!</h1>
<p>
    This is your personal space. From here you can (eventually):
</p>
<ul>
    <li>View your booked trips (Not implemented)</li>
    <li>Update your profile (Not implemented)</li>
    <li>Manage your preferences (Not implemented)</li>
</ul>
<p>
    <a href="logout.php">Sign Out of Your Account</a>
</p>

<?php require_once 'includes/footer.php'; ?>