@extends('layouts.app')

@section('content')
<div class="menu-container">
    <div class="menu-header">
        <h1>Meal Planning</h1>
        <div class="week-selector">
            <button class="nav-btn prev">←</button>
            <span class="week-range">March 2024</span>
            <button class="nav-btn next">→</button>
        </div>
    </div>

    <div class="schedule-card">
        <div class="schedule-header">
            <h2>Monthly Meal Schedule</h2>
        </div>
        <div class="schedule-content">
            <table class="meal-table">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Week 1</th>
                        <th>Week 2</th>
                        <th>Week 3</th>
                        <th>Week 4</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time-cell">Breakfast<br>7:00 AM</td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Tapsilog</span>
                                <small>50 servings</small>
                                <div class="meal-description">Tapa, Sinangag, at Itlog</div>
                            </div>
                        </td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Champorado</span>
                                <small>45 servings</small>
                                <div class="meal-description">Chocolate Rice Porridge with Tuyo</div>
                            </div>
                        </td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Pandesal</span>
                                <small>50 servings</small>
                                <div class="meal-description">Freshly Baked Pandesal with Kesong Puti</div>
                            </div>
                        </td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Arroz Caldo</span>
                                <small>40 servings</small>
                                <div class="meal-description">Chicken Rice Porridge with Egg</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="time-cell">Lunch<br>12:00 PM</td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Chicken Adobo</span>
                                <small>50 servings</small>
                                <div class="meal-description">Classic Filipino Adobo with Rice</div>
                            </div>
                        </td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Sinigang na Baboy</span>
                                <small>50 servings</small>
                                <div class="meal-description">Pork Sinigang with Vegetables</div>
                            </div>
                        </td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Menudo</span>
                                <small>50 servings</small>
                                <div class="meal-description">Pork Menudo with Potatoes and Carrots</div>
                            </div>
                        </td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Tinola</span>
                                <small>50 servings</small>
                                <div class="meal-description">Chicken Tinola with Ginger and Sayote</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="time-cell">Dinner<br>6:00 PM</td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Pork Steak</span>
                                <small>45 servings</small>
                                <div class="meal-description">Pork Steak with Onions and Mushrooms</div>
                            </div>
                        </td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Bangus Sisig</span>
                                <small>50 servings</small>
                                <div class="meal-description">Crispy Bangus Sisig with Egg</div>
                            </div>
                        </td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Chicken BBQ</span>
                                <small>50 servings</small>
                                <div class="meal-description">Grilled Chicken with Special Sauce</div>
                            </div>
                        </td>
                        <td class="meal-cell">
                            <div class="meal-info">
                                <span class="meal-name">Beef Bulalo</span>
                                <small>45 servings</small>
                                <div class="meal-description">Beef Shank Soup with Vegetables</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Week 2-4 Schedule -->
            <div class="mt-4">
                <h3>Week 2-4 Schedule</h3>
                <p class="text-muted">The same menu repeats for weeks 2-4 of each month</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.menu-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.menu-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.menu-header h1 {
    margin: 0;
    color: #333;
}

.week-selector {
    display: flex;
    align-items: center;
    gap: 10px;
}

.nav-btn {
    background: #f0f0f0;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
}

.nav-btn:hover {
    background: #e0e0e0;
}

.week-range {
    font-weight: 500;
}

.schedule-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    overflow: hidden;
}

.schedule-header {
    padding: 15px 20px;
    border-bottom: 1px solid #eee;
}

.schedule-header h2 {
    margin: 0;
    color: #333;
    font-size: 18px;
}

.schedule-content {
    padding: 20px;
    overflow-x: auto;
}

.meal-table {
    width: 100%;
    border-collapse: collapse;
}

.meal-table th,
.meal-table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #eee;
}

.meal-table th {
    background: #f8f9fa;
    font-weight: 600;
    color: #333;
}

.time-cell {
    background: #f8f9fa;
    font-weight: 500;
    width: 100px;
}

.meal-cell {
    background: #fff;
    cursor: pointer;
    transition: background-color 0.2s;
}

.meal-cell:hover {
    background: #f8f9fa;
}

.meal-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.meal-name {
    font-weight: 500;
    color: #333;
}

.meal-description {
    font-size: 0.85rem;
    color: #666;
    margin-top: 3px;
}

.meal-cell small {
    color: #666;
    display: block;
    margin-top: 5px;
}

.mt-4 {
    margin-top: 1.5rem;
}

.text-muted {
    color: #6c757d;
}

.rated-meals-section {
    margin-bottom: 2rem;
}

