<style>
    /* Kitchen Sidebar */
    .kitchen-portal {
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

    .kitchen-portal .sidebar-header {
        display: flex;
        align-items: center;
        padding: 1rem;
        border-bottom: 1px solid #dee2e6;
        background-color: #f8f9fa;
        height: 60px;
    }

    .kitchen-portal .sidebar-header .icon {
        font-size: 1.5rem;
        margin-right: 0.75rem;
        color: #22bbea;
    }

    .kitchen-portal .sidebar-title {
        margin: 0;
        font-weight: 600;
        color: #333;
        font-size: 1.1rem;
    }

    .kitchen-portal .sidebar-body {
        padding: 0.5rem;
    }

    .kitchen-portal .sidebar-category {
        font-size: 0.7rem;
        font-weight: 600;
        color: #ff9933;
        margin: 0.5rem 0;
        padding: 0 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .kitchen-portal .sidebar-nav {
        list-style: none;
        padding: 0;
        margin: 0 0 1rem 0;
    }

    .kitchen-portal .nav-item {
        margin: 0.15rem 0;
    }

    .kitchen-portal .nav-link {
        display: flex;
        align-items: center;
        padding: 0.5rem 0.75rem;
        color: #6b7280;
        text-decoration: none;
        border-radius: 0.35rem;
        transition: all 0.2s ease;
    }

    .kitchen-portal .nav-link:hover {
        background-color: #22bbea;
        color: white;
    }

    .kitchen-portal .nav-link:hover .icon {
        color: white;
    }

    .kitchen-portal .nav-link.active {
        background-color: #e6f9ff;
        color: #22bbea;
    }

    .kitchen-portal .nav-link.active .icon {
        color: #22bbea;
    }

    .kitchen-portal .nav-link .icon {
        font-size: 1rem;
        margin-right: 0.5rem;
        width: 1.25rem;
        text-align: center;
        color: #6b7280;
    }

    .kitchen-portal .nav-link .small {
        font-size: 0.85rem;
    }


</style>

<nav class="sidebar kitchen-portal">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <i class="bi bi-house-door icon"></i>
        <h6 class="sidebar-title">Kitchen Portal</h6>
    </div>

    <!-- Navigation -->
    <div class="sidebar-body">
        <div class="sidebar-category">OVERVIEW</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('kitchen.dashboard') ? 'active' : '' }}" href="{{ route('kitchen.dashboard') }}">
                    <i class="bi bi-speedometer2 icon"></i>
                    <span class="small">Dashboard</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-category">INVENTORY</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('kitchen.inventory') ? 'active' : '' }}" href="{{ route('kitchen.inventory') }}">
                    <i class="bi bi-box-seam icon"></i>
                    <span class="small">Inventory</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('kitchen.meal-planning') ? 'active' : '' }}" href="{{ route('kitchen.meal-planning') }}">
                    <i class="bi bi-calendar-check icon"></i>
                    <span class="small">Meal Planning</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-category">ANALYTICS</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('kitchen.reports') ? 'active' : '' }}" href="{{ route('kitchen.reports') }}">
                    <i class="bi bi-graph-up icon"></i>
                    <span class="small">Reports</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-category">GENERAL</div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('kitchen.alerts') ? 'active' : '' }}" href="{{ route('kitchen.alerts') }}">
                    <i class="bi bi-bell icon"></i>
                    <span class="small">Alerts</span>
                </a>
            </li>

        </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
