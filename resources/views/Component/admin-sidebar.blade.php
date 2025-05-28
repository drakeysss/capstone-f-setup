<!-- Admin Sidebar -->
<style>
    .admin-portal {
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-right: 1px solid #dee2e6;
        height: calc(100vh - 70px);
        width: 250px;
        position: fixed;
        top: 70px;
        left: 0;
        z-index: 1020;
        overflow-y: auto;
    }

    .admin-portal .sidebar-header {
        display: flex;
        align-items: center;
        padding: 1rem;
        border-bottom: 1px solid #dee2e6;
        background-color: #f8f9fa;
        height: 60px;
    }

    .admin-portal .sidebar-header .icon {
        font-size: 1.5rem;
        margin: 1rem;
        color: #22bbea;
    }

    .admin-portal .sidebar-title {
        margin: 0.5rem;
        font-weight: 600;
        color: #22bbea;
        font-size: 1.1rem;
    }

    .admin-portal .sidebar-body {
        padding: 0.5rem;
    }

    .admin-portal .sidebar-category {
        font-size: 0.7rem;
        font-weight: 600;
        color: #ff9933;
        margin: 0.5rem 0;
        padding: 0 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .admin-portal .sidebar-nav {
        list-style: none;
        padding: 0;
        margin: 0 0 1rem 0;
    }

    .admin-portal .nav-item {
        margin: 0.15rem 0;
    }

    .admin-portal .nav-link {
        display: flex;
        align-items: center;
        padding: 0.5rem 0.75rem;
        color: #6b7280;
        text-decoration: none;
        border-radius: 0.35rem;
        transition: all 0.2s ease;
    }

    .admin-portal .nav-link:hover {
        background-color: #22bbea;
        color: white;
    }

    .admin-portal .nav-link:hover .icon {
        color: white;
    }

    .admin-portal .nav-link.active {
        background-color: #e6f9ff;
        color: #22bbea;
    }

    .admin-portal .nav-link.active .icon {
        color: #22bbea;
    }

    .admin-portal .nav-link .icon {
        font-size: 1rem;
        margin-right: 0.5rem;
        width: 1.25rem;
        text-align: center;
        color: #6b7280;
    }

    .admin-portal .nav-link .small {
        font-size: 0.85rem;
    }
</style>

<nav class="sidebar admin-portal">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <i class="bi bi-shield-lock icon"></i>
        <h6 class="sidebar-title">Admin Portal</h6>
    </div>

    <!-- Navigation -->
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
                    <span class="small">Reports and History</span>
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
        </ul>
    </div>
</nav>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
