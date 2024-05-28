<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/admin_dashboard.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');
    </style>
</head>

<body>
    <div class="header">
        <div class="logoutButton">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <div class="profile">
            <p>Hi, Admin {{ Auth::user()->username }}</p>
        </div>
    </div>

    <h1>ADMIN DASHBOARD</h1>
    <div class="line"></div>
    <div class="content">
        <button><a href="/admin/add-event">
                <img src="{{ asset('/assets/image/calendar_icons.png') }}" alt="">
                <p>TAMBAHKAN EVENT</p>
            </a></button>
        <button><a href="{{ route('admin.users.index') }}">
                <img src="{{ asset('/assets/image/People_icons.png') }}" alt="">
                <p>KELOLA USER</p>
            </a></button>



    </div>
</body>

</html>
