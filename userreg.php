<?php
require "connect.php";  // Ensure this file contains the correct database connection logic

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $full_name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $license_number = mysqli_real_escape_string($conn, $_POST['License']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // Check if all required fields are filled
    if (empty($full_name) || empty($email) || empty($phone) || empty($license_number) || empty($password) || empty($confirmPassword)) {
        echo "All fields are required.";
    } elseif ($password !== $confirmPassword) {
        echo "Passwords do not match.";
    } elseif (strlen($password) < 6) {
        echo "Password must be at least 6 characters long.";
    } else {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Handle file upload
        if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
            $document = $_FILES['document'];
            $document_name = $document['name'];
            $document_tmp_name = $document['tmp_name'];
            $document_size = $document['size'];
            $document_ext = pathinfo($document_name, PATHINFO_EXTENSION);

            // Check file type (you can adjust the allowed file types)
            $allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];
            if (!in_array($document_ext, $allowed_types)) {
                echo "Only JPG, JPEG, PNG, and PDF files are allowed.";
            } else {
                $upload_dir = 'uploads/';
                $document_path = $upload_dir . basename($document_name);

                // Move the file to the upload directory
                if (move_uploaded_file($document_tmp_name, $document_path)) {
                    // Insert the data into the database
                    $sql = "INSERT INTO users (full_name, email, phone_number, license_number, password, document_path)
                            VALUES ('$full_name', '$email', '$phone', '$license_number', '$hashed_password', '$document_path')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Account created successfully!";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error uploading the file.";
                }
            }
        } else {
            echo "Please upload an identity proof.";
        }
    }
}

// Close the connection
$conn->close();
?>
