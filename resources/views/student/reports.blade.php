@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-12 mb-4">
            <!-- Main Card for Reports -->
            <div class="card shadow-sm">
                <!-- Card Header -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 text-primary">
                        <i class="bi bi-file-earmark-text me-2"></i>My Reports
                    </h5>
                    <!-- Filter Buttons -->
                    <div class="d-flex gap-2">
                        <!-- Date Filter -->
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dateFilter" data-bs-toggle="dropdown">
                                <i class="bi bi-calendar me-2"></i>Date
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" data-filter="today">Today</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="week">This Week</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="month">This Month</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" data-filter="all">All Time</a></li>
                            </ul>
                        </div>
                        <!-- Meal Type Filter -->
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="mealTypeFilter" data-bs-toggle="dropdown">
                                <i class="bi bi-egg-fried me-2"></i>Meal Type
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" data-filter="breakfast">Breakfast</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="lunch">Lunch</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="dinner">Dinner</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" data-filter="all">All Meals</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <!-- Reports Table -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Meal Type</th>
                                    <th>Rating</th>
                                    <th>Feedback</th>
                                    <th>Last Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <td>{{ $report->report_date->format('F d, Y') }}</td>
                                        <td>
                                            <span class="badge bg-primary text-capitalize">{{ $report->meal_type }}</span>
                                        </td>
                                        <td>
                                            <div class="text-warning">
                                                {{ str_repeat('★', $report->rating) }}{{ str_repeat('☆', 5 - $report->rating) }}
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($report->feedback, 50) }}</td>
                                        <td>{{ $report->updated_at->format('M d, Y h:i A') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-sm btn-outline-primary" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editReportModal"
                                                        data-report-id="{{ $report->id }}"
                                                        data-rating="{{ $report->rating }}"
                                                        data-feedback="{{ $report->feedback }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" 
                                                        onclick="deleteReport({{ $report->id }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $reports->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Report Modal -->
<div class="modal fade" id="editReportModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editReportForm">
                    <input type="hidden" id="reportId">
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <div class="stars">
                            <i class="bi bi-star-fill star" data-rating="1"></i>
                            <i class="bi bi-star-fill star" data-rating="2"></i>
                            <i class="bi bi-star-fill star" data-rating="3"></i>
                            <i class="bi bi-star-fill star" data-rating="4"></i>
                            <i class="bi bi-star-fill star" data-rating="5"></i>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Feedback</label>
                        <textarea class="form-control" id="editFeedback" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateReport()">Save Changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .stars {
        font-size: 1.5rem;
        color: #ffc107;
        cursor: pointer;
    }
    
    .star {
        margin-right: 5px;
    }
    
    .star:hover,
    .star.active {
        color: #ffc107;
    }
    
    .star:not(.active) {
        color: #e4e5e9;
    }
</style>
@endpush

@push('scripts')
<script>
    // Star Rating Functionality
    document.querySelectorAll('.stars').forEach(starsContainer => {
        const stars = starsContainer.querySelectorAll('.star');
        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                stars.forEach(s => {
                    if (s.getAttribute('data-rating') <= rating) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
            });
        });
    });

    // Edit Report Modal
    const editReportModal = document.getElementById('editReportModal');
    if (editReportModal) {
        editReportModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const reportId = button.getAttribute('data-report-id');
            const rating = button.getAttribute('data-rating');
            const feedback = button.getAttribute('data-feedback');

            document.getElementById('reportId').value = reportId;
            document.getElementById('editFeedback').value = feedback;

            // Set stars
            const stars = editReportModal.querySelectorAll('.star');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        });
    }

    // Update Report
    function updateReport() {
        const reportId = document.getElementById('reportId').value;
        const rating = document.querySelectorAll('#editReportModal .star.active').length;
        const feedback = document.getElementById('editFeedback').value;

        fetch(`/student/reports/${reportId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                rating: rating,
                feedback: feedback
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }

    // Delete Report
    function deleteReport(reportId) {
        if (confirm('Are you sure you want to delete this report?')) {
            fetch(`/student/reports/${reportId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }
    }
</script>
@endpush
