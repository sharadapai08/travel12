<?php
require_once 'includes/header.php'; // Session started, db connected

// Redirect if already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php"); // Redirect to homepage instead of dashboard
    exit;
}

$login_identifier = $password = ""; // Can be username or email
$login_identifier_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if login_identifier is empty
    if (empty(trim($_POST["login_identifier"]))) {
        $login_identifier_err = "Please enter username or email.";
    } else {
        $login_identifier = trim($_POST["login_identifier"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($login_identifier_err) && empty($password_err)) {
        // Prepare a select statement (try username first, then email)
        $sql = "SELECT id, username, email, password_hash FROM users WHERE username = ? OR email = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ss", $param_login_identifier, $param_login_identifier);
            $param_login_identifier = $login_identifier;
            
            if ($stmt->execute()) {
                $stmt->store_result();
                
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $email, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_regenerate_id(true); // Improves session security
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;                           
                            
                            // Redirect user to homepage
                            header("location: index.php");
                            exit;
                        } else {
                            $login_err = "Invalid username/email or password.";
                        }
                    }
                } else {
                    $login_err = "Invalid username/email or password.";
                }
            } else {
                error_log("Database query error: " . $stmt->error); // Logs error for debugging
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
}
?>

<h2>Login</h2>
<p>Please fill in your credentials to login.</p>

<?php if (!empty($login_err)): ?>
    <p class="error-message"><?php echo $login_err; ?></p>
<?php endif; ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group <?php echo (!empty($login_identifier_err)) ? 'has-error' : ''; ?>">
        <label>Username or Email</label>
        <input type="text" name="login_identifier" value="<?php echo htmlspecialchars($login_identifier); ?>">
        <?php if(!empty($login_identifier_err)): ?><span class="error-message"><?php echo $login_identifier_err; ?></span><?php endif; ?>
    </div>    
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="password">
        <?php if(!empty($password_err)): ?><span class="error-message"><?php echo $password_err; ?></span><?php endif; ?>
    </div>
    <div class="form-group">
        <input type="submit" value="Login">
    </div>
    <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
</form>

<?php require_once 'includes/footer.php'; ?>
