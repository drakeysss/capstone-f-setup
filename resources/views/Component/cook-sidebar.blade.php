<!-- Cook Sidebar Styles -->
<style>
.cook-portal {
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

.cook-portal .sidebar-header {
    display: flex;
    align-items: center;
    padding: 1rem;
    border-bottom: 1px solid #dee2e6;
    background-color: #f8f9fa;
    height: 60px;
}

.cook-portal .sidebar-header .icon {
    font-size: 1.5rem;
    margin-right: 0.75rem;
    color: #22bbea;
}

.cook-portal .sidebar-title {
    margin: 0;
    font-weight: 600;
    color: #333;
    font-size: 1.1rem;
}

.cook-portal .sidebar-body {
    padding: 0.5rem;
}

.cook-portal .sidebar-category {
    font-size: 0.7rem;
    font-weight: 600;
    color: #ff9933;
    margin: 0.5rem 0;
    padding: 0 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.cook-portal .sidebar-nav {
    list-style: none;
    padding: 0;
    margin: 0 0 1rem 0;
}

.cook-portal .nav-item {
    margin: 0.15rem 0;
}

.cook-portal .nav-link {
    display: flex;
    align-items: center;
    padding: 0.5rem 0.75rem;
    color: #6b7280;
    text-decoration: none;
    border-radius: 0.35rem;
    transition: all 0.2s ease;
}

.cook-portal .nav-link:hover {
    background-color: #22bbea;
    color: white;
}

.cook-portal .nav-link:hover .icon {
    color: white;
}

.cook-portal .nav-link.active {
    background-color: #e6f9ff;
    color: #22bbea;
}

.cook-portal .nav-link.active .icon {
    color: #22bbea;
}

.cook-portal .nav-link .icon {
    font-size: 1rem;
    margin-right: 0.5rem;
    width: 1.25rem;
    text-align: center;
    color: #6b7280;
}

.cook-portal .nav-link .small {
    font-size: 0.85rem;
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
                    <span class="small">Weekly Menu and Ingredients</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('cook.purchase-orders.*') ? 'active' : '' }}" href="{{ route('cook.purchase-orders.index') }}">
                    <i class="bi bi-cart-check icon"></i>
                    <span class="small">Purchase Orders</span>
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
<<<<<<< HEAD
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link logout-btn">
                        <i class="bi bi-box-arrow-right icon"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
=======

>>>>>>> 7785673495fd1832d95b196c98c2322b839308d8
        </ul>
    </div>
</nav>
