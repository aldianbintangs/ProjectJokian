<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisitMalang - Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>VisitMalang</h1>
            <button class="back-btn">Back</button>
        </div>
    </header>
    <div class="container">
        <h2>Profile</h2>
        <form action="profile_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="file" name="profile-pic" accept="image/*">
            <button type="submit">Save</button>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
