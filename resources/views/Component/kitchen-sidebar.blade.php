<style>
    .sidebar {
        width: var(--sidebar-width);
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1030;
        background-color: #ffffff;
        box-shadow: var(--card-shadow);
        display: flex;
        flex-direction: column;
    }

    .sidebar-header {
        display: flex;
        align-items: center;
        padding: 1rem 1rem;
        gap: 0.75rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .sidebar-title {
        margin: 0;
        font-weight: 600;
        color: var(--secondary-color);
        font-size: 0.95rem;
    }

    .sidebar-body {
        flex-grow: 1;
        padding: 0.6rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .sidebar-category {
        font-size: 0.65rem;
        font-weight: 600;
        color: var(--secondary-color);
        text-transform: uppercase;
        letter-spacing: 0.1rem;
        margin: 0.6rem 0 0.25rem 0.5rem;
    }

    .sidebar-nav {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0.35rem;
    }

    .nav-item {
        margin: 0.1rem 0;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 0.45rem 0.75rem;
        color: rgba(0, 0, 0, 0.7);
        text-decoration: none;
        border-radius: 0.4rem;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.2s;
    }

    .nav-link:hover {
        color: #fff;
        background-color: var(--primary-color);
        transform: translateX(3px);
    }

    .nav-link.active {
        background-color: var(--primary-color);
        color: #fff;
    }

    .nav-link.active:hover {
        background-color: var(--primary-color);
        color: #fff;
    }

    .icon {
        font-size: 1rem;
        margin-right: 0.6rem;
        width: 1.2rem;
        text-align: center;
    }

    .logout-btn {
        width: 100%;
        text-align: left;
        background: none;
        border: none;
        padding: 0.45rem 0.75rem;
        font-size: 0.85rem;
        font-weight: 500;
        color: #dc3545;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        border-radius: 0.4rem;
        margin-top: 0.1rem;
    }

    .logout-btn:hover {
        background-color: rgba(220, 53, 69, 0.1);
        color: #dc3545;
    }
</style>

<nav class="sidebar">
    <div class="sidebar-header">
        <i class="bi bi-person-circle icon" style="color: var(--secondary-color);"></i>
        <h6 class="sidebar-title">Kitchen Dashboard</h6>
    </div>

    <div class="sidebar-body">
        <div>
            <div class="sidebar-category">Overview</div>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kitchen.dashboard') ? 'active' : '' }}" href="{{ route('kitchen.dashboard') }}">
                        <i class="bi bi-speedometer2 icon"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
               
            </ul>

            <div class="sidebar-category">Meal Planning</div>
            <ul class="sidebar-nav">
              
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kitchen.meal-planning') ? 'active' : '' }}" href="{{ route('kitchen.meal-planning') }}">
                        <i class="bi bi-calendar-check icon"></i>
                        <span>Weekly Meal Schedule</span>
                    </a>
                </li>
            <div class ="sidebar-category">Analytics</div>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kitchen.reports') ? 'active' : '' }}" href="{{ route('kitchen.reports') }}">
                        <i class="bi bi-graph-up icon"></i>
                        <span>Reports</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-category">Inventory</div>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kitchen.inventory') ? 'active' : '' }}" href="{{ route('kitchen.inventory') }}">
                        <i class="bi bi-box icon"></i>
                        <span>Stock</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-category">General</div>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kitchen.alerts') ? 'active' : '' }}" href="{{ route('kitchen.alerts') }}">
                        <i class="bi bi-bell icon"></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kitchen.settings') ? 'active' : '' }}" href="{{ route('kitchen.settings') }}">
                        <i class="bi bi-gear icon"></i>
                        <span>Settings</span>
                    </a>
                </li>

                <hr>    

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="bi bi-box-arrow-right icon"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
