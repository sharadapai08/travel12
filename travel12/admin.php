<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "travel_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch bookings
$bookings = $conn->query("SELECT * FROM bookings ORDER BY travel_date DESC");

// Fetch reviews
$reviews = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel - Bookings & Reviews</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h2>Admin Booking Management</h2>
    <table>
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
        <?php while ($row = $bookings->fetch_assoc()) { ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["phone"] ?></td>
            <td><?= $row["destination"] ?></td>
            <td><?= $row["travel_date"] ?></td>
            <td><?= htmlspecialchars($row["location"]) ?></td>
            <td><?= htmlspecialchars($row["suggestions"]) ?></td>
            <td><a href="delete.php?id=<?= $row['id'] ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>

    <h2>Admin Review Management</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Rating</th>
            <th>Review</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $reviews->fetch_assoc()) { ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td>⭐<?= $row["rating"] ?>/5</td>
            <td><?= $row["review_text"] ?></td>
            <td><a href="delete_review.php?id=<?= $row['id'] ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
