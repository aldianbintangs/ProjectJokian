<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset("/assets/css/profile.css") }}">
</head>
<body>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    <img src="{{ asset("/assets/image/profile_logo.png") }}" alt="" srcset="">
    <div class="box">
        <div class="content">
            <div class="profilePicture">
                @if ($user->foto)
                <img src={{ asset('storage/' . $user->foto) }} alt="Profile Picture" width="100">
                @else
                <img src={{ asset('assets/icon/pp.jpg') }} alt="Default Profile Picture" width="100">
                @endif
                <input type="file" name="foto">Change Photo Profile</input>
            </div>
            <div class="profileDetails">
                <p>username</p>
                <input type="text" name="username" value="{{ old('username', $user->username) }}" required>
                <p>email</p>
                <input type="email" disabled>
                <p>password</p>
                <input type="password" disabled>
            </div>
        </div>
        <div class="button">
            <button>Save</button>
        </div>
    </div>
    </form>
</body>
</html>
