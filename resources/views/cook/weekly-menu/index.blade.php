@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center ps-0 pe-4">
                <h4 class="mb-0">Weekly Menu & Ingredients</h4>
                <button id="toggleEditMode" class="btn btn-primary">
                    <i class="bi bi-pencil-square me-2"></i>Toggle Edit Mode
                </button>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success ms-0 me-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form id="menuForm" action="{{ route('cook.weekly-menu.store') }}" method="POST">
        @csrf

        <div class="px-0">
            <!-- Week 1 & 3 Menu -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Week 1 & 3</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Meal Type</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                    <th>Sunday</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                                    $mealTypes = ['breakfast', 'lunch', 'dinner'];
                                @endphp
                                @foreach($mealTypes as $mealType)
                                    <tr>
                                        <td class="fw-bold">{{ ucfirst($mealType) }}</td>
                                        @foreach($days as $day)
                                            <td>
                                                <div class="menu-slot">
                                                    <div class="menu-item-title">
                                                        <input type="text" class="form-control form-control-sm menu-input" name="week1_{{ $mealType }}_{{ $day }}_menu" value="{{ old('week1_' . $mealType . '_' . $day . '_menu', $menus['week1'][$mealType][$day]['menu'] ?? '') }}" disabled placeholder="Menu Item">
                                                    </div>
                                                    <div class="menu-item-ingredients">
                                                        <h6>Ingredients:</h6>
                                                        <textarea class="form-control form-control-sm ingredients-input" name="week1_{{ $mealType }}_{{ $day }}_ingredients" disabled placeholder="List ingredients, separated by commas or new lines">{{ old('week1_' . $mealType . '_' . $day . '_ingredients', $menus['week1'][$mealType][$day]['ingredients'] ?? '') }}</textarea>
                                                        <ul class="ingredients-list">
                                                             @if(isset($menus['week1'][$mealType][$day]['ingredients']) && $menus['week1'][$mealType][$day]['ingredients'])@php $ingredients = explode(',', $menus['week1'][$mealType][$day]['ingredients']); @endphp @foreach($ingredients as $ingredient) @if($ingredient) <li>{{ $ingredient }}</li> @endif @endforeach @endif
                                                        </ul>
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

            <!-- Week 2 & 4 Menu -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Week 2 & 4</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Meal Type</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                    <th>Sunday</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                                    $mealTypes = ['breakfast', 'lunch', 'dinner'];
                                @endphp
                                @foreach($mealTypes as $mealType)
                                    <tr>
                                        <td class="fw-bold">{{ ucfirst($mealType) }}</td>
                                        @foreach($days as $day)
                                            <td>
                                                <div class="menu-slot">
                                                    <div class="menu-item-title">
                                                        <input type="text" class="form-control form-control-sm menu-input" name="week2_{{ $mealType }}_{{ $day }}_menu" value="{{ old('week2_' . $mealType . '_' . $day . '_menu', $menus['week2'][$mealType][$day]['menu'] ?? '') }}" disabled placeholder="Menu Item">
                                                    </div>
                                                    <div class="menu-item-ingredients">
                                                         <h6>Ingredients:</h6>
                                                        <textarea class="form-control form-control-sm ingredients-input" name="week2_{{ $mealType }}_{{ $day }}_ingredients" disabled placeholder="List ingredients, separated by commas or new lines">{{ old('week2_' . $mealType . '_' . $day . '_ingredients', $menus['week2'][$mealType][$day]['ingredients'] ?? '') }}</textarea>
                                                        <ul class="ingredients-list">
                                                            @if(isset($menus['week2'][$mealType][$day]['ingredients']) && $menus['week2'][$mealType][$day]['ingredients']) @php $ingredients = explode(',', $menus['week2'][$mealType][$day]['ingredients']); @endphp @foreach($ingredients as $ingredient) @if($ingredient) <li>{{ $ingredient }}</li> @endif @endforeach @endif
                                                        </ul>
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

        <div class="position-fixed bottom-0 end-0 p-4">
            <button type="submit" class="btn btn-success" id="saveButton" disabled>
                <i class="bi bi-save me-2"></i>Save Changes
            </button>
        </div>
    </form>
</div>

<style>
.menu-slot {
    border: none;
    border-radius: 0;
    background-color: transparent;
    min-height: auto;
    padding: 0;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    width: 100%;
    /* Remove height to let content and padding control it */
}

.menu-item-title {
    padding: 0 0 0.5rem 0;
    border-bottom: 1px solid #eee;
    margin-bottom: 0.5rem;
}

.menu-item-title input.menu-input {
    font-weight: bold;
    margin-bottom: 0;
    padding: 0;
}

