<?php
require_once 'includes/header.php'; // Session started, db connected

$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";
$registration_success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else {
        $sql = "SELECT id FROM users WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = trim($_POST["email"]);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $email_err = "This email is already registered.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Passwords do not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $param_username, $param_email, $param_password_hash);
            $param_username = $username;
            $param_email = $email;
            $param_password_hash = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            if ($stmt->execute()) {
                $registration_success = "Registration successful! You can now <a href='login.php'>login</a>.";
                // Clear form fields after success
                $_POST = array();
                $username = $email = $password = $confirm_password = "";

            } else {
                echo "Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
}
?>

<h2>Sign Up</h2>
<p>Please fill this form to create an account.</p>

<?php if (!empty($registration_success)): ?>
    <p class="success-message"><?php echo $registration_success; ?></p>
<?php endif; ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
        <?php if(!empty($username_err)): ?><span class="error-message"><?php echo $username_err; ?></span><?php endif; ?>
    </div>
    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <?php if(!empty($email_err)): ?><span class="error-message"><?php echo $email_err; ?></span><?php endif; ?>
    </div>
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="password">
        <?php if(!empty($password_err)): ?><span class="error-message"><?php echo $password_err; ?></span><?php endif; ?>
    </div>
    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password">
        <?php if(!empty($confirm_password_err)): ?><span class="error-message"><?php echo $confirm_password_err; ?></span><?php endif; ?>
    </div>
    <div class="form-group">
        <input type="submit" value="Sign Up">
    </div>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</form>

<?php require_once 'includes/footer.php'; ?>