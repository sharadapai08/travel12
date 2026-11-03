
<?php
session_start();
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Find admin using username
    $stmt = $conn->prepare(
        "SELECT * FROM admin WHERE username = ? LIMIT 1"
    );

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $admin = $result->fetch_assoc();
        $stored_password = $admin["password"];

        // Check password
        if (password_verify($password, $stored_password)) {

            $valid = true;

        } elseif (hash_equals($stored_password, $password)) {

            // Convert old plain-text password to secure hash
            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $update = $conn->prepare(
                "UPDATE admin SET password = ? WHERE id = ?"
            );

            $update->bind_param(
                "si",
                $hashed_password,
                $admin["id"]
            );

            $update->execute();
            $update->close();

            $valid = true;

        } else {
            $valid = false;
        }

        if ($valid) {

            session_regenerate_id(true);

            $_SESSION["admin"] = $admin["username"];

            header("Location: admin_dashboard.php");
            exit();

        } else {
            $error = "Invalid credentials!";
        }

    } else {
        $error = "User not found!";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="login-box">

        <h2>Admin Login</h2>

        <form action="" method="POST">

            <input type="text"
                   name="username"
                   placeholder="Username"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Password"
                   required>

            <button type="submit">Login</button>

        </form>

        <?php
        if (isset($error)) {
            echo "<p>" . htmlspecialchars($error) . "</p>";
        }
        ?>

    </div>

</body>
</html>
