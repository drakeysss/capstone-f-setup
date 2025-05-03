<!-- Admin Sidebar Styles -->
<style>
.admin-portal {
    background-color: #fff;
}

.admin-portal .sidebar-header {
    background-color: #fff8f3;
}

.admin-portal .sidebar-title {
    color: #22bbea;
}

.admin-portal .nav-link:hover {
    color: #fff;
    background-color: var(--secondary-color);
    transform: translateX(3px);
}

.admin-portal .nav-link.active {
    background-color: var(--secondary-color);
    color: #fff;
}

.admin-portal .nav-link.active:hover {
    background-color: var(--secondary-color);
    color: #fff;
}

.admin-portal .sidebar-category {
    color: #22bbea;
}
</style>

<!-- Sidebar -->
<nav class="sidebar admin-portal">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <i class="bi bi-person-circle icon" style="color: #22bbea;"></i>
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
        </ul>

        <div class="sidebar-category">GENERAL</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.notifications') ? 'active' : '' }}" href="{{ route('admin.notifications') }}">
                    <i class="bi bi-bell icon"></i>
                    <span class="small">Notifications</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                    <i class="bi bi-gear icon"></i>
                    <span class="small">Settings</span>
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
