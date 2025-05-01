@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">Student Dashboard</h3>
                        <p class="mb-0 text-muted">Welcome, {{ Auth::user()->name ?? 'Student' }}!</p>
                    </div>
                    <div class="text-end">
                        <div id="currentTime" class="h4 mb-0 text-primary"></div>
                        <div id="currentDate" class="text-muted"></div>
                    </div>
                </div>
                <!-- Add more dashboard content here if needed -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    #currentTime {
        font-size: 1.5rem;
        font-weight: bold;
    }

    #currentDate {
        font-size: 1rem;
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

    // Update immediately and every second
    updateDateTime();
    setInterval(updateDateTime, 1000);
</script>
@endpush
