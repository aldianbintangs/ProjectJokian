<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Malang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-event.css') }}">
    <!-- icon -->
    <link href="{{ asset('assets/icon/logo_domain.png') }}" rel="icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <nav class="site-navbar">
                    <a href="{{ url('/') }}" class="site-logo">
                        <img class="image" src="{{ asset('assets/icon/logo_header.png') }}" alt="Logo">
                    </a>
                    <div class="d-flex align-items-center">
                        <div class="MenuItem" id="MenuItems">
                            <a class="item" href="{{ route('home.visitor') }}">Home</a>
                            <a class="item" href="{{ route('events.index') }}">Event</a>
                            <a class="item" href="{{ url('#') }}">Destination</a>
                            <a class="item" href="{{ url('#') }}">Package</a>
                            <div class="dropdown">
                                <a class="item dropdown-toggle" href="#" onclick="toggleDropdown()"
                                    aria-expanded="false">
                                    Profile
                                </a>
                                <ul class="dropdown-menu" id="profileDropdownMenu" aria-labelledby="profileDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); logout()">Logout</a></li>
                                </ul>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                        <form class="w-100 me-3" role="search">
                            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                        </form>
                        <a href="{{ route('profile.edit') }}">
                            @if (Auth::user()->foto)
                                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Profile Picture"
                                    class="profile-picture">
                            @else
                                <img src="{{ asset('assets/icon/pp.jpg') }}" alt="Default Profile Picture"
                                    class="profile-picture">
                            @endif
                        </a>
                        <a href="#" class="mobile bars" id="NavMobile">
                            <img class="image" src="{{ asset('assets/image/bars.png') }}" alt="Logo">
                        </a>
                        <a href="#" class="mobile">
                            <img class="image" src="{{ asset('assets/image/search.png') }}" alt="Logo">
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <main id="landing">
        <div class="container row">
            <div class="col-lg-7 col-md-6 col-12">
                <img src="{{ asset('assets/image/landing-event.png') }}" alt="Landing" width="550" height="380">
            </div>
            <div class="col-lg-5 col-md-6 col-12">
                <h2>JOIN THE FUN!</h2>
                <h1>Explore Exciting <span class="udd-marked"> Events & Festivals</span></h1>
                <h1>in Malang</h1>
                <p>Malang is not just about beautiful landscapes; it's also a hub of vibrant events and festivals.
                    From cultural celebrations to music festivals, discover the diverse events that make Malang a lively
                    city.</p>
            </div>
        </div>
    </main>
    <main id="calendar">
        <div class="mobile-header z-depth-1">
            <div class="row">
                <div class="col-2">
                    <a href="#" data-activates="sidebar" class="button-collapse">
                        <i class="material-icons">menu</i>
                    </a>
                </div>
                <div class="col">
                    <h4>Events</h4>
                </div>
            </div>
        </div>
        <div class="main-wrapper">
            <div class="sidebar-wrapper z-depth-2 side-nav fixed" id="sidebar">
                <div class="sidebar-title">
                    <h4>Events</h4>
                    <h5 id="eventDayName">Date</h5>
                </div>
                <div class="sidebar-events" id="sidebarEvents">
                    <div class="empty-message">Sorry, no events to selected date</div>
                </div>
            </div>
            <div class="content-wrapper grey lighten-3">
                <div class="container">
                    <div class="calendar-wrapper z-depth-2">
                        <div class="header-background">
                            <div class="calendar-header">
                                <a class="prev-button" id="prev">
                                    <i class="material-icons">keyboard_arrow_left</i>
                                </a>
                                <a class="next-button" id="next">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                                <div class="row header-title">
                                    <div class="header-text">
                                        <h3 id="month-name">February</h3>
                                        <h5 id="todayDayName">Today is Friday 7 Feb</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="calendar-content">
                            <div id="calendar-table" class="calendar-cells">
                                <div id="table-header">
                                    <div class="row">
                                        <div class="col">Mon</div>
                                        <div class="col">Tue</div>
                                        <div class="col">Wed</div>
                                        <div class="col">Thu</div>
                                        <div class="col">Fri</div>
                                        <div class="col">Sat</div>
                                        <div class="col">Sun</div>
                                    </div>
                                </div>
                                <div id="table-body" class="">
                                    <!-- Events will be dynamically inserted here -->
                                </div>
                            </div>
                        </div>
                        <div class="calendar-footer">
                            <div class="emptyForm" id="emptyForm">
                                <h4 id="emptyFormTitle">No events now</h4>
                                <a class="addEvent" id="changeFormButton">Add new</a>
                            </div>
                            <div class="addForm" id="addForm">
                                <h4>Add new event</h4>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="eventTitleInput" type="text" class="validate">
                                        <label for="eventTitleInput">Title</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="eventDescInput" type="text" class="validate">
                                        <label for="eventDescInput">Description</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <label for="eventImageInput">Event Image</label><br>
                                        <input id="eventImageInput" type="file" class="validate">
                                    </div>
                                </div>
                                <div class="addEventButtons">
                                    <a class="waves-effect waves-light btn blue lighten-2" id="addEventButton">Add</a>
                                    <a class="waves-effect waves-light btn grey lighten-2" id="cancelAdd">Cancel</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script>
            $(document).ready(function() {
                function fetchEvents() {
                    $.ajax({
                        url: '/api/events',
                        method: 'GET',
                        success: function(data) {
                            renderEvents(data);
                        }
                    });
                }

                function renderEvents(events) {
                    let calendarBody = $('#table-body');
                    calendarBody.empty();
                    events.forEach(event => {
                        let eventDate = new Date(event.date);
                        let eventElement = `
                        <div class="calendar-event">
                            <h5>${event.title}</h5>
                            <p>${event.description}</p>
                        </div>
                    `;
                        let cell = $(`#calendar-table .row .col[data-date='${eventDate.getDate()}']`);
                        if (cell.length) {
                            cell.append(eventElement);
                        }
                    });
                }
                fetchEvents();
            });
        </script>
    </main>
    <script src="{{ asset('assets/js/script-event.js') }}"></script>
    <script>
        function toggleDropdown() {
            var dropdownMenu = document.getElementById("profileDropdownMenu");
            dropdownMenu.classList.toggle("show");
        }

        function logout() {
            document.getElementById('logout-form').submit();
        }

        document.addEventListener("click", function(event) {
            var dropdownMenu = document.getElementById("profileDropdownMenu");
            if (!event.target.closest('.dropdown')) {
                dropdownMenu.classList.remove("show");
            }
        });
    </script>
</body>
</html>
