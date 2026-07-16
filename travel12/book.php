<?php
$servername = "localhost";
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password
$database = "travel_db";

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $destination = $_POST["destination"];
    $travel_date = $_POST["travel_date"];
    $location = $_POST["location"];
    $suggestions = $_POST["suggestions"];

    // Use prepared statement for security
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, destination, travel_date, location, suggestions) VALUES (?, ?, ?, ?, ?, ?, ?)");
    

    if (!$stmt) {
    die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sssssss", $name, $email, $phone, $destination, $travel_date, $location, $suggestions);
    
    if ($stmt->execute()) {
        header("Location: booking_success.php"); // Redirect to confirmation page
        exit();
    } else {
        $message = "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Travel Booking</title>
    <link rel="stylesheet" href="book.css">
</head>
<body>
    <div class="container">
        <h2>Book Your Travel</h2>
        <?php if (!empty($message)) echo "<p class='message'>$message</p>"; ?>

        <form action="book.php" method="POST">
            <label>Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Phone</label>
            <input type="tel" name="phone" required>

            <label>Destination</label>
            <input type="text" name="destination" required>

            <label>Travel Date</label>
            <input type="date" name="travel_date" required>

            <label>Your Location</label>
            <input type="text" name="location" required>

            <label>Your message</label>
            <textarea name="suggestions" rows="4" placeholder="Special instructions(if any)"></textarea>

            <button type="submit">Book Now</button>
        </form>
    </div>
</body>
</html>
