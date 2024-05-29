<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');
    </style>
</head>

<body>
    <div class="login">

        <div class="box">
            <img src="{{ asset('assets/image/Logo.png') }}" alt="logo">
            <h1>Login as Admin</h1>
            <form method="POST" action="{{ route('login.admin') }}">
                @csrf
                <span><b>username</b> </span> <br>
                <input type="text" name="username" required><br> <br>
                <span><b>password</b> </span><br>
                <input type="password" name="password" required><br>
                <button type="submit">Login</button>
            </form>
            @if ($errors->any())
                <div class="error-alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

</body>

</html>
