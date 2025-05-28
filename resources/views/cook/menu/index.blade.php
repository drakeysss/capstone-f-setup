@extends('layouts.app')

@section('content')
<div class="cook-container">
    <div class="main-card">
        <div class="card-header">
            <h5 class="card-title">Weekly Menu and Ingredients</h5>
            <button class="btn btn-primary" id="toggleEditMode" type="button">
                <i class="fas fa-edit"></i> Toggle Edit Mode
            </button>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="menuTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="week1-tab" data-bs-toggle="tab" data-bs-target="#week1" type="button" role="tab">Week 1 & 3</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="week2-tab" data-bs-toggle="tab" data-bs-target="#week2" type="button" role="tab">Week 2 & 4</button>
                </li>
            </ul>
            <div class="tab-content mt-3" id="menuTabContent">
                <div class="tab-pane fade show active" id="week1" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Breakfast</th>
                                    <th>Lunch</th>
                                    <th>Dinner</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                <tr>
                                    <td class="align-middle">{{ $day }}</td>
                                    @foreach(['Breakfast', 'Lunch', 'Dinner'] as $mealType)
                                    <td>
                                        <div class="menu-container">
                                            <div class="menu-item">
                                                <div class="menu-section text-center mb-2">
                                                    <span class="menu-title d-block mb-2" style="font-weight: bold;">Menu Item</span>
                                                    <input type="text" class="form-control form-control-sm edit-menu-input d-none mx-auto" style="max-width: 200px; text-align: center; font-weight: bold;">
                                                </div>
                                                <div class="ingredients-section mt-2">
                                                    <div class="ingredients-header mb-1">
                                                        <small class="text-muted">Ingredients:</small>
                                                    </div>
                                                    <div class="ingredients-content">
                                                        <ul class="ingredients-list" style="padding-left: 20px;">
                                                        </ul>
                                                        <textarea class="form-control form-control-sm edit-ingredients-input d-none" rows="3" style="max-width: 100%; margin: 0 auto;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="week2" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Breakfast</th>
                                    <th>Lunch</th>
                                    <th>Dinner</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                <tr>
                                    <td class="align-middle">{{ $day }}</td>
                                    @foreach(['Breakfast', 'Lunch', 'Dinner'] as $mealType)
                                    <td>
                                        <div class="menu-container">
                                            <div class="menu-item">
                                                <div class="menu-section text-center mb-2">
                                                    <span class="menu-title d-block mb-2" style="font-weight: bold;">Menu Item</span>
                                                    <input type="text" class="form-control form-control-sm edit-menu-input d-none mx-auto" style="max-width: 200px; text-align: center; font-weight: bold;">
                                                </div>
                                                <div class="ingredients-section mt-2">
                                                    <div class="ingredients-header mb-1">
                                                        <small class="text-muted">Ingredients:</small>
                                                    </div>
                                                    <div class="ingredients-content">
                                                        <ul class="ingredients-list" style="padding-left: 20px;">
                                                        </ul>
                                                        <textarea class="form-control form-control-sm edit-ingredients-input d-none" rows="3" style="max-width: 100%; margin: 0 auto;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-success" id="saveAllBtn" type="button" style="display: none;">
                <i class="fas fa-save"></i> Save All Changes
            </button>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/cook.css') }}">
@endpush

