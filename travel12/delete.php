<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "travel_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure valid integer

    // Fetch user's email before deletion
    $stmt = $conn->prepare("SELECT email FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->fetch();
    $stmt->close();

    if ($email) {
        // Prepare email notification
        $to = $email;
        $subject = "Booking Cancellation Notification";
        $message = "Dear Customer,\n\nYour booking has been cancelled.\n\nIf you have any questions, feel free to contact us.\n\nBest Regards,\nTravel Agency";
        $headers = "From: support@yourdomain.com";

        // Send email
        mail($to, $subject, $message, $headers);
    }

    // Proceed with deletion
    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: admin.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
