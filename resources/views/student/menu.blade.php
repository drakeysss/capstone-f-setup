@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Meal Planning</h1>
       
    </div>

    <div class="row">
        <!-- Calendar View -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Weekly Meal Schedule</h6>
                    <div class="btn-group">
                        <button class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <button class="btn btn-outline-primary btn-sm">
                            May 1 - May 7, 2023
                        </button>
                        <button class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="100">Time</th>
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
                                <tr>
                                    <td>Breakfast<br>7:00 AM</td>
                                    <td class="meal-cell">Pancakes<br><small>50 servings</small></td>
                                    <td class="meal-cell">Oatmeal<br><small>45 servings</small></td>
                                    <td class="meal-cell">Toast & Eggs<br><small>50 servings</small></td>
                                    <td class="meal-cell">Cereals<br><small>40 servings</small></td>
                                    <td class="meal-cell">Waffles<br><small>50 servings</small></td>
                                    <td class="meal-cell">French Toast<br><small>45 servings</small></td>
                                    <td class="meal-cell">Breakfast Platter<br><small>50 servings</small></td>
                                </tr>
                                <tr>
                                    <td>Lunch<br>12:00 PM</td>
                                    <td class="meal-cell">Adobo<br><small>50 servings</small></td>
                                    <td class="meal-cell">Sinigang<br><small>50 servings</small></td>
                                    <td class="meal-cell">Menudo<br><small>50 servings</small></td>
                                    <td class="meal-cell">Tinola<br><small>50 servings</small></td>
                                    <td class="meal-cell">Caldereta<br><small>50 servings</small></td>
                                    <td class="meal-cell">Mechado<br><small>45 servings</small></td>
                                    <td class="meal-cell">Special Menu<br><small>50 servings</small></td>
                                </tr>
                                <tr>
                                    <td>Dinner<br>6:00 PM</td>
                                    <td class="meal-cell">Pork Steak<br><small>45 servings</small></td>
                                    <td class="meal-cell">Fish Fillet<br><small>50 servings</small></td>
                                    <td class="meal-cell">Chicken BBQ<br><small>50 servings</small></td>
                                    <td class="meal-cell">Beef Stew<br><small>45 servings</small></td>
                                    <td class="meal-cell">Grilled Fish<br><small>50 servings</small></td>
                                    <td class="meal-cell">Mixed Grill<br><small>45 servings</small></td>
                                    <td class="meal-cell">Special Menu<br><small>50 servings</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

          


<style>
.meal-cell {
    background-color: #f8f9fc;
    font-size: 0.9rem;
    cursor: pointer;
    transition: background-color 0.2s;
}

.meal-cell:hover {
    background-color: #eaecf4;
}

.meal-cell small {
    color: #858796;
}
</style>
@endsection
