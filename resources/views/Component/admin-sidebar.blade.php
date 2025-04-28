<!-- Sidebar -->
<nav class="sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <h6 class="sidebar-title">Admin Portal</h6>
    </div>

    <!-- Admin Profile -->
    <div class="sidebar-body">
        <div class="sidebar-category">OVERVIEW</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 icon"></i>
                    <span class="small">Dashboard</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-category">MANAGEMENT</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.suppliers') ? 'active' : '' }}" href="{{ route('admin.suppliers') }}">
                    <i class="bi bi-truck icon"></i>
                    <span class="small">Suppliers</span>
                </a>
            </li>
           
        </ul>

        <div class="sidebar-category">ANALYTICS</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}" href="{{ route('admin.reports') }}">
                    <i class="bi bi-graph-up icon"></i>
                    <span class="small">Reports</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.analytics') ? 'active' : '' }}" href="{{ route('admin.analytics') }}">
                    <i class="bi bi-bar-chart-line icon"></i>
                    <span class="small">Analytics</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-category">GENERAL</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                    <i class="bi bi-gear icon"></i>
                    <span class="small">Settings</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.notifications') ? 'active' : '' }}" href="{{ route('admin.notifications') }}">
                    <i class="bi bi-bell icon"></i>
                    <span class="small">Notifications</span>
                </a>
            </li>


<hr>

            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link logout-btn">
                        <i class="bi bi-box-arrow-right icon" style="color:red"></i>
                        <span style="color:red">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<style>
    /* Sidebar styles */
    .sidebar {
        background-color: white;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border-right: 1px solid #dee2e6;
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
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
        color: #4f46e5;
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

    .sidebar .nav-link {
        display: flex;
        align-items: center;
        padding: 0.5rem;
        color: #6b7280 !important;
        text-decoration: none;
        border-radius: 0.35rem;
        transition: 0.3s background-color, 0.3s color;
    }

    .sidebar .nav-link .icon {
        color: #6b7280 !important;
    }

    /* Hover Effect */
    .sidebar .nav-link:hover {
        background-color: #22bbea;
        color: white !important;
    }

    .sidebar .nav-link:hover .icon {
        color: white !important;
    }

    /* Active state */
    .sidebar .nav-link.active {
        background-color: #22bbea;
        font-weight: bold;
        color: white !important;
    }

    .sidebar .nav-link.active .icon {
        color: white !important;
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
        background-color: #dc3545;
        color: white !important;
    }

    .logout-btn:hover .icon {
        color: white !important;
    }

    hr {
        border-top: 1px solid #f0720b;
        margin: 0.5rem 0;
    }
</style>
