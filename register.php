<?php
// Database connection
require "connect.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signIn"])) {
    // Sanitize user input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Query to check if the username exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // User exists, now check if the password matches
        $user = $result->fetch_assoc();
        
        // Check if password matches (using password_verify if hashed passwords are used)
        if (password_verify($password, $user['password'])) {
            // Successful login
            echo "Login successful! Welcome " . $user['full_name'];
            // Redirect to a different page or start a session for logged-in user
            // header("Location: dashboard.php"); // Example redirection
        } else {
            // Incorrect password
            echo "Incorrect password.";
        }
    } else {
        // User not found
        echo "No user found with this email.";
    }
}

$conn->close();
?>
