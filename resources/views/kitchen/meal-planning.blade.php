@extends('layouts.app')

@section('content')

<script>
    const recipes   = JSON.parse(@json($recipesJson));
    const weekMenus = JSON.parse(@json($weekMenusJson));
</script>

<link rel="stylesheet" href="{{ asset('css/kitchen/meal-planning.css') }}">
<link rel="stylesheet" href="{{ asset('css/kitchen/ingredientsPopup.css') }}">

<div class="container-fluid">
    <!-- Header -->
    <div class="mb-4">
        <div class="card border-0 shadow bg-primary text-white p-4 rounded-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
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





    
<script src="{{ asset('js/kitchen/meal-planning.js') }}"></script>
<script src="{{ asset('js/kitchen/ingredientsPopup.js') }}"></script>
@endsection

