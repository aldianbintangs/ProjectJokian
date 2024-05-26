<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Periksa apakah field input tidak kosong
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Periksa apakah username sudah ada
        $sql = "SELECT * FROM visitor WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $error = "Username already exists.";
        } else {
            // Hash password sebelum disimpan ke database
            $sql = "INSERT INTO visitor (username, password) VALUES ('$username', '$password')";

            if ($conn->query($sql) === TRUE) {
                $success = "Registration successful. You can now <a href='login.php'>login</a>.";
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - VisitMalang</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .notification {
            background-color: #f44336;
            color: white;
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
        }
        .success {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Register to VisitMalang</h1>
    </header>
    <main>
        <?php if (!empty($error)) : ?>
            <div class="notification">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
            <div class="success">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </main>
    <footer>
        <p>&copy; 2024 VisitMalang. All rights reserved.</p>
    </footer>
</body>
</html>
