@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <!-- Rated Meals Section -->
    <div class="rated-meals-section mb-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">My Rated Meals</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Meal</th>
                                <th>Rating</th>
                                <th>Feedback</th>
                            </tr>
                        </thead>
                        <tbody id="ratedMealsTable">
                            @foreach($ratings as $date => $dayRatings)
                                @foreach($dayRatings as $rating)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($date)->format('F d, Y') }}</td>
                                        <td>{{ ucfirst($rating->meal_type) }}</td>
                                        <td>
                                            <span class="rating-stars">
                                                {{ str_repeat('★', $rating->rating) }}{{ str_repeat('☆', 5 - $rating->rating) }}
                                            </span>
                                        </td>
                                        <td class="feedback-text" title="{{ $rating->feedback }}">{{ $rating->feedback }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 text-primary">
                        <i class="bi bi-clock-history me-2"></i>Meal History / Feedback
                    </h5>
                    <div class="d-flex gap-2">
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

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="orderHistoryTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($groupedOrders) && $groupedOrders->isNotEmpty())
                                    @foreach($groupedOrders as $month => $monthOrders)
                                        <tr class="month-header">
                                            <td colspan="2" class="bg-light">
                                                <h6 class="mb-0 text-primary">{{ \Carbon\Carbon::parse($month)->format('F Y') }}</h6>
                                            </td>
                                        </tr>
                                        @foreach($monthOrders as $date => $dayOrders)
                                            <tr data-date="{{ $date }}" class="date-row">
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="date-display">{{ $date }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" 
                                                                data-menu-date="{{ $date }}"
                                                                data-orders="{{ json_encode($dayOrders) }}">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="bi bi-calendar-x fs-1 d-block mb-3"></i>
                                                No meal history available
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Details Modal -->
<div class="modal fade" id="orderDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-receipt me-2"></i>Meal Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Date: <span id="modalDate" class="fw-bold"></span></h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4" id="breakfastSection">
                        <div class="card h-100">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Breakfast</h6>
                            </div>
                            <div class="card-body">
                                <div id="breakfastMeals"></div>
                                <div class="mt-3">
                                    <div class="stars mb-2" data-meal-type="breakfast">
                                        <i class="bi bi-star-fill star" data-rating="1"></i>
                                        <i class="bi bi-star-fill star" data-rating="2"></i>
                                        <i class="bi bi-star-fill star" data-rating="3"></i>
                                        <i class="bi bi-star-fill star" data-rating="4"></i>
                                        <i class="bi bi-star-fill star" data-rating="5"></i>
                                    </div>
                                    <textarea class="form-control" id="breakfastComment" rows="2" placeholder="Add your comment..."></textarea>
                                    <div class="mt-2" id="breakfastFeedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4" id="lunchSection">
                        <div class="card h-100">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Lunch</h6>
                            </div>
                            <div class="card-body">
                                <div id="lunchMeals"></div>
                                <div class="mt-3">
                                    <div class="stars mb-2" data-meal-type="lunch">
                                        <i class="bi bi-star-fill star" data-rating="1"></i>
                                        <i class="bi bi-star-fill star" data-rating="2"></i>
                                        <i class="bi bi-star-fill star" data-rating="3"></i>
                                        <i class="bi bi-star-fill star" data-rating="4"></i>
                                        <i class="bi bi-star-fill star" data-rating="5"></i>
                                    </div>
                                    <textarea class="form-control" id="lunchComment" rows="2" placeholder="Add your comment..."></textarea>
                                    <div class="mt-2" id="lunchFeedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Dinner</h6>
                            </div>
                            <div class="card-body">
                                <div id="dinnerMeals"></div>
                                <div class="mt-3">
                                    <div class="stars mb-2" data-meal-type="dinner">
                                        <i class="bi bi-star-fill star" data-rating="1"></i>
                                        <i class="bi bi-star-fill star" data-rating="2"></i>
                                        <i class="bi bi-star-fill star" data-rating="3"></i>
                                        <i class="bi bi-star-fill star" data-rating="4"></i>
                                        <i class="bi bi-star-fill star" data-rating="5"></i>
                                    </div>
                                    <textarea class="form-control" id="dinnerComment" rows="2" placeholder="Add your comment..."></textarea>
                                    <div class="mt-2" id="dinnerFeedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveFeedback">Save Feedback</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Card Styling / Estilo sa Card */
    .card {
        border: none;
        border-radius: 0.5rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    
    .card-header {
        border-bottom: 1px solid rgba(0,0,0,.125);
        background-color: #f8f9fa;
    }
    
    /* Table Styling / Estilo sa Table */
    .table th {
        font-weight: 600;
        color: #6c757d;
    }
    
    /* Date Display Styling / Estilo sa Date Display */
    .date-display {
        font-size: 1.1rem;
        color: #2c3e50;
        font-weight: 600;
    }
    
    .day-display {
        font-size: 0.9rem;
        color: #6c757d;
        margin-top: 0.25rem;
    }
    
    .badge {
        font-weight: 500;
        padding: 0.5em 0.75em;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
    }
    
    /* Month Header Styling */
    .month-header td {
        padding: 1rem;
        background-color: #f8f9fa;
    }
    
    .month-header h6 {
        margin: 0;
        color: #4e73df;
    }
    
    /* Date Row Styling */
    .date-row td {
        padding: 0.75rem 1rem;
    }
    
    /* Pagination Styling / Estilo sa Pagination */
    .pagination {
        margin-bottom: 0;
    }
    
    .page-link {
        border: none;
        padding: 0.5rem 0.75rem;
    }
    
    .page-item.active .page-link {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    
    /* Dropdown Styling / Estilo sa Dropdown */
    .dropdown-menu {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    
    .dropdown-item:active {
        background-color: #4e73df;
    }

    /* Meal Section Styling / Estilo sa Meal Section */
    .meal-section {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
        height: 100%;
    }
    
    .meal-section h6 {
        font-weight: 600;
    }
    
    .table-sm td {
        padding: 0.5rem;
        border: none;
    }
    
    .table-sm tr:not(:last-child) td {
        border-bottom: 1px solid #dee2e6;
    }

    /* Star Rating Styling / Estilo sa Star Rating */
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

    /* Form Control Styling / Estilo sa Form Control */
    .form-control {
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }

    /* Feedback Display Styling / Estilo sa Feedback Display */
    .feedback-item {
        background: #f8f9fa;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .feedback-rating {
        color: #ffc107;
        margin-bottom: 5px;
    }

    .feedback-comment {
        font-size: 0.9rem;
        color: #666;
    }

    .edit-feedback {
        color: #0d6efd;
        cursor: pointer;
        font-size: 0.8rem;
        margin-top: 5px;
    }

    .edit-feedback:hover {
        text-decoration: underline;
    }

    .feedback-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 5px;
    }

    /* Rated Meals Section Styling */
    .rated-meals-section {
        margin-bottom: 2rem;
    }

    .rated-meals-section .card {
        border: none;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .rated-meals-section .card-header {
        background: #4e73df;
        color: white;
        border-bottom: none;
    }

    .rated-meals-section .table th {
        background: #f8f9fa;
        font-weight: 600;
    }

    .rated-meals-section .rating-stars {
        color: #ffc107;
    }

    .rated-meals-section .feedback-text {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .rated-meals-section .view-btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add star rating click functionality
        document.querySelectorAll('.stars').forEach(starsContainer => {
            const stars = starsContainer.querySelectorAll('.star');
            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-rating');
                    const mealType = starsContainer.getAttribute('data-meal-type');
                    
                    // Update stars
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

        // Modal functionality
        const orderDetailsModal = document.getElementById('orderDetailsModal');
        let currentModalDate = '';

        if (orderDetailsModal) {
            orderDetailsModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const date = button.getAttribute('data-menu-date');
                const orders = JSON.parse(button.getAttribute('data-orders'));
                currentModalDate = date;
                
                // Update modal date
                document.getElementById('modalDate').textContent = date;

                // Clear previous meal content
                ['breakfast', 'lunch', 'dinner'].forEach(mealType => {
                    document.getElementById(`${mealType}Meals`).innerHTML = '';
                });

                // Populate meals for each type
                orders.items.forEach(item => {
                    const mealType = item.menu.meal_type;
                    const mealContainer = document.getElementById(`${mealType}Meals`);
                    if (mealContainer) {
                        mealContainer.innerHTML += `
                            <div class="meal-item mb-3">
                                <h6 class="text-primary mb-2">${item.menu.name}</h6>
                                <p class="mb-0">${item.menu.description}</p>
                            </div>
                        `;
                    }
                });

                // Load existing feedback if any
                ['breakfast', 'lunch', 'dinner'].forEach(mealType => {
                    const feedback = orders.ratings?.[mealType];
                    if (feedback) {
                        const stars = document.querySelectorAll(`[data-meal-type="${mealType}"] .star`);
                        stars.forEach((star, index) => {
                            if (index < feedback.rating) {
                                star.classList.add('active');
                            }
                        });
                        document.getElementById(`${mealType}Comment`).value = feedback.comment || '';
                    }
                });
            });
        }

        // Save Feedback
        document.getElementById('saveFeedback').addEventListener('click', function() {
            const date = currentModalDate;
            const feedback = {};
            
            ['breakfast', 'lunch', 'dinner'].forEach(mealType => {
                const rating = document.querySelectorAll(`[data-meal-type="${mealType}"] .star.active`).length;
                const comment = document.getElementById(`${mealType}Comment`).value;
                if (rating > 0 || comment) {
                    feedback[mealType] = {
                        rating: rating,
                        comment: comment,
                        timestamp: new Date().toISOString()
                    };
                }
            });

            // Send feedback to server
            fetch('/student/history/rating', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    date: date,
                    feedback: feedback
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reload the page to show updated feedback
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error('Error saving feedback:', error);
            });
        });

        // Reset form when modal is closed
        orderDetailsModal.addEventListener('hidden.bs.modal', function () {
            ['breakfast', 'lunch', 'dinner'].forEach(mealType => {
                document.getElementById(`${mealType}Comment`).value = '';
                document.querySelectorAll(`[data-meal-type="${mealType}"] .star`).forEach(star => star.classList.remove('active'));
            });
        });

        // Add event listeners for filters
        document.querySelectorAll('#dateFilter + .dropdown-menu .dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const filter = this.getAttribute('data-filter');
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                document.querySelectorAll('#orderHistoryTable tbody tr').forEach(row => {
                    if (row.classList.contains('month-header')) {
                        const nextRows = [];
                        let currentRow = row.nextElementSibling;
                        while (currentRow && !currentRow.classList.contains('month-header')) {
                            nextRows.push(currentRow);
                            currentRow = currentRow.nextElementSibling;
                        }
                        
                        const hasVisibleRows = nextRows.some(r => r.style.display !== 'none');
                        row.style.display = hasVisibleRows ? '' : 'none';
                    } else if (row.classList.contains('date-row')) {
                        const rowDateString = row.getAttribute('data-date');
                        const rowDate = new Date(rowDateString);
                        rowDate.setHours(0, 0, 0, 0);

                        let showRow = false;

                        if (filter === 'all') {
                            showRow = true;
                        } else if (filter === 'today') {
                            if (rowDate.getTime() === today.getTime()) {
                                showRow = true;
                            }
                        } else if (filter === 'week') {
                            const firstDayOfWeek = new Date(today);
                            firstDayOfWeek.setDate(today.getDate() - today.getDay());
                            firstDayOfWeek.setHours(0, 0, 0, 0);

                            if (rowDate >= firstDayOfWeek && rowDate <= today) {
                                showRow = true;
                            }
                        } else if (filter === 'month') {
                            const firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
                            const lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                            lastDayOfMonth.setHours(23, 59, 59, 999);

                            if (rowDate >= firstDayOfMonth && rowDate <= lastDayOfMonth) {
                                showRow = true;
                            }
                        }

                        row.style.display = showRow ? '' : 'none';
                    }
                });
            });
        });
    });
</script>
@endpush




