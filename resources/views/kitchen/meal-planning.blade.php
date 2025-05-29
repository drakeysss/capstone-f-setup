@extends('layouts.app')

@section('content')

<script>
    const recipes   = JSON.parse(@json($recipesJson));
    const weekMenus = JSON.parse(@json($weekMenusJson));
    console.log('weekMenus:', weekMenus);
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

    <!-- Week Selection -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="btn-group shadow-sm">
            <button class="btn btn-light active px-4" onclick="showWeek(1)">
                <i class="bi bi-calendar-week me-2"></i>Week 1 & 3
            </button>
            <button class="btn btn-light px-4" onclick="showWeek(2)">
                <i class="bi bi-calendar-week me-2"></i>Week 2 & 4
            </button>
        </div>
    </div>

    <!-- Meal Schedule Table -->
    <div class="card shadow-sm">
    </div>
    </div>

    <!-- Meal Schedule Table -->
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
                            <th class="py-3 border-0">
                                <i class="bi bi-cup-straw text-success d-block mb-1"></i>
                                <small class="text-muted">Snacks</small>
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
                    ${meals.Breakfast && meals.Breakfast.status   ? `<br><span class="badge ${meals.Breakfast.status === 'available' ? 'bg-success' : (meals.Breakfast.status === 'low stock' ? 'bg-warning' : 'bg-secondary')}">${meals.Breakfast.status}</span>` : ''}
                </td>
                <td class="text-center py-3">
                    <span class="small text-muted">${meals.Lunch && meals.Lunch.name ? meals.Lunch.name : '-'}</span>
                    ${meals.Lunch && meals.Lunch.status ? `<br><span class="badge ${meals.Lunch.status === 'available' ? 'bg-success' : (meals.Lunch.status === 'low stock' ? 'bg-warning' : 'bg-secondary')}">${meals.Lunch.status}</span>` : ''}
                </td>
                <td class="text-center py-3">
                    <span class="small text-muted">${meals.Dinner && meals.Dinner.name ? meals.Dinner.name : '-'}</span>
                    ${meals.Dinner && meals.Dinner.status ? `<br><span class="badge ${meals.Dinner.status === 'available' ? 'bg-success' : (meals.Dinner.status === 'low stock' ? 'bg-warning' : 'bg-secondary')}">${meals.Dinner.status}</span>` : ''}
                </td> 
            `;
            tbody.appendChild(row);
        });
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

