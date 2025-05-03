@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-card">
                <div class="welcome-content">
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                    <p class="text-muted" style="color: white;">Here's an overview of your admin portal</p>
                </div>
                <div class="current-time">
                    <i class="bi bi-clock"></i>
                    <span id="currentDateTime"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row justify-content-center">
        <div class="col-xl-3 col-md-6 mb-4 d-flex">
            <div class="stat-card users w-100">
                <div class="stat-icon">
                    <i class="bi bi-people"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $totalUsers ?? 0 }}</h3>
                    <p>Total Users</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4 d-flex">
            <div class="stat-card students w-100">
                <div class="stat-icon">
                    <i class="bi bi-mortarboard"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $totalStudents ?? 0 }}</h3>
                    <p>Students</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4 d-flex">
            <div class="stat-card staff w-100">
                <div class="stat-icon">
                    <i class="bi bi-person-badge"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $totalStaff ?? 0 }}</h3>
                    <p>Staff Members</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4 d-flex">
            <div class="stat-card system w-100">
                <div class="stat-icon">
                    <i class="bi bi-gear"></i>
                </div>
                <div class="stat-info">
                    <h3>System</h3>
                    <p>Management</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End container-fluid -->
@endsection

@push('styles')
<style>
    .container-fluid {
        width: 100%;
        overflow-x: hidden;
        margin-left: 0;
    }

    /* Welcome Card */
    .welcome-card {
        background: linear-gradient(135deg, #22bbea 0%, #1aa8d6 100%);
        border-radius: 1rem;
        padding: 2rem;
        color: white;
        position: relative  ;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(34, 187, 234, 0.1);
    }

    .welcome-content h2 {
        margin: 0;
        font-size: 1.75rem;
        font-weight: 600;
    }

    .current-time {
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 0.9rem;
        opacity: 0.9;
    }

    /* Stat Cards */
    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        height: 100%;
    }

    .stat-icon {
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }

    .stat-icon i {
        font-size: 1.5rem;
    }

    .stat-info {
        width: 100%;
    }

    .stat-info h3 {
        margin: 0 0 0.5rem;
        font-size: 1.5rem;
        font-weight: 600;
        color: #5a5c69;
    }

    .stat-info p {
        margin: 0;
        color: #858796;
        font-size: 0.875rem;
    }

    .stat-card.users .stat-icon {
        background: rgba(34, 187, 234, 0.1);
        color: #22bbea;
    }

    .stat-card.students .stat-icon {
        background: rgba(28, 200, 138, 0.1);
        color: #1cc88a;
    }

    .stat-card.staff .stat-icon {
        background: rgba(246, 194, 62, 0.1);
        color: #f6c23e;
    }

    .stat-card.system .stat-icon {
        background: rgba(78, 115, 223, 0.1);
        color: #4e73df;
    }
</style>
@endpush

@push('scripts')
<script>
    // Real-time date and time display
    function updateDateTime() {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        document.getElementById('currentDateTime').textContent = now.toLocaleDateString('en-US', options);
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();

    // Activity filtering
    document.querySelectorAll('.dropdown-item[data-filter]').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const filter = this.dataset.filter;
            // Implement filtering logic here
        });
    });
</script>
@endpush
