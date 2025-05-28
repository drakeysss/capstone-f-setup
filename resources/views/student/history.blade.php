@php
    use Illuminate\Support\Collection;
    
    // Dummy data for testing - matching menu items for a full month
    $dummyDates = [
        // Week 1
        '2024-03-25' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Tapsilog', 'description' => 'Tapa, Sinangag, at Itlog'],
            (object)['meal_type' => 'lunch', 'name' => 'Chicken Adobo', 'description' => 'Classic Filipino Adobo with Rice'],
            (object)['meal_type' => 'dinner', 'name' => 'Pork Steak', 'description' => 'Pork Steak with Onions and Mushrooms']
        ]),
        '2024-03-26' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Champorado', 'description' => 'Chocolate Rice Porridge with Tuyo'],
            (object)['meal_type' => 'lunch', 'name' => 'Sinigang na Baboy', 'description' => 'Pork Sinigang with Vegetables'],
            (object)['meal_type' => 'dinner', 'name' => 'Bangus Sisig', 'description' => 'Crispy Bangus Sisig with Egg']
        ]),
        '2024-03-27' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Pandesal', 'description' => 'Freshly Baked Pandesal with Kesong Puti'],
            (object)['meal_type' => 'lunch', 'name' => 'Menudo', 'description' => 'Pork Menudo with Potatoes and Carrots'],
            (object)['meal_type' => 'dinner', 'name' => 'Chicken BBQ', 'description' => 'Grilled Chicken with Special Sauce']
        ]),
        '2024-03-28' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Arroz Caldo', 'description' => 'Chicken Rice Porridge with Egg'],
            (object)['meal_type' => 'lunch', 'name' => 'Tinola', 'description' => 'Chicken Tinola with Ginger and Sayote'],
            (object)['meal_type' => 'dinner', 'name' => 'Beef Bulalo', 'description' => 'Beef Shank Soup with Vegetables']
        ]),
        '2024-03-29' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Tocilog', 'description' => 'Tocino, Sinangag, at Itlog'],
            (object)['meal_type' => 'lunch', 'name' => 'Beef Caldereta', 'description' => 'Beef Stew with Potatoes and Bell Peppers'],
            (object)['meal_type' => 'dinner', 'name' => 'Grilled Tilapia', 'description' => 'Grilled Tilapia with Mango Salsa']
        ]),
        '2024-03-30' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Longsilog', 'description' => 'Longganisa, Sinangag, at Itlog'],
            (object)['meal_type' => 'lunch', 'name' => 'Kare-Kare', 'description' => 'Oxtail and Vegetables in Peanut Sauce'],
            (object)['meal_type' => 'dinner', 'name' => 'Crispy Pata', 'description' => 'Crispy Pork Knuckle with Special Sauce']
        ]),
        '2024-03-31' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Special Breakfast', 'description' => 'Assorted Filipino Breakfast Platter'],
            (object)['meal_type' => 'lunch', 'name' => 'Special Lunch', 'description' => 'Lechon Kawali with Rice and Vegetables'],
            (object)['meal_type' => 'dinner', 'name' => 'Special Dinner', 'description' => 'Bistek Tagalog with Rice and Vegetables']
        ]),

        // Week 2
        '2024-04-01' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Tapsilog', 'description' => 'Tapa, Sinangag, at Itlog'],
            (object)['meal_type' => 'lunch', 'name' => 'Chicken Adobo', 'description' => 'Classic Filipino Adobo with Rice'],
            (object)['meal_type' => 'dinner', 'name' => 'Pork Steak', 'description' => 'Pork Steak with Onions and Mushrooms']
        ]),
        '2024-04-02' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Champorado', 'description' => 'Chocolate Rice Porridge with Tuyo'],
            (object)['meal_type' => 'lunch', 'name' => 'Sinigang na Baboy', 'description' => 'Pork Sinigang with Vegetables'],
            (object)['meal_type' => 'dinner', 'name' => 'Bangus Sisig', 'description' => 'Crispy Bangus Sisig with Egg']
        ]),
        '2024-04-03' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Pandesal', 'description' => 'Freshly Baked Pandesal with Kesong Puti'],
            (object)['meal_type' => 'lunch', 'name' => 'Menudo', 'description' => 'Pork Menudo with Potatoes and Carrots'],
            (object)['meal_type' => 'dinner', 'name' => 'Chicken BBQ', 'description' => 'Grilled Chicken with Special Sauce']
        ]),
        '2024-04-04' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Arroz Caldo', 'description' => 'Chicken Rice Porridge with Egg'],
            (object)['meal_type' => 'lunch', 'name' => 'Tinola', 'description' => 'Chicken Tinola with Ginger and Sayote'],
            (object)['meal_type' => 'dinner', 'name' => 'Beef Bulalo', 'description' => 'Beef Shank Soup with Vegetables']
        ]),
        '2024-04-05' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Tocilog', 'description' => 'Tocino, Sinangag, at Itlog'],
            (object)['meal_type' => 'lunch', 'name' => 'Beef Caldereta', 'description' => 'Beef Stew with Potatoes and Bell Peppers'],
            (object)['meal_type' => 'dinner', 'name' => 'Grilled Tilapia', 'description' => 'Grilled Tilapia with Mango Salsa']
        ]),
        '2024-04-06' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Longsilog', 'description' => 'Longganisa, Sinangag, at Itlog'],
            (object)['meal_type' => 'lunch', 'name' => 'Kare-Kare', 'description' => 'Oxtail and Vegetables in Peanut Sauce'],
            (object)['meal_type' => 'dinner', 'name' => 'Crispy Pata', 'description' => 'Crispy Pork Knuckle with Special Sauce']
        ]),
        '2024-04-07' => collect([
            (object)['meal_type' => 'breakfast', 'name' => 'Special Breakfast', 'description' => 'Assorted Filipino Breakfast Platter'],
            (object)['meal_type' => 'lunch', 'name' => 'Special Lunch', 'description' => 'Lechon Kawali with Rice and Vegetables'],
            (object)['meal_type' => 'dinner', 'name' => 'Special Dinner', 'description' => 'Bistek Tagalog with Rice and Vegetables']
        ])
    ];

    // Dummy ratings data for sample days
    $ratings = [
        '2024-03-25' => collect([
            (object)['meal_type' => 'breakfast', 'rating' => 4, 'feedback' => 'Tapsilog was delicious! Perfect combination of flavors.', 'updated_at' => now()],
            (object)['meal_type' => 'lunch', 'rating' => 5, 'feedback' => 'Best adobo ever! The meat was tender and flavorful.', 'updated_at' => now()],
            (object)['meal_type' => 'dinner', 'rating' => 3, 'feedback' => 'Pork steak was a bit tough but the sauce was good.', 'updated_at' => now()]
        ]),
        '2024-03-26' => collect([
            (object)['meal_type' => 'breakfast', 'rating' => 5, 'feedback' => 'Perfect champorado! The tuyo was crispy and salty.', 'updated_at' => now()],
            (object)['meal_type' => 'lunch', 'rating' => 4, 'feedback' => 'Sinigang was sour and savory, just right!', 'updated_at' => now()],
            (object)['meal_type' => 'dinner', 'rating' => 5, 'feedback' => 'Bangus sisig was amazing! So crispy and flavorful.', 'updated_at' => now()]
        ]),
        '2024-03-27' => collect([
            (object)['meal_type' => 'breakfast', 'rating' => 4, 'feedback' => 'Fresh pandesal with kesong puti was perfect!', 'updated_at' => now()],
            (object)['meal_type' => 'lunch', 'rating' => 4, 'feedback' => 'Menudo was well-cooked and tasty.', 'updated_at' => now()],
            (object)['meal_type' => 'dinner', 'rating' => 5, 'feedback' => 'Chicken BBQ was juicy and the sauce was perfect!', 'updated_at' => now()]
        ])
    ];
