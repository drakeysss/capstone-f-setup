<style>
    .sidebar {
        background-color: white;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border-right: 1px solid #dee2e6;
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        overflow-y: auto;
        transition: 0.3s;
    }

    .sidebar.show {
        left: 0;
    }

    .sidebar-header {
        display: flex;
        align-items: center;
        padding: 2rem;
        border-bottom: 1px solid #dee2e6;
    }

    .sidebar-title {
        margin: 0;
        font-weight: 600;
        color: #22bbea;
    }

    .sidebar-body {
        padding: 1rem;
    }

    .sidebar-category {
        font-size: 0.7rem;
        color: #6c757d;
        font-weight: bold;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
    }

    .sidebar-nav {
        list-style: none;
        padding-left: 0;
        margin-bottom: 1rem;
    }

    .nav-item {
        margin-bottom: 0.3rem;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 0.5rem;
        color: #6b7280;
        text-decoration: none;
        border-radius: 0.35rem;
        transition: 0.2s;
    }

    .nav-link:hover {
        background-color: rgba(78, 115, 223, 0.1);
        color: #ffa500;
    }

    .nav-link.active {
        background-color: rgba(78, 115, 223, 0.1);
        font-weight: bold;
        color: #ffa500;
    }

    .icon {
        margin-right: 0.5rem;
        font-size: 1rem;
    }

    .logout-btn {
        color: #dc3545;
        background: transparent;
        border: none;
        width: 100%;
        text-align: left;
        padding: 0.5rem;
        border-radius: 0.35rem;
    }

    .logout-btn:hover {
        background-color: rgba(220, 53, 69, 0.1);
    }

    hr {
        border-top: 1px solidrgb(7, 7, 7);
        margin: 0.5rem 0;
    }

    @media (max-width: 768px) {
        .sidebar {
            left: -260px;
            position: fixed;
            z-index: 1030;
        }
    }
</style>

<nav class="sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <i class="bi bi-mortarboard icon" style ="color: #ffa500"></i>
        <h6 class="sidebar-title">Student Portal</h6>
    </div>

    <!-- Navigation -->
    <div class="sidebar-body">
        <div class="sidebar-category">OVERVIEW</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }}" href="{{ route('student.dashboard') }}">
                    <i class="bi bi-speedometer2 icon"></i>
                    <span class="small">Dashboard</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-category">FOOD & ORDERS</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('student.menu') ? 'active' : '' }}" href="{{ route('student.menu') }}">
                    <i class="bi bi-journal-text icon"></i>
                    <span class="small">Daily/Weekly Menu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('student.history') ? 'active' : '' }}" href="{{ route('student.history') }}">
                    <i class="bi bi-clock-history icon"></i>
                    <span class="small">Meal History</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-category">ANALYTICS</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('student.reports') ? 'active' : '' }}" href="{{ route('student.reports') }}">
                    <i class="bi bi-graph-up icon"></i>
                    <span class="small">Reports</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-category">GENERAL</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('student.notifications') ? 'active' : '' }}" href="{{ route('student.notifications') }}">
                    <i class="bi bi-bell icon"></i>
                    <span class= "small">Notifications</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('student.settings') ? 'active' : '' }}" href="{{ route('student.settings') }}">
                    <i class="bi bi-gear icon"></i>
                    <span class ="small">Settings</span>
                </a>
            </li>
        </ul>

        <hr>

        <!-- Profile & Logout -->
        <div class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link logout-btn">
                    <i class="bi bi-box-arrow-right icon"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.sidebar');
        const sidebarToggleMobile = document.getElementById('sidebarToggleMobile');

        if (sidebarToggleMobile) {
            sidebarToggleMobile.addEventListener('click', function(e) {
                e.preventDefault();
                sidebar.classList.toggle('show');
            });
        }

        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(e.target) && !sidebarToggleMobile.contains(e.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    });
</script>
@endpush
