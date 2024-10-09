<?php
session_start();
include 'db_connect.php';  // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];  // The plain text password from the form

    // Prepare the query to retrieve the user's hashed password
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the hashed password
        if (password_verify($password, $row['password'])) {
            // Password matches, login successful
            $_SESSION['username'] = $username;  // Store username in session
            $_SESSION['loggedin'] = true;       // Set a session flag for logged-in status
            header("Location: index.php");      // Redirect to homepage
            exit;
        } else {
            // Invalid password
            $error_message = "Invalid username or password.";
        }
    } else {
        // No such user found
        $error_message = "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>

    <div class="login-box">
        <p>Login</p>
        <?php if (!empty($error_message)): ?>
            <div class="error-message" style="color: red; margin-bottom: 15px;">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        
        <form action="login.php" method="POST">
            <div class="user-box">
                <input required="true" name="username" type="text">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input required="true" name="password" type="password">
                <label>Password</label>
            </div>
            <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button type="submit">Submit</button>
            </a>
        </form>
        
    </div>

</body>

</html>
