@extends('layouts.app')

@section('content')

<script>
    const recipes   = JSON.parse(@json($recipesJson));
    const weekMenus = JSON.parse(@json($weekMenusJson));
    console.log('weekMenus:', weekMenus);

    // Define meal times (in 24-hour format)
    const mealTimes = {
        breakfast: '07:00', // 7:00 AM
        lunch: '12:00',    // 12:00 PM
        dinner: '18:00'    // 6:00 PM
    };

    // Function to get date range for a week
    function getWeekDateRange(startDate, weekNumber) {
        const start = new Date(startDate);
        const end = new Date(startDate);
        end.setDate(end.getDate() + 6); // Add 6 days to get the end of the week
        return {
            start: start.toISOString().split('T')[0],
            end: end.toISOString().split('T')[0]
        };
    }

    // Function to update date range display
    function updateDateRange() {
        const startDate = document.getElementById('startDate').value;
        const weekNumber = document.getElementById('weekNumber').value;
        if (startDate) {
            const range = getWeekDateRange(startDate, weekNumber);
            document.getElementById('dateRangeDisplay').textContent = 
                `${range.start} to ${range.end}`;
        }
    }

    // Function to set next available week
    function setNextAvailableWeek() {
        const today = new Date();
        const dayOfWeek = today.getDay(); // 0 = Sunday, 1 = Monday, etc.
        const daysUntilMonday = dayOfWeek === 0 ? 1 : 8 - dayOfWeek;
        
        const nextMonday = new Date(today);
        nextMonday.setDate(today.getDate() + daysUntilMonday);
        
        document.getElementById('startDate').value = nextMonday.toISOString().split('T')[0];
        updateDateRange();
    }
</script>

<link rel="stylesheet" href="{{ asset('css/kitchen/meal-planning.css') }}">
<link rel="stylesheet" href="{{ asset('css/kitchen/ingredientsPopup.css') }}">

<div class="container-fluid">
    <!-- Header -->
    <div class="mb-4">
        <div class="card border-0 shadow bg-primary text-white p-4 rounded-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold mb-1">Daily/Weekly Meal</h2>
                    <h2 class="fw-bold mb-1">Weekly Meal Schedule</h2>
                    <p class="mb-0 small">Plan and manage meals for all weeks</p>
                </div>
                <div>
                    <i class="bi bi-calendar-week display-4 opacity-25"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Week Selection and Poll Creation -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="btn-group shadow-sm">
            <button class="btn btn-light active px-4" onclick="showWeek(1)">
                <i class="bi bi-calendar-week me-2"></i>Week 1 & 3
            </button>
            <button class="btn btn-light px-4" onclick="showWeek(2)">
                <i class="bi bi-calendar-week me-2"></i>Week 2 & 4
            </button>
        </div>
        <button class="btn btn-primary" onclick="createWeeklyPoll()">
            <i class="bi bi-poll me-2"></i>Create Weekly Poll
        </button>
    </div>

    <!-- Meal Schedule Table -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th class="py-3 bg-white text-primary border-0" style="width: 120px;">
                                <i class="bi bi-calendar-week d-block mb-1"></i>
                                Day
                            </th>
                            <th class="py-3 border-0">
                                <i class="bi bi-sunrise text-warning d-block mb-1"></i>
                                <small class="text-muted">Breakfast</small>
                            </th>
                            <th class="py-3 border-0">
                                <i class="bi bi-sun text-warning d-block mb-1"></i>
                                <small class="text-muted">Lunch</small>
                            </th>
                            <th class="py-3 border-0">
                                <i class="bi bi-moon-stars text-primary d-block mb-1"></i>
                                <small class="text-muted">Dinner</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="week-rows">
                        <!-- Filled dynamically by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Create Weekly Poll Modal -->
