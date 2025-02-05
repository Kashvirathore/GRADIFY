<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session
session_start();

// Database connection settings
$servername = "127.0.0.1";
$port = 3306;
$username = "root";
$password = "aditi"; // Adjust your password accordingly
$dbname = "user_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to register a new user
function registerUser($conn, $user_id, $email, $password, $confirm_password) {
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        return;
    }

    // Check if user ID or email already exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_id = ? OR email = ?");
    $stmt->bind_param("ss", $user_id, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "User ID or email already exists.";
        $stmt->close();
        return;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO users (user_id, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user_id, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: login.html"); // Redirect to login page after successful registration
        exit();
    } else {
        echo "Error registering user: " . $stmt->error;
    }

    $stmt->close();
}

// Handle registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_user_id'])) {
    $user_id = $_POST['register_user_id'];
    $email = $_POST['register_email'];
    $password = $_POST['register_password'];
    $confirm_password = $_POST['confirm_password'];

    registerUser($conn, $user_id, $email, $password, $confirm_password);
}

// Function to handle login
function loginUser($conn, $user_id, $password) {
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user_id;
            header("Location: dashboard.html"); // Redirect to dashboard after successful login
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that user ID.";
    }

    $stmt->close();
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_user_id'])) {
    $user_id = $_POST['login_user_id'];
    $password = $_POST['login_password'];

    loginUser($conn, $user_id, $password);
}

// Close connection
$conn->close();
?>
