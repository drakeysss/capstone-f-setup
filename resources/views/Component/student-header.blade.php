<!-- Student Header -->
<header class="student-header">
    <div class="header-left">
        <img src="https://cdn.jobs.makesense.org/projects/243/project/1644249853968kzcvwr2o.png" 
             alt="PN Logo" class="header-logo">
    </div>
    <div class="header-right">
        <div class="header-profile">
            <div class="profile-dropdown">
                <button class="profile-button" onclick="toggleProfileMenu()">
                    <div class="profile-info">
                        <span class="profile-name">{{ Auth::user()->name }}</span>
                        <span class="profile-role">Student</span>
                    </div>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="profile-menu" id="profileMenu">
                    <a href="{{ route('student.settings') }}" class="menu-item">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="menu-item">
                        @csrf
                        <button type="submit" class="logout-button">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
.student-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 2rem;
    background-color: #fff;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
    height: 70px;
    border-bottom: 1px solid #e3e6f0;
}

.header-logo {
    height: 40px;
    width: auto;
}

.header-right {
    display: flex;
    align-items: center;
}

.profile-dropdown {
    position: relative;
}

.profile-button {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.5rem 1rem;
    border: none;
    background: none;
    cursor: pointer;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.profile-button:hover {
    background-color: #f8f9fa;
}

.profile-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.profile-name {
    font-weight: 600;
    color: #333;
    font-size: 0.9rem;
}

.profile-role {
    color: #6c757d;
    font-size: 0.8rem;
}

.profile-menu {
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #fff;
    border-radius: 0.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 0.5rem;
    min-width: 200px;
    display: none;
    z-index: 1000;
}

.profile-menu.show {
    display: block;
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    color: #333;
    text-decoration: none;
    border-radius: 0.35rem;
    transition: all 0.2s ease;
}

.menu-item:hover {
    background-color: #f8f9fa;
}

.menu-item i {
    font-size: 1.1rem;
    color: #6c757d;
}

.logout-button {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    width: 100%;
    padding: 0.75rem 1rem;
    border: none;
    background: none;
    color: #dc3545;
    cursor: pointer;
    border-radius: 0.35rem;
    transition: all 0.2s ease;
}

.logout-button:hover {
    background-color: #dc3545;
    color: #fff;
}

.logout-button:hover i {
    color: #fff;
}
</style>

<script>
function toggleProfileMenu() {
    const menu = document.getElementById('profileMenu');
    menu.classList.toggle('show');
}

// Close the menu when clicking outside
document.addEventListener('click', function(event) {
    const menu = document.getElementById('profileMenu');
    const button = document.querySelector('.profile-button');
    if (!button.contains(event.target) && !menu.contains(event.target)) {
        menu.classList.remove('show');
    }
});
</script> 