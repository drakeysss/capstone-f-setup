<!-- resources/views/partials/sidebar.blade.php -->

<div class="bg-dark border-right" id="sidebar-wrapper">
    <div class="user-info">
        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle" alt="User Image">
        <div class="user-name">Name:</div>
    </div>

    <div class="list-group list-group-flush">
        <!-- Main Menu -->
        <div class="sidebar-category">
            <h6 class="sidebar-subheading">Main Menu</h6>
            <a href="cookhome.php" class="list-group-item list-group-item-action">
                <i class="fas fa-home"></i>
                <span class="sidebar-text">Home</span>
            </a>
            <a href="" class="list-group-item list-group-item-action">
                <i class="fas fa-utensils"></i>
                <span class="sidebar-text">User Management</span>
            </a>
            <a href="cooksuppmanage.php" class="list-group-item list-group-item-action">
                <i class="fas fa-truck"></i>
                <span class="sidebar-text">Supplier Management</span>
            </a>
        </div>

        <!-- Alerts and Reports -->
        <div class="sidebar-category">
            <h6 class="sidebar-subheading">Alerts and Reports</h6>
            <a href="AdminNotif.blade.php" class="list-group-item list-group-item-action">
                <i class="fas fa-bell"></i>
                <span class="sidebar-text">Alerts and Notifications</span>
            </a>
            <a href="cookrepandanalytics.php" class="list-group-item list-group-item-action">
                <i class="fas fa-chart-line"></i>
                <span class="sidebar-text">Reports and Analytics</span>
            </a>
        </div>

        <!-- General Preferences -->
        <div class="sidebar-category">
            <h6 class="sidebar-subheading">General Preferences</h6>
            <a href="cooksettings.php" class="list-group-item list-group-item-action">
                <i class="fas fa-cogs"></i>
                <span class="sidebar-text">Settings</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-sign-out-alt"></i>
                <span class="sidebar-text">Logout</span>
            </a>
        </div>
    </div>
</div>
