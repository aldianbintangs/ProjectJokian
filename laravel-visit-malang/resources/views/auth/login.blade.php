<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<body>
    <h1>Login as {{ ucfirst($role) }}</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="hidden" name="role" value="{{ $role }}">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    @if ($role == 'visitor')
        <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
    @endif
</body>

</html>
