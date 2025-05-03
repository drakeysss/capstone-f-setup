<!-- Cook Sidebar Styles -->
<style>
.cook-portal {
    background-color: #fff;
}

.cook-portal .sidebar-header {
    background-color: #f0fff4;
}

.cook-portal .sidebar-title {
    color: #ff9933;
}

.cook-portal .nav-link:hover {
    color: #fff;
    background-color: var(--primary-color);
    transform: translateX(3px);
}

.cook-portal .nav-link.active {
    background-color: var(--primary-color);
    color: #fff;
}

.cook-portal .nav-link.active:hover {
    background-color: var(--primary-color);
    color: #fff;
}

.cook-portal .sidebar-category {
    color: #ff9933;
}
</style>

<nav class="sidebar cook-portal">
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
