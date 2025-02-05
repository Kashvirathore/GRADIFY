<?php
// Include database connection
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = mysqli_real_escape_string($data, $_POST['username']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
    } else {
        // Hash the password before saving
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL query to insert data
        $sql = "INSERT INTO users (username, email, password, usertype) VALUES (?, ?, ?, 'student')";

        // Prepare the statement
        if ($stmt = mysqli_prepare($data, $sql)) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                echo "Registration successful.";
                header("Location: login.php"); // Redirect to login page
                exit();
            } else {
                echo "Error: Could not register the user.";
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Database query failed.";
        }
    }

    // Close the connection
    mysqli_close($data);
}
?>
