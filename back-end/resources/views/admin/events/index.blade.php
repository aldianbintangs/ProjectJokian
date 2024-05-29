<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Events</h1>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addEventModal">Tambah Event</button>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->event_date }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editEventModal"
                                    data-id="{{ $event->id }}"
                                    data-title="{{ $event->title }}"
                                    data-description="{{ $event->description }}"
                                    data-date="{{ $event->event_date }}"
                                    >
                                Edit
                            </button>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventModalLabel">Tambah Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" id="addEventForm">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="event_date" class="form-label">Event Date</label>
                            <input type="date" name="event_date" class="form-control" id="event_date" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addEventForm">Create Event</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="editEventForm">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="edit_title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="edit_title" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="edit_description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_event_date" class="form-label">Event Date</label>
                            <input type="date" name="event_date" class="form-control" id="edit_event_date" required>
                        </div>
                        <input type="hidden" name="id" id="edit_event_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="editEventForm">Update Event</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editEventModal = document.getElementById('editEventModal');
            editEventModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const title = button.getAttribute('data-title');
                const description = button.getAttribute('data-description');
                const date = button.getAttribute('data-date');
                const image = button.getAttribute('data-image');

                const modalTitle = editEventModal.querySelector('.modal-title');
                const editForm = editEventModal.querySelector('#editEventForm');
                const editTitle = editEventModal.querySelector('#edit_title');
                const editDescription = editEventModal.querySelector('#edit_description');
                const editDate = editEventModal.querySelector('#edit_event_date');
                const editImage = editEventModal.querySelector('#edit_event_image');
                const editEventId = editEventModal.querySelector('#edit_event_id');

                modalTitle.textContent = `Edit Event: ${title}`;
                editForm.action = `/admin/events/${id}`;
                editTitle.value = title;
                editDescription.value = description;
                editDate.value = date;
                editEventId.value = id;
            });
        });
    </script>
</body>
</html>
