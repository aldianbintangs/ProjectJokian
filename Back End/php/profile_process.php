<?php
// Include functions for database operations
include "functions.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $name = $_POST["name"];
    // Check if profile picture is uploaded
    if ($_FILES["profile-pic"]["error"] == 0) {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["profile-pic"]["name"]);
        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $target_file)) {
            $profile_pic = basename($_FILES["profile-pic"]["name"]);
            // Update user's profile information in database
            $update_result = updateProfile($username, $name, $profile_pic);
            if ($update_result === true) {
                header("Location: ../home.php");
                exit;
            } else {
                echo "Error updating profile: " . $update_result;
            }
        } else {
            echo "Error uploading profile picture";
        }
    } else {
        echo "Error uploading profile picture";
    }
} else {
    header("Location: ../index.php");
    exit;
}
?>
