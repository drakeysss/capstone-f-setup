@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-card">
                <div class="welcome-content">
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                    <p>Here's an overview of your dashboard</p>
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
</style>
@endpush

@push('scripts')
<script>
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
