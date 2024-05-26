<?php
// Include database connection
include "db_connection.php";

// Function to register user
function registerUser($username, $password) {
    global $conn;

    // Check if username already exists
    $check_query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        return "Username already exists";
    }

    // Insert new user into database
    $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($insert_query) === TRUE) {
        return "Register successful";
    } else {
        return "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

// Function to login user
function loginUser($username, $password) {
    global $conn;

    // Check if username and password match
    $check_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
?>
