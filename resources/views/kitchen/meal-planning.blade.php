@extends('layouts.app')

@section('content')

@php
  // these two get passed as JSON-strings from the controller
  $recipesJson   = $recipesJson;    
  $weekMenusJson = $weekMenusJson;
@endphp

<script>
    
    const recipes   = JSON.parse(@json($recipesJson));
    const weekMenus = JSON.parse(@json($weekMenusJson));
</script>

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
        <div class="text-center mt-4">
        <a href="{{ route('kitchen.recipes') }}" class="btn btn-primary">
            <i class="bi bi-journal-text me-2"></i>View All Recipes
        </a>
    </div>
</div>

    </div>

    <!-- Recipe Quick View Modal -->
    <div class="modal fade" id="recipeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 bg-primary text-white">
                    <h5 class="modal-title fw-bold" id="recipeTitle"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div id="recipeContent">
                        <div class="recipe-details">
                            <!-- Preparation Time -->
                            <div class="recipe-section mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="recipe-icon">
                                        <i class="bi bi-clock text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold mb-0 ms-2">Preparation Time</h6>
                                </div>
                                <p id="prepTime" class="mb-0 ms-4 text-muted"></p>
                            </div>
                            
                            <!-- Ingredients -->
                            <div class="recipe-section mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="recipe-icon">
                                        <i class="bi bi-basket text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold mb-0 ms-2">Ingredients</h6>
                                </div>
                                <ul id="ingredientsList" class="list-unstyled ms-4 mb-0">
                                </ul>
                            </div>
                            
                            <!-- Instructions -->
                            <div class="recipe-section mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="recipe-icon">
                                        <i class="bi bi-list-check text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold mb-0 ms-2">Cooking Instructions</h6>
                                </div>
                                <ol id="instructionsList" class="ms-4 mb-0">
                                </ol>
                            </div>
                            
                            <!-- Tips & Notes -->
                            <div class="recipe-section">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="recipe-icon">
                                        <i class="bi bi-lightbulb text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold mb-0 ms-2">Tips & Notes</h6>
                                </div>
                                <p id="recipeNotes" class="mb-0 ms-4 text-muted fst-italic"></p>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Link to Recipes -->
    
<script>
    const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    

    function showRecipe(dishName) {
        const recipe = recipes[dishName];
        if (!recipe) return;

        const modal = new bootstrap.Modal(document.getElementById('recipeModal'));
        document.getElementById('recipeTitle').textContent = dishName;
        
        const ingredientsList = document.getElementById('ingredientsList');
        ingredientsList.innerHTML = recipe.ingredients.map(ing => `<li>${ing}</li>`).join('');
        
        modal.show();
    }

    function showWeek(week) {
        const tbody = document.getElementById('week-rows');
        tbody.innerHTML = '';
        
        // Update button states
        document.querySelectorAll('.btn-group .btn').forEach((btn, index) => {
            if (index + 1 === week) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });

        weekMenus[week].forEach((meals, i) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="text-primary fw-bold bg-light text-center py-3">${days[i]}</td>
                ${meals.map(item => {
                    const hasRecipe = recipes[item] !== undefined;
                    return `<td class="text-center py-3">
                        ${item ? `
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <span class="small text-muted">${item}</span>
                                ${hasRecipe ? `
                                    <button class="btn btn-link btn-sm p-0 text-primary" 
                                            onclick="showRecipe('${item}')" 
                                            title="View Recipe">
                                        <i class="bi bi-book"></i>
                                    </button>
                                ` : ''}
                            </div>
                        ` : '<span class="text-danger">-</span>'}
                    </td>`;
                }).join('')}
            `;
            tbody.appendChild(row);
        });
    }

    // Show initial week
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
    .meal-item {
        position: relative;
        transition: all 0.3s ease;
    }
    .meal-item:hover {
        transform: translateY(-2px);
    }
    .meal-item .recipe-btn {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .meal-item:hover .recipe-btn {
        opacity: 1;
    }
    .card-header h5 {
        font-size: 1.1rem;
        letter-spacing: 0.5px;
    }
    .recipe-icon {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(var(--bs-primary-rgb), 0.1);
        border-radius: 8px;
    }
    
    .recipe-icon i {
        font-size: 1.2rem;
    }
    
    .recipe-section ul li, 
    .recipe-section ol li {
        margin-bottom: 0.5rem;
        color: #6c757d;
    }
    
    .recipe-section ul li:last-child, 
    .recipe-section ol li:last-child {
        margin-bottom: 0;
    }
    
    #ingredientsList li {
        position: relative;
        padding-left: 1.5rem;
    }
    
    #ingredientsList li::before {
        content: "•";
        position: absolute;
        left: 0;
        color: var(--bs-primary);
    }
    
    #instructionsList li {
        padding-left: 0.5rem;
    }
    
    .modal-header {
        border-radius: 0.5rem 0.5rem 0 0;
    }
    
    .modal-content {
        border-radius: 0.5rem;
    }
</style>
@endsection