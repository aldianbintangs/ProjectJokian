<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User</title>
    {{-- <link rel="stylesheet" href="assets/css/kelola_user.css"> --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');

        html,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lexend', sans-serif;
            background: linear-gradient(to right, #162E52 0%, #214161 9%, #305E79 47%, #448699 100%);
            color: white;
        }

        .profile {
            width: 348px;
            height: 85px;
            border-radius: 50px;
            background-color: white;
            text-align: center;
            font-size: 23px;
            margin-top: 30px;
        }

        .profile p {
            text-align: center;
            padding-top: 5px;
            color: black;
            font-weight: bold;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .header img {
            height: 85px;
            border-radius: 50%;
        }

        .container {
            padding: 20px;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        .user-management {
            /* text-align: center; */
            background-color: #E7E7E7;
            padding: 20px;
            border-radius: 10px;
            color: #000;
        }

        .add-user-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            margin-left: 92%;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            background-color: white;
        }

        th {
            background-color: white;
        }

        .edit-btn,
        .delete-btn {
            /* padding: 5px 10px; */
            border: none;
            border-radius: 20px;
            cursor: pointer;
            width: 130px;
            height: 50px;
            font-size: 20px;
        }

        .edit-btn {
            background-color: #0194F3;
            color: white;
            margin-right: 5px;

        }

        .delete-btn {
            background-color: #dc3545;
            color: white;

        }
    </style>
</head>

<body>
    <div class="header">
        <img src="assets/image/profile_logo.png" alt="">
        <div class="profile">
            <p>Hi, Admin #name</p>
        </div>
    </div>
    <div class="container">
        <div class="user-management">
            <button class="add-user-btn">Add User</button>
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