.rated-meals-section .card {
    border: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.rated-meals-section .card-header {
    background: #4e73df;
    color: white;
    border-bottom: none;
}

.rated-meals-section .table th {
    background: #f8f9fa;
    font-weight: 600;
}

.rated-meals-section .rating-stars {
    color: #ffc107;
}

.rated-meals-section .feedback-text {
    max-width: 300px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.rated-meals-section .view-btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const prevBtn = document.querySelector('.nav-btn.prev');
    const nextBtn = document.querySelector('.nav-btn.next');
    const weekRange = document.querySelector('.week-range');
    
    // Set to January of the current year
    let currentMonth = new Date();
    currentMonth.setMonth(0); // January
    currentMonth.setDate(1);
    
    function updateMonthDisplay() {
        const monthNames = ["January", "February", "March", "April", "May", "June", 
                          "July", "August", "September", "October", "November", "December"];
        weekRange.textContent = `${monthNames[currentMonth.getMonth()]} ${currentMonth.getFullYear()}`;
    }
    
    prevBtn.addEventListener('click', function() {
        currentMonth.setMonth(currentMonth.getMonth() - 1);
        updateMonthDisplay();
    });
    
    nextBtn.addEventListener('click', function() {
        currentMonth.setMonth(currentMonth.getMonth() + 1);
        updateMonthDisplay();
    });
    
    updateMonthDisplay();

    // Function to load rated meals from localStorage
    function loadRatedMeals() {
        const ratedMealsTable = document.getElementById('ratedMealsTable');
        ratedMealsTable.innerHTML = '';

        // Get all keys from localStorage
        for (let i = 0; i < localStorage.length; i++) {
            const key = localStorage.key(i);
            if (key.startsWith('feedback_')) {
                const feedback = JSON.parse(localStorage.getItem(key));
                const [_, date, mealType] = key.split('_');
                
                // Create table row
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${new Date(date).toLocaleDateString()}</td>
                    <td>${mealType.charAt(0).toUpperCase() + mealType.slice(1)}</td>
                    <td>
                        <span class="rating-stars">
                            ${'★'.repeat(feedback.rating)}${'☆'.repeat(5 - feedback.rating)}
                        </span>
                    </td>
                    <td class="feedback-text" title="${feedback.comment}">${feedback.comment}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary view-btn" 
                                onclick="viewMealDetails('${date}', '${mealType}')">
                            View Details
                        </button>
                    </td>
                `;
                ratedMealsTable.appendChild(row);
            }
        }

        // If no rated meals, show message
        if (ratedMealsTable.children.length === 0) {
            ratedMealsTable.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        No rated meals yet. Rate a meal to see it here!
                    </td>
                </tr>
            `;
        }
    }

    // Function to view meal details
    window.viewMealDetails = function(date, mealType) {
        // Get the meal details from the menu
        const mealCell = document.querySelector(`[data-date="${date}"][data-meal-type="${mealType}"]`);
        if (mealCell) {
            const mealName = mealCell.querySelector('.meal-name').textContent;
            const mealDescription = mealCell.querySelector('.meal-description').textContent;
            
            // Get the feedback
            const feedback = JSON.parse(localStorage.getItem(`feedback_${date}_${mealType}`));
            
            // Show modal with details
            const modal = new bootstrap.Modal(document.getElementById('mealDetailsModal'));
            document.getElementById('modalMealName').textContent = mealName;
            document.getElementById('modalMealDescription').textContent = mealDescription;
            document.getElementById('modalMealRating').innerHTML = 
                `${'★'.repeat(feedback.rating)}${'☆'.repeat(5 - feedback.rating)}`;
            document.getElementById('modalMealFeedback').textContent = feedback.comment;
            modal.show();
        }
    };

    // Load rated meals when page loads
    loadRatedMeals();

    // Add event listener to meal cells to store meal data
    document.querySelectorAll('.meal-cell').forEach(cell => {
        cell.addEventListener('click', function() {
            const mealName = this.querySelector('.meal-name').textContent;
            const mealDescription = this.querySelector('.meal-description').textContent;
            const mealType = this.closest('tr').querySelector('.time-cell').textContent.split('\n')[0].toLowerCase();
            const date = new Date().toISOString().split('T')[0]; // Today's date

            // Store meal data
            this.setAttribute('data-date', date);
            this.setAttribute('data-meal-type', mealType);
        });
    });

    // Listen for storage changes from other tabs/windows (optional)
    window.addEventListener('storage', loadRatedMeals);

    // --- NEW: Listen for feedback save in history page/modal ---
    // This assumes the Save Feedback button in the modal has id 'saveFeedback'
    const saveFeedbackBtn = document.getElementById('saveFeedback');
    if (saveFeedbackBtn) {
        saveFeedbackBtn.addEventListener('click', function() {
            // Wait a short moment for localStorage to update, then reload rated meals
            setTimeout(loadRatedMeals, 200);
        });
    }

    // If feedback is saved via other means, you can also call loadRatedMeals() after saving
});
</script>

<!-- Meal Details Modal -->
<div class="modal fade" id="mealDetailsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Meal Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h6 id="modalMealName" class="text-primary"></h6>
                <p id="modalMealDescription" class="text-muted"></p>
                <div class="mt-3">
                    <h6>Your Rating:</h6>
                    <div id="modalMealRating" class="rating-stars"></div>
                </div>
                <div class="mt-3">
                    <h6>Your Feedback:</h6>
                    <p id="modalMealFeedback" class="text-muted"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endpush
