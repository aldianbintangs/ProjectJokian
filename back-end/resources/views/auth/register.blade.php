<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');
    </style>
</head>

<body>
    <div class="login">
        <div class="box">
            <img src="assets/image/Logo.png" alt="logo">
            <h1>Register</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <span><b>username</b> </span> <br>
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                <span><b>email</b> </span><br>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                <span><b>password</b> </span> <br>
                <input type="password" name="password" placeholder="Password">
                <span><b>confirm password</b> </span><br>
                <input type="password" name="password_confirmation" placeholder="Confirm Password">
                <p>Already Have an Account? <a href="/login/visitor">Login Here</a></p>
                <button type="submit">Register</button>
            </form>
            @if ($errors->any())
                <div>
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
