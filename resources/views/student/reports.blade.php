@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <!-- Current Date and Time Display -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-primary">Current Date and Time</h5>
                        <div id="currentDateTime" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Submission Form -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Submit New Report</h6>
                </div>
                <div class="card-body">
                    <form id="reportForm" method="POST" action="{{ route('student.reports.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="mealType" class="form-label">Meal Type</label>
                                <select class="form-select" id="mealType" name="meal_type" required>
                                    <option value="">Select Meal Type</option>
                                    <option value="breakfast">Breakfast</option>
                                    <option value="lunch">Lunch</option>
                                    <option value="dinner">Dinner</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="reportDate" class="form-label">Date</label>
                                <input type="date" class="form-control" id="reportDate" name="report_date" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="mealItems" class="form-label">Meal Items</label>
                            <div id="mealItemsContainer">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="meal_items[]" placeholder="Enter meal item" required>
                                    <button type="button" class="btn btn-outline-danger remove-item" style="display: none;">Remove</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm" id="addMealItem">
                                <i class="bi bi-plus-circle me-1"></i>Add Another Item
                            </button>
                        </div>
                        <div class="mb-3">
                            <label for="feedback" class="form-label">Feedback</label>
                            <textarea class="form-control" id="feedback" name="feedback" rows="3" placeholder="Write your feedback here..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <div class="rating">
                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send me-1"></i>Submit Report
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Reports with Feedback Section -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Meal Reports & Feedback</h6>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-filter me-2"></i>Filter
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#" data-filter="all">All Reports</a></li>
                            <li><a class="dropdown-item" href="#" data-filter="week">This Week</a></li>
                            <li><a class="dropdown-item" href="#" data-filter="month">This Month</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="reportsTable">
                            <thead>
                                <tr>
                                    <th>Meals</th>
                                    <th>Meal Items</th>
                                    <th>Report Date</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Feedback</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                <tr>
                                    <td>{{ ucfirst($report->meal_type) }}</td>
                                    <td>
                                        <ul class="list-unstyled mb-0">
                                            @foreach(json_decode($report->meal_items) as $item)
                                            <li><span class="badge bg-primary me-2">1x</span> {{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $report->created_at->format('M d, Y H:i') }}</td>
                                    <td>
                                        <div class="rating-display">
                                            @for($i = 1; $i <= 5; $i++)
                                                <span class="star {{ $i <= $report->rating ? 'filled' : '' }}">☆</span>
                                            @endfor
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success">Submitted</span></td>
                                    <td>{{ $report->feedback }}</td>
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
@endsection

@push('styles')
<style>
    .card {
        border: none;
        border-radius: 0.5rem;
    }

    .text-gray-800 {
        color: #5a5c69 !important;
    }

    .table th {
        font-weight: 600;
        color: #6c757d;
    }

    .badge {
        font-weight: 500;
        padding: 0.4em 0.7em;
    }

    textarea.form-control {
        resize: vertical;
    }

    .btn-primary {
        background-color: #4e73df;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2e59d9;
    }

    /* Rating Stars Styling */
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }

    .rating input {
        display: none;
    }

    .rating label {
        cursor: pointer;
        font-size: 30px;
        color: #ddd;
        padding: 5px;
    }

    .rating input:checked ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
        color: #ffd700;
    }

    .rating-display .star {
        font-size: 20px;
        color: #ddd;
    }

    .rating-display .star.filled {
        color: #ffd700;
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

    // Set default date to today
    document.getElementById('reportDate').valueAsDate = new Date();

    // Dynamic meal items
    document.getElementById('addMealItem').addEventListener('click', function() {
        const container = document.getElementById('mealItemsContainer');
        const newItem = document.createElement('div');
        newItem.className = 'input-group mb-2';
        newItem.innerHTML = `
            <input type="text" class="form-control" name="meal_items[]" placeholder="Enter meal item" required>
            <button type="button" class="btn btn-outline-danger remove-item">Remove</button>
        `;
        container.appendChild(newItem);
        updateRemoveButtons();
    });

    function updateRemoveButtons() {
        const items = document.querySelectorAll('.input-group');
        items.forEach((item, index) => {
            const removeButton = item.querySelector('.remove-item');
            if (items.length > 1) {
                removeButton.style.display = 'block';
            } else {
                removeButton.style.display = 'none';
            }
        });
    }

    document.getElementById('mealItemsContainer').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.input-group').remove();
            updateRemoveButtons();
        }
    });

    // Form submission handling
    document.getElementById('reportForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Add new row to table
                const tbody = document.querySelector('#reportsTable tbody');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${formData.get('meal_type')}</td>
                    <td>
                        <ul class="list-unstyled mb-0">
                            ${Array.from(formData.getAll('meal_items[]')).map(item => 
                                `<li><span class="badge bg-primary me-2">1x</span> ${item}</li>`
                            ).join('')}
                        </ul>
                    </td>
                    <td>${new Date().toLocaleDateString('en-US', { 
                        month: 'short', 
                        day: 'numeric', 
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    })}</td>
                    <td>
                        <div class="rating-display">
                            ${Array(5).fill().map((_, i) => 
                                `<span class="star ${i < formData.get('rating') ? 'filled' : ''}">☆</span>`
                            ).join('')}
                        </div>
                    </td>
                    <td><span class="badge bg-success">Submitted</span></td>
                    <td>${formData.get('feedback')}</td>
                `;
                tbody.insertBefore(newRow, tbody.firstChild);
                
                // Reset form
                this.reset();
                document.getElementById('mealItemsContainer').innerHTML = `
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="meal_items[]" placeholder="Enter meal item" required>
                        <button type="button" class="btn btn-outline-danger remove-item" style="display: none;">Remove</button>
                    </div>
                `;
                updateRemoveButtons();
                
                // Show success message
                alert('Report submitted successfully!');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while submitting the report.');
        });
    });

    // Filter functionality
    document.querySelectorAll('.dropdown-item[data-filter]').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const filter = this.dataset.filter;
            const rows = document.querySelectorAll('#reportsTable tbody tr');
            
            rows.forEach(row => {
                const date = new Date(row.cells[2].textContent);
                const now = new Date();
                
                switch(filter) {
                    case 'week':
                        const weekAgo = new Date(now.setDate(now.getDate() - 7));
                        row.style.display = date >= weekAgo ? '' : 'none';
                        break;
                    case 'month':
                        const monthAgo = new Date(now.setMonth(now.getMonth() - 1));
                        row.style.display = date >= monthAgo ? '' : 'none';
                        break;
                    default:
                        row.style.display = '';
                }
            });
        });
    });
</script>
@endpush