<div class="modal fade" id="createWeeklyPollModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Weekly Meal Poll</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="weeklyPollForm" action="{{ route('kitchen.meal-poll.create-weekly') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="weekNumber" class="form-label">Week Number</label>
                            <select class="form-select" id="weekNumber" name="week_number" required onchange="updateMenuSelection(); updateDateRange();">
                                <option value="1">Week 1 & 3</option>
                                <option value="2">Week 2 & 4</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="startDate" class="form-label">Start Date (Monday)</label>
                            <div class="input-group">
                                <input type="date" class="form-control" id="startDate" name="start_date" required 
                                    onchange="updateDateRange()">
                                <button type="button" class="btn btn-outline-secondary" onclick="setNextAvailableWeek()">
                                    <i class="bi bi-calendar-plus"></i> Next Week
                                </button>
                            </div>
                            <div class="mt-2">
                                <small class="text-muted">Week Range: <span id="dateRangeDisplay" class="text-primary"></span></small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Cutoff Times (2 hours before meal time)</label>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <label class="form-label">Breakfast Cutoff</label>
                                        <input type="time" class="form-control" name="cutoff_times[breakfast]" 
                                            value="05:00" required>
                                        <small class="text-muted">Meal time: 7:00 AM</small>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Lunch Cutoff</label>
                                        <input type="time" class="form-control" name="cutoff_times[lunch]" 
                                            value="10:00" required>
                                        <small class="text-muted">Meal time: 12:00 PM</small>
                                    </div>
                                    <div>
                                        <label class="form-label">Dinner Cutoff</label>
                                        <input type="time" class="form-control" name="cutoff_times[dinner]" 
                                            value="16:00" required>
                                        <small class="text-muted">Meal time: 6:00 PM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="pollQuestion" class="form-label">Poll Question</label>
                            <input type="text" class="form-control" id="pollQuestion" name="question" 
                                value="Will you be eating this meal?" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Menus to Include in Poll</label>
                        <div id="menuSelection" class="border rounded p-3">
                            <!-- Will be filled dynamically -->
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Response Options</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="response_options[]" value="Yes" checked disabled>
                                    <label class="form-check-label">Yes</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="response_options[]" value="No" checked disabled>
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="weeklyPollForm" class="btn btn-primary">Create Weekly Poll</button>
            </div>
        </div>
    </div>
</div>

<script>
    const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    
    function showWeek(week) {
        const tbody = document.getElementById('week-rows');
        tbody.innerHTML = '';

        document.querySelectorAll('.btn-group .btn').forEach((btn, index) => {
            if (index + 1 === week) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });

        const weekName = week === 1 ? 'Week 1 & 3' : 'Week 2 & 4';
        const menu = weekMenus[weekName] || {};

        days.forEach(day => {
            const meals = menu[day] || {};
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="text-primary fw-bold bg-light text-center py-3">${day}</td>
                <td class="text-center py-3">
                    <span class="small text-muted">${meals.Breakfast && meals.Breakfast.name ? meals.Breakfast.name : '-'}</span>
                </td>
                <td class="text-center py-3">
                    <span class="small text-muted">${meals.Lunch && meals.Lunch.name ? meals.Lunch.name : '-'}</span>
                </td>
                <td class="text-center py-3">
                    <span class="small text-muted">${meals.Dinner && meals.Dinner.name ? meals.Dinner.name : '-'}</span>
                </td> 
            `;
            tbody.appendChild(row);
        });
    }

    function createWeeklyPoll() {
        const modal = new bootstrap.Modal(document.getElementById('createWeeklyPollModal'));
        document.getElementById('weeklyPollForm').reset();
        setNextAvailableWeek(); // Set default to next available week
        updateMenuSelection();
        modal.show();
    }

    function updateMenuSelection() {
        const weekNumber = document.getElementById('weekNumber').value;
        const weekName = weekNumber == 1 ? 'Week 1 & 3' : 'Week 2 & 4';
        const menu = weekMenus[weekName] || {};
        const menuSelection = document.getElementById('menuSelection');
        
        let html = '<div class="row">';
        days.forEach(day => {
            const meals = menu[day] || {};
            html += `
                <div class="col-12 mb-3">
                    <h6 class="text-primary">${day}</h6>
                    <div class="row">
                        ${meals.Breakfast ? `
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="selected_menus[]" 
                                        value="${day}_breakfast_${meals.Breakfast.name}" checked>
                                    <label class="form-check-label">
                                        <small>Breakfast: ${meals.Breakfast.name}</small>
                                    </label>
                                </div>
                            </div>
                        ` : ''}
                        ${meals.Lunch ? `
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="selected_menus[]" 
                                        value="${day}_lunch_${meals.Lunch.name}" checked>
                                    <label class="form-check-label">
                                        <small>Lunch: ${meals.Lunch.name}</small>
                                    </label>
                                </div>
                            </div>
                        ` : ''}
                        ${meals.Dinner ? `
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="selected_menus[]" 
                                        value="${day}_dinner_${meals.Dinner.name}" checked>
                                    <label class="form-check-label">
                                        <small>Dinner: ${meals.Dinner.name}</small>
                                    </label>
                                </div>
                            </div>
                        ` : ''}
                    </div>
                </div>
            `;
        });
        html += '</div>';
        menuSelection.innerHTML = html;
    }

    document.addEventListener('DOMContentLoaded', () => {
        showWeek(1);
    });
</script>

<style>
    .table th {
        font-weight: 600;
    }
    .table td {
        font-size: 0.9rem;
        padding: 1rem 0.75rem;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(var(--bs-primary-rgb), 0.05);
    }
    .table thead i {
        font-size: 1.4rem;
        opacity: 0.8;
    }
</style>

<script src="{{ asset('js/kitchen/meal-planning.js') }}"></script>
<script src="{{ asset('js/kitchen/ingredientsPopup.js') }}"></script>
@endsection

