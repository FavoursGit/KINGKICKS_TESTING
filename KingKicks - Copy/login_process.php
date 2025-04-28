<?php
session_start();
include "DBconfig.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Connect to the database using PDO
        $pdo = Database::connect();

        // Get the username and password from the POST request
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare the SQL query to fetch the user
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the user
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, log the user in
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            // Redirect to the homepage
            header("Location: homepage.php");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username or password.";
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
}
?>