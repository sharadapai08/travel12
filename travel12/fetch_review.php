<?php
include "db_connect.php"; // Connect to database

$result = $conn->query("SELECT name, review_text, rating, created_at FROM reviews ORDER BY created_at DESC LIMIT 5");

echo "<div class='review-list'>";
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='review-card'>";
        echo "<p><strong>" . htmlspecialchars($row["name"]) . "</strong> - ⭐" . $row["rating"] . "/5</p>";
        echo "<p>" . htmlspecialchars($row["review_text"]) . "</p>";
        echo "<small><em>Posted on " . date("d M Y", strtotime($row["created_at"])) . "</em></small>";
        echo "</div>";
    }
} else {
    echo "<p>No reviews yet. Be the first to write one!</p>";
}
echo "</div>";

$conn->close();
?>
