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
            header("Location: index.php");      // Redirect to homepage
            exit;
        } else {
            // Invalid password
            echo "Invalid username or password.";
        }
    } else {
        // No such user found
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
