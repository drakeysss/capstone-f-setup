<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Capstone') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --sidebar-width: 250px;
            --navbar-height: 60px;
            --primary-color: #ffa500;
            --secondary-color: rgb(113, 107, 128);
            --success-color: #10b981;
            --bg-color: rgb(250, 249, 251);
            --card-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--bg-color);
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1030;
            background-color: #ffffff; /* Changed to white */
            box-shadow: var(--card-shadow);
        }

        .sidebar-heading {
            font-size: 0.65rem;
            letter-spacing: 0.1rem;
        }

        .sidebar .nav-link {
            color: rgba(0, 0, 0, 0.7); /* Dark text for better visibility */
            transition: all 0.2s;
            border-radius: 0.35rem;
            margin: 0.2rem 0;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff; /* Text color when hovered */
            background-color: #ffa500; /* Orange hover effect */
        }

        .sidebar .nav-link:active {
            background-color: #ffa500; /* Orange color when active */
            color: white; /* Text color when active */
        }

        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            padding: 1.25rem;
        }

        .nav-link {
            color: var(--secondary-color);
            transition: all 0.2s ease-in-out;
            border-radius: 0.35rem;
            margin: 0.2rem 0;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-color);
            background-color: rgba(78, 115, 223, 0.1);
            font-weight: 600;
        }

        .navbar-brand {
            font-weight: 600;
            color: var(--primary-color);
        }

        .dropdown-menu {
            border: 1px solid #e5e7eb;
            box-shadow: var(--card-shadow);
            border-radius: 0.5rem;
            padding: 0.5rem;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            color: var(--secondary-color);
            transition: all 0.2s ease-in-out;
        }

        .dropdown-item:hover {
            background-color: #f3f4f6;
            color: var(--primary-color);
        }

        .dropdown-item:active {
            background-color: var(--primary-color);
            color: white;
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0 !important;
            }

            .offcanvas {
                width: 280px;
            }
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: var(--card-shadow);
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Table Styles */
        .table th {
            font-weight: 600;
            color: var(--secondary-color);
            border-top: none;
        }

        .table td {
            vertical-align: middle;
        }

        /* Button Styles */
        .btn {
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #e68900; /* Slightly darker orange on hover */
            border-color: #e68900; /* Darker border on hover */
        }
    </style>

    @stack('styles')
</head>
<body>
    @auth
        @if(request()->is('login') || request()->is('register'))
            @yield('content')
        @else
            <!-- Sidebar -->
            @if(Auth::user()->role == 'student')
                @include('Component.student-sidebar')
            @elseif(Auth::user()->role == 'cook')
                @include('Component.cook-sidebar')
            @else
                @include('Component.admin-sidebar')
            @endif

            <!-- Main Content -->
            <div class="main-content">
                @if(session('error'))
                    <div class="alert alert-danger mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </div>
        @endif
    @else
        <div class="auth-wrapper d-flex align-items-center justify-content-center p-4">
            <div class="auth-card p-4" style="width: 100%; max-width: 420px;">
                @yield('content')
            </div>
        </div>
    @endauth

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        // Add active class to current nav item
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });

            // Mobile sidebar toggle
            const mobileSidebar = document.getElementById('mobileSidebar');
            if (mobileSidebar) {
                const bsOffcanvas = new bootstrap.Offcanvas(mobileSidebar);
                
                document.querySelector('[data-bs-target="#mobileSidebar"]').addEventListener('click', function(e) {
                    e.preventDefault();
                    bsOffcanvas.show();
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
