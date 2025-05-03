@extends('layouts.app')

@section('content')
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
    const days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY'];

    // Recipe data with cooking guides for complex dishes
    const recipes = {
        // Complex Dishes
        'CHOPSUEY': {
            prepTime: '45 minutes',
            ingredients: [
                '500g mixed vegetables (carrots, cabbage, bell peppers, string beans)',
                '250g chicken breast, sliced',
                '100g quail eggs',
                '100g young corn',
                '50g mushrooms',
                '3 cloves garlic, minced',
                '1 onion, sliced',
                '2 tbsp oyster sauce',
                '1 tbsp soy sauce',
                'Salt and pepper to taste',
                '2 tbsp cooking oil'
            ],
            instructions: [
                'Prepare all vegetables: wash and cut into uniform sizes',
                'Season chicken with salt and pepper',
                'Heat oil in a wok or large pan over medium-high heat',
                'Sauté garlic and onions until fragrant',
                'Add chicken and cook until lightly browned',
                'Add harder vegetables first (carrots, young corn)',
                'After 2-3 minutes, add remaining vegetables',
                'Add oyster sauce and soy sauce',
                'Season with salt and pepper to taste',
                'Cook until vegetables are crisp-tender',
                'Add quail eggs last and heat through',
                'Serve hot'
            ],
            notes: 'For best results, don\'t overcook the vegetables to maintain their crunch.'
        },
        'CHICKEN ADOBO': {
            prepTime: '1 hour',
            ingredients: [
                '1kg chicken pieces',
                '1/2 cup vinegar',
                '1/2 cup soy sauce',
                '1 whole garlic head, crushed',
                '2 bay leaves',
                '1 tsp whole peppercorns',
                'Salt to taste',
                '2 tbsp cooking oil'
            ],
            instructions: [
                'Combine chicken, vinegar, soy sauce, garlic, bay leaves, and peppercorns in a pot',
                'Let it marinate for 30 minutes',
                'Bring to a boil without stirring',
                'Once boiling, lower heat and simmer for 20-25 minutes',
                'Remove chicken pieces and set aside',
                'Continue simmering the sauce until it reduces',
                'Heat oil in a pan and fry the chicken pieces until brown',
                'Pour the reduced sauce over the chicken',
                'Simmer for additional 5-10 minutes'
            ],
            notes: 'For best results, use native vinegar and good quality soy sauce.'
        },
        // Simple Dishes
        'FRIED FISH': {
            prepTime: '20 minutes',
            ingredients: [
                '4-6 pieces fish (galunggong, bangus, or tilapia)',
                '1 cup cooking oil',
                '2 tbsp soy sauce',
                '1 lemon or calamansi',
                'Salt and pepper to taste'
            ],
            instructions: [
                'Clean fish thoroughly and pat dry',
                'Season with salt and pepper',
                'Heat oil in a pan until hot',
                'Fry fish until golden brown on both sides',
                'Serve with soy sauce and calamansi'
            ],
            notes: 'Make sure oil is hot before frying to prevent fish from sticking.'
        },
        'SCRAMBLED EGGS': {
            prepTime: '10 minutes',
            ingredients: [
                '4 eggs',
                '2 tbsp milk (optional)',
                'Salt and pepper to taste',
                '1 tbsp butter or oil'
            ],
            instructions: [
                'Beat eggs in a bowl with milk, salt, and pepper',
                'Heat butter in a pan over medium heat',
                'Pour in eggs and stir gently',
                'Cook until eggs are set but still slightly moist',
                'Serve immediately'
            ],
            notes: 'Don\'t overcook the eggs to keep them creamy.'
        },
        'HOTDOGS': {
            prepTime: '15 minutes',
            ingredients: [
                '8 pieces hotdogs',
                '2 tbsp cooking oil',
                'Optional: garlic and onions'
            ],
            instructions: [
                'Heat oil in a pan',
                'Optional: Sauté minced garlic and onions',
                'Add hotdogs and cook until brown',
                'Turn occasionally for even cooking'
            ],
            notes: 'Can be served with rice or bread.'
        },
        'GINISANG AMPALAYA': {
            prepTime: '45 minutes',
            ingredients: [
                '2 large ampalaya (bitter gourd), sliced',
                '3 eggs, beaten',
                '3 cloves garlic, minced',
                '1 onion, sliced',
                '2 tomatoes, diced',
                'Salt and pepper to taste',
                '2 tbsp cooking oil'
            ],
            instructions: [
                'Slice ampalaya and remove seeds',
                'Soak in salted water for 15 minutes to reduce bitterness',
                'Drain and squeeze out excess water',
                'Sauté garlic, onion, and tomatoes',
                'Add ampalaya and cook until tender',
                'Pour beaten eggs over the ampalaya',
                'Season with salt and pepper',
                'Gently stir until eggs are cooked'
            ],
            notes: 'Soaking in salt water helps reduce the bitterness.'
        },
        'SOPAS': {
            prepTime: '45 minutes',
            ingredients: [
                '2 cups elbow macaroni',
                '500g chicken, diced',
                '2 carrots, diced',
                '2 celery stalks, chopped',
                '1 onion, chopped',
                '3 cloves garlic, minced',
                '1 cup evaporated milk',
                'Salt and pepper to taste',
                '8 cups chicken broth'
            ],
            instructions: [
                'Sauté garlic and onions',
                'Add chicken and cook until light brown',
                'Add chicken broth and bring to boil',
                'Add macaroni and cook until almost done',
                'Add carrots and celery',
                'Pour in evaporated milk',
                'Season with salt and pepper',
                'Simmer until vegetables are tender'
            ],
            notes: 'Perfect comfort food for rainy days.'
        },
        'CHAMPORADO': {
            prepTime: '30 minutes',
            ingredients: [
                '2 cups glutinous rice',
                '1 cup cocoa powder',
                '1 cup sugar',
                '8 cups water',
                'Evaporated milk for serving'
            ],
            instructions: [
                'Combine rice and water in a pot',
                'Bring to boil then lower heat',
                'When rice is almost done, add cocoa powder',
                'Stir well and add sugar',
                'Cook until rice is fully done',
                'Serve hot with milk'
            ],
            notes: 'Adjust sweetness according to taste.'
        }
        // Add more recipes here...
    };

    const weekMenus = {
        1: [
            ['CHICKEN LOAF WITH ENERGEN', 'FRIED FISH', 'GINISANG CABBAGE', 'SATURDAY: SOPAS/LUGAW'],
            ['ODONG WITH SARDINES', 'FRIED CHICKEN', 'BAGUIO BEANS', 'SUNDAY: BANANACUE'],
            ['HOTDOGS', 'PORKCHOP GUISADO', 'EGGPLANT WITH EGGS', ''],
            ['BOILED EGGS WITH ENERGEN', 'GROUNDPORK', 'CHOPSUEY', 'FRUITS:'],
            ['HAM', 'FRIED CHICKEN', 'MONGGO BEANS', 'APPLE, ORANGE, PINEAPPLE, WATERMELON, BANANA'],
            ['SARDINES WITH EGGS', 'BURGER STEAK', 'UTAN BISAYA WITH BUWAD', ''],
            ['TOMATO WITH EGGS', 'FRIED FISH', 'SARI-SARI', '']
        ],
        2: [
            ['CHORIZO', 'CHICKEN ADOBO', 'STRING BEANS GUISADO', 'SAT: CHAMPORADO'],
            ['SCRAMBLED EGGS WITH ENERGEN', 'FRIED FISH', 'TALONG WITH EGGS', 'SUN: NILUNG-AG NGA KAMOTE'],
            ['SARDINES WITH EGGS', 'GROUNDPORK', 'TINUN-ANG KALABASA WITH BUWAD', ''],
            ['LUNCHEON MEAT', 'FRIED CHICKEN', 'CHOPSUEY', 'FRUIT:'],
            ['SOTANGHON GUISADO', 'PORK MENUDO', 'MONGGO BEANS', 'APPLE, ORANGE, PINEAPPLE, WATERMELON, BANANA'],
            ['HOTDOGS', 'MEATBALLS', 'UTAN BISAYA WITH BUWAD', ''],
            ['AMPALAYA WITH EGGS WITH ENERGEN', 'FRIED FISH', 'PAKBIT', '']
        ]
    };

    function showRecipe(dishName) {
        const recipe = recipes[dishName];
        if (!recipe) return;

        const modal = new bootstrap.Modal(document.getElementById('recipeModal'));
        document.getElementById('recipeTitle').textContent = dishName;
        document.getElementById('prepTime').textContent = recipe.prepTime;
        
        const ingredientsList = document.getElementById('ingredientsList');
        ingredientsList.innerHTML = recipe.ingredients.map(ing => `<li>${ing}</li>`).join('');
        
        const instructionsList = document.getElementById('instructionsList');
        instructionsList.innerHTML = recipe.instructions.map(inst => `<li>${inst}</li>`).join('');
        
        document.getElementById('recipeNotes').textContent = recipe.notes;
        
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