<style>
.menu-container {
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.menu-item {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.menu-section {
    padding: 10px;
    border-radius: 6px;
    margin-bottom: auto;
    text-align: center;
}

.menu-title {
    color: #2c3e50;
    font-weight: 600;
    margin: 0;
}

.ingredients-section {
    padding: 10px;
    border-radius: 6px;
    margin-top: auto;
    text-align: left;
}

.ingredients-header {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}

.ingredients-list {
    margin: 0;
    padding-left: 0;
}

.ingredients-list ul {
    padding-left: 20px;
}

.ingredients-list li {
    margin-bottom: 4px;
    color: #6c757d;
    text-align: left;
}

.edit-controls {
    border-top: 1px solid #dee2e6;
    padding-top: 10px;
}

.btn-group-sm .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
}

.edit-menu-input,
.edit-ingredients-input {
    margin-top: 8px;
}

.edit-ingredients-btn {
    color: #6c757d;
    text-decoration: none;
}

.edit-ingredients-btn:hover {
    color: #2c3e50;
}
</style>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    const saveAllBtn = $('#saveAllBtn');
    const toggleEditModeButton = $('#toggleEditMode');
    const menuItems = $('.menu-item');

    // Generate unique ID for each menu item based on week, day and meal type
    menuItems.each(function() {
        const row = $(this).closest('tr');
        const day = row.find('td:first-child').text().trim();
        const mealType = $(this).closest('td').index() === 1 ? 'Breakfast' : 
                        $(this).closest('td').index() === 2 ? 'Lunch' : 'Dinner';
        const week = $(this).closest('.tab-pane').attr('id');
        $(this).data('id', `${week}_${day}_${mealType}`.toLowerCase().replace(/\s+/g, '_'));
    });

    // Load saved data from localStorage and display saved content or leave empty (no default dots)
    menuItems.each(function() {
        const item = $(this);
        const id = item.data('id');
        const savedData = localStorage.getItem(`menu_${id}`);
        const ingredientsList = item.find('.ingredients-list');
        const menuTitle = item.find('.menu-title');
        
        let ingredientsContent = '';
        let menuTitleContent = 'Menu Item';

        if (savedData) {
            const data = JSON.parse(savedData);
            
            // Load menu item title if exists and is not empty
            if (data.menu_item && data.menu_item.trim()) {
                menuTitleContent = data.menu_item.trim();
            }

            // Load ingredients if exists and is not empty or placeholder
            if (data.ingredients && data.ingredients.trim()) {
                const trimmedIngredients = data.ingredients.trim();
                // Check if the saved ingredients match the old placeholder format
                if (trimmedIngredients === '• Ingredient 1\n• Ingredient 2' || trimmedIngredients === 'Ingredient 1\nIngredient 2') {
                    ingredientsContent = ''; // Treat as empty
                     // Optionally remove the old placeholder from localStorage
                    localStorage.removeItem(`menu_${id}`); // Remove to prevent it from reappearing
                } else {
                    ingredientsContent = trimmedIngredients;
                }
            }
        }

        // Update menu title display
        menuTitle.text(menuTitleContent);

        // Display ingredients: formatted list if content, empty list if empty
        if (ingredientsContent) {
             ingredientsList.html(ingredientsContent.split('\n')
                .filter(ing => ing.trim())
                .map(ing => `<li class="ingredient-item" style="font-weight: normal;"><small>${ing.replace(/^•\s*/, '').trim()}</small></li>`)
                .join(''));
        } else {
            ingredientsList.html(''); // Leave empty if no content
        }
    });

    // Toggle edit mode
    toggleEditModeButton.on('click', function() {
        const isEditMode = !$(this).hasClass('active');
        $(this).toggleClass('active');
        
        saveAllBtn.toggle(isEditMode);
        
        const activeTab = $('.tab-pane.active');
        const activeMenuItems = activeTab.find('.menu-item');
        
        activeMenuItems.each(function() {
            const item = $(this);
            // Explicitly find elements within the current item
            const menuTitle = item.find('.menu-title');
            const menuInput = item.find('.edit-menu-input');
            const ingredientsList = item.find('.ingredients-list');
            const ingredientsInput = item.find('.edit-ingredients-input');

            if (isEditMode) {
                menuTitle.addClass('d-none');
                menuInput.removeClass('d-none');
                // Set input value from current displayed text
                menuInput.val(menuTitle.text());
                
                ingredientsList.addClass('d-none');
                ingredientsInput.removeClass('d-none');
                // Set textarea value from current displayed ingredients list
                ingredientsInput.val(ingredientsList.find('li').map(function() {
                    return $(this).text().trim();
                }).get().join('\n'));
                 // Add bullet point to first line if empty when entering edit mode
                if (!ingredientsInput.val().trim()) {
                    ingredientsInput.val('• ');
                }

            } else {
                // When exiting edit mode, ensure display elements are shown and inputs hidden
                menuTitle.removeClass('d-none');
                menuInput.addClass('d-none');
                ingredientsList.removeClass('d-none');
                ingredientsInput.addClass('d-none');
            }
        });
    });

    // Handle Enter key in ingredients textarea
    $('.edit-ingredients-input').on('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const cursorPos = this.selectionStart;
            const textBefore = this.value.substring(0, cursorPos);
            const textAfter = this.value.substring(cursorPos);
            
            // Add a new line with a bullet point and space
            this.value = textBefore + '\n• ' + textAfter;
            this.selectionStart = this.selectionEnd = cursorPos + 3;
        }
    }); // Removed focus listener to prevent initial dot

    // Save all changes
    saveAllBtn.on('click', function() {
        const activeTab = $('.tab-pane.active');
        const activeMenuItems = activeTab.find('.menu-item');
        
        activeMenuItems.each(function() {
            const item = $(this);
            // Explicitly find elements within the current item
            const menuInput = item.find('.edit-menu-input');
            const ingredientsInput = item.find('.edit-ingredients-input');
            const menuTitle = item.find('.menu-title');
            const ingredientsList = item.find('.ingredients-list');

            const menuValue = menuInput.val();
            const ingredientsValue = ingredientsInput.val();
            const id = item.data('id');

            console.log(`Saving item ID: ${id}`);
            console.log(`Menu Value: ${menuValue}`);
            console.log(`Ingredients Value: ${ingredientsValue}`);

            const trimmedMenuValue = menuValue?.trim() || '';
            const trimmedIngredientsValue = ingredientsValue?.trim() || '';

            if (trimmedMenuValue || trimmedIngredientsValue) {
                const data = {
                    menu_item: trimmedMenuValue,
                    ingredients: trimmedIngredientsValue
                };
                localStorage.setItem(`menu_${id}`, JSON.stringify(data));

                // Update UI immediately after saving using trimmed values
                if (trimmedMenuValue) {
                    menuTitle.text(trimmedMenuValue);
                } else {
                    menuTitle.text('Menu Item');
                }

                if (trimmedIngredientsValue) {
                     ingredientsList.html(trimmedIngredientsValue.split('\n')
                        .filter(ing => ing.trim())
                        .map(ing => `<li class="ingredient-item" style="font-weight: normal;"><small>${ing.replace(/^•\s*/, '').trim()}</small></li>`)
                        .join(''));
                } else {
                     ingredientsList.html(''); // Leave empty if no content
                }
            } else {
                // If no content after editing, remove from localStorage and leave empty
                localStorage.removeItem(`menu_${id}`);
                menuTitle.text('Menu Item'); // Reset to default
                ingredientsList.html(''); // Leave empty
            }
             // Ensure edit inputs are hidden and display elements shown after saving
            menuInput.addClass('d-none');
            ingredientsInput.addClass('d-none');
            menuTitle.removeClass('d-none');
            ingredientsList.removeClass('d-none');
        });

        // Exit edit mode and hide save button
        toggleEditModeButton.removeClass('active');
        saveAllBtn.hide();

        // The display update for all items is handled within the each loop above now
    });
});
</script>
@endpush 