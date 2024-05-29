<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User</title>
    <link rel="stylesheet" href="{{ asset('assets/css/kelola_user.css') }}">
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
            <a href="/dashboard/admin"><img src="{{ asset('assets/image/back-button.png') }}" alt=""></a>
            <button class="add-user-btn"> Add User</button>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="button">
                                    <button class="edit-btn" data-user-id="{{ $user->id }}">Edit</button>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn link-btn">Delete</button>
                                    </form>
                                </div>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New User</h2>
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
    <div id="editUserModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit User</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="edit_username">Username</label>
                    <input type="text" id="edit_username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="edit_email">Email</label>
                    <input type="email" id="edit_email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="edit_password">Password</label>
                    <input type="password" id="edit_password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
    <script>
        var modal = document.getElementById("myModal");
        var editModal = document.getElementById("editUserModal");
        var btn = document.querySelector(".add-user-btn");
        var editBtns = document.querySelectorAll(".edit-btn");
        var span = document.getElementsByClassName("close")[0];
        var editSpan = document.getElementsByClassName("close")[1];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        editBtns.forEach(function(editBtn) {
        editBtn.onclick = function() {
        var userId = this.getAttribute("data-user-id");
        var editForm = document.getElementById("editForm");
        editForm.action = "/admin/users/" + userId;
        editModal.style.display = "block";
    }
        });

        editSpan.onclick = function() {
            editModal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == editModal) {
                editModal.style.display = "none";
            }
        }
    </script>


</body>

</html>
