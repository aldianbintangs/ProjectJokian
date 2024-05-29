<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User</title>
    <link rel="stylesheet" href="{{ asset(assets/css/kelola_user.css) }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ asset('assets/image/profile_logo.png') }}" alt="">
        <div class="profile">
            <p>Hi, Admin {{ Auth::user()->username }}</p>
        </div>
    </div>
    <div class="container">
        <div class="user-management">
            <button class="add-user-btn"> <a href="{{ route('admin.users.create') }}">Add User</a></button>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>LisaHanifatul</td>
                        <td>lalalisa@gmail.com</td>
                        <td>lisaaja1</td>
                        <td>
                            <button class="edit-btn">Edit</button>
                            <button class="delete-btn">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Fadilla10</td>
                        <td>dira10@gmail.com</td>
                        <td>dilalucu</td>
                        <td>
                            <button class="edit-btn">Edit</button>
                            <button class="delete-btn">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Puti</td>
                        <td>putiaja123@gmail.com</td>
                        <td>putikeren</td>
                        <td>
                            <button class="edit-btn">Edit</button>
                            <button class="delete-btn">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Velisakeren1</td>
                        <td>velisacantik1234@gmail.com</td>
                        <td>cantik1234</td>
                        <td>
                            <button class="edit-btn">Edit</button>
                            <button class="delete-btn">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

