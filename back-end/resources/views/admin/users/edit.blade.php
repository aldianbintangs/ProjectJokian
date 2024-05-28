<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
        <button type="submit">Update User</button>
    </form>
</body>
</html>
