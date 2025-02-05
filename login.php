<?php
// Include the database connection
include('db.php'); // Assuming this contains the correct database connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize user inputs
    $name = mysqli_real_escape_string($data, $_POST['userid']);
    $pass = mysqli_real_escape_string($data, $_POST['password']);
    
    // Prepare the SQL query to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username = ?";
    
    // Prepare the statement
    if ($stmt = mysqli_prepare($data, $sql)) {
        // Bind parameters to the query
        mysqli_stmt_bind_param($stmt, "s", $name);
        
        // Execute the query
        mysqli_stmt_execute($stmt);
        
        // Get the result of the query
        $result = mysqli_stmt_get_result($stmt);
        
        // Check if the user exists
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            // Verify the password using password_verify
            if (password_verify($pass, $row["password"])) {
                // If the password is correct and the user is a student, redirect
                if ($row["usertype"] == "student") {
                    header("Location: dashboard.php");
                    exit(); // Ensure the script stops after the redirect
                }
            } else {
                echo "Username or password does not match.";
            }
        } else {
            echo "Username or password does not match.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Database query failed.";
    }
    
    // Close the connection
    mysqli_close($data);
}
?>
