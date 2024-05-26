<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah field input tidak kosong
    if (empty($username) || empty($password)) {
        $error = "Username and password cannot be empty.";
    } else {
        $sql = "SELECT * FROM visitor WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['username'] = $username;
                header("Location: ../home.html");
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
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
    <title>Login - VisitMalang</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .notification {
            background-color: #f44336;
            color: white;
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Login to VisitMalang</h1>
    </header>
    <main>
        <?php if (!empty($error)) : ?>
            <div class="notification">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="home.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </main>
    <footer>
        <p>&copy; 2024 VisitMalang. All rights reserved.</p>
    </footer>
</body>
</html>
