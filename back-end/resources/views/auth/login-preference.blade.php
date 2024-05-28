<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Preferences</title>
    <link rel="stylesheet" href="assets/css/login-preferences.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');
    </style>
</head>
<body>
        <img src="assets/image/Logo.png" alt="">
    <div class="hero">
        <div class="Role">
            <h1>Choose your login preference</h1>
            <div class="center">
                <a href="{{ route('login.visitor') }}"><button>Login as Visitor</button></a>
                <div class="vertical-line"></div>
                <a href="{{ route('login.admin') }}"><button>Login as Admin</button></a>
            </div>
        </div>
    </div>
</body>
</html>
