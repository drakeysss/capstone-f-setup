<!-- Student Sidebar Styles -->
<style>
.student-portal {
    background-color: #fff;
}

.student-portal .sidebar-header {
    background-color: #f8f5ff;
}

.student-portal .sidebar-title {
    color: #ff9933;
}

.student-portal .nav-link:hover {
    color: #fff;
    background-color: var(--primary-color);
    transform: translateX(3px);
}

.student-portal .nav-link.active {
    background-color: var(--primary-color);
    color: #fff;
}

.student-portal .nav-link.active:hover {
    background-color: var(--primary-color);
    color: #fff;
}

.student-portal .sidebar-category {
    color: #ff9933;
}
</style>

<!-- Sidebar -->
<nav class="sidebar student-portal">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <i class="bi bi-mortarboard icon" style = "color: #ff9933;"></i>
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
                    <span class="small">Notifications</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('student.settings') ? 'active' : '' }}" href="{{ route('student.settings') }}">
                    <i class="bi bi-gear icon"></i>
                    <span class="small">Settings</span>
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
