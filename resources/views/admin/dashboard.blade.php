@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-card">
                <div class="welcome-content">
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                    <p class="text-muted" style="color: white;">Here's an overview of your dashboard</p>
                </div>
                <div class="current-time">
                    <i class="bi bi-clock"></i>
                    <span id="currentDateTime"></span>
                </div>
            </div>
        </div>
    </div>

   
@endsection

@push('styles')
<style>
    .container-fluid {
        width: 100%;
        overflow-x: hidden;
        margin-left: 0;
        padding-top: 70px;
    }

    /* Welcome Card */
    .welcome-card {
        background: #22bbea;
        color: white;
        padding: 1.5rem;
        border-radius: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }

    .welcome-content h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .current-time {
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Stat Cards */
    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stat-info h3 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .stat-info p {
        margin: 0;
        color: #6c757d;
    }

    /* Card-specific colors */
    .users .stat-icon {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .orders .stat-icon {
        background-color: #e8f5e9;
        color: #2e7d32;
    }

    .menu .stat-icon {
        background-color: #fff3e0;
        color: #f57c00;
    }

    .revenue .stat-icon {
        background-color: #f3e5f5;
        color: #7b1fa2;
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
</script>
@endpush