.menu-item-ingredients {
    padding: 0;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.menu-item-ingredients h6 {
    font-size: 0.8rem;
    margin-bottom: 0.5rem;
}

.ingredients-list {
    padding-left: 1.5rem;
    margin-bottom: 0;
}

.ingredients-list li {
    font-size: 0.8rem;
    color: #555;
    padding-left: 0;
    margin-bottom: 0.2rem;
}

.ingredients-list li:last-child {
    margin-bottom: 0;
}

.menu-input {
    border: none;
    background: transparent;
    padding: 0;
    font-size: inherit;
    width: 100%;
    outline: none;
}

.menu-input:disabled {
    background: transparent;
    cursor: default;
}

.menu-input:focus {
    background: white;
    box-shadow: none;
}

.ingredients-input {
     border: none;
    background: transparent;
    padding: 0;
    font-size: inherit;
    width: 100%;
    resize: none;
    overflow: hidden;
    outline: none;
    flex-grow: 1;
}

.ingredients-input:disabled {
    background: transparent;
    cursor: default;
}

.ingredients-input:focus {
    background: white;
    box-shadow: none;
}

/* Hide list when in edit mode, show textarea */
.menu-slot .ingredients-list {
    display: block;
}

.menu-slot .ingredients-input {
    display: none;
}

#toggleEditMode:not([disabled]) ~ #menuForm .menu-slot .ingredients-list {
    display: none;
}

#toggleEditMode:not([disabled]) ~ #menuForm .menu-slot .ingredients-input {
    display: block;
}

/* Table styles */
.table th {
    background-color: #f8f9fc;
    font-weight: 600;
    color: #4a5568;
    padding: 0.75rem; /* Standardize header padding */
    border-bottom: 2px solid #e2e8f0;
    vertical-align: middle;
}

.table td {
    padding: 0.75rem; /* Consistent padding for all table data cells */
    vertical-align: top;
    border-bottom: 1px solid #e2e8f0;
    word-wrap: break-word;
}

.table {
    width: 100%;
    margin-bottom: 0;
    color: #212529;
    border-collapse: separate;
    border-spacing: 0;
}

.table tbody tr:hover {
    background-color: #f0f0f0; /* Slightly different hover color */
}

/* Adjust spacing around title and button */
.container-fluid > .row.mb-4 {
    margin-bottom: 1.5rem !important;
}

.container-fluid > .alert {
    margin-top: 0;
    margin-bottom: 1.5rem;
}

/* Adjust padding for card body containing the table */
.card-body {
    padding: 1rem !important; /* Consistent padding around the table */
}

/* Ensure table and content within cells are neatly spaced */
.card-body .table {
    margin-top: 0;
}

.table td:first-child {
    vertical-align: middle; /* Center meal type vertically */
    font-weight: bold;
}

#saveButton {
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleEditMode = document.getElementById('toggleEditMode');
    const saveButton = document.getElementById('saveButton');
    const menuInputs = document.querySelectorAll('.menu-input');
    const ingredientsInputs = document.querySelectorAll('.ingredients-input');
    const ingredientsLists = document.querySelectorAll('.ingredients-list');
    let isEditMode = false;

    toggleEditMode.addEventListener('click', function() {
        isEditMode = !isEditMode;
        menuInputs.forEach(input => {
            input.disabled = !isEditMode;
            if (isEditMode) {
                input.classList.add('form-control');
                input.classList.remove('form-control-sm');
            } else {
                 input.classList.remove('form-control');
                 input.classList.add('form-control-sm');
            }
        });

        ingredientsInputs.forEach(input => {
            input.disabled = !isEditMode;
             if (isEditMode) {
                input.classList.add('form-control');
                input.classList.remove('form-control-sm');
            } else {
                 input.classList.remove('form-control');
                 input.classList.add('form-control-sm');
            }
        });

        ingredientsLists.forEach(list => {
            list.style.display = isEditMode ? 'none' : 'block';
        });

        ingredientsInputs.forEach(input => {
            input.style.display = isEditMode ? 'block' : 'none';
             if (!isEditMode) {
                // Update the ingredients list when exiting edit mode
                const ingredients = input.value.split(',').map(item => item.trim()).filter(item => item !== '');
                const ul = input.nextElementSibling; // the ul.ingredients-list
                ul.innerHTML = '';
                ingredients.forEach(ingredient => {
                    const li = document.createElement('li');
                    li.textContent = ingredient;
                    ul.appendChild(li);
                });
            }
        });

        saveButton.disabled = !isEditMode;
        toggleEditMode.innerHTML = isEditMode ?
            '<i class="bi bi-x-circle me-2"></i>Cancel Edit' :
            '<i class="bi bi-pencil-square me-2"></i>Toggle Edit Mode';
    });

    // Form submission
    document.getElementById('menuForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Collect all menu data
        const formData = new FormData(this);

        // Send to server
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json' // Expecting JSON response
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-success ms-0 me-4';
                alertDiv.textContent = data.message || 'Menu saved successfully!';
                document.querySelector('.container-fluid').insertBefore(alertDiv, document.querySelector('.row.mb-4'));

                // Disable edit mode
                toggleEditMode.click();

                // Remove alert after 3 seconds
                setTimeout(() => alertDiv.remove(), 3000);
            } else {
                 const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger ms-0 me-4';
                alertDiv.textContent = data.message || 'Error saving menu. Please try again.';
                document.querySelector('.container-fluid').insertBefore(alertDiv, document.querySelector('.row.mb-4'));
                setTimeout(() => alertDiv.remove(), 3000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Show error message
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-danger ms-0 me-4';
            alertDiv.textContent = 'An unexpected error occurred while saving the menu.';
             document.querySelector('.container-fluid').insertBefore(alertDiv, document.querySelector('.row.mb-4'));

            // Remove alert after 3 seconds
            setTimeout(() => alertDiv.remove(), 3000);
        });
    });
});
</script>
@endpush
@endsection 