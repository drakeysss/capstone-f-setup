@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Weekly Menu and Ingredients</h5>
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
                                        @foreach($week1And3Orders as $day => $orders)
                                        <tr>
                                            <td>{{ $day }}</td>
                                            @foreach(['Breakfast', 'Lunch', 'Dinner'] as $mealType)
                                            <td>
                                                @php
                                                    $order = $orders->firstWhere('meal_type', $mealType);
                                                @endphp
                                                @if($order)
                                                    <div class="menu-container">
                                                        <div class="menu-item" data-id="{{ $order->id }}" data-editable="{{ $order->is_editable }}">
                                                            <div class="menu-section text-center mb-2">
                                                                <span class="menu-title d-block mb-2" style="font-weight: bold;">{{ $order->menu_item }}</span>
                                                                @if($order->is_editable)
                                                                    <input type="text" class="form-control form-control-sm edit-menu-input d-none mx-auto" value="{{ $order->menu_item }}" style="max-width: 200px; text-align: center; font-weight: bold;">
                                                                @endif
                                                            </div>
                                                            <div class="ingredients-section mt-2">
                                                                <div class="ingredients-header mb-1">
                                                                    <small class="text-muted">Ingredients:</small>
                                                                    @if($order->is_editable)
                                                                        <button class="btn btn-link btn-sm p-0 ms-2 edit-ingredients-btn">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                                <div class="ingredients-content">
                                                                    <ul class="ingredients-list" style="padding-left: 20px;">
                                                                        @php
                                                                            $ingredients = $order->ingredients;
                                                                            $ingredientList = [];
                                                                            
                                                                            // Try to decode as JSON first
                                                                            $decodedIngredients = json_decode($ingredients, true);
                                                                            if (json_last_error() === JSON_ERROR_NONE && is_array($decodedIngredients)) {
                                                                                $ingredientList = $decodedIngredients;
                                                                            } else {
                                                                                // If not JSON, split by newlines first, then by commas
                                                                                $lines = explode("\n", $ingredients);
                                                                                foreach ($lines as $line) {
                                                                                    $parts = explode(',', $line);
                                                                                    foreach ($parts as $part) {
                                                                                        $trimmed = trim($part);
                                                                                        if (!empty($trimmed)) {
                                                                                            $ingredientList[] = $trimmed;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        @endphp
                                                                        @foreach($ingredientList as $ingredient)
                                                                            <li class="ingredient-item" style="font-weight: normal;">
                                                                                <small>{{ $ingredient }}</small>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    @if($order->is_editable)
                                                                        <textarea class="form-control form-control-sm edit-ingredients-input d-none" rows="3" style="max-width: 250px; margin: 0 auto;">{{ $order->ingredients }}</textarea>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @if($order->is_editable)
                                                                <div class="edit-controls mt-3">
                                                                    <div class="btn-group btn-group-sm d-flex justify-content-center">
                                                                        <button class="btn btn-outline-primary edit-btn">
                                                                            <i class="fas fa-edit"></i> Edit
                                                                        </button>
                                                                        <button class="btn btn-outline-success save-btn d-none">
                                                                            <i class="fas fa-save"></i> Save
                                                                        </button>
                                                                        <button class="btn btn-outline-danger cancel-btn d-none">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
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
                                            <th>Morning</th>
                                            <th>Afternoon</th>
                                            <th>Evening</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($week2And4Orders as $day => $orders)
                                        <tr>
                                            <td>{{ $day }}</td>
                                            @foreach(['Breakfast', 'Lunch', 'Dinner'] as $mealType)
                                            <td>
                                                @php
                                                    $order = $orders->firstWhere('meal_type', $mealType);
                                                @endphp
                                                @if($order)
                                                    <div class="menu-container">
                                                        <div class="menu-item" data-id="{{ $order->id }}" data-editable="{{ $order->is_editable }}">
                                                            <div class="menu-section text-center mb-2">
                                                                <span class="menu-title d-block mb-2" style="font-weight: bold;">{{ $order->menu_item }}</span>
                                                                @if($order->is_editable)
                                                                    <input type="text" class="form-control form-control-sm edit-menu-input d-none mx-auto" value="{{ $order->menu_item }}" style="max-width: 200px; text-align: center; font-weight: bold;">
                                                                @endif
                                                            </div>
                                                            <div class="ingredients-section mt-2">
                                                                <div class="ingredients-header mb-1">
                                                                    <small class="text-muted">Ingredients:</small>
                                                                    @if($order->is_editable)
                                                                        <button class="btn btn-link btn-sm p-0 ms-2 edit-ingredients-btn">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                                <div class="ingredients-content">
                                                                    <ul class="ingredients-list" style="padding-left: 20px;">
                                                                        @php
                                                                            $ingredients = $order->ingredients;
                                                                            $ingredientList = [];
                                                                            
                                                                            // Try to decode as JSON first
                                                                            $decodedIngredients = json_decode($ingredients, true);
                                                                            if (json_last_error() === JSON_ERROR_NONE && is_array($decodedIngredients)) {
                                                                                $ingredientList = $decodedIngredients;
                                                                            } else {
                                                                                // If not JSON, split by newlines first, then by commas
                                                                                $lines = explode("\n", $ingredients);
                                                                                foreach ($lines as $line) {
                                                                                    $parts = explode(',', $line);
                                                                                    foreach ($parts as $part) {
                                                                                        $trimmed = trim($part);
                                                                                        if (!empty($trimmed)) {
                                                                                            $ingredientList[] = $trimmed;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        @endphp
                                                                        @foreach($ingredientList as $ingredient)
                                                                            <li class="ingredient-item" style="font-weight: normal;">
                                                                                <small>{{ $ingredient }}</small>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    @if($order->is_editable)
                                                                        <textarea class="form-control form-control-sm edit-ingredients-input d-none" rows="3" style="max-width: 250px; margin: 0 auto;">{{ $order->ingredients }}</textarea>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @if($order->is_editable)
                                                                <div class="edit-controls mt-3">
                                                                    <div class="btn-group btn-group-sm d-flex justify-content-center">
                                                                        <button class="btn btn-outline-primary edit-btn">
                                                                            <i class="fas fa-edit"></i> Edit
                                                                        </button>
                                                                        <button class="btn btn-outline-success save-btn d-none">
                                                                            <i class="fas fa-save"></i> Save
                                                                        </button>
                                                                        <button class="btn btn-outline-danger cancel-btn d-none">
                                                                            <i class="fas fa-times"></i> Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
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
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-btn');
    const saveButtons = document.querySelectorAll('.save-btn');
    const cancelButtons = document.querySelectorAll('.cancel-btn');
    const editIngredientsButtons = document.querySelectorAll('.edit-ingredients-btn');

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const menuItem = this.closest('.menu-item');
            menuItem.querySelector('.menu-title').classList.add('d-none');
            menuItem.querySelector('.edit-menu-input').classList.remove('d-none');
            menuItem.querySelector('.ingredients-list').classList.add('d-none');
            menuItem.querySelector('.edit-ingredients-input').classList.remove('d-none');
            this.classList.add('d-none');
            menuItem.querySelector('.save-btn').classList.remove('d-none');
            menuItem.querySelector('.cancel-btn').classList.remove('d-none');
            if(menuItem.querySelector('.edit-ingredients-btn')) menuItem.querySelector('.edit-ingredients-btn').classList.add('d-none');
        });
    });

    editIngredientsButtons.forEach(button => {
        button.addEventListener('click', function() {
            const menuItem = this.closest('.menu-item');
            menuItem.querySelector('.ingredients-list').classList.add('d-none');
            menuItem.querySelector('.edit-ingredients-input').classList.remove('d-none');
            this.classList.add('d-none');
            menuItem.querySelector('.save-btn').classList.remove('d-none');
            menuItem.querySelector('.cancel-btn').classList.remove('d-none');
        });
    });

    saveButtons.forEach(button => {
        button.addEventListener('click', function() {
            const menuItem = this.closest('.menu-item');
            const id = menuItem.dataset.id;
            const menuValue = menuItem.querySelector('.edit-menu-input')?.value;
            const ingredientsValue = menuItem.querySelector('.edit-ingredients-input')?.value;
            const data = {};
            if (menuValue !== undefined) data.menu_item = menuValue;
            
            // Split ingredients by comma, trim whitespace, filter out empty entries, and format as JSON array string
            if (ingredientsValue !== undefined) {
                // Save ingredients as a simple list
                const ingredients = ingredientsValue
                    .split('\n')
                    .map(line => line.trim())
                    .filter(line => line.length > 0 && !line.toLowerCase().includes('ingredients:'))
                    .join('\n');
                data.ingredients = ingredients;
            }

            fetch(`/cook/weekly-menu-orders/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (menuValue !== undefined) {
                        menuItem.querySelector('.menu-title').textContent = menuValue;
                        menuItem.querySelector('.menu-title').classList.remove('d-none');
                        menuItem.querySelector('.edit-menu-input').classList.add('d-none');
                    }
                    if (ingredientsValue !== undefined) {
                        const ingredientsList = menuItem.querySelector('.ingredients-list');
                        const ingredients = ingredientsValue
                            .split('\n')
                            .map(line => line.trim())
                            .filter(line => line.length > 0 && !line.toLowerCase().includes('ingredients:'));
                        
                        ingredientsList.innerHTML = ingredients.map(ingredient => 
                            `<li class=\"ingredient-item\"><small>${ingredient}</small></li>`
                        ).join('');
                        
                        ingredientsList.classList.remove('d-none');
                        menuItem.querySelector('.edit-ingredients-input').classList.add('d-none');
                        if(menuItem.querySelector('.edit-ingredients-btn')) menuItem.querySelector('.edit-ingredients-btn').classList.remove('d-none');
                    }
                    button.classList.add('d-none');
                    menuItem.querySelector('.cancel-btn').classList.add('d-none');
                    menuItem.querySelector('.edit-btn').classList.remove('d-none');
                    console.log('Menu item updated successfully!');
                } else {
                    console.error('Error saving menu item:', data.error);
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
            });
        });
    });

    cancelButtons.forEach(button => {
        button.addEventListener('click', function() {
            const menuItem = this.closest('.menu-item');
            menuItem.querySelector('.menu-title').classList.remove('d-none');
            menuItem.querySelector('.edit-menu-input').classList.add('d-none');
            menuItem.querySelector('.ingredients-list').classList.remove('d-none');
            menuItem.querySelector('.edit-ingredients-input').classList.add('d-none');
            if(menuItem.querySelector('.edit-ingredients-btn')) menuItem.querySelector('.edit-ingredients-btn').classList.remove('d-none');
            this.classList.add('d-none');
            menuItem.querySelector('.save-btn').classList.add('d-none');
            menuItem.querySelector('.edit-btn').classList.remove('d-none');
        });
    });
});
</script>
@endpush
@endsection 