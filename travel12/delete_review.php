<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION["admin"])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET["id"])) {
    $reviewId = intval($_GET["id"]);
    $stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
    $stmt->bind_param("i", $reviewId);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?success=Review deleted successfully!");
        exit();
    } else {
        echo "<p>Error deleting review: " . htmlspecialchars($stmt->error) . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>