@endphp
@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-12 mb-4">
            <!-- Main Card for Meal History / Pangunang Card sa Meal History -->
            <div class="card shadow-sm">
                <!-- Card Header with Title and Filters / Header sa Card nga naay Title ug Filters -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <!-- Title Section / Seksyon sa Title -->
                    <h5 class="mb-0 text-primary">
                        <i class="bi bi-clock-history me-2"></i>Meal History / Feedback
                    </h5>
                    <!-- Filter Buttons Section / Seksyon sa Filter Buttons -->
                    <div class="d-flex gap-2">
                        <!-- Date Filter Dropdown / Dropdown para sa Date Filter -->
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
                        <!-- Meal Type Filter Dropdown / Dropdown para sa Meal Type Filter -->
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

                <!-- Card Body with Table / Lawas sa Card nga naay Table -->
                <div class="card-body">
                    <!-- Meal History Table / Table sa Meal History -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="orderHistoryTable">
                            <!-- Table Header / Header sa Table -->
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <!-- Table Body with Sample Data / Lawas sa Table nga naay Sample Data -->
                            <tbody>
                                @foreach($dummyDates as $date => $dayMenus)
                                    <tr data-date="{{ $date }}">
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="date-display">{{ \Carbon\Carbon::parse($date)->format('F d, Y') }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" 
                                                        data-menu-date="{{ $date }}"
                                                        data-breakfast-name="{{ $dayMenus->where('meal_type', 'breakfast')->first()?->name }}"
                                                        data-breakfast-description="{{ $dayMenus->where('meal_type', 'breakfast')->first()?->description }}"
                                                        data-lunch-name="{{ $dayMenus->where('meal_type', 'lunch')->first()?->name }}"
                                                        data-lunch-description="{{ $dayMenus->where('meal_type', 'lunch')->first()?->description }}"
                                                        data-dinner-name="{{ $dayMenus->where('meal_type', 'dinner')->first()?->name }}"
                                                        data-dinner-description="{{ $dayMenus->where('meal_type', 'dinner')->first()?->description }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Details Modal / Modal sa Order Details -->
<div class="modal fade" id="orderDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header / Header sa Modal -->
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-receipt me-2"></i>Meal Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal Body / Lawas sa Modal -->
            <div class="modal-body">
                <!-- Date Information Section / Seksyon sa Date Information -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Date: <span id="modalDate" class="fw-bold"></span></h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Meal Types Section / Seksyon sa Meal Types -->
                <div class="row">
                    <!-- Breakfast / Pamahaw -->
                    <div class="col-md-4" id="breakfastSection">
                        <div class="card h-100">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Breakfast</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-primary mb-3" id="modalBreakfastName"></h6>
                                <p id="modalBreakfastDescription"></p>
                                <div class="mt-3">
                                    <!-- Star Rating / Rating sa Bitoon -->
                                    <div class="stars mb-2" data-meal-type="breakfast">
                                        <i class="bi bi-star-fill star" data-rating="1"></i>
                                        <i class="bi bi-star-fill star" data-rating="2"></i>
                                        <i class="bi bi-star-fill star" data-rating="3"></i>
                                        <i class="bi bi-star-fill star" data-rating="4"></i>
                                        <i class="bi bi-star-fill star" data-rating="5"></i>
                                    </div>
                                    <!-- Comment Box / Kahon sa Comment -->
                                    <textarea class="form-control" id="breakfastComment" rows="2" placeholder="Add your comment..."></textarea>
                                    <!-- Feedback Display / Display sa Feedback -->
                                    <div class="mt-2" id="breakfastFeedback">
                                        @php
                                            $dateRatings = $ratings[$date] ?? collect();
                                            $feedback = $dateRatings->where('meal_type', 'breakfast')->first();
                                        @endphp
                                        @if($feedback)
                                        <div class="feedback-item">
                                            <div class="feedback-rating">
                                                {{ str_repeat('★', $feedback->rating) }}{{ str_repeat('☆', 5 - $feedback->rating) }}
                                            </div>
                                            <div class="feedback-comment">{{ $feedback->feedback }}</div>
                                            <div class="feedback-actions">
                                                <span class="text-muted small">Last updated: {{ $feedback->updated_at->format('M d, Y h:i A') }}</span>
                                                <button class="btn btn-link btn-sm edit-feedback" data-report-id="{{ $feedback->id }}" data-meal-type="{{ $feedback->meal_type }}">Edit</button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lunch / Paniudto -->
                    <div class="col-md-4" id="lunchSection">
                        <div class="card h-100">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Lunch</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-primary mb-3" id="modalLunchName"></h6>
                                <p id="modalLunchDescription"></p>
                                <div class="mt-3">
                                    <!-- Star Rating / Rating sa Bitoon -->
                                    <div class="stars mb-2" data-meal-type="lunch">
                                        <i class="bi bi-star-fill star" data-rating="1"></i>
                                        <i class="bi bi-star-fill star" data-rating="2"></i>
                                        <i class="bi bi-star-fill star" data-rating="3"></i>
                                        <i class="bi bi-star-fill star" data-rating="4"></i>
                                        <i class="bi bi-star-fill star" data-rating="5"></i>
                                    </div>
                                    <!-- Comment Box / Kahon sa Comment -->
                                    <textarea class="form-control" id="lunchComment" rows="2" placeholder="Add your comment..."></textarea>
                                    <!-- Feedback Display / Display sa Feedback -->
                                    <div class="mt-2" id="lunchFeedback">
                                        @php
                                            $dateRatings = $ratings[$date] ?? collect();
                                            $feedback = $dateRatings->where('meal_type', 'lunch')->first();
                                        @endphp
                                        @if($feedback)
                                        <div class="feedback-item">
                                            <div class="feedback-rating">
                                                {{ str_repeat('★', $feedback->rating) }}{{ str_repeat('☆', 5 - $feedback->rating) }}
                                            </div>
                                            <div class="feedback-comment">{{ $feedback->feedback }}</div>
                                            <div class="feedback-actions">
                                                <span class="text-muted small">Last updated: {{ $feedback->updated_at->format('M d, Y h:i A') }}</span>
                                                <button class="btn btn-link btn-sm edit-feedback" data-report-id="{{ $feedback->id }}" data-meal-type="{{ $feedback->meal_type }}">Edit</button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dinner / Panihapon -->
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Dinner</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-primary mb-3" id="modalDinnerName"></h6>
                                <p id="modalDinnerDescription"></p>
                                <div class="mt-3">
                                    <!-- Star Rating / Rating sa Bitoon -->
                                    <div class="stars mb-2" data-meal-type="dinner">
                                        <i class="bi bi-star-fill star" data-rating="1"></i>
                                        <i class="bi bi-star-fill star" data-rating="2"></i>
                                        <i class="bi bi-star-fill star" data-rating="3"></i>
                                        <i class="bi bi-star-fill star" data-rating="4"></i>
                                        <i class="bi bi-star-fill star" data-rating="5"></i>
                                    </div>
                                    <!-- Comment Box / Kahon sa Comment -->
                                    <textarea class="form-control" id="dinnerComment" rows="2" placeholder="Add your comment..."></textarea>
                                    <!-- Feedback Display / Display sa Feedback -->
                                    <div class="mt-2" id="dinnerFeedback">
                                        @php
                                            $dateRatings = $ratings[$date] ?? collect();
                                            $feedback = $dateRatings->where('meal_type', 'dinner')->first();
                                        @endphp
                                        @if($feedback)
                                        <div class="feedback-item">
                                            <div class="feedback-rating">
                                                {{ str_repeat('★', $feedback->rating) }}{{ str_repeat('☆', 5 - $feedback->rating) }}
                                            </div>
                                            <div class="feedback-comment">{{ $feedback->feedback }}</div>
                                            <div class="feedback-actions">
                                                <span class="text-muted small">Last updated: {{ $feedback->updated_at->format('M d, Y h:i A') }}</span>
                                                <button class="btn btn-link btn-sm edit-feedback" data-report-id="{{ $feedback->id }}" data-meal-type="{{ $feedback->meal_type }}">Edit</button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Footer / Footer sa Modal -->
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

        // Helper: Get feedback key for localStorage
        function getFeedbackKey(date, mealType) {
            return `feedback_${date}_${mealType}`;
        }

        // Load feedback from localStorage when modal opens
        function loadFeedback(date) {
            ['breakfast', 'lunch', 'dinner'].forEach(mealType => {
                const key = getFeedbackKey(date, mealType);
                const saved = localStorage.getItem(key);
                const feedbackContainer = document.getElementById(`${mealType}Feedback`);
                if (saved && feedbackContainer) {
                    const feedback = JSON.parse(saved);
                    const timestamp = new Date(feedback.timestamp);
                    feedbackContainer.innerHTML = `
                        <div class="feedback-item">
                            <div class="feedback-rating">
                                ${'★'.repeat(feedback.rating)}${'☆'.repeat(5 - feedback.rating)}
                            </div>
                            <div class="feedback-comment">${feedback.comment}</div>
                            <div class="feedback-actions">
                                <span class="text-muted small">Last updated: ${timestamp.toLocaleString()}</span>
                            </div>
                        </div>
                    `;
                } else if (feedbackContainer) {
                    feedbackContainer.innerHTML = '';
                }
            });
        }

        // Modal functionality
        const orderDetailsModal = document.getElementById('orderDetailsModal');
        let currentModalDate = '';
        let editingReportId = null;

        if (orderDetailsModal) {
            orderDetailsModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const date = button.getAttribute('data-menu-date');
                currentModalDate = date;
                
                // Update modal date
                document.getElementById('modalDate').textContent = date;

                // Update meal details
                document.getElementById('modalBreakfastName').textContent = button.getAttribute('data-breakfast-name');
                document.getElementById('modalBreakfastDescription').textContent = button.getAttribute('data-breakfast-description');
                document.getElementById('modalLunchName').textContent = button.getAttribute('data-lunch-name');
                document.getElementById('modalLunchDescription').textContent = button.getAttribute('data-lunch-description');
                document.getElementById('modalDinnerName').textContent = button.getAttribute('data-dinner-name');
                document.getElementById('modalDinnerDescription').textContent = button.getAttribute('data-dinner-description');

                // Load feedback from localStorage
                loadFeedback(date);
            });
        }

        // Save Feedback
        document.getElementById('saveFeedback').addEventListener('click', function() {
            const date = currentModalDate;
            ['breakfast', 'lunch', 'dinner'].forEach(mealType => {
                const rating = document.querySelectorAll(`[data-meal-type="${mealType}"] .star.active`).length;
                const comment = document.getElementById(`${mealType}Comment`).value;
                if (rating > 0 || comment) {
                    localStorage.setItem(getFeedbackKey(date, mealType), JSON.stringify({
                        rating: rating,
                        comment: comment,
                        timestamp: new Date().toISOString()
                    }));
                }
            });
            loadFeedback(date);
            // Change Save button text to Update
            document.getElementById('saveFeedback').textContent = 'Update Feedback';
        });

        // Reset form when modal is closed
        orderDetailsModal.addEventListener('hidden.bs.modal', function () {
            editingReportId = null;
            // Clear all comment boxes and reset stars
            ['breakfast', 'lunch', 'dinner'].forEach(mealType => {
                document.getElementById(`${mealType}Comment`).value = '';
                document.querySelectorAll(`[data-meal-type="${mealType}"] .star`).forEach(star => star.classList.remove('active'));
                // Show back the feedback item if it was hidden for editing
                const feedbackItem = document.querySelector(`#${mealType}Feedback .feedback-item`);
                if(feedbackItem) {
                    feedbackItem.style.display = '';
                }
            });
            // Change Save button text back to Save Feedback
            document.getElementById('saveFeedback').textContent = 'Save Feedback';
        });

        // Add event listeners for date filter
        document.querySelectorAll('#dateFilter + .dropdown-menu .dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const filter = this.getAttribute('data-filter');
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                document.querySelectorAll('#orderHistoryTable tbody tr').forEach(row => {
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
                        firstDayOfWeek.setDate(today.getDate() - today.getDay()); // Adjust to Sunday (or Monday depending on locale)
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

                    if (showRow) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });

        let selectedMealTypeFilter = 'all'; // Default filter

        // Add event listeners for meal type filter
        document.querySelectorAll('#mealTypeFilter + .dropdown-menu .dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                selectedMealTypeFilter = this.getAttribute('data-filter');

                // Update the button text to show the selected filter (optional but good UX)
                const button = document.getElementById('mealTypeFilter');
                button.innerHTML = `<i class="bi bi-egg-fried me-2"></i>${this.textContent}`;

                // Note: The filtering logic will be applied when the modal is opened
            });
        });

        // --- IMPROVED EDIT FEEDBACK LOGIC ---
        let currentlyEditing = null;
        let originalSaveHandler = null;

        function restoreFeedbackDisplay(mealType) {
            const feedbackItem = document.querySelector(`#${mealType}Feedback .feedback-item`);
            if (feedbackItem) {
                feedbackItem.style.display = '';
            }
            document.getElementById(`${mealType}Comment`).value = '';
            document.querySelectorAll(`[data-meal-type="${mealType}"] .star`).forEach(star => star.classList.remove('active'));
            const saveBtn = document.getElementById('saveFeedback');
            saveBtn.textContent = 'Save Feedback';
            if (originalSaveHandler) {
                saveBtn.onclick = originalSaveHandler;
            }
            // Remove cancel button if exists
            const cancelBtn = document.getElementById('cancelEditBtn');
            if (cancelBtn) cancelBtn.remove();
        }

        document.querySelectorAll('.edit-feedback').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                if (currentlyEditing) restoreFeedbackDisplay(currentlyEditing);
                const reportId = this.getAttribute('data-report-id');
                const mealType = this.getAttribute('data-meal-type');
                currentlyEditing = mealType;
                const feedbackItem = this.closest('.feedback-item');
                feedbackItem.style.display = 'none';
                const rating = feedbackItem.querySelector('.feedback-rating').textContent.replace(/[^★]/g, '').length;
                const comment = feedbackItem.querySelector('.feedback-comment').textContent;
                document.getElementById(`${mealType}Comment`).value = comment;
                document.querySelectorAll(`[data-meal-type="${mealType}"] .star`).forEach((star, idx) => {
                    if (idx < rating) {
                        star.classList.add('active');
                    } else {
                        star.classList.remove('active');
                    }
                });
                // Change Save button to Update
                const saveBtn = document.getElementById('saveFeedback');
                saveBtn.textContent = 'Update Feedback';
                // Save original handler
                if (!originalSaveHandler) originalSaveHandler = saveBtn.onclick;
                // Remove previous handler
                saveBtn.onclick = null;
                // Add cancel button if not exists
                if (!document.getElementById('cancelEditBtn')) {
                    const cancelBtn = document.createElement('button');
                    cancelBtn.type = 'button';
                    cancelBtn.className = 'btn btn-secondary ms-2';
                    cancelBtn.id = 'cancelEditBtn';
                    cancelBtn.textContent = 'Cancel';
                    saveBtn.parentNode.insertBefore(cancelBtn, saveBtn.nextSibling);
                    cancelBtn.onclick = function() {
                        restoreFeedbackDisplay(mealType);
                        currentlyEditing = null;
                    };
                }
                // Add update handler
                saveBtn.onclick = function() {
                    const newRating = document.querySelectorAll(`[data-meal-type="${mealType}"] .star.active`).length;
                    const newComment = document.getElementById(`${mealType}Comment`).value;
                    fetch(`/student/history/${reportId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            rating: newRating,
                            comment: newComment
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update feedback in DOM
                            const feedbackContainer = document.getElementById(`${mealType}Feedback`);
                            feedbackContainer.innerHTML = `
                                <div class=\"feedback-item\">
                                    <div class=\"feedback-rating\">${'★'.repeat(newRating)}${'☆'.repeat(5 - newRating)}</div>
                                    <div class=\"feedback-comment\">${newComment}</div>
                                    <div class=\"feedback-actions\">
                                        <span class=\"text-muted small\">Last updated: just now</span>
                                        <button class=\"btn btn-link btn-sm edit-feedback\" data-report-id=\"${reportId}\" data-meal-type=\"${mealType}\">Edit</button>
                                    </div>
                                </div>
                            `;
                            // Show success message
                            let alert = document.createElement('div');
                            alert.className = 'alert alert-success mt-2';
                            alert.textContent = 'Feedback updated!';
                            feedbackContainer.parentNode.insertBefore(alert, feedbackContainer);
                            setTimeout(() => alert.remove(), 2000);
                            restoreFeedbackDisplay(mealType);
                            currentlyEditing = null;
                            // Re-bind edit button
                            feedbackContainer.querySelector('.edit-feedback').addEventListener('click', btn.onclick);
                        }
                    });
                };
            });
        });

        // Restore feedback display if modal is closed
        orderDetailsModal.addEventListener('hidden.bs.modal', function () {
            if (currentlyEditing) {
                restoreFeedbackDisplay(currentlyEditing);
                currentlyEditing = null;
            }
        });
    });
</script>
@endpush




