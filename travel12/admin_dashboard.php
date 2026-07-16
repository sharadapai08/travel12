<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: admin_login.php");
    exit();
}

include "db_connect.php";

// Fetch admin details
$adminEmail = isset($_SESSION["admin_email"]) ? $_SESSION["admin_email"] : "Not available";

// Fetch all bookings
$bookingQuery = "SELECT * FROM bookings ORDER BY created_at DESC";
$bookingResult = $conn->query($bookingQuery);
if (!$bookingResult) {
    die("Error fetching bookings: " . htmlspecialchars($conn->error));
}

// Fetch latest reviews
$reviewQuery = "SELECT * FROM reviews ORDER BY created_at DESC";
$reviewResult = $conn->query($reviewQuery);
if (!$reviewResult) {
    die("Error fetching reviews: " . htmlspecialchars($conn->error));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-header">
        <h2>Welcome, <?= htmlspecialchars($_SESSION["admin"]) ?>!</h2>
        <p><strong>Email:</strong> <?= htmlspecialchars($adminEmail) ?></p>
        <a href="logout1.php" class="logout-btn">Logout</a>
    </div>

    <!-- Booking Section -->
    <h3>Manage Bookings</h3>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Destination</th>
                    <th>Travel Date</th>
                    <th>Location</th>
                    <th>Suggestions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $bookingResult->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row["id"]) ?></td>
                        <td><?= htmlspecialchars($row["name"]) ?></td>
                        <td><?= htmlspecialchars($row["email"]) ?></td>
                        <td><?= htmlspecialchars($row["phone"]) ?></td>
                        <td><?= htmlspecialchars($row["destination"]) ?></td>
                        <td><?= htmlspecialchars($row["travel_date"]) ?></td>
                        <td><?= htmlspecialchars($row["location"]) ?></td>
                        <td><?= htmlspecialchars($row["suggestions"]) ?></td>
                        <td>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="delete-btn">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Review Section -->
    <h3>Customer Reviews</h3>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Submitted At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $reviewResult->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row["id"]) ?></td>
                        <td><?= htmlspecialchars($row["name"]) ?></td>
                        <td><?= htmlspecialchars($row["review_text"]) ?></td>
                        <td>⭐<?= htmlspecialchars($row["rating"]) ?>/5</td>
                        <td><?= htmlspecialchars($row["created_at"]) ?></td>
                        <td>
                            <a href="delete_review.php?id=<?= $row['id'] ?>" class="delete-btn">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
