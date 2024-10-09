<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Get the values from the POST request
	$username = $_POST['username'];
	$sex = isset($_POST['sex']) ? $_POST['sex'] : null;  // Check if 'sex' is set
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$age = $_POST['age'];
	$destination = $_POST['destination'];
	$crew = $_POST['crew'];
	$shuttle = $_POST['shuttle'];

	// Check if 'sex' is not empty
	if ($sex === null) {
			echo "Please select a gender.";
			exit;
	}

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	// Database connection
	include 'db_connect.php';

	// Prepare SQL statement (use prepared statements for security)
	$sql = "INSERT INTO users (username, sex, password, email, phone, age, destination, crew, shuttle)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sssssssss", $username, $sex, $hashed_password, $email, $phone, $age, $destination, $crew, $shuttle);

	// Execute the statement and check for errors
	if ($stmt->execute()) {
			echo "<p>New record created successfully</p>";
	} else {
			echo "<p>Error: " . $stmt->error . "</p>";
	}

	// Close the statement and connection
	$stmt->close();
	$conn->close();
}
?>

<!-- Add a button to go back to index.php -->
<div style="margin-top: 20px;">
    <a href="index.php" class="button">Go Back to Home</a>
</div>

<style>
    /* Add some basic styling for the button */
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff; /* Bootstrap primary color */
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }
</style>
