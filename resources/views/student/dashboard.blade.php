@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="dashboard">
    <div class="dashboard-header">
        <div class="welcome">
            <h2>Student Dashboard</h2>
            <p>Welcome, {{ Auth::user()->name ?? 'Student' }}!</p>
        </div>
        <div class="datetime">
            <div id="currentTime" class="time"></div>
            <div id="currentDate" class="date"></div>
        </div>
    </div>
    <!-- Add more dashboard content here if needed -->
</div>
@endsection

@push('styles')
<style>
.dashboard {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.dashboard-header {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.welcome h2 {
    margin: 0;
    color: #333;
    font-size: 24px;
}

.welcome p {
    margin: 5px 0 0;
    color: #666;
}

.datetime {
    text-align: right;
}

.time {
    font-size: 24px;
    font-weight: bold;
    color: #2c3e50;
}

.date {
    color: #666;
    margin-top: 5px;
}
</style>
@endpush

@push('scripts')
<script>
function updateDateTime() {
    const now = new Date();
    
    // Update time
    const timeOptions = {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: true
    };
    document.getElementById('currentTime').textContent = now.toLocaleTimeString('en-US', timeOptions);
    
    // Update date
    const dateOptions = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    document.getElementById('currentDate').textContent = now.toLocaleDateString('en-US', dateOptions);
}

updateDateTime();
setInterval(updateDateTime, 1000);
</script>
@endpush
