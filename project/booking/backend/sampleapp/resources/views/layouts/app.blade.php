<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/page.css') }}" />
</head>

<body>
    <section class="sidebar">
        <a href="#" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="" />
        </a>


        <ul class="side__menu top">
            {{-- <li class="{{ Request::path() == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}" class="nav__link">
                    <ion-icon name="grid-outline"></ion-icon>
                    <span class="text">Dashboard</span>
                </a>
            </li> --}}

            <li class="{{ Request::is('booking_statuses*') ? 'active' : '' }}">
                <a href="{{ route('booking_statuses.index') }}" class="nav__link">
                    <ion-icon name="grid-outline"></ion-icon>
                    <span class="text">Booking Status</span>
                </a>
            </li>

            <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
                <a href="{{ route('permissions.index') }}" class="nav__link">
                    <ion-icon name="grid-outline"></ion-icon>
                    <span class="text">Permission</span>
                </a>
            </li>

            <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                <a href="{{ route('roles.index') }}" class="nav__link">
                    <ion-icon name="grid-outline"></ion-icon>
                    <span class="text">Role</span>
                </a>
            </li>

            <li class="{{ Request::is('user_statuses*') ? 'active' : '' }}">
                <a href="{{ route('user_statuses.index') }}" class="nav__link">
                    <ion-icon name="grid-outline"></ion-icon>
                    <span class="text">Account status</span>
                </a>
            </li>

            <li class="{{ Request::is('departments*') ? 'active' : '' }}">
                <a href="{{ route('departments.index') }}" class="nav__link">
                    <ion-icon name="grid-outline"></ion-icon>
                    <span class="text">Departments</span>
                </a>
            </li>

            <li class="{{ Request::is('room_types*') ? 'active' : '' }}">
                <a href="{{ route('room_types.index') }}" class="nav__link">
                    <ion-icon name="grid-outline"></ion-icon>
                    <span class="text">Room Type</span>
                </a>
            </li>

            <li class="{{ Request::is('hotels*') ? 'active' : '' }}">
                <a href="{{ route('hotels.index') }}" class="nav__link">
                    <ion-icon name="grid-outline"></ion-icon>
                    <span class="text">Hotel</span>
                </a>
            </li>
        </ul>

        <ul class="side__menu">
            <li>
                <a href="#">
                    <ion-icon name="settings-outline"></ion-icon>
                    <span class="text">Settings</span>
                </a>
            </li>

            <li>
                <a href="#" class="logout">
                    <ion-icon name="log-out-outline"></ion-icon>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <section class="content">
        <nav>
            <a href="#" class="nav__link">Categories</a>

            <form action="#">
                <div class="form__input">
                    <input type="search" placeholder="search..." name="" id="" />
                    <button class="search-button">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </div>
            </form>

            <a href="#" class="notification" id="notificationButton">
                <ion-icon name="notifications-outline"></ion-icon>
                <span class="num" id="notificationCount">2</span>
                <div class="notification-popup" id="notificationPopup">
                    <!-- Nội dung của popup nếu có -->
                    <div class="content">
                        <img src="./ava-02.jpg" alt="" />
                        <h3>Son</h3>
                        <p>Đã đặt phòng</p>
                    </div>
                </div>
            </a>

            <!-- <button type="submit" id="addNotification">add</button> -->

            <a href="#" class="profile">
                <img src="./ava-02.jpg" alt="" />
            </a>
        </nav>

        <main>
            @yield('content')
        </main>
    </section>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/table.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
