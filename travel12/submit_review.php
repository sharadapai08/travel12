<?php
session_start();
include "db_connect.php"; // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $review_text = trim($_POST["review_text"]);
    $rating = intval($_POST["rating"]);
    $user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : NULL;

    // Validate inputs
    if (empty($name) || empty($review_text) || $rating <= 0) {
        header("Location: submit_review.php?error=Invalid input.");
        exit();
    }

    if (strlen($name) > 100 || strlen($review_text) > 500) {
        header("Location: submit_review.php?error=Input too long.");
        exit();
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO reviews (user_id, name, review_text, rating) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $name, $review_text, $rating);

    if ($stmt->execute()) {
        header("Location: submit_review.php?success=Review submitted successfully!");
    } else {
        header("Location: submit_review.php?error=" . urlencode($stmt->error));
    }

    $stmt->close();
    $conn->close();
    exit();
}



// Fetch latest 5 reviews
$result = $conn->query("SELECT name, review_text, rating, created_at FROM reviews ORDER BY created_at DESC LIMIT 5");
if (!$result) {
    die("Error fetching reviews: " . htmlspecialchars($conn->error));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Reviews</title>
    <link rel="stylesheet" href="review.css">
</head>
<body>
    <section>
        <div class="review-section">
            <h2>Reviews</h2>

            <!-- Review Submission Form -->
            <form action="submit_review.php" method="POST" class="review-form">
                <label>Name:</label>
                <input type="text" name="name" maxlength="100" required>

                <label for="review_text">Write Your Review:</label>
                <textarea name="review_text" id="review_text" rows="5" cols="50" placeholder="Share your experience..." maxlength="500" required></textarea>

                <label>Rating:</label>
                <select name="rating" required>
                    <option value="5">⭐⭐⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="1">⭐</option>
                </select>

                <button type="submit">Submit Review</button>
            </form>

            <!-- Display Recent Reviews -->
            <div class="review-list">
                <h3>Recent Reviews:</h3>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="review-card">
                        <p><strong><?= htmlspecialchars($row["name"]) ?></strong> - ⭐<?= $row["rating"] ?>/5</p>
                        <p><?= htmlspecialchars($row["review_text"]) ?></p>
                        <small><em>Posted on <?= date("d M Y", strtotime($row["created_at"])) ?></em></small>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</body>
</html>

<?php
$conn->close();
?>
