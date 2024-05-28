<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Profile</h1>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}" required>
        </div>
        <div>
            <label>Profile Picture</label>
            <input type="file" name="foto">
            @if ($user->foto)
                <img src="{{ asset('storage/' . $user->foto) }}" alt="Profile Picture" width="100">
            @else
                <img src="{{ asset('assets/icon/pp.jpg') }}" alt="Default Profile Picture" width="100">
            @endif
        </div>
        <button type="submit">Update Profile</button>
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
</body>
</html>
