<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRIS App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary-color: #dc3545; /* Merah */
            --primary-dark-color: #c82333; /* Merah gelap */
            --sidebar-width: 250px;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
        }
        .sidebar {
            background-color: var(--primary-dark-color);
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            padding-top: 56px;
            overflow-y: auto;
            z-index: 1030;
            transition: transform 0.3s ease-in-out;
            transform: translateX(-100%);
        }
        .sidebar.collapsed {
            transform: translateX(-100%);
        }
        .sidebar.show {
            transform: translateX(0);
        }
        .sidebar .nav-link {
            color: #fff;
            padding: 12px 15px;
            border-left: 3px solid transparent;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 3px solid #ffc107;
        }
        .sidebar .nav-link.active {
            font-weight: bold;
        }
        .main-content {
            margin-left: 0;
            transition: margin-left .3s ease-in-out;
            padding: 20px;
        }
        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0);
                width: var(--sidebar-width);
            }
            .sidebar.collapsed {
                width: 0;
                transform: translateX(-100%);
            }
            .main-content {
                margin-left: var(--sidebar-width);
            }
            .main-content.expanded {
                margin-left: 0;
            }
        }
        .dropdown-menu {
            right: 0;
            left: auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top p-2">
        <div class="container-fluid">
            <button class="btn btn-outline-light me-3 d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <button class="btn btn-outline-light me-3 d-none d-md-block" id="sidebarToggle" type="button">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand me-auto" href="{{ route('dashboard') }}">HRIS App</a>
            
            <div class="dropdown">
                @auth
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            @auth
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 sidebar">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="bi bi-house-door"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('user.absen') ? 'active' : '' }}" href="{{ route('user.absen') }}">
                                <i class="bi bi-calendar-check"></i> Absen
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.divisions.index') ? 'active' : '' }}" href="{{ route('admin.divisions.index') }}">
                                <i class="bi bi-grid-fill"></i> Divisions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                                <i class="bi bi-people"></i> Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.attendances.index') ? 'active' : '' }}" href="{{ route('admin.attendances.index') }}">
                                <i class="bi bi-person-check"></i> Attendances
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.salaries.index') ? 'active' : '' }}" href="{{ route('admin.salaries.index') }}">
                                <i class="bi bi-currency-dollar"></i> Salaries
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                @yield('content')
            </main>
            @else
            <main class="container">
                 @yield('content')
            </main>
            @endauth
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebarMenu');
            const mainContent = document.querySelector('.main-content');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('expanded');
                });
            }
        });
    </script>
</body>
</html>