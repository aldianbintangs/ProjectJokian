<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisitMalang - Admin Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>VisitMalang Admin</h1>
        </div>
    </header>
    <div class="container">
        <h2>Admin Login</h2>
        <form action="../includes/admin_login_process.php" method="POST">
            <input type="text" name="admin_username" placeholder="Admin Username" required>
            <input type="password" name="admin_password" placeholder="Admin Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>
