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
        color: #4f46e5;
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
        border-top: 1px solidrgb(12, 12, 12);
        margin: 0.5rem 0;
    }
</style>

<nav class="sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <i class="bi bi-person-circle icon" style="color: #ff9933;"></i>
        <h6 class="sidebar-title">Cook Dashboard</h6>
    </div>

    <!-- Navigation -->
    <div class="sidebar-body">
        <div class="sidebar-category">OVERVIEW</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('cook.dashboard') ? 'active' : '' }}" href="{{ route('cook.dashboard') }}">
                    <i class="bi bi-speedometer2 icon"></i>
                    <span class="small">Dashboard</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-category">MANAGEMENT</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('cook.orders') ? 'active' : '' }}" href="{{ route('cook.orders') }}">
                    <i class="bi bi-cart icon"></i>
                    <span class="small">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('cook.menu') ? 'active' : '' }}" href="{{ route('cook.menu') }}">
                    <i class="bi bi-journal-text icon"></i>
                    <span class="small">Menu Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('cook.inventory') ? 'active' : '' }}" href="{{ route('cook.inventory') }}">
                    <i class="bi bi-box icon"></i>
                    <span class="small">Stock Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('cook.suppliers.index') ? 'active' : '' }}" href="{{ route('cook.suppliers.index') }}">
                    <i class="bi bi-truck icon"></i>
                    <span class="small">Suppliers</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-category">ANALYTICS</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('cook.reports') ? 'active' : '' }}" href="{{ route('cook.reports') }}">
                    <i class="bi bi-graph-up icon"></i>
                    <span class="small">Reports</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-category">GENERAL</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('cook.settings') ? 'active' : '' }}" href="{{ route('cook.settings') }}">
                    <i class="bi bi-gear icon"></i>
                    <span class = "small">Settings</span>
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link logout-btn">
                        <i class="bi bi-box-arrow-right icon"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
