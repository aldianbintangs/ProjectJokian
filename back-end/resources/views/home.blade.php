<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Malang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- icon -->
    <link href="{{ asset('assets/icon/logo_domain.png') }}" rel="icon">
</head>

<body>
    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <nav class="site-navbar">
                    <a href="{{ url('index.html') }}" class="site-logo">
                        <img class="image" src="{{ asset('assets/icon/logo_header.png') }}" alt="Logo">
                    </a>
                    <div class="navbar">
                        <div class="MenuItem" id="MenuItems">
                            <a class="item" href="{{ route('home.visitor') }}">Home</a>
                            <a class="item" href="{{ route('events.index') }}">Event</a>
                            <a class="item" href="{{ url('#') }}">Destination</a>
                            <a class="item" href="{{ url('#') }}">Package</a>
                            {{-- <a class="item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> --}}
                            <div class="dropdown">
                                {{-- <a class="item dropdown-toggle" href="#" role="button" id="profileDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Profile
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    </li>
                                </ul>
                            </div> --}}
                                <div class="dropdown">
                                    <a class="item dropdown-toggle" href="#" onclick="toggleDropdown()"
                                        aria-expanded="false">
                                        Profile
                                    </a>
                                    <ul class="dropdown-menu" id="profileDropdownMenu"
                                        aria-labelledby="profileDropdown">
                                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); logout()">Logout</a></li>
                                    </ul>
                                </div>

                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                        <form class="" role="search">
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
                </nav>
            </div>
        </div>
    </header>
    <main id="landing">
        <div class="container row">
            <div class="col-lg-5 col-md-6 col-12">
                <h2>LET'S!</h2>
                <h1>Discover Beautiful <span class="udd-marked"> Natural Places</span></h1>
                <h1>in Malang </h1>
                <p>Malang is definitely the place that is worth to explore,
                    with the beautiful mountain ranges to the amazing foods
                    that the city can offer, Malang has it all.</p>
                <a class="landing-button" href="{{ url('package.html') }}">Travel Now</a>
            </div>
            <div class="col-lg-7 col-md-6 col-12">
                <img src="{{ asset('assets/image/landing.png') }}" alt="Landing" width="600" height="400">
            </div>
        </div>
    </main>
    <main id="package">
        <div class="container">
            <div class="title">
                <h1>OUR TRIP PACKAGE</h1>
                <hr>
            </div>
            <div class="row content">
                <div class="col-lg-2 col-md-3 col-6 card text-center">
                    <img class="card-img-top" src="{{ asset('assets/image/Bromo.png') }}" alt="Bromo Package Trip">
                    <div class="card-body">
                        <h5 class="card-title">Bromo Package Trip</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6 card text-center">
                    <img class="card-img-top" src="{{ asset('assets/image/Tugu.png') }}" alt="Malang Heritage Trip">
                    <div class="card-body">
                        <h5 class="card-title">Malang Heritage Trip</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6 card text-center">
                    <img class="card-img-top" src="{{ asset('assets/image/Bakso.png') }}" alt="Culinary Trip">
                    <div class="card-body">
                        <h5 class="card-title">Culinary Trip</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6 card text-center">
                    <img class="card-img-top" src="{{ asset('assets/image/Pantai.png') }}" alt="Beach of Malang Trip">
                    <div class="card-body">
                        <h5 class="card-title">Beach of Malang Trip</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6 card text-center">
                    <img class="card-img-top" src="{{ asset('assets/image/Agri.png') }}" alt="Agricultural Trip">
                    <div class="card-body">
                        <h5 class="card-title">Agricultural Trip</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <main id="articles">
        <div class="container">
            <div class="title-mission">
                <h1>BEST PLACE</h1>
                <h1>TO GO</h1>
                <hr>
            </div>
        </div>
        <main id="lokasii">
            <div class="map row">
                <div class="title-map col-md-5 col-lg-6 col-12">
                    <h1 class="">Location</h1>
                    <hr>
                    <h2><img src="{{ asset('assets/image/location.png') }}" alt="Pin">Nganjuk</h2>
                    <p>UDD PMI Kab. Nganjuk Jl. Mayjend Sungkono 10 Kauman Nganjuk 64411 Nganjuk Kab. Nganjuk Jawa Timur
                        64416</p>
                </div>
                <div class="title-map col-md-7 col-lg-6 col-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.7178596050453!2d111.89346957404653!3d-7.605650875173909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e784b0f090d41af%3A0xaaeedbb43a66ad4b!2sPMI%20Nganjuk!5e0!3m2!1sid!2sid!4v1703080931872!5m2!1sid!2sid"></iframe>
                </div>
            </div>
        </main>
        <div class="rectangle1"></div>
        <div class="rectangle2"></div>
        <div class="right-card">
            <img src="{{ asset('assets/image/round_bromo.png') }}" alt="Bromo" width="250" height="250">
            <h1>Gunung Bromo</h1>
            <p>Mount Bromo is located in the Bromo Tengger Semeru
                National Park in East Java, a mountainous highland
                ranging between 1,000 to 3,676m above sea level.</p>
        </div>
        <div class="left-card">
            <img src="{{ asset('assets/image/round_jp.png') }}" alt="JP" width="250" height="250">
            <h1>Jatim Park</h1>
            <p>Explore the cool and refreshing mountain
                regions of East Java at JATIM PARK 3,
                offering a world of thrilling theme park adventures
                for the entire family.</p>
        </div>
        <div class="container article">
            <div class="title">
                <h1>EVENT ON MALANG</h1>
                <hr>
            </div>
            <main id="event">
                <div class="row content">
                    <div class="col-lg-4 col-md-6 col-12 card">
                        <img class="card-img-top" src="{{ asset('assets/image/Event1.png') }}"
                            alt="Pertunjukan Tari Topeng">
                        <div class="card-body">
                            <h5 class="card-title">Pertunjukan Tari Topeng</h5>
                            <p class="card-info">Singosari / Nov 3-7, 2023</p>
                            <p class="card-text">Topeng is a dramatic form of Indonesian dance
                                in which one or more mask-wearing ornately costumed performers
                                interpret traditional narratives concerning fabled kings, heroes, and myths,
                                accompanied by gamelan or other traditional music instruments.</p>
                            <a href="{{ url('blog1.html') }}" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 card">
                        <img class="card-img-top" src="{{ asset('assets/image/Event2.png') }}" alt="Car Free Day">
                        <div class="card-body">
                            <h5 class="card-title">Car Free Day</h5>
                            <p class="card-info">Ijen / Nov 1, 2023</p>
                            <p class="card-text">Car Free Day is a free international event celebrated every Sunday in
                                which people are encouraged to get around without driving
                                alone in cars and instead ride a train, bus, bicycle, carpool, vanpool, subway, or walk.
                            </p>
                            <a href="{{ url('blog2.html') }}" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 card">
                        <img class="card-img-top" src="{{ asset('assets/image/Event3.png') }}"
                            alt="Ini 9 Manfaat Donor secara Rutin untuk Kesehatan">
                        <div class="card-body">
                            <h5 class="card-title">Malang Heritage Fashion Festival</h5>
                            <p class="card-info">Universitas Brawijaya / Okt 6, 2023</p>
                            <p class="card-text">Experience the elegance and prosperity of women
                                with a blend of red and gold collections at the Malang Heritage Fashion Festival 2013.
                            </p>
                            <a href="{{ url('blog3.html') }}" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
            </main>
            <div class="button">
                <a>See More</a>
            </div>
        </div>
    </main>
    <main id="opinions">
        <div class="container">
            <div class="title">
                <h1>WHAT IS THEIR OPINIONS</h1>
                <h3>about travel in Malang?</h3>
            </div>
            <div class="row content">
                <div class="col-lg-2 card">
                    <div class="card-head">
                        <img class="profile card-img-top" src="{{ asset('assets/image/ari.png') }}"
                            alt="ari wibowo">
                        <div class="card-name">
                            <h1 class="name">Ari Wibowo</h1>
                            <h2 class="profession">Actor and Singer</h2>
                        </div>
                        <img class="petik" src="{{ asset('assets/image/Tandapetik.png') }}" alt="Petik">
                    </div>
                    <p>Malang offers cool air and beautiful natural scenery.
                        Bromo and Jatim Park are must-visit places. I really enjoy the city's peaceful atmosphere.</p>
                </div>
                <div class="col-lg-2 card">
                    <div class="card-head">
                        <img class="profile card-img-top" src="{{ asset('assets/image/ronaldo.png') }}"
                            alt="christian ronaldo">
                        <div class="card-name">
                            <h1 class="name">Christian Ronaldo</h1>
                            <h2 class="profession">Soccer Player</h2>
                        </div>
                        <img class="petik" src="{{ asset('assets/image/Tandapetik.png') }}" alt="Petik">
                    </div>
                    <p>The culinary tourism in Malang is amazing! The Malang meatballs and fresh
                        apples are very famous. I want to go back just for the food.</p>
                </div>
                <div class="col-lg-2 card">
                    <div class="card-head">
                        <img class="profile card-img-top" src="{{ asset('assets/image/eddi.png') }}"
                            alt="eddi brokoli">
                        <div class="card-name">
                            <h1 class="name">Eddi Brokoli</h1>
                            <h2 class="profession">Actor and Singer</h2>
                        </div>
                        <img class="petik" src="{{ asset('assets/image/Tandapetik.png') }}" alt="Petik">
                    </div>
                    <p>Malang offers cool air and beautiful natural scenery.
                        Bromo and Jatim Park are must-visit places. I really enjoy the city's peaceful atmosphere. </p>
                </div>
                <div class="col-lg-2 card">
                    <div class="card-head">
                        <img class="profile card-img-top" src="{{ asset('assets/image/rio.png') }}"
                            alt="Rio Dewanto">
                        <div class="card-name">
                            <h1 class="name">Rio Dewanto</h1>
                            <h2 class="profession">Actor</h2>
                        </div>
                        <img class="petik" src="{{ asset('assets/image/Tandapetik.png') }}" alt="Petik">
                    </div>
                    <p>Museum Angkut is my favorite. It has many vehicle collections and interesting photo spots.
                        Perfect for family vacations. The kids will love it!</p>
                </div>
                <div class="col-lg-2 card">
                    <div class="card-head">
                        <img class="profile card-img-top" src="{{ asset('assets/image/olivia.png') }}"
                            alt="Olivia Zalianty">
                        <div class="card-name">
                            <h1 class="name">Olivia Zalianty</h1>
                            <h2 class="profession">Actress</h2>
                        </div>
                        <img class="petik" src="{{ asset('assets/image/Tandapetik.png') }}" alt="Petik">
                    </div>
                    <p>The experience of hiking Mount Bromo was incredible.
                        The sunrise is spectacular. The local guides are very friendly and informative. A must-try!</p>
                </div>
            </div>
            <div class="title">
                <h2>LET'S EXPLOR MALANG WITH US!</h2>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="row content">
                <div class="col-lg-6 item1">
                    <h1><img src="{{ asset('assets/icon/logo_domain.png') }}" alt="Logo PM" width="100"
                            height="70">Visit Malang</h1>
                    <h6>Jl. Veteran No.1, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145, Indonesia</h6>
                </div>

                <div class="col-lg-6 item2">
                    <h1>Our Contacts</h1>
                    <div class="iconft">
                        <a href="https://wa.me/082310304998"><img src="{{ asset('assets/image/wassap.png') }}"
                                alt="wassap"></a>
                        <a href="https://www.facebook.com/visitmalang/"><img
                                src="{{ asset('assets/image/efbi.png') }}" alt="efbi"></a>
                        <a href="https://www.instagram.com/visitmalang_/"><img
                                src="{{ asset('assets/image/ige.png') }}" alt="ige"></a>
                        <a href="https://x.com/visitmalang_id?lang=en"><img
                                src="{{ asset('assets/image/tuiter.png') }}" alt="tuiter"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <p>&copy; 2023 - Visit Malang</p>
            <p>Kelompok 7</p>
        </div>
    </footer>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBogGzPztE1r1QnTA1K0GhH7tBhV4lPRp3EwKp23C0+FFI/h" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeGmKmpmeM2H6HDrmQW14knV5Ri2G5Ml+tgbHuH0XrI5L6KD1xx2ryrN10T6E1" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
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

/html>
